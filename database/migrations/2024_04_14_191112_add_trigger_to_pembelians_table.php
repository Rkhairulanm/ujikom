<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pembelians', function (Blueprint $table) {
            DB::unprepared('
            CREATE TRIGGER trigger_update_stok_produk AFTER INSERT ON pembelians FOR EACH ROW
            BEGIN
                UPDATE produks SET stok = stok - NEW.jumlah WHERE produk_id = NEW.produk_id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_update_stok_produk_hapus AFTER DELETE ON pembelians FOR EACH ROW
            BEGIN
                UPDATE produks SET stok = stok + old.jumlah WHERE produk_id = old.produk_id;
            END
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_update_stok_produk_ubah AFTER UPDATE ON pembelians FOR EACH ROW
            BEGIN
                UPDATE produks SET stok = (stok + old.jumlah) - NEW.jumlah WHERE produk_id = NEW.produk_id;
            END
        ');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembelians', function (Blueprint $table) {
            DB::unprepared('DROP TRIGGER trigger_update_stok_produk');
            DB::unprepared('DROP TRIGGER trigger_update_stok_produk_hapus');
            DB::unprepared('DROP TRIGGER trigger_update_stok_produk_ubah');
            //
        });
    }
};
