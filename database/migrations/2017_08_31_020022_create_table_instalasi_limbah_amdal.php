<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInstalasiLimbahAmdal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instalasi_limbah_amdal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->boolean('amdal')->default(0);
            $table->string('no_sertifikat',20);
            $table->date('tgl_sertifikat');
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
        Schema::drop('instalasi_limbah_amdal');
    }
}
