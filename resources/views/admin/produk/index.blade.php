@extends('admin.layouts.app')

@section('title', 'Kelola Produk')

@section('content')

    <div class="flex items-center justify-between mb-1">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Produk</h1>
            <div class="w-12 h-1 bg-[#FFE500] mt-1 mb-1"></div>
            <p class="text-gray-500">Kelola semua data produk.</p>
        </div>
        <a href="{{ route('admin.produk.create') }}" 
           class="flex items-center gap-2 border border-[#E30613] text-[#E30613] px-4 py-2 rounded-lg hover:bg-[#E30613] hover:text-white transition">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4 mt-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 mt-6 overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Produk</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Harga</th>
                    <th class="text-left text-[#E30613] font-semibold px-6 py-4">Stok</th>
                    <th class="text-right text-[#E30613] font-semibold px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produks as $produk)
                <tr class="border-b last:border-0 hover:bg-gray-50 align-middle">
                    <td class="px-6 py-4 align-middle">
                        <div class="flex items-center gap-4">
                            @if($produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}" 
                                     class="w-16 h-16 rounded-xl object-cover bg-[#FBF1D8]">
                            @else
                                <div class="w-16 h-16 rounded-xl bg-[#FBF1D8] flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="font-semibold text-[#E30613]">{{ $produk->nama_produk }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 align-middle text-gray-600">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 align-middle text-gray-600">{{ $produk->stok }}</td>
                    <td class="px-6 py-4 align-middle">
                        <div class="flex items-center justify-end gap-3 h-full">
                            <a href="{{ route('admin.produk.edit', $produk->id) }}" class="flex items-center justify-center text-[#E30613] hover:text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                <button type="submit" class="flex items-center justify-center text-[#E30613] hover:text-red-800 p-0 leading-none border-0 bg-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400">
                        Belum ada produk terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
