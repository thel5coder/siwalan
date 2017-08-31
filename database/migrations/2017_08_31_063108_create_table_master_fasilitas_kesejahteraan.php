<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMasterFasilitasKesejahteraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_fasilitas_kesejahteraan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_fasilitas_kesejahteraan');
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
        Schema::drop('master_fasilitas_kesejahteraan');
    }
}
