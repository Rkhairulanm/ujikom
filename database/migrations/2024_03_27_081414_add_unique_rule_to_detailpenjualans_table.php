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
        Schema::table('detailpenjualans', function (Blueprint $table) {
            $table->unsignedBigInteger('penjualan_id');
            $table->foreign('penjualan_id')->references('penjualan_id')->on('penjualans')->onDelete('cascade');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('produk_id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detailpenjualans', function (Blueprint $table) {
            $table->dropForeign(['penjualan_id']);
            $table->dropForeign(['produk_id']);
            $table->dropColumn('penjualan_id');
            $table->dropColumn('produk_id');
        });
    }
};
