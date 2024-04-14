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
        Schema::create('produk_logs', function (Blueprint $table) {
            $table->id('log_id');
            $table->string('keterangan');
            $table->string('nama_produk');
            $table->string('nama_pembeli');
            $table->decimal('subtotal', 10, 2);
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_logs');
    }
};
