@extends('admin.layouts.app')

@section('title', 'Kelola Transaksi')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Transaksi</h1>
        <div class="w-12 h-1 bg-[#FFE500] mt-1 mb-1"></div>
        <p class="text-gray-500">Lihat dan kelola transaksi pelanggan.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">No</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Kode Transaksi</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Pelanggan</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Tanggal</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Total</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Status</th>
                    <th class="text-right text-[#E30613] font-semibold px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $index => $transaksi)
                <tr class="border-b last:border-0 hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-600">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 font-semibold text-[#E30613]">{{ $transaksi->kode_transaksi }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $transaksi->nama_pelanggan }}</td>
                    <td class="px-6 py-4 text-gray-600">
                        {{ \Carbon\Carbon::parse($transaksi->tgl_pesan)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4">
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
                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor }}">
                            {{ ucfirst($transaksi->status) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.transaksi.show', $transaksi->id) }}"
                           class="border border-[#E30613] text-[#E30613] px-4 py-2 rounded-lg text-sm hover:bg-[#E30613] hover:text-white transition">
                            Ubah Status
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-gray-400">
                        Belum ada transaksi.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection