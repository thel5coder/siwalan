<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailCtkiAkanBerangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ctki_akan_berangkat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->string('nama_jabatan');
            $table->string('kode_jabatan');
            $table->integer('jml_sd');
            $table->integer('jml_smtp');
            $table->integer('jml_smta');
            $table->integer('jml_d3');
            $table->integer('jml_s1');
            $table->integer('jml_s2');
            $table->integer('jml_s3');
            $table->integer('jml_wni_tetap');
            $table->integer('jml_wni_tidak_tetap');
            $table->integer('jml_wna_tetap');
            $table->integer('jml_wna_tidak_tetap');
            $table->integer('jml_penca_tetap');
            $table->integer('jml_penca_tidak_tetap');
            $table->integer('jml_laki');
            $table->integer('jml_wanita');
            $table->integer('total');
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
        Schema::drop('detail_ctki_akan_berangkat');
    }
}
