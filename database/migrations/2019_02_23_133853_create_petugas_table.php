<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id_petugas');
            $table->string('username');
            $table->string('password');
            $table->string('nama_petugas');
        });

        Schema::table('petugas',function(Blueprint $table){
            $table->unsignedInteger('id_level');
            $table->foreign('id_level')->references('id_level')->on('level')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventaris');
        Schema::drop('petugas');
    }
}
