<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBpjsKetenagakerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs_ketenagakerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->date('mulai_menjadi_peserta');
            $table->string('nomor_pendaftaran');
            $table->integer('jumlah_peserta');
            $table->enum('jaminan_kecelakaan_kerja',['A','B','C']);
            $table->enum('jaminan_kematian',['A','B','C']);
            $table->enum('jaminan_hari_tua',['A','B','C']);
            $table->enum('jaminan_pensiun',['A','B','C']);
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
        Schema::drop('bpjs_ketenagakerjaan');
    }
}
