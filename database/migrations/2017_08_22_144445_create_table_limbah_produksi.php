<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLimbahProduksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limbah_produksi', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('jenis_limbah_produksi',['Padat','Cair','Gas']);
            $table->boolean('instalasi_pengolah_limbah')->default(0);
            $table->boolean('amdal')->default(0);
            $table->string('no_sertifikat_limbah');
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
        Schema::drop('limbah_produksi');
    }
}
