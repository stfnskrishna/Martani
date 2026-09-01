<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::where('session_id', session()->getId())
            ->with('produk')
            ->get();
        $total = $keranjangs->sum(function($item) {
            return $item->harga_atTime * $item->jumlah;
        });
        return view('keranjang', compact('keranjangs', 'total'));
    }

    public function tambah(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
        $sessionId = session()->getId();

        if ($produk->stok <= 0) {
            return redirect()->back()->with('error', 'Stok produk habis.');
        }

        $existing = Keranjang::where('session_id', $sessionId)
            ->where('produk_id', $produk->id)
            ->first();

        if ($existing && $existing->jumlah >= $produk->stok) {
            return redirect()->back()->with('error', 'Jumlah melebihi stok tersedia.');
        }

        if ($existing) {
            $existing->increment('jumlah');
        } else {
            Keranjang::create([
                'session_id' => $sessionId,
                'produk_id' => $produk->id,
                'jumlah' => 1,
                'harga_atTime' => $produk->harga,
            ]);
        }

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function update(Request $request, $id)
    {
        $item = Keranjang::findOrFail($id);
    
        if ($request->jumlah < 1) {
            $item->delete();
        } else {
            // Check against stock
            if ($request->jumlah > $item->produk->stok) {
                return redirect()->route('keranjang.index')
                    ->with('error', 'Jumlah melebihi stok tersedia (' . $item->produk->stok . ').');
            }
            $item->update(['jumlah' => $request->jumlah]);
        }
        return redirect()->route('keranjang.index');
}

    public function hapus($id)
    {
        Keranjang::findOrFail($id)->delete();
        return redirect()->route('keranjang.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function hapusSemua()
    {
        Keranjang::where('session_id', session()->getId())->delete();
        return redirect()->route('keranjang.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }


    public function tambahAjax(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
        $sessionId = session()->getId();

        // Optional custom quantity (e.g. from the product detail page's
        // quantity picker). Defaults to 1 to match the simple "Tambah ke
        // Keranjang" button on the product listing cards.
        $tambah = (int) ($request->jumlah ?? 1);
        if ($tambah < 1) {
            $tambah = 1;
        }

        // Check if stock is available
        if ($produk->stok <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Stok produk habis.'
            ]);
        }

        $existing = Keranjang::where('session_id', $sessionId)
            ->where('produk_id', $produk->id)
            ->first();

        $totalDiminta = ($existing->jumlah ?? 0) + $tambah;

        // Check if the requested quantity exceeds available stock
        if ($totalDiminta > $produk->stok) {
            return response()->json([
                'success' => false,
                'message' => 'Jumlah melebihi stok tersedia (' . $produk->stok . ').'
            ]);
        }

        if ($existing) {
            $existing->update(['jumlah' => $totalDiminta]);
            $item = $existing;
        } else {
            $item = Keranjang::create([
                'session_id' => $sessionId,
                'produk_id' => $produk->id,
                'jumlah' => $tambah,
                'harga_atTime' => $produk->harga,
            ]);
        }

        $cartCount = Keranjang::where('session_id', $sessionId)->sum('jumlah');

        return response()->json([
            'success' => true,
            'cartCount' => $cartCount,
            'keranjangId' => $item->id,
            'jumlah' => $item->jumlah,
            'stok' => $produk->stok,
            'message' => 'Produk ditambahkan ke keranjang.'
        ]);
    }

    public function updateAjax(Request $request, $id)
    {
        $item = Keranjang::findOrFail($id);

        if ($item->session_id !== session()->getId()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak diizinkan.'
            ], 403);
        }

        $jumlah = (int) $request->jumlah;
        $sessionId = session()->getId();

        if ($jumlah < 1) {
            $item->delete();
            $cartCount = Keranjang::where('session_id', $sessionId)->sum('jumlah');

            return response()->json([
                'success' => true,
                'deleted' => true,
                'jumlah' => 0,
                'cartCount' => $cartCount,
            ]);
        }

        if ($jumlah > $item->produk->stok) {
            return response()->json([
                'success' => false,
                'message' => 'Jumlah melebihi stok tersedia (' . $item->produk->stok . ').',
                'jumlah' => $item->jumlah,
            ]);
        }

        $item->update(['jumlah' => $jumlah]);
        $cartCount = Keranjang::where('session_id', $sessionId)->sum('jumlah');

        return response()->json([
            'success' => true,
            'deleted' => false,
            'jumlah' => $item->jumlah,
            'cartCount' => $cartCount,
        ]);
    }
}