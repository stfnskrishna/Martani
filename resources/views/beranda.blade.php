@extends('layouts.customer')

@section('title', 'Beranda')

@section('content')

    {{-- Hero Section --}}
    <section class="relative bg-[#FBF1D8] bg-cover bg-center bg-no-repeat overflow-hidden min-h-[600px] sm:min-h-[620px] lg:min-h-[640px]"
             style="background-image: url('{{ asset('images/hero-bg-cream.png') }}')">
        <div class="max-w-7xl mx-auto px-6 pt-12 lg:pt-14 h-full relative z-10 flex flex-col justify-start">

            {{-- Copy --}}
            <div class="max-w-md lg:max-w-lg">
                <span class="inline-block text-gray-900 text-xs font-bold tracking-wide px-4 py-1.5 rounded-full mb-2">
                    MIE TELOR MARTANI
                </span>
                <h1 class="text-3xl lg:text-4xl font-extrabold leading-tight mb-4">
                    <span class="text-gray-900">Mie Telur Berkualitas</span>
                    <span class="text-[#009944]">Untuk Keluarga &amp;</span>
                    <span class="text-[#E30613]">Usaha Kuliner Anda</span>
                </h1>
                <p class="text-gray-600 text-sm leading-relaxed mb-6 max-w-md">
                    Dibuat dari bahan pilihan dan diproses secara higienis menghasilkan mie telur kering dengan tekstur kenyal, rasa gurih, dan ketahanan yang baik.
                </p>
                <a href="{{ route('produk.index') }}"
                   class="inline-flex items-center gap-2 bg-[#E30613] text-white px-7 py-2.5 rounded-lg font-bold hover:bg-red-700 transition">
                    Lihat Produk
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            {{-- Trust badges (own row, not capped by the copy column's width) --}}
            <div class="flex flex-nowrap items-center gap-x-6 gap-y-4 mt-8 max-w-xl">
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-9 h-9 rounded-full bg-[#FBF1D8] border-2 border-[#009944] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#009944]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                        </svg>
                    </div>
                    <div class="whitespace-nowrap">
                        <p class="text-gray-900 text-sm font-semibold leading-tight">Bahan Pilihan</p>
                        <p class="text-gray-500 text-xs leading-tight">Berkualitas Tinggi</p>
                    </div>
                </div>
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-9 h-9 rounded-full bg-[#FBF1D8] border-2 border-[#009944] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#009944]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                        </svg>
                    </div>
                    <div class="whitespace-nowrap">
                        <p class="text-gray-900 text-sm font-semibold leading-tight">Higienis</p>
                        <p class="text-gray-500 text-xs leading-tight">Diproses Secara Higienis</p>
                    </div>
                </div>
                <div class="flex items-center gap-2.5 flex-shrink-0">
                    <div class="w-9 h-9 rounded-full bg-[#FBF1D8] border-2 border-[#009944] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#009944]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V3a.75.75 0 0 1 .75-.75A2.25 2.25 0 0 1 16.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z"/>
                        </svg>
                    </div>
                    <div class="whitespace-nowrap">
                        <p class="text-gray-900 text-sm font-semibold leading-tight">Rasa Gurih</p>
                        <p class="text-gray-500 text-xs leading-tight">Tekstur Kenyal &amp; Lezat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Brand Promotion Section --}}
    <section class="relative bg-[#FBF1D8] py-16 overflow-hidden">

        {{-- Faint decorative wheat line-art (user-supplied asset, original gold color, upright — no rotation/flip) --}}
        <img src="{{ asset('images/wheat-left.png') }}" alt=""
             class="absolute -bottom-10 sm:-bottom-14 left-2 w-48 sm:w-52 opacity-40 pointer-events-none select-none">
        <img src="{{ asset('images/wheat-right.png') }}" alt=""
             class="absolute -bottom-10 sm:-bottom-14 right-2 w-48 sm:w-52 opacity-40 pointer-events-none select-none">

        <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Kualitas Terbaik untuk Anda</h2>
            <div class="w-16 h-1 bg-[#FFE500] mx-auto mb-6"></div>
            <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto mb-12">
                Martani menghadirkan mie telur kering yang diproduksi dengan standar kualitas tinggi. Setiap produk dibuat dari bahan-bahan pilihan yang segar dan diproses secara higienis, sehingga menghasilkan mie dengan tekstur kenyal, rasa yang lezat, dan ketahanan yang baik.
            </p>

            {{-- Feature grid --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-10 gap-x-6 md:divide-x md:divide-gray-300/60">
                <div class="px-2">
                    <div class="w-14 h-14 rounded-full bg-[#009944] flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#FFE500]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 21V3"/>
                            <path d="M12 6c-2-1-3.5-2.5-3-4.5"/>
                            <path d="M12 6c2-1 3.5-2.5 3-4.5"/>
                            <path d="M12 10c-2-1-3.5-2.5-3-4.5"/>
                            <path d="M12 10c2-1 3.5-2.5 3-4.5"/>
                            <path d="M12 14c-2-1-3.5-2.5-3-4.5"/>
                            <path d="M12 14c2-1 3.5-2.5 3-4.5"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Bahan Pilihan</h3>
                    <p class="text-gray-500 text-sm leading-snug">Menggunakan tepung terigu terbaik dan telur berkualitas tinggi.</p>
                </div>
                <div class="px-2">
                    <div class="w-14 h-14 rounded-full bg-[#E30613] flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#FFE500]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 3a9 9 0 1 0 9 9"/>
                            <path d="M12 7a5 5 0 1 0 5 5"/>
                            <path d="M12 11a1 1 0 1 0 1 1"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Tekstur Kenyal</h3>
                    <p class="text-gray-500 text-sm leading-snug">Mie tidak mudah lembek dan tetap kenyal saat dimasak.</p>
                </div>
                <div class="px-2">
                    <div class="w-14 h-14 rounded-full bg-[#009944] flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#FFE500]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Higienis</h3>
                    <p class="text-gray-500 text-sm leading-snug">Diproduksi secara higienis dan bersertifikat halal untuk keamanan Anda.</p>
                </div>
                <div class="px-2">
                    <div class="w-14 h-14 rounded-full bg-[#E30613] flex items-center justify-center mx-auto mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#FFE500]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2v6M8 2v6M10 2v6M8 8v14"/>
                            <path d="M17 2c1.5 1.5 1.5 4.5 0 6a2.5 2.5 0 0 1-3 0c-1.5-1.5-1.5-4.5 0-6a2.5 2.5 0 0 1 3 0Z"/>
                            <path d="M15.5 8v14"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Serbaguna</h3>
                    <p class="text-gray-500 text-sm leading-snug">Cocok untuk berbagai masakan, dari hidangan rumahan hingga usaha.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Products --}}
    <section class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-2">Produk Kami</h2>
            <div class="w-16 h-1 bg-[#FFE500] mx-auto mb-10"></div>
            @php
                $produks = \App\Models\Produk::take(4)->get();
            @endphp
            <div class="grid grid-cols-4 gap-6">
                @foreach($produks as $produk)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 relative
                    {{ $produk->stok == 0 ? 'opacity-75' : '' }}">

                    {{-- Out of stock badge --}}
                    @if($produk->stok == 0)
                        <div class="absolute top-3 left-3 bg-[#E30613] text-white text-xs font-bold px-2 py-1 rounded-lg z-10">
                        Stok Habis
                        </div>
                    @endif

                    @if($produk->gambar)
                        <div class="w-full h-48 bg-white flex items-center justify-center p-3">
                            <img src="{{ asset('storage/' . $produk->gambar) }}"
                                class="max-w-full max-h-full object-contain {{ $produk->stok == 0 ? 'grayscale' : '' }}">
                        </div>
                    @else
                        <div class="w-full h-48 bg-[#FBF1D8] flex items-center justify-center {{ $produk->stok == 0 ? 'grayscale' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-[#009944]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif

                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">{{ $produk->nama_produk }}</h3>
                    <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ $produk->deskripsi }}</p>
                    <p class="font-bold text-[#E30613] mb-3">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    @if($produk->stok > 0)
                        <button onclick="tambahKeKeranjang({{ $produk->id }}, this)"
                            class="w-full bg-[#009944] text-white py-2 rounded-lg text-sm font-semibold hover:bg-green-700 transition flex items-center justify-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('produk.index') }}" class="border-2 border-[#E30613] text-[#E30613] px-8 py-3 rounded-lg font-bold hover:bg-[#E30613] hover:text-white transition">
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>

@endsection