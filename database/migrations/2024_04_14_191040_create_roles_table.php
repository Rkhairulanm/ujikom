<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id('role_id');
            $table->string('role');
        });

        // Insert default roles
        DB::table('roles')->insert([
            ['role' => 'Administrator'],
            ['role' => 'Petugas'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
