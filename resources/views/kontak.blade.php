@extends('layouts.customer')

@section('title', 'Kontak')

@section('content')

    {{-- Header + Contact section --}}
    <section class="relative bg-[#FBF1D8] py-16 overflow-hidden">

        {{-- Faint decorative wheat line-art --}}
        <img src="{{ asset('images/wheat-right.png') }}" alt=""
             class="absolute top-2 right-2 w-64 sm:w-72 opacity-25 pointer-events-none select-none">

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <h1 class="text-3xl font-bold text-gray-900 mb-2">Kontak Kami</h1>
            <div class="w-12 h-1 bg-[#FFE500] mb-4"></div>
            <p class="text-gray-500 max-w-xl mb-10">Hubungi Martani untuk informasi produk, pemesanan, maupun kebutuhan usaha kuliner.</p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                {{-- Hubungi Martani --}}
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Hubungi Martani</h2>
                    <div class="w-10 h-1 bg-[#FFE500] mb-6"></div>

                    <div class="space-y-5">
                        <div class="flex gap-4 pb-5 border-b border-gray-100">
                            <div class="w-11 h-11 rounded-full bg-[#E30613] flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.39 1.26 4.82L2 22l5.35-1.4a9.9 9.9 0 004.69 1.19h.01c5.46 0 9.9-4.45 9.9-9.9 0-2.65-1.03-5.14-2.9-7.01A9.86 9.86 0 0012.04 2zm0 1.67c2.14 0 4.15.83 5.67 2.35a7.95 7.95 0 012.34 5.68c0 4.42-3.6 8.02-8.02 8.02a8 8 0 01-4.07-1.11l-.29-.17-3 .79.8-2.93-.19-.3a7.96 7.96 0 01-1.24-4.29c0-4.42 3.6-8.04 8.03-8.04zm-4.38 4.62c-.16 0-.42.06-.64.3-.22.24-.85.83-.85 2.03 0 1.2.87 2.35.99 2.51.12.16 1.7 2.72 4.19 3.71 2.07.82 2.49.66 2.94.62.45-.04 1.45-.59 1.65-1.16.2-.57.2-1.06.14-1.16-.06-.1-.22-.16-.46-.28-.24-.12-1.45-.72-1.68-.8-.22-.08-.39-.12-.55.12-.16.24-.63.8-.77.96-.14.16-.28.18-.52.06-.24-.12-1.02-.38-1.94-1.2-.72-.64-1.2-1.43-1.34-1.67-.14-.24-.02-.37.11-.49.11-.11.24-.28.36-.42.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.55-1.33-.76-1.82-.2-.48-.4-.42-.55-.42h-.47z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">WhatsApp</h3>
                                <p class="text-gray-700 text-sm">0812-3456-7890</p>
                                <p class="text-gray-400 text-xs mt-0.5">Fast response via WhatsApp</p>
                            </div>
                        </div>

                        <div class="flex gap-4 pb-5 border-b border-gray-100">
                            <div class="w-11 h-11 rounded-full bg-[#FFE500] flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Email</h3>
                                <p class="text-gray-700 text-sm">martani.mie@gmail.com</p>
                                <p class="text-gray-400 text-xs mt-0.5">Kami akan membalas secepat mungkin</p>
                            </div>
                        </div>

                        <div class="flex gap-4 pb-5 border-b border-gray-100">
                            <div class="w-11 h-11 rounded-full bg-[#009944] flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Jam Operasional</h3>
                                <p class="text-gray-700 text-sm">Senin &ndash; Sabtu<br>08.00 &ndash; 17.00 WIB</p>
                                <p class="text-gray-400 text-xs mt-0.5">Minggu &amp; Hari Libur: Tutup</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-11 h-11 rounded-full bg-[#E30613] flex items-center justify-center flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Lokasi</h3>
                                <p class="text-gray-700 text-sm">Wonogiri, Jawa Tengah, Indonesia</p>
                                <p class="text-gray-400 text-xs mt-0.5">Produksi mie telur kering Martani</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 bg-[#FBF1D8] rounded-xl p-4 flex gap-3 items-start">
                        <div class="w-9 h-9 rounded-full bg-white flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25m0-9L3 7.5m9 5.25v9M3 7.5v9l9 5.25"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-bold text-[#E30613] text-sm">Melayani kebutuhan rumah tangga &amp; usaha kuliner</p>
                            <p class="text-gray-500 text-xs mt-0.5">Tersedia berbagai ukuran kemasan untuk kebutuhan Anda.</p>
                        </div>
                    </div>
                </div>

                {{-- Kirim Pesan --}}
                <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Kirim Pesan</h2>
                    <div class="w-10 h-1 bg-[#FFE500] mb-6"></div>

                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6 text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.kirim') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#003DA5]"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#003DA5]"
                                placeholder="Masukkan email Anda">
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#003DA5]"
                                placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Pesan</label>
                            <textarea name="pesan" rows="4" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#003DA5]"
                                placeholder="Tulis pesan Anda di sini...">{{ old('pesan') }}</textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#E30613] text-white py-3 rounded-lg font-bold hover:bg-red-700 transition flex items-center justify-center gap-2">
                            Kirim Pesan
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection