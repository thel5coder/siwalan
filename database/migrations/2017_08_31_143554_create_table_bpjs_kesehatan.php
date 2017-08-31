<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBpjsKesehatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs_kesehatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->date('mulai_menjadi_peserta');
            $table->string('nomor_pendaftaran');
            $table->integer('jumlah_peserta_tenaga_kerja');
            $table->integer('jumlah_peserta_keluarga');
            $table->enum('jaminan_pemeliharaan_kesehatan',['A','B','C']);
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
        Schema::drop('bpjs_kesehatan');
    }
}
