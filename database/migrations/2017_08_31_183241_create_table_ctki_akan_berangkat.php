<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCtkiAkanBerangkat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctki_akan_berangkat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->integer('jumlah_laki');
            $table->integer('jumlah_perempuan');
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
        Schema::drop('ctki_akan_berangkat');
    }
}
