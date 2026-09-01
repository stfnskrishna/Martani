@extends('admin.layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Tambah Produk</h1>
        <div class="w-12 h-1 bg-[#FFE500] mt-1 mb-1"></div>
        <p class="text-gray-500">Tambahkan produk baru ke dalam sistem.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 max-w-2xl">

        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#E30613] mb-2">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                    placeholder="Masukkan nama produk">
            </div>

            <div class="mb-5">
                <label class="block text-sm font-semibold text-[#E30613] mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                    placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <label class="block text-sm font-semibold text-[#E30613] mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                        placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#E30613] mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                        placeholder="0">
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-[#E30613] mb-2">Gambar Produk</label>
                <input type="file" name="gambar" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]">
                <p class="text-gray-400 text-xs mt-1">Format: JPG, JPEG, PNG. Maksimal 2MB.</p>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                    class="bg-[#E30613] text-white px-6 py-3 rounded-lg hover:bg-red-700 transition font-semibold">
                    Simpan Produk
                </button>
                <a href="{{ route('admin.produk.index') }}"
                    class="border border-gray-300 text-gray-600 px-6 py-3 rounded-lg hover:bg-gray-50 transition font-semibold">
                    Batal
                </a>
            </div>

        </form>
    </div>

@endsection
