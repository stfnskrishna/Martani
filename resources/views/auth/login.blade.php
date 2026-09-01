<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Martani</title>

    {{-- Font: Arimo (Regular body, Bold headings) — a plain,
         Arial/Helvetica-compatible grotesque, on purpose. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FBF1D8] min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-lg p-10 w-full max-w-md">

        {{-- Logo --}}
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo-martani.png') }}" alt="Logo Martani" class="h-12"> 
        </div>

        <h1 class="text-2xl font-bold text-gray-900 text-center mb-6">Login Admin</h1>

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                    placeholder="Enter your email...">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:border-[#009944]"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full bg-[#E30613] text-white py-3 rounded-lg font-bold hover:bg-red-700 transition">
                Login
            </button>

        </form>

    </div>

</body>
</html>