@extends('layouts.customer')

@section('title', 'Checkout')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-1">Checkout</h1>
    <div class="w-12 h-1 bg-[#FFE500] mb-2"></div>
    <p class="text-gray-500 mb-8">Lengkapi data di bawah ini untuk melanjutkan pesanan.</p>

    <form action="{{ route('checkout.proses') }}" method="POST">
        @csrf

        <div class="flex gap-8">

            {{-- Left Side --}}
            <div class="flex-1">

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Data Customer --}}
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mb-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Data Customer</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                                placeholder="08xxxxxxxxxx">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email_pelanggan" value="{{ old('email_pelanggan') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                                placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Catatan untuk Penjual</label>
                            <input type="text" name="catatan" value="{{ old('catatan') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                                placeholder="Opsional">
                        </div>
                    </div>
                </div>

                {{-- Alamat Pengiriman --}}
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Alamat Pengiriman</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat Lengkap</label>
                        <input type="text" name="alamat" value="{{ old('alamat') }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                            placeholder="Jalan, nomor rumah, kelurahan, kecamatan">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kota / Kabupaten</label>
                            <input type="text" name="kota" value="{{ old('kota') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                                placeholder="Nama kota">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Pos</label>
                            <input type="text" name="kode_pos" value="{{ old('kode_pos') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                                placeholder="12345">
                        </div>
                    </div>
                    <div class="flex justify-end mt-6">
                        <button type="submit"
                            class="bg-[#E30613] text-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition">
                            Lanjut ke Pengiriman
                        </button>
                    </div>
                </div>

            </div>

            {{-- Right Side - Order Summary --}}
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
                </div>
            </div>

        </div>
    </form>
</div>

@endsection