@extends('layouts.customer')

@section('title', 'Keranjang')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-1">Keranjang</h1>
    <div class="w-12 h-1 bg-[#FFE500] mb-2"></div>
    <p class="text-gray-500 mb-8">Periksa kembali produk dan jumlah pesanan Anda sebelum melanjutkan.</p>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($keranjangs->isEmpty())
        <div class="text-center py-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <p class="text-gray-400 text-lg mb-4">Keranjang Anda masih kosong.</p>
            <a href="{{ route('produk.index') }}" class="bg-[#E30613] text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="flex gap-8">

            {{-- Cart Items --}}
            <div class="flex-1">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left text-[#E30613] font-semibold px-6 py-4">Produk</th>
                                <th class="text-left text-[#E30613] font-semibold px-6 py-4">Harga</th>
                                <th class="text-left text-[#E30613] font-semibold px-6 py-4">Jumlah</th>
                                <th class="text-left text-[#E30613] font-semibold px-6 py-4">Subtotal</th>
                                <th class="text-left text-[#E30613] font-semibold px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keranjangs as $item)
                            <tr class="border-b last:border-0">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($item->produk->gambar)
                                            <img src="{{ asset('storage/' . $item->produk->gambar) }}" class="w-14 h-14 rounded-xl object-cover">
                                        @else
                                            <div class="w-14 h-14 rounded-xl bg-[#FBF1D8] flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#009944]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                        <span class="font-semibold text-[#E30613]">{{ $item->produk->nama_produk }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-600">
                                    Rp {{ number_format($item->harga_atTime, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('keranjang.update', $item->id) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <button type="submit" name="jumlah" value="{{ $item->jumlah - 1 }}"
                                            class="w-8 h-8 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 font-bold">
                                            −
                                        </button>
                                        <span class="w-8 text-center font-semibold">{{ $item->jumlah }}</span>
                                        <button type="submit" name="jumlah" value="{{ $item->jumlah + 1 }}"
                                            class="w-8 h-8 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 font-bold">
                                            +
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 font-semibold text-[#E30613]">
                                    Rp {{ number_format($item->harga_atTime * $item->jumlah, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-[#E30613] hover:text-red-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Bottom Buttons --}}
                <div class="flex justify-between mt-4">
                    <a href="{{ route('produk.index') }}" class="flex items-center gap-2 border border-gray-300 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-50 transition text-sm">
                        ← Lanjut Belanja
                    </a>
                    <form action="{{ route('keranjang.hapusSemua') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 border border-[#E30613] text-[#E30613] px-4 py-2 rounded-lg hover:bg-red-50 transition text-sm"
                            onclick="return confirm('Hapus semua item dari keranjang?')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Semua
                        </button>
                    </form>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="w-80 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Ringkasan Pesanan</h2>
                    <p class="text-gray-500 text-sm mb-3">Subtotal ({{ $keranjangs->sum('jumlah') }} barang)</p>
                    @foreach($keranjangs as $item)
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span>{{ $item->produk->nama_produk }}</span>
                        <span>Rp {{ number_format($item->harga_atTime * $item->jumlah, 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                    <div class="border-t mt-4 pt-4 flex justify-between font-bold text-[#E30613]">
                        <span>Total</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <a href="{{ route('checkout') }}" class="block mt-6 bg-[#E30613] text-white text-center py-3 rounded-lg font-bold hover:bg-red-700 transition">
                        Checkout
                    </a>
                </div>
            </div>

            {{-- Error Message if Full --}}
            @if(session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
            @endif

        </div>
    @endif
</div>

@endsection