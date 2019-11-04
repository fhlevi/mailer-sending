<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarHadirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_hadir', function (Blueprint $table) {
            $table->bigIncrements('daftar_hadir_id');
            $table->string('name', 255);
            $table->string('company', 255);
            $table->string('phone', 255);
            $table->string('email', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_hadir');
    }
}
