<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualansTable extends Migration
{
    public function up()
    {
        Schema::create('detailpenjualans', function (Blueprint $table) {
            $table->bigIncrements('detail_id');
            $table->integer('jumlah');
            $table->decimal('sub_total', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detailpenjualans');
    }
}
