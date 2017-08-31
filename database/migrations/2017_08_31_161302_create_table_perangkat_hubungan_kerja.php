<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePerangkatHubunganKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perangkat_hubungan_kerja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->boolean('pk')->default(0);
            $table->boolean('pp')->default(0);
            $table->boolean('kkb')->default(0);
            $table->date('tgl_pengesahan_pk_kkb')->nullable();
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
        Schema::drop('perangkat_hubungan_kerja');
    }
}
