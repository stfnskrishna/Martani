@extends('admin.layouts.app')

@section('title', 'Detail Transaksi')

@section('content')

    <div class="mb-6">
        <a href="{{ route('admin.transaksi.index') }}" class="text-gray-400 hover:text-[#E30613] text-sm flex items-center gap-1 mb-3">
            ← Kembali ke Transaksi
        </a>
        <h1 class="text-3xl font-bold text-gray-900">Detail Transaksi</h1>
        <div class="w-12 h-1 bg-[#FFE500] mt-1 mb-1"></div>
        <p class="text-gray-500">{{ $transaksi->kode_transaksi }}</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-3 gap-6">

        {{-- Informasi Pelanggan --}}
        <div class="col-span-2 bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <h2 class="text-lg font-bold text-gray-900 mb-4">Informasi Pelanggan</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-400 text-sm">Nama</p>
                    <p class="font-semibold text-gray-700">{{ $transaksi->nama_pelanggan }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Email</p>
                    <p class="font-semibold text-gray-700">{{ $transaksi->email_pelanggan }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Telepon</p>
                    <p class="font-semibold text-gray-700">{{ $transaksi->telepon }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Kota</p>
                    <p class="font-semibold text-gray-700">{{ $transaksi->kota }}</p>
                </div>
                <div class="col-span-2">
                    <p class="text-gray-400 text-sm">Alamat</p>
                    <p class="font-semibold text-gray-700">{{ $transaksi->alamat }}, {{ $transaksi->kode_pos }}</p>
                </div>
            </div>

            {{-- Detail Produk --}}
            <h2 class="text-lg font-bold text-gray-900 mt-6 mb-4">Produk Dipesan</h2>
            <div class="border rounded-xl overflow-hidden">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="text-left text-[#E30613] font-semibold px-4 py-3 text-sm">Produk</th>
                            <th class="text-left text-[#E30613] font-semibold px-4 py-3 text-sm">Harga Satuan</th>
                            <th class="text-left text-[#E30613] font-semibold px-4 py-3 text-sm">Jumlah</th>
                            <th class="text-right text-[#E30613] font-semibold px-4 py-3 text-sm">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi->detailTransaksi as $detail)
                        <tr class="border-b last:border-0">
                            <td class="px-4 py-3 font-semibold text-gray-700">{{ $detail->nama_produk ?? $detail->produk?->nama_produk ?? 'Produk tidak tersedia' }}</td>
                            <td class="px-4 py-3 text-gray-600">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
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

        {{-- Status --}}
        <div class="col-span-1">
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Status Transaksi</h2>

                @php
                    $statusColor = match($transaksi->status) {
                        'pending' => 'bg-gray-100 text-gray-600',
                        'diproses' => 'bg-blue-100 text-blue-600',
                        'dikirim' => 'bg-yellow-100 text-yellow-600',
                        'selesai' => 'bg-green-100 text-green-600',
                        'dibatalkan' => 'bg-red-100 text-red-600',
                        default => 'bg-gray-100 text-gray-600'
                    };
                @endphp

                <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $statusColor }}">
                    {{ ucfirst($transaksi->status) }}
                </span>

                <form action="{{ route('admin.transaksi.updateStatus', $transaksi->id) }}" method="POST" class="mt-6">
                    @csrf
                    <label class="block text-sm font-semibold text-[#E30613] mb-2">Ubah Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944] mb-4">
                        <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $transaksi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="dikirim" {{ $transaksi->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                        <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="dibatalkan" {{ $transaksi->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                    <button type="submit" class="w-full bg-[#E30613] text-white py-3 rounded-lg hover:bg-red-700 transition font-semibold">
                        Simpan Status
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t">
                    <p class="text-gray-400 text-sm">Tanggal Pesan</p>
                    <p class="font-semibold text-gray-700">
                        {{ \Carbon\Carbon::parse($transaksi->tgl_pesan)->format('d M Y, H:i') }}
                    </p>
                </div>
            </div>
        </div>

    </div>

@endsection