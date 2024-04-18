<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->bigIncrements('pembelian_id');
            $table->integer('jumlah');
            $table->decimal('total', 10, 2);
            $table->integer('pembayaran')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });

        // Create triggers

    }

    public function down()
    {
        Schema::dropIfExists('pembelians');
    }
}
