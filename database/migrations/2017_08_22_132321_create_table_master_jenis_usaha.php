<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterJenisUsaha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_jenis_usaha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_jenis_usaha');
            $table->string('nama_jenis_usaha');
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
        Schema::drop('master_jenis_usaha');
    }
}
