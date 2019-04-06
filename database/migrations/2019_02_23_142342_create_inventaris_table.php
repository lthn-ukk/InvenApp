<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id_inventaris');
            $table->string('nama');
            $table->string('kondisi');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->date('tanggal_register');
        });

        Schema::table('inventaris',function(Blueprint $table){
            $table->unsignedInteger('id_jenis');
            $table->unsignedInteger('id_ruang');
            $table->unsignedInteger('id_petugas');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_petugas')->on('petugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pinjam');
        Schema::drop('inventaris');
    }
}
