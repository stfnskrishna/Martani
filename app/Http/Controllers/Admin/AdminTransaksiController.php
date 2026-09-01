<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::latest()->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.produk')->findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function updateStatus($id, \Illuminate\Http\Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,dikirim,selesai,dibatalkan',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status' => $request->status]);
        return redirect()->route('admin.transaksi.index')->with('success', 'Status transaksi berhasil diperbarui.');
    }
}