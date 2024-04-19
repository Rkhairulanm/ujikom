<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produks', function (Blueprint $table) {
            // Tambahkan kolom kategori_id sebagai kunci asing
            $table->unsignedBigInteger('kategori_id')->after('harga')->nullable(true);

            // Definisikan kunci asing
            $table->foreign('kategori_id')->references('kategori_id')->on('kategories')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produks', function (Blueprint $table) {
            // Hapus kunci asing
            $table->dropForeign(['kategori_id']);

            // Hapus kolom kategori_id
            $table->dropColumn('kategori_id');
        });
    }
};
