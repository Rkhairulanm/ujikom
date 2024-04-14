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
        Schema::table('penjualans', function (Blueprint $table) {
            $table->decimal('total_harga', 10, 2)->nullable()->change();
            $table->unsignedBigInteger('pelanggan_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penjualans', function (Blueprint $table) {
            $table->decimal('total_harga', 10, 2)->nullable(false)->change();
            $table->unsignedBigInteger('pelanggan_id')->nullable(false)->change();
        });
    }
};
