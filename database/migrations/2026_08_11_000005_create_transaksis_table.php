<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('kota');
            $table->string('kode_pos');
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['pending','diproses','dikirim', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamp('tgl_pesan')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
