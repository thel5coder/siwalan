<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProgramPelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->boolean('program_pelatihan_bagi_pekerja');
            $table->boolean('program_pemegangan');
            $table->boolean('fasilitas_pelatihan');
            $table->boolean('program_pengindonesiaan');
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
        Schema::drop('program_pelatihan');
    }
}
