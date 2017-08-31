<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFasilitasKesejahteraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_kesejahteraaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->integer('fasilitas_kesejahteraan_id');
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
        Schema::drop('fasilitas_kesejahteraaan');
    }
}
