<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequestChangeEmail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_change_email', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('new_email');
            $table->text('alasan_penggantian');
            $table->enum('status_request',['pending','tolak','setuju','batal']);
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
        Schema::drop('request_change_email');
    }
}
