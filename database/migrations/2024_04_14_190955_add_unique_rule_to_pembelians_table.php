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
        Schema::table('pembelians', function (Blueprint $table) {
            $table->bigInteger('produk_id')->unsigned()->after('pembayaran');
            $table->bigInteger('pelanggan_id')->unsigned()->after('produk_id');
            $table->foreign('produk_id')->references('produk_id')->on('produks');
            $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembelians', function (Blueprint $table) {
            $table->dropForeign('pembelians_produk_id_foreign');
            $table->dropForeign('pembelians_pelanggan_id_foreign');
            $table->dropColumn('produk_id');
            $table->dropColumn('pelanggan_id');
            //
        });
    }
};
