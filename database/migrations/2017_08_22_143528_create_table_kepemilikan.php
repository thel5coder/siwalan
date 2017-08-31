<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKepemilikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepemilikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_perusahaan');
            $table->string('nama_pemilik');
            $table->string('alamat_pemilik');
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
        Schema::drop('kepemilikan');
    }
}
