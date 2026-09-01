<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Store a snapshot of the product name at time of purchase, so order
        //    history survives the product being renamed or deleted later.
        //    Guarded so this is safe to re-run (e.g. after a previous deploy
        //    attempt partially applied this migration before failing below).
        if (! Schema::hasColumn('detail_transaksis', 'nama_produk')) {
            Schema::table('detail_transaksis', function (Blueprint $table) {
                $table->string('nama_produk')->nullable()->after('produk_id');
            });
        }

        // 2. Backfill the snapshot for existing rows from whatever product
        //    is still linked (rows whose product was already deleted, or
        //    already backfilled, stay untouched).
        DB::table('detail_transaksis')
            ->join('produks', 'produks.id', '=', 'detail_transaksis.produk_id')
            ->whereNull('detail_transaksis.nama_produk')
            ->update(['detail_transaksis.nama_produk' => DB::raw('produks.nama_produk')]);

        // 3. Stop deleting a product from cascading away order history: drop the
        //    cascade delete FK and let produk_id go NULL instead. The snapshot
        //    column above keeps the line item displayable either way.
        //    MySQL-only raw SQL — SQLite doesn't support ALTER ... DROP/ADD
        //    FOREIGN KEY or MODIFY, and doesn't enforce FK constraints by
        //    default anyway, so there's nothing to relax there.
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE detail_transaksis DROP FOREIGN KEY detail_transaksis_produk_id_foreign');
            DB::statement('ALTER TABLE detail_transaksis MODIFY produk_id BIGINT UNSIGNED NULL');
            DB::statement('ALTER TABLE detail_transaksis ADD CONSTRAINT detail_transaksis_produk_id_foreign FOREIGN KEY (produk_id) REFERENCES produks(id) ON DELETE SET NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE detail_transaksis DROP FOREIGN KEY detail_transaksis_produk_id_foreign');
            DB::statement('ALTER TABLE detail_transaksis MODIFY produk_id BIGINT UNSIGNED NOT NULL');
            DB::statement('ALTER TABLE detail_transaksis ADD CONSTRAINT detail_transaksis_produk_id_foreign FOREIGN KEY (produk_id) REFERENCES produks(id) ON DELETE CASCADE');
        }

        if (Schema::hasColumn('detail_transaksis', 'nama_produk')) {
            Schema::table('detail_transaksis', function (Blueprint $table) {
                $table->dropColumn('nama_produk');
            });
        }
    }
};
