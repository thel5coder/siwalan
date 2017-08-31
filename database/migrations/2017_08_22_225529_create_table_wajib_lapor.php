<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWajibLapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wajib_lapor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perusahan_id');
            $table->date('tgl_lapor');
            $table->string('nomor_registrasi');
            $table->date('tgl_lapor_selanjutnya');
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
        Schema::drop('wajib_lapor');
    }
}
