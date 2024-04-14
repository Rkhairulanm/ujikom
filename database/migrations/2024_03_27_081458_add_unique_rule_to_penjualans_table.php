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
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('penjualans', function (Blueprint $table) {
        $table->dropForeign(['pelanggan_id']);
        $table->dropColumn('pelanggan_id');
    });
}

};
