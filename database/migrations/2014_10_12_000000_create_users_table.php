<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password', 128);
            $table->enum('user_level',['perusahaan','admin dinas']);
            $table->text('alamat_perusaahaan')->nullable();
            $table->string('no_telepon',10)->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kabupaten')->nullabl();
            $table->string('kode_pos')->nullable();
            $table->string('activation_token');
            $table->boolean('is_active');
            $table->string('jenis_usaha')->nullable();
            $table->string('produk_akhir')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->text('alamat_pemilik')->nullable();
            $table->string('nama_pengelolah')->nullable();
            $table->text('alamat_pengelolah')->nullable();
            $table->date('tanggal_pendirian')->nullable();
            $table->string('nomor_akta_pendirian')->nullable();
            $table->date('tgl_perpindahan_perusahaan')->nullable();
            $table->text('alamat_lama')->nullable();
            $table->enum('status_perusahaan',['PUsat','Cabang'])->nullable();
            $table->integer('jumlah_cabang_di_indonesia')->nullable();
            $table->integer('jumlah_cabang_luar_indonesia')->nullable();
            $table->string('logo_perusahaan')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
