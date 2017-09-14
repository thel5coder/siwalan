<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRencanaPelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_pelatihan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->string('kejuruan',100);
            $table->string('kode',20)->nullable();
            $table->integer('jml_peserta');
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
        Schema::drop('rencana_pelatihan');
    }
}
