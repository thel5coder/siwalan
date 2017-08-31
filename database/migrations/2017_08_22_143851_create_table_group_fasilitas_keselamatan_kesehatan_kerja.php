<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGroupFasilitasKeselamatanKesehatanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_fasilitas_keselamatan_kesehatan_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perusahaan_id');
            $table->integer('fasilitas_keselamatan_kesehatan_id');
            $table->integer('jumlah')->nullable();
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
        Schema::drop('group_fasilitas_keselamatan_kesehatan_kerja');
    }
}
