<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerangkatOrganisasiKetenagakerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perangkat_organisasi_ketenagakerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->enum('jenis_perangkat_organisasi',['Biparit','SPTP','Org.Pek','P2K3','Apindo']);
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
        Schema::drop('perangkat_organisasi_ketenagakerjaan');
    }
}
