<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $search = request('search');
        $produks = Produk::when($search, function($query) use ($search) {
        $query->where('nama_produk', 'like', "%$search%");
        })->get();
        return view('produk.index', compact('produks'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        // Derive a "berat" (weight) and "jenis" (type) from the product name
        // since these aren't separate columns, e.g. "Mie Telor Spesial 200g"
        // -> berat: "200 gram", jenis: "Mie Telor Spesial".
        $berat = null;
        if (preg_match('/(\d+)\s*g\b/i', $produk->nama_produk, $match)) {
            $berat = $match[1] . ' gram';
        }
        $jenis = trim(preg_replace('/\d+\s*g\b/i', '', $produk->nama_produk));
        if ($jenis === '') {
            $jenis = $produk->nama_produk;
        }

        return view('produk.show', compact('produk', 'berat', 'jenis'));
    }
}