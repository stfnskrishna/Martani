@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
    <div class="w-12 h-1 bg-[#FFE500] mt-1 mb-1"></div>
    <p class="text-gray-500 mb-8">Selamat datang, Admin.</p>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-2 gap-6 mb-10">

        <div class="bg-white rounded-2xl p-6 flex items-center gap-4 shadow-md border border-gray-100">
            <div class="bg-[#FBF1D8] p-4 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25m0-9L3 7.5m9 5.25v9M3 7.5v9l9 5.25"/>
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Produk</p>
                <p class="text-4xl font-bold text-[#E30613]">{{ $totalProduk }}</p>
                <p class="text-gray-400 text-sm">Produk Terdaftar</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 flex items-center gap-4 shadow-md border border-gray-100">
            <div class="bg-yellow-100 p-4 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Transaksi</p>
                <p class="text-4xl font-bold text-[#E30613]">{{ $totalTransaksi }}</p>
                <p class="text-gray-400 text-sm">Transaksi Keseluruhan</p>
            </div>
        </div>

    </div>

    {{-- Menu Cepat --}}
    <h2 class="text-xl font-bold text-gray-900 mb-1">Menu Cepat</h2>
    <div class="w-12 h-1 bg-[#FFE500] mb-6"></div>

    <div class="grid grid-cols-2 gap-6">

        <a href="{{ route('admin.produk.index') }}" class="bg-white rounded-2xl p-6 flex items-center gap-4 shadow-md border border-gray-100 hover:shadow-md transition">
            <div class="bg-[#FBF1D8] p-4 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25m0-9L3 7.5m9 5.25v9M3 7.5v9l9 5.25"/>
                </svg>
            </div>
            <div>
                <p class="text-[#E30613] font-bold text-lg">Kelola Produk</p>
                <p class="text-gray-400 text-sm">Tambah, ubah, hapus produk</p>
            </div>
        </a>

        <a href="{{ route('admin.transaksi.index') }}" class="bg-white rounded-2xl p-6 flex items-center gap-4 shadow-md border border-gray-100 hover:shadow-md transition">
            <div class="bg-yellow-100 p-4 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
            </div>
            <div>
                <p class="text-[#E30613] font-bold text-lg">Kelola Transaksi</p>
                <p class="text-gray-400 text-sm">Lihat dan ubah status transaksi</p>
            </div>
        </a>

    </div>

@endsection
