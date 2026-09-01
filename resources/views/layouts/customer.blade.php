<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Martani - @yield('title')</title>

    {{-- Font: Arimo (Regular body, Bold headings) — a plain,
         Arial/Helvetica-compatible grotesque, on purpose. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FBF1D8] min-h-screen flex flex-col">

    {{-- Navbar --}}
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-24 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo-martani.png') }}" alt="Logo Martani" class="h-[92px] w-auto object-contain">

            </a>

            {{-- Nav Links --}}
            <div class="flex items-center gap-10">
                <a href="{{ route('home') }}" class="relative pb-1
                    {{ request()->routeIs('home') ? 'text-[#E30613] font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFE500]' : 'text-gray-600 font-medium hover:text-[#E30613]' }}">
                    Beranda
                </a>
                <a href="{{ route('produk.index') }}" class="relative pb-1
                    {{ request()->routeIs('produk.*') ? 'text-[#E30613] font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFE500]' : 'text-gray-600 font-medium hover:text-[#E30613]' }}">
                    Produk
                </a>
                <a href="{{ route('tentang') }}" class="relative pb-1
                    {{ request()->routeIs('tentang') ? 'text-[#E30613] font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFE500]' : 'text-gray-600 font-medium hover:text-[#E30613]' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('kontak') }}" class="relative pb-1
                    {{ request()->routeIs('kontak') ? 'text-[#E30613] font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFE500]' : 'text-gray-600 font-medium hover:text-[#E30613]' }}">
                    Kontak
                </a>
                <a href="{{ route('lacak') }}" 
                     class="relative pb-1
                    {{ request()->routeIs('lacak') ? 'text-[#E30613] font-semibold after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#FFE500]' : 'text-gray-600 font-medium hover:text-[#E30613]' }}">
                    Lacak Pesanan
                </a>
            </div>

            {{-- Search + Cart --}}
            <div class="flex items-center gap-4">

                {{-- Search --}}
                <div class="relative" x-data="{ open: false }">
                    <button onclick="document.getElementById('searchBox').classList.toggle('hidden')" class="flex items-center justify-center text-[#E30613] p-0 leading-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    <div id="searchBox" class="hidden absolute right-0 top-10 bg-white border border-gray-200 rounded-xl shadow-lg p-3 w-72">
                        <form action="{{ route('produk.index') }}" method="GET" class="flex gap-2">
                            <input type="text" name="search" placeholder="Cari produk..."
                                class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#E30613]"
                                value="{{ request('search') }}">
                            <button type="submit" class="bg-[#E30613] text-white px-3 py-2 rounded-lg text-sm">
                                Cari
                            </button>
                        </form>
                    </div>
                </div>

            {{-- Cart --}}
            <a href="{{ route('keranjang.index') }}" class="relative flex items-center justify-center" id="cartIcon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 block text-[#E30613]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                @php
                    $cartCount = \App\Models\Keranjang::where('session_id', session()->getId())->sum('jumlah');
                @endphp
                @if($cartCount > 0)
                    <span id="cartBadge" class="absolute -top-2 -right-2 bg-[#E30613] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                        {{ $cartCount }}
                    </span>
                @else
                    <span id="cartBadge" class="hidden absolute -top-2 -right-2 bg-[#E30613] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"></span>
                @endif
</a>

            </div>

        </div>
    </nav>

    {{-- Main Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="relative bg-[#005E2A] text-white pt-14 pb-8 overflow-hidden">

        {{-- Decorative noodle bowl line-art --}}
        <div class="absolute -top-8 -right-8 w-72 sm:w-80 opacity-10 pointer-events-none select-none"
             style="aspect-ratio: 1119/1071; background-color: #FFFFFF;
                    -webkit-mask-image: url('{{ asset('images/noodle-bowl.png') }}'); mask-image: url('{{ asset('images/noodle-bowl.png') }}');
                    -webkit-mask-size: contain; mask-size: contain;
                    -webkit-mask-repeat: no-repeat; mask-repeat: no-repeat;
                    -webkit-mask-position: center; mask-position: center;">
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col sm:flex-row gap-10 sm:gap-16 pb-8">

                {{-- Brand --}}
                <div class="sm:flex-shrink-0 sm:w-72">
                    <img src="{{ asset('images/logo-martani.png') }}" alt="Logo Martani" class="h-20 w-auto object-contain mb-4">
                    <p class="text-green-100 text-sm leading-relaxed max-w-xs">
                        Mie telur berkualitas dari bahan pilihan, diproduksi dengan higienis dan bersertifikat halal untuk keluarga Indonesia.
                    </p>
                </div>

                {{-- Navigasi + Hubungi Kami, grouped together with a divider --}}
                <div class="flex flex-col sm:flex-row gap-10 sm:gap-0 sm:divide-x sm:divide-green-300/20">

                    {{-- Navigasi --}}
                    <div class="sm:pr-12">
                        <h4 class="font-bold text-white mb-4">Navigasi</h4>
                        <ul class="space-y-2 text-sm text-green-100">
                            <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                            <li><a href="{{ route('produk.index') }}" class="hover:text-white transition">Produk</a></li>
                            <li><a href="{{ route('tentang') }}" class="hover:text-white transition">Tentang Kami</a></li>
                            <li><a href="{{ route('kontak') }}" class="hover:text-white transition">Kontak</a></li>
                            <li><a href="{{ route('lacak') }}" class="hover:text-white transition">Lacak Pesanan</a></li>
                        </ul>
                    </div>

                    {{-- Hubungi Kami --}}
                    <div class="sm:pl-12">
                        <h4 class="font-bold text-white mb-4">Hubungi Kami</h4>
                        <ul class="space-y-3 text-sm text-green-100">
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                0812-3456-7890
                            </li>
                            <li class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                martani.mie@gmail.com
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Wonogiri, Jawa Tengah, Indonesia
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="border-t border-green-300/20 pt-6 text-center">
                <p class="text-green-200 text-xs">© {{ date('Y') }} Martani. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    const KERANJANG_UPDATE_URL_TEMPLATE = "{{ route('keranjang.updateAjax', ':id') }}";

    function updateCartBadge(cartCount) {
        const badge = document.getElementById('cartBadge');
        if (badge) {
            badge.textContent = cartCount;
            badge.classList.toggle('hidden', cartCount <= 0);
        } else if (cartCount > 0) {
            const cartIcon = document.getElementById('cartIcon');
            const newBadge = document.createElement('span');
            newBadge.id = 'cartBadge';
            newBadge.className = 'absolute -top-2 -right-2 bg-[#E30613] text-white text-xs rounded-full w-5 h-5 flex items-center justify-center';
            newBadge.textContent = cartCount;
            cartIcon.appendChild(newBadge);
        }
    }

    function tambahKeKeranjang(produkId, button) {
        const originalButton = button.cloneNode(true);

        button.disabled = true;
        button.innerHTML = `<svg class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg> Menambahkan...`;

        fetch('{{ route("keranjang.tambahAjax") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ produk_id: produkId })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                updateCartBadge(data.cartCount);

                button.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg> Ditambahkan!`;
                button.classList.remove('bg-[#002F7A]');
                button.classList.add('bg-green-500');

                setTimeout(() => {
                    renderStepper(button, produkId, data.keranjangId, data.jumlah, data.stok, originalButton);
                }, 700);

            } else {
                // Show error
                button.disabled = false;
                button.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg> ${data.message}`;
                button.classList.remove('bg-[#002F7A]');
                button.classList.add('bg-[#E30613]');

                setTimeout(() => {
                    button.replaceWith(originalButton);
                }, 2000);
            }
        })
        .catch(err => {
            button.replaceWith(originalButton);
        });
    }

    function renderStepper(button, produkId, keranjangId, jumlah, stok, originalButton) {
        const wrapper = document.createElement('div');
        wrapper.className = 'w-full flex items-center justify-center gap-3';
        wrapper._originalButton = originalButton;
        wrapper._pendingJumlah = jumlah;
        wrapper._confirmedJumlah = jumlah;
        wrapper._syncing = false;
        wrapper._resyncNeeded = false;
        wrapper._syncTimer = null;

        wrapper.innerHTML = `
            <button type="button" class="stepper-minus w-9 h-9 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 active:scale-90 font-bold text-[#002F7A] flex-shrink-0 transition">−</button>
            <span class="stepper-qty text-[#002F7A] font-semibold w-6 text-center">${jumlah}</span>
            <button type="button" class="stepper-plus w-9 h-9 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 active:scale-90 font-bold text-[#002F7A] flex-shrink-0 transition">+</button>
        `;

        button.replaceWith(wrapper);

        const qtySpan = wrapper.querySelector('.stepper-qty');
        const minusBtn = wrapper.querySelector('.stepper-minus');
        const plusBtn = wrapper.querySelector('.stepper-plus');

        minusBtn.addEventListener('click', () => {
            const next = wrapper._pendingJumlah - 1;
            wrapper._pendingJumlah = next;

            if (next < 1) {
                // Optimistic: revert instantly, sync the deletion in the background.
                revertToAddButton(wrapper);
            } else {
                qtySpan.textContent = next;
            }
            scheduleSync(wrapper, keranjangId);
        });

        plusBtn.addEventListener('click', () => {
            const next = wrapper._pendingJumlah + 1;
            if (next > stok) {
                showStepperError(wrapper, `Stok tersisa ${stok}.`);
                return;
            }
            wrapper._pendingJumlah = next;
            qtySpan.textContent = next;
            scheduleSync(wrapper, keranjangId);
        });
    }

    function scheduleSync(wrapper, keranjangId) {
        clearTimeout(wrapper._syncTimer);

        if (wrapper._pendingJumlah < 1) {
            // Deletion: fire immediately, no need to wait out the debounce.
            attemptSync(wrapper, keranjangId);
        } else {
            // Debounce so rapid clicking coalesces into a single request.
            wrapper._syncTimer = setTimeout(() => attemptSync(wrapper, keranjangId), 350);
        }
    }

    function attemptSync(wrapper, keranjangId) {
        if (wrapper._syncing) {
            wrapper._resyncNeeded = true;
            return;
        }
        wrapper._syncing = true;

        const url = KERANJANG_UPDATE_URL_TEMPLATE.replace(':id', keranjangId);
        const jumlahToSync = wrapper._pendingJumlah;

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ jumlah: jumlahToSync })
        })
        .then(res => res.json())
        .then(data => {
            wrapper._syncing = false;

            if (!data.success) {
                // Roll back to the last server-confirmed value.
                wrapper._pendingJumlah = wrapper._confirmedJumlah;
                const qtySpan = wrapper.querySelector('.stepper-qty');
                if (qtySpan) qtySpan.textContent = wrapper._confirmedJumlah;
                showStepperError(wrapper, data.message || 'Gagal memperbarui jumlah.');
                return;
            }

            updateCartBadge(data.cartCount);
            if (!data.deleted) {
                wrapper._confirmedJumlah = data.jumlah;
            }

            if (wrapper._resyncNeeded) {
                wrapper._resyncNeeded = false;
                attemptSync(wrapper, keranjangId);
            }
        })
        .catch(() => {
            wrapper._syncing = false;
            wrapper._pendingJumlah = wrapper._confirmedJumlah;
            const qtySpan = wrapper.querySelector('.stepper-qty');
            if (qtySpan) qtySpan.textContent = wrapper._confirmedJumlah;
            showStepperError(wrapper, 'Gagal memperbarui jumlah.');
        });
    }

    function showStepperError(wrapper, message) {
        const qtySpan = wrapper.querySelector('.stepper-qty');
        if (!qtySpan) return;
        wrapper.title = message;
        qtySpan.classList.add('text-[#E30613]');
        setTimeout(() => {
            qtySpan.classList.remove('text-[#E30613]');
        }, 1200);
    }

    function revertToAddButton(wrapper) {
        const originalButton = wrapper._originalButton;
        originalButton.disabled = false;
        wrapper.replaceWith(originalButton);
    }
</script>
</body>
</html>