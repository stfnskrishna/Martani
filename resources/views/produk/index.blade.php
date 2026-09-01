@extends('layouts.customer')

@section('title', 'Produk')

@section('content')

<div class="relative overflow-hidden">

    {{-- Faint decorative wheat line-art --}}
    <img src="{{ asset('images/wheat-right.png') }}" alt=""
         class="absolute top-2 right-2 w-64 sm:w-72 opacity-30 pointer-events-none select-none">

    <div class="max-w-7xl mx-auto px-6 py-12 relative z-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-1">Pilihan Mie Telor Martani</h1>
        <div class="w-12 h-1 bg-[#FFE500] mb-4"></div>
        <p class="text-gray-500 max-w-2xl mb-2">Temukan berbagai pilihan mie telur Martani untuk kebutuhan rumah tangga hingga usaha kuliner.</p>
        <p class="text-gray-400 text-sm mb-8 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 11H4L5 9z"/>
            </svg>
            {{ $produks->count() }} produk
        </p>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-5 gap-6">
        @forelse($produks as $produk)
        <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 relative flex flex-col h-full transition hover:shadow-lg
            {{ $produk->stok == 0 ? 'opacity-75' : '' }}">

            {{-- Out of stock badge --}}
            @if($produk->stok == 0)
                <div class="absolute top-3 left-3 bg-[#E30613] text-white text-xs font-bold px-2 py-1 rounded-lg z-10">
                    Stok Habis
                </div>
            @endif

            <a href="{{ route('produk.show', $produk->id) }}" class="flex flex-col flex-1">
                @if($produk->gambar)
                    <div class="w-full h-44 bg-white flex items-center justify-center p-3 flex-shrink-0">
                        <img src="{{ asset('storage/' . $produk->gambar) }}"
                             class="max-w-full max-h-full object-contain {{ $produk->stok == 0 ? 'grayscale' : '' }}">
                    </div>
                @else
                    <div class="w-full h-44 bg-[#FBF1D8] flex items-center justify-center flex-shrink-0 {{ $produk->stok == 0 ? 'grayscale' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-[#009944]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif

                <div class="px-4 pt-4 flex flex-col flex-1">
                    <h3 class="font-bold text-gray-900 mb-1 line-clamp-2 min-h-[3rem]">{{ $produk->nama_produk }}</h3>
                    <p class="text-gray-500 text-xs mb-2 line-clamp-2 min-h-[2.25rem]">{{ $produk->deskripsi }}</p>
                    <p class="font-bold text-[#E30613] mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                </div>
            </a>

            <div class="px-4 pb-4">
                @if($produk->stok > 0)
                    <button onclick="tambahKeKeranjang({{ $produk->id }}, this)"
                        class="w-full bg-[#009944] text-white py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition flex items-center justify-center gap-2 whitespace-nowrap">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Tambah ke Keranjang
                    </button>
                @else
                    <button disabled class="w-full bg-gray-200 text-gray-400 py-2 rounded-lg text-sm font-semibold cursor-not-allowed">
                        Stok Habis
                    </button>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-5 text-center py-16 text-gray-400">
            Belum ada produk tersedia.
        </div>
        @endforelse
    </div>
    </div>
</div>

@endsection