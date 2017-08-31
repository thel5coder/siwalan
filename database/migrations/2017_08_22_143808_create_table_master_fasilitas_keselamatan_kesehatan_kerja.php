<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterFasilitasKeselamatanKesehatanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_fasilitas_keselamatan_kesehatan_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_fasilitas_keselamatan');
            $table->boolean('is_ammount');
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
        Schema::drop('master_fasilitas_keselamatan_kesehatan_kerja');
    }
}
