<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'nama_pelanggan',
        'email_pelanggan',
        'telepon',
        'alamat',
        'kota',
        'kode_pos',
        'total_harga',
        'status',
        'tgl_pesan',
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}