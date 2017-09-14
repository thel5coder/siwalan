<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRekapPenerimaanPekerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_penerimaan_pekerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->integer('jml_penerimaan_pekerja');
            $table->integer('jml_pekerja_berhenti');
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
        Schema::drop('rekap_penerimaan_pekerja');
    }
}
