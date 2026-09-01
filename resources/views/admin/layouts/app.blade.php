<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Martani - @yield('title')</title>

    {{-- Font: Arimo (Regular body, Bold headings) — a plain,
         Arial/Helvetica-compatible grotesque, on purpose. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen bg-[#FBF1D8]">

    {{-- Sidebar --}}
    <aside class="w-60 bg-[#005E2A] flex flex-col justify-between py-6 px-4 fixed h-full">

        {{-- Logo & Title --}}
        <div>
            <img src="{{ asset('images/logo-martani.png') }}" alt="Logo Martani" class="h-14 w-auto object-contain mx-auto mb-3 block">
            <p class="text-white font-bold text-center text-lg">MARTANI</p>
            <p class="text-green-200 text-center text-sm mb-8">Admin Panel</p>

            {{-- Navigation --}}
            <nav class="flex flex-col gap-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-white font-medium
                   {{ request()->routeIs('admin.dashboard') ? 'bg-[#FFE500] text-[#005E2A]' : 'hover:bg-green-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.produk.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-white font-medium
                   {{ request()->routeIs('admin.produk.*') ? 'bg-[#FFE500] text-[#005E2A]' : 'hover:bg-green-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25m0-9L3 7.5m9 5.25v9M3 7.5v9l9 5.25"/>
                    </svg>
                    Produk
                </a>

                <a href="{{ route('admin.transaksi.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-white font-medium
                   {{ request()->routeIs('admin.transaksi.*') ? 'bg-[#FFE500] text-[#005E2A]' : 'hover:bg-green-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Transaksi
                </a>
            </nav>
        </div>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-3 px-4 py-3 rounded-lg text-white hover:bg-green-700 w-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Log Out
            </button>
        </form>

    </aside>

    {{-- Main Content --}}
    <main class="ml-60 flex-1 p-8 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>
