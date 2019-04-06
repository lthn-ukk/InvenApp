<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjam', function (Blueprint $table) {
            $table->increments('id_detail_pinjam');
            $table->integer('jumlah');
        });

        Schema::table('detail_pinjam',function (Blueprint $table){
            $table->unsignedInteger('id_inventaris')->after('id_detail_pinjam');
            $table->foreign('id_inventaris')->references('id_inventaris')->on('inventaris')->onDelete('cascade');
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
    }
}
