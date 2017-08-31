<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFasilitasKeselamatanKesehatanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_keselamatan_kesehatan_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->integer('fasilitas_k3_id');
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
        Schema::drop('fasilitas_keselamatan_kesehatan_kerja');
    }
}
