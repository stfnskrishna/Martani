<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class TransaksiController extends Controller
{
    public function checkout()
    {
        $keranjangs = Keranjang::where('session_id', session()->getId())
            ->with('produk')
            ->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang kosong.');
        }

        $total = $keranjangs->sum(function($item) {
            return $item->harga_atTime * $item->jumlah;
        });

        return view('checkout', compact('keranjangs', 'total'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'email_pelanggan' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
        ]);

        $keranjangs = Keranjang::where('session_id', session()->getId())
            ->with('produk')
            ->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index');
        }

        $total = $keranjangs->sum(function($item) {
            return $item->harga_atTime * $item->jumlah;
        });

        $kode = 'TRX-' . strtoupper(Str::random(6));

        $transaksi = Transaksi::create([
            'kode_transaksi' => $kode,
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'total_harga' => $total,
            'status' => 'pending',
        ]);

        foreach ($keranjangs as $item) {
            if ($item->jumlah > $item->produk->stok) {
                return redirect()->route('keranjang.index')
                    ->with('error', 'Stok produk ' . $item->produk->nama_produk . ' tidak mencukupi. Silahkan perbarui keranjang Anda.');
            }
        } 
        foreach ($keranjangs as $item) {
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $item->produk_id,
                'nama_produk' => $item->produk->nama_produk,
                'jumlah' => $item->jumlah,
                'harga_satuan' => $item->harga_atTime,
                'subtotal' => $item->harga_atTime * $item->jumlah,
                'catatan' => $request->catatan ?? null,
            ]);

            // Reduce stock
            $item->produk->decrement('stok', $item->jumlah);
        }

        // Clear cart
        Keranjang::where('session_id', session()->getId())->delete();

        // Send email
        try {
            Mail::raw("Pesanan baru masuk!\n\nKode: $kode\nNama: {$request->nama_pelanggan}\nTotal: Rp " . number_format($total, 0, ',', '.'), function($message) {
                $message->to(config('mail.from.address'))
                        ->subject('Pesanan Baru - Martani');
            });
        } catch (\Exception $e) {
            // Silent fail - don't stop checkout if email fails
        }

        return redirect()->route('checkout.sukses', $kode);
    }

    public function sukses($kode)
    {
        $transaksi = Transaksi::where('kode_transaksi', $kode)->firstOrFail();
        return view('sukses', compact('transaksi'));
    }

    public function lacak(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required'
        ]);

        $transaksi = Transaksi::with('detailTransaksi.produk')
            ->where('kode_transaksi', $request->kode_transaksi)
            ->first();

        // Pass an explicit `searched` flag rather than relying on
        // isset($transaksi) in the view — isset() treats a null value
        // (transaction not found) the same as an undefined variable, so
        // the old code silently skipped both the result AND the "not
        // found" message when no match was found.
        return view('lacak', ['transaksi' => $transaksi, 'searched' => true]);
    }

}