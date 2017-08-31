<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProgramPensiun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_pensiun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lapor_id');
            $table->enum('jenis_program_pensiun',['1','2']);
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
        Schema::drop('program_pensiun');
    }
}
