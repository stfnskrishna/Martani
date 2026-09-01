@extends('layouts.customer')

@section('title', 'Tentang Kami')

@section('content')

    {{-- Hero Section --}}
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:items-stretch">

            <div class="lg:col-span-5">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Tentang Kami</h1>
                <div class="w-12 h-1 bg-[#FFE500] mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Martani adalah Kelompok Usaha Bersama (KUB) yang bergerak di bidang produksi mie telur kering.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Berawal dari semangat kebersamaan dan komitmen untuk menjaga kualitas, Martani hadir untuk memenuhi kebutuhan rumah tangga hingga pelaku usaha kuliner dengan produk praktis, higienis, dan mudah diolah.
                </p>

                {{-- Feature row --}}
                <div class="grid grid-cols-3 gap-6 mt-10">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E30613] mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-1a4 4 0 00-3-3.87M9 20H4v-1a4 4 0 013-3.87m5-1.13a4 4 0 100-8 4 4 0 000 8zm6 0a4 4 0 10-1-7.87"/>
                        </svg>
                        <h3 class="font-bold text-gray-900 text-sm mb-1">Untuk Rumah Tangga &amp; Usaha</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Cocok untuk kebutuhan sehari-hari hingga usaha kuliner.</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E30613] mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 13a8 4 0 0016 0H4z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 4c-.6.8-.6 1.4 0 2.2s.6 1.4 0 2.2M13.5 4c-.6.8-.6 1.4 0 2.2s.6 1.4 0 2.2"/>
                        </svg>
                        <h3 class="font-bold text-gray-900 text-sm mb-1">Produk Siap Diolah</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Mie telur kering yang praktis, hemat waktu, dan mudah diaplikasikan.</p>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#E30613] mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 6h11v10H5a2 2 0 01-2-2V6zM14 9h4l3 3v4h-7V9z"/>
                        </svg>
                        <h3 class="font-bold text-gray-900 text-sm mb-1">Pasokan Langsung dari Martani</h3>
                        <p class="text-gray-500 text-xs leading-relaxed">Diproduksi oleh KUB Martani dan dikirim langsung ke Anda.</p>
                    </div>
                </div>
            </div>

            <div class="relative h-72 sm:h-96 lg:h-auto lg:col-span-7">
                <img src="{{ asset('images/tentang-factory.jpg') }}" alt="Proses produksi mie telur Martani"
                     class="absolute inset-0 w-full h-full object-cover rounded-2xl shadow-lg">
            </div>

        </div>
    </section>

    {{-- Visi Misi --}}
    <section class="relative bg-[#FBF1D8] py-16 overflow-hidden">

        {{-- Faint decorative wheat line-art --}}
        <img src="{{ asset('images/wheat-right.png') }}" alt=""
             class="absolute bottom-2 right-2 w-56 sm:w-64 opacity-20 pointer-events-none select-none">

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 relative z-10">

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">
                <div class="w-12 h-12 rounded-full bg-[#FBF1D8] flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Visi Kami</h2>
                <div class="w-10 h-1 bg-[#FFE500] mb-4"></div>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi produsen mie telur kering terpercaya yang dikenal luas oleh masyarakat Indonesia, dengan mengutamakan kualitas produk, kebersihan proses produksi, dan kepuasan pelanggan sebagai prioritas utama.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8">
                <div class="w-12 h-12 rounded-full bg-[#FFF3D6] flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#E39B00]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9 9 0 100-18 9 9 0 000 18z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 17a5 5 0 100-10 5 5 0 000 10z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 13a1 1 0 100-2 1 1 0 000 2z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Misi Kami</h2>
                <div class="w-10 h-1 bg-[#FFE500] mb-4"></div>
                <ul class="space-y-3">
                    <li class="flex gap-3 text-gray-600 leading-relaxed">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#FFE500] mt-2 flex-shrink-0"></span>
                        Memproduksi mie telur kering dengan bahan-bahan pilihan dan proses higienis.
                    </li>
                    <li class="flex gap-3 text-gray-600 leading-relaxed">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#FFE500] mt-2 flex-shrink-0"></span>
                        Menjaga konsistensi kualitas produk untuk kepuasan konsumen.
                    </li>
                    <li class="flex gap-3 text-gray-600 leading-relaxed">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#FFE500] mt-2 flex-shrink-0"></span>
                        Membangun hubungan langsung dengan pelanggan melalui sistem penjualan daring.
                    </li>
                    <li class="flex gap-3 text-gray-600 leading-relaxed">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#FFE500] mt-2 flex-shrink-0"></span>
                        Terus berinovasi untuk meningkatkan kualitas, jangkauan pasar, dan manfaat bagi mitra usaha.
                    </li>
                </ul>
            </div>

        </div>
    </section>

    {{-- Keunggulan --}}
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-2">Keunggulan Martani</h2>
            <div class="w-16 h-1 bg-[#FFE500] mx-auto mb-10"></div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100">
                    <div class="w-16 h-16 bg-[#E30613] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Kualitas Konsisten</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Bahan pilihan dan proses produksi higienis menghasilkan mie telur kering dengan kualitas yang stabil dan terpercaya.</p>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100">
                    <div class="w-16 h-16 bg-[#FFE500] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25m0-9L3 7.5m9 5.25v9M3 7.5v9l9 5.25"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Pilihan Kemasan</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Tersedia dalam berbagai ukuran 100g, 200g, dan 500g untuk memenuhi kebutuhan rumah tangga maupun usaha kuliner.</p>
                </div>

                <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100">
                    <div class="w-16 h-16 bg-[#E30613] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 9.5a3 3 0 013-3c.512 0 .992.135 1.407.372A3 3 0 0117 8.5c0 .35-.06.687-.171 1A3 3 0 0116 15H8a3 3 0 01-1-5.83A3.017 3.017 0 017 9.5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 15v4M16 15v4"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Cocok untuk Usaha Kuliner</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Ideal untuk berbagai menu seperti mie goreng, mie rebus, bakmi, dan kreasi kuliner lainnya.</p>
                </div>

            </div>
        </div>
    </section>

@endsection