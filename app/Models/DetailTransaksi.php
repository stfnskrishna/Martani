<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'transaksi_id',
        'produk_id',
        'nama_produk',
        'jumlah',
        'harga_satuan',
        'subtotal',
        'catatan',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}