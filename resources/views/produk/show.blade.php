@extends('layouts.customer')

@section('title', $produk->nama_produk)

@section('content')

<section class="relative bg-[#FBF1D8] py-12 overflow-hidden">

    {{-- Faint decorative wheat line-art --}}
    <img src="{{ asset('images/wheat-right.png') }}" alt=""
         class="absolute top-2 right-2 w-56 sm:w-64 opacity-20 pointer-events-none select-none">

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <a href="{{ route('produk.index') }}" class="text-gray-400 hover:text-[#E30613] text-sm flex items-center gap-1 mb-6">
            ← Kembali ke Produk
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

            {{-- Image --}}
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 flex items-center justify-center relative">
                @if($produk->stok == 0)
                    <div class="absolute top-5 left-5 bg-[#E30613] text-white text-xs font-bold px-2 py-1 rounded-lg z-10">
                        Stok Habis
                    </div>
                @endif
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}"
                         class="max-w-full max-h-96 object-contain {{ $produk->stok == 0 ? 'grayscale' : '' }}">
                @else
                    <div class="w-full h-72 bg-[#FBF1D8] rounded-xl flex items-center justify-center {{ $produk->stok == 0 ? 'grayscale' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-[#009944]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                @endif
            </div>

            {{-- Details --}}
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $produk->nama_produk }}</h1>
                <p class="text-2xl font-bold text-[#E30613] mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                <p class="text-gray-600 leading-relaxed mb-6">{{ $produk->deskripsi }}</p>

                {{-- Detail Produk --}}
                <div class="mb-6">
                    <h2 class="text-sm font-bold text-gray-900 mb-2">Detail Produk</h2>
                    <div class="border-t border-gray-200 divide-y divide-gray-100">
                        @if($berat)
                        <div class="flex items-center gap-3 py-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E30613] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-3.3 0-6 2.7-6 6h12c0-3.3-2.7-6-6-6z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.5 5.5L12 8l2.5-2.5M12 3v5"/>
                            </svg>
                            <span class="text-gray-500 w-32 flex-shrink-0">Berat</span>
                            <span class="text-gray-700 font-medium">: {{ $berat }}</span>
                        </div>
                        @endif
                        <div class="flex items-center gap-3 py-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E30613] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v18M12 3c-2.5 1.5-4 4-4 7 0 1.5.5 3 1.5 4M12 3c2.5 1.5 4 4 4 7 0 1.5-.5 3-1.5 4"/>
                            </svg>
                            <span class="text-gray-500 w-32 flex-shrink-0">Jenis</span>
                            <span class="text-gray-700 font-medium">: {{ $jenis }}</span>
                        </div>
                        <div class="flex items-center gap-3 py-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E30613] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25m0-9L3 7.5m9 5.25v9M3 7.5v9l9 5.25"/>
                            </svg>
                            <span class="text-gray-500 w-32 flex-shrink-0">Ketersediaan</span>
                            <span class="font-medium {{ $produk->stok > 0 ? 'text-green-600' : 'text-[#E30613]' }}">: {{ $produk->stok > 0 ? 'Stok tersedia' : 'Stok habis' }}</span>
                        </div>
                        <div class="flex items-center gap-3 py-3 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#E30613] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.5 10.5l4-4a3 3 0 10-4.24-4.24l-4 4M10.5 13.5l-4 4a3 3 0 104.24 4.24l4-4M8 16l8-8"/>
                            </svg>
                            <span class="text-gray-500 w-32 flex-shrink-0">Cocok untuk</span>
                            <span class="text-gray-700 font-medium">: Mie goreng, mie rebus, dan olahan lainnya</span>
                        </div>
                    </div>
                </div>

                @if($produk->stok > 0)
                    <p class="text-sm font-bold text-[#E30613] mb-2">Jumlah</p>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex items-center gap-2 flex-shrink-0">
                            <button id="qtyMinus" type="button"
                                class="w-9 h-9 border border-gray-300 rounded-lg bg-white flex items-center justify-center hover:bg-gray-100 font-bold text-gray-600 active:scale-90 transition">
                                −
                            </button>
                            <span id="qtyDisplay" class="w-8 text-center font-semibold text-gray-700">1</span>
                            <button id="qtyPlus" type="button"
                                class="w-9 h-9 border border-gray-300 rounded-lg bg-white flex items-center justify-center hover:bg-gray-100 font-bold text-gray-600 active:scale-90 transition">
                                +
                            </button>
                        </div>
                        <button id="addToCartBtn" type="button"
                            data-produk-id="{{ $produk->id }}" data-stok="{{ $produk->stok }}"
                            class="flex-1 bg-[#009944] text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition flex items-center justify-center gap-2 whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Tambah ke Keranjang
                        </button>
                    </div>
                @else
                    <button disabled class="w-full sm:w-auto bg-gray-200 text-gray-400 px-8 py-3 rounded-lg font-semibold cursor-not-allowed mb-4">
                        Stok Habis
                    </button>
                @endif

                <p class="text-gray-400 text-xs flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Produk higienis dan berkualitas dari Martani
                </p>
            </div>

        </div>

        {{-- Informasi Produk --}}
        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 mt-10">
            <h2 class="text-lg font-bold text-gray-900 mb-1">Informasi Produk</h2>
            <div class="w-10 h-1 bg-[#FFE500] mb-6"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex gap-4">
                    <div class="w-11 h-11 rounded-full bg-[#FBF1D8] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6M9 8h1M7 4h10a1 1 0 011 1v14a1 1 0 01-1 1H7a1 1 0 01-1-1V5a1 1 0 011-1z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Deskripsi</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Dibuat dari bahan-bahan pilihan dan diproses secara higienis untuk menjaga kualitas, tekstur, dan cita rasa yang lezat.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-11 h-11 rounded-full bg-[#FBF1D8] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#009944]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14l-1.5 11a2 2 0 01-2 1.8H8.5a2 2 0 01-2-1.8L5 8z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 8V6a3 3 0 016 0v2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Penyimpanan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Simpan di tempat kering dan sejuk. Jauhkan dari sinar matahari langsung dan kelembapan.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-11 h-11 rounded-full bg-[#FBF1D8] flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 12h16c0 4.4-3.6 8-8 8s-8-3.6-8-8z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 3c-.6.8-.6 1.4 0 2.2s.6 1.4 0 2.2M13.5 3c-.6.8-.6 1.4 0 2.2s.6 1.4 0 2.2"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Penggunaan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Cocok digunakan untuk berbagai olahan seperti mie goreng, mie rebus, atau kreasi mie lainnya.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@if($produk->stok > 0)
<script>
(function() {
    let qty = 1;
    const stok = {{ $produk->stok }};
    const qtyDisplay = document.getElementById('qtyDisplay');
    const minusBtn = document.getElementById('qtyMinus');
    const plusBtn = document.getElementById('qtyPlus');
    const addBtn = document.getElementById('addToCartBtn');
    const originalBtnHTML = addBtn.innerHTML;

    minusBtn.addEventListener('click', function() {
        if (qty > 1) {
            qty--;
            qtyDisplay.textContent = qty;
        }
    });

    plusBtn.addEventListener('click', function() {
        if (qty < stok) {
            qty++;
            qtyDisplay.textContent = qty;
        }
    });

    addBtn.addEventListener('click', function() {
        addBtn.disabled = true;
        addBtn.innerHTML = `
            <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
            </svg>
            Menambahkan...
        `;

        fetch('{{ route("keranjang.tambahAjax") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ produk_id: {{ $produk->id }}, jumlah: qty })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (typeof updateCartBadge === 'function') {
                    updateCartBadge(data.cartCount);
                }
                addBtn.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Ditambahkan!
                `;
                addBtn.classList.remove('bg-[#009944]');
                addBtn.classList.add('bg-green-500');
                setTimeout(() => {
                    addBtn.innerHTML = originalBtnHTML;
                    addBtn.classList.remove('bg-green-500');
                    addBtn.classList.add('bg-[#009944]');
                    addBtn.disabled = false;
                    qty = 1;
                    qtyDisplay.textContent = qty;
                }, 1000);
            } else {
                addBtn.innerHTML = originalBtnHTML;
                addBtn.disabled = false;
                alert(data.message || 'Gagal menambahkan ke keranjang.');
            }
        })
        .catch(() => {
            addBtn.innerHTML = originalBtnHTML;
            addBtn.disabled = false;
        });
    });
})();
</script>
@endif

@endsection
