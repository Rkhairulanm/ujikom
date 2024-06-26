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
            $table->unsignedBigInteger('struk_id')->nullable()->after('pelanggan_id');
            $table->foreign('struk_id')->references('struk_id')->on('struks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembelians', function (Blueprint $table) {
            $table->dropForeign('pembelians_struk_id_foreign');
            $table->dropColumn('struk_id');
            //
        });
    }
};
