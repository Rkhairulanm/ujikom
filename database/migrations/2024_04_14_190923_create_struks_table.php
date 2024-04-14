<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStruksTable extends Migration
{
    public function up()
    {
        Schema::create('struks', function (Blueprint $table) {
            $table->id('struk_id');
            $table->string('struk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('struks');
    }
}
