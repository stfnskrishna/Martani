@extends('layouts.customer')

@section('title', 'Pesanan Berhasil')

@section('content')

<div class="max-w-2xl mx-auto px-6 py-16 text-center">

    {{-- Success Icon --}}
    <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
    </div>

    <h1 class="text-3xl font-bold text-gray-900 mb-2">Pesanan Berhasil!</h1>
    <div class="w-16 h-1 bg-[#FFE500] mx-auto mb-6"></div>
    <p class="text-gray-500 mb-8">Terima kasih telah memesan produk Martani. Pesanan Anda sedang kami proses.</p>

    {{-- Order Info --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 text-left mb-8">
        <div class="grid grid-cols-2 gap-4">
            <div
                x-data="{
                    copied: false,
                    async salinKode() {
                        const kode = '{{ $transaksi->kode_transaksi }}';
                        try {
                            await navigator.clipboard.writeText(kode);
                        } catch (e) {
                            // Fallback for browsers/in-app webviews without the
                            // Clipboard API (some WhatsApp/Instagram browsers).
                            const el = document.createElement('textarea');
                            el.value = kode;
                            el.style.position = 'fixed';
                            el.style.opacity = '0';
                            document.body.appendChild(el);
                            el.select();
                            document.execCommand('copy');
                            document.body.removeChild(el);
                        }
                        this.copied = true;
                        setTimeout(() => (this.copied = false), 2000);
                    }
                }"
            >
                <p class="text-gray-400 text-sm">Kode Transaksi</p>
                <div class="flex items-center gap-2">
                    <p class="font-bold text-[#E30613] text-lg">{{ $transaksi->kode_transaksi }}</p>
                    <button
                        type="button"
                        @click="salinKode()"
                        :title="copied ? 'Tersalin!' : 'Salin kode'"
                        class="text-gray-400 hover:text-[#E30613] transition"
                    >
                        <svg x-show="!copied" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <svg x-show="copied" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <p class="text-gray-400 text-sm">Status</p>
                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-sm font-semibold">
                    Pending
                </span>
            </div>
            <div>
                <p class="text-gray-400 text-sm">Nama</p>
                <p class="font-semibold text-gray-700">{{ $transaksi->nama_pelanggan }}</p>
            </div>
            <div>
                <p class="text-gray-400 text-sm">Total Pembayaran</p>
                <p class="font-bold text-[#E30613]">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            </div>
            <div class="col-span-2">
                <p class="text-gray-400 text-sm">Alamat Pengiriman</p>
                <p class="font-semibold text-gray-700">{{ $transaksi->alamat }}, {{ $transaksi->kota }}, {{ $transaksi->kode_pos }}</p>
            </div>
        </div>
    </div>

    <p class="text-gray-500 text-sm mb-8">Simpan kode transaksi Anda untuk keperluan konfirmasi. Kami akan segera menghubungi Anda melalui nomor telepon yang telah didaftarkan.</p>

    <div class="flex gap-4 justify-center">
        <a href="{{ route('lacak') }}?kode={{ $transaksi->kode_transaksi }}" 
            class="bg-[#E30613] text-white px-8 py-3 rounded-lg font-bold hover:bg-red-700 transition">
            Lacak Pesanan
        </a>
        <a href="{{ route('home') }}" 
            class="border-2 border-[#E30613] text-[#E30613] px-8 py-3 rounded-lg font-bold hover:bg-[#E30613] hover:text-white transition">
            Kembali ke Beranda
        </a>
        <a href="{{ route('produk.index') }}" 
            class="border-2 border-gray-300 text-gray-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-50 transition">
            Belanja Lagi
        </a>
    </div>

</div>

@endsection
