<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWaktuKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketenagakerjaan_waktu_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perusahaan_id');
            $table->integer('waktu_kerja_id');
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
        Schema::drop('ketenagakerjaan_waktu_kerja');
    }
}
