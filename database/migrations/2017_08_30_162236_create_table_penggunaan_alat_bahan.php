<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePenggunaanAlatBahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunaan_alat_bahan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->string('alat_id');
            $table->string('sub_alat')->nullable();
            $table->integer('jumlah');
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
        Schema::drop('penggunaan_alat_bahan');
    }
}
