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
            $table->bigInteger('penjualan_id')->unsigned()->after('sub_total');
            $table->bigInteger('produk_id')->unsigned()->after('penjualan_id');

            $table->foreign('penjualan_id')->references('penjualan_id')->on('penjualans')->onDelete('cascade');
            $table->foreign('produk_id')->references('produk_id')->on('produks')->onDelete('cascade');
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
            //
        });
    }
};
