<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Produk::count();
        $totalTransaksi = Transaksi::count();
        $transaksiPending = Transaksi::where('status', 'pending')->count();
        $totalPendapatan = Transaksi::where('status', 'selesai')->sum('total_harga');

        return view('admin.dashboard', compact(
            'totalProduk',
            'totalTransaksi',
            'transaksiPending',
            'totalPendapatan'
        ));
    }   
}