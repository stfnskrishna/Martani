@extends('layouts.customer')

@section('title', 'Lacak Pesanan')

@section('content')

<section class="relative bg-[#FBF1D8] py-12 overflow-hidden">

    {{-- Faint decorative wheat line-art --}}
    <img src="{{ asset('images/wheat-left.png') }}" alt=""
         class="absolute top-2 left-2 w-56 sm:w-64 opacity-20 pointer-events-none select-none">

<div class="max-w-7xl mx-auto px-6 relative z-10">
  <div class="max-w-3xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-1">Lacak Pesanan</h1>
    <div class="w-12 h-1 bg-[#FFE500] mb-2"></div>
    <p class="text-gray-500 mb-8">Masukkan kode transaksi Anda untuk melihat status pesanan.</p>

    {{-- Search Form --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mb-8">
        <form action="{{ route('lacak.cari') }}" method="POST">
            @csrf
            <div class="flex gap-3">
                <input type="text" name="kode_transaksi"
                    value="{{ old('kode_transaksi', $transaksi->kode_transaksi ?? request('kode_transaksi', '')) }}"
                    class="flex-1 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                    placeholder="Contoh: TRX-ABC123">
                <button type="submit"
                    class="bg-[#E30613] text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">
                    Lacak
                </button>
            </div>
            @error('kode_transaksi')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </form>
    </div>

    {{-- Results --}}
    @if($searched ?? false)
        @if($transaksi)

            {{-- Status Banner --}}
            @php
                $statusColor = match($transaksi->status) {
                    'pending' => 'bg-gray-100 text-gray-600',
                    'diproses' => 'bg-blue-100 text-blue-600',
                    'dikirim' => 'bg-yellow-100 text-yellow-600',
                    'selesai' => 'bg-green-100 text-green-600',
                    'dibatalkan' => 'bg-red-100 text-red-600',
                    default => 'bg-gray-100 text-gray-600'
                };

                $statusSteps = ['pending', 'diproses', 'dikirim', 'selesai'];
                $currentStep = array_search($transaksi->status, $statusSteps);
            @endphp

            {{-- Progress Bar --}}
            @if($transaksi->status != 'dibatalkan')
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mb-6">
                <div class="flex items-center justify-between mb-2">
                    @foreach(['Pending', 'Diproses', 'Dikirim', 'Selesai'] as $index => $step)
                    <div class="flex flex-col items-center flex-1">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm mb-1
                            {{ $currentStep >= $index ? 'bg-[#E30613] text-white' : 'bg-gray-200 text-gray-400' }}">
                            @if($currentStep > $index)
                                ✓
                            @else
                                {{ $index + 1 }}
                            @endif
                        </div>
                        <p class="text-xs text-gray-500">{{ $step }}</p>
                    </div>
                    @if($index < 3)
                    <div class="flex-1 h-1 {{ $currentStep > $index ? 'bg-[#E30613]' : 'bg-gray-200' }} mb-4"></div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Order Details --}}
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 mb-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">{{ $transaksi->kode_transaksi }}</h2>
                        <p class="text-gray-400 text-sm">{{ \Carbon\Carbon::parse($transaksi->tgl_pesan)->format('d M Y, H:i') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColor }}">
                        {{ ucfirst($transaksi->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <p class="text-gray-400 text-sm">Nama</p>
                        <p class="font-semibold text-gray-700">{{ $transaksi->nama_pelanggan }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">Telepon</p>
                        <p class="font-semibold text-gray-700">{{ $transaksi->telepon }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-400 text-sm">Alamat Pengiriman</p>
                        <p class="font-semibold text-gray-700">{{ $transaksi->alamat }}, {{ $transaksi->kota }}, {{ $transaksi->kode_pos }}</p>
                    </div>
                </div>

                {{-- Ordered Products --}}
                <h3 class="font-bold text-gray-900 mb-3">Produk Dipesan</h3>
                <div class="border rounded-xl overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                                <th class="text-left text-[#E30613] font-semibold px-4 py-3 text-sm">Produk</th>
                                <th class="text-left text-[#E30613] font-semibold px-4 py-3 text-sm">Jumlah</th>
                                <th class="text-right text-[#E30613] font-semibold px-4 py-3 text-sm">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksi->detailTransaksi as $detail)
                            <tr class="border-b last:border-0">
                                <td class="px-4 py-3 font-semibold text-gray-700">{{ $detail->nama_produk ?? $detail->produk?->nama_produk ?? 'Produk tidak tersedia' }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $detail->jumlah }}</td>
                                <td class="px-4 py-3 text-right font-semibold text-gray-700">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-end mt-4">
                    <div class="text-right">
                        <p class="text-gray-400 text-sm">Total Pembayaran</p>
                        <p class="text-2xl font-bold text-[#E30613]">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

        @else
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-12 text-center">
                <p class="text-gray-400 text-lg mb-2">Pesanan tidak ditemukan.</p>
                <p class="text-gray-400 text-sm">Pastikan kode transaksi yang Anda masukkan sudah benar.</p>
            </div>
        @endif
    @endif

  </div>
</div>
</section>

@endsection