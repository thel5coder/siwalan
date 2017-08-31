<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengupahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengupahan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->bigInteger('jumlah_upah_pekerja_dibayarkan');
            $table->bigInteger('tingkat_upah_tertinggi');
            $table->bigInteger('tingkat_upah_terendah');
            $table->integer('jumlah_penerima_umk_ump_umsk');
            $table->integer('jumlah_penerima_umk_ump_umsk_dalam_persen');
            $table->enum('tunjangan_hari_raya_keagamaan',['1 bulan upah','>1 bulan upah']);
            $table->enum('bonus_gratifikasi',['1 bulan gaji','>1 bulan gaji','<1 bulan gaji']);
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
        Schema::drop('pengupahan');
    }
}
