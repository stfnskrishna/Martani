<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\KontakController;

// Public routes
Route::get('/', function () {
    return view('beranda');
})->name('home');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');
Route::post('/keranjang/tambah-ajax', [KeranjangController::class, 'tambahAjax'])->name('keranjang.tambahAjax');


// Keranjang routes
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
Route::post('/keranjang/update/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
Route::post('/keranjang/update-ajax/{id}', [KeranjangController::class, 'updateAjax'])->name('keranjang.updateAjax');
Route::post('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
Route::post('/keranjang/hapus-semua', [KeranjangController::class, 'hapusSemua'])->name('keranjang.hapusSemua');

// Checkout routes
Route::get('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
Route::post('/checkout/proses', [TransaksiController::class, 'proses'])->name('checkout.proses');
Route::get('/checkout/sukses/{kode}', [TransaksiController::class, 'sukses'])->name('checkout.sukses');

//Lacak routes
Route::get('/lacak', function() {
    return view('lacak');
})->name('lacak');

Route::post('/lacak', [TransaksiController::class, 'lacak'])->name('lacak.cari');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/produk', [AdminProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/tambah', [AdminProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk/tambah', [AdminProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/edit/{id}', [AdminProdukController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/edit/{id}', [AdminProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk/hapus/{id}', [AdminProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/transaksi', [AdminTransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/{id}', [AdminTransaksiController::class, 'show'])->name('transaksi.show');
    Route::post('/transaksi/status/{id}', [AdminTransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
});

require __DIR__.'/auth.php';
