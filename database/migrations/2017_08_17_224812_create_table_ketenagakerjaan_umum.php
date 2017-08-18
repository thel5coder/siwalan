<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKetenagakerjaanUmum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketenaga_kerjaan_umum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perusahaan_id');
            $table->integer('jml_cpuh_tetap_wni_laki_lebih_dari_18');
            $table->integer('jml_cpubr_tetap_wni_laki_lebih_dari_18');
            $table->integer('jml_cpubl_tetap_wni_laki_lebih_dari_18');
            $table->integer('jml_cpuh_tetap_wni_laki_kurang_dari_18');
            $table->integer('jml_cpubr_tetap_wni_laki_kurang_dari_18');
            $table->integer('jml_cpubl_tetap_wni_laki_kurang_dari_18');
            $table->integer('jml_cpuh_tetap_wni_laki_lebih_15');
            $table->integer('jml_cpubr_tetap_wni_laki_lebih_15');
            $table->integer('jml_cpubl_tetap_wni_laki_lebih_15');
            $table->integer('jml_cpuh_tetap_wni_wanita_lebih_dari_18');
            $table->integer('jml_cpubr_tetap_wni_wanita_lebih_dari_18');
            $table->integer('jml_cpubl_tetap_wni_wanita_lebih_dari_18');
            $table->integer('jml_cpuh_tetap_wni_wanita_kurang_dari_18');
            $table->integer('jml_cpubr_tetap_wni_wanita_kurang_dari_18');
            $table->integer('jml_cpubl_tetap_wni_wanita_kurang_dari_18');
            $table->integer('jml_cpuh_tetap_wni_wanita_lebih_dari_15');
            $table->integer('jml_cpubr_tetap_wni_wanita_lebih_dari_15');
            $table->integer('jml_cpubl_tetap_wni_wanita_lebih_dari_15');
            $table->integer('jml_cpuh_tidaktetap_wni_laki_lebih_dari_18');
            $table->integer('jml_cpubr_tidaktetap_wni_laki_lebih_dari_18');
            $table->integer('jml_cpubl_tidaktetap_wni_laki_lebih_dari_18');
            $table->integer('jml_cpuh_tidaktetap_wni_laki_kurang_dari_18');
            $table->integer('jml_cpubr_tidaktetap_wni_laki_kurang_dari_18');
            $table->integer('jml_cpubl_tidaktetap_wni_laki_kurang_dari_18');
            $table->integer('jml_cpuh_tidaktetap_wni_laki_lebih_15');
            $table->integer('jml_cpubr_tidaktetap_wni_laki_lebih_15');
            $table->integer('jml_cpubl_tidaktetap_wni_laki_lebih_15');
            $table->integer('jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18');
            $table->integer('jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18');
            $table->integer('jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18');
            $table->integer('jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18');
            $table->integer('jml_cpubr_tidaktetap_wni_wanita_kurang_dari_18');
            $table->integer('jml_cpubl_tidaktetap_wni_wanita_kurang_dari_18');
            $table->integer('jml_cpuh_tidaktetap_wni_wanita_lebih_dari_15');
            $table->integer('jml_cpubr_tidaktetap_wni_wanita_lebih_dari_15');
            $table->integer('jml_cpubl_tidaktetap_wni_wanita_lebih_dari_15');
            $table->integer('jml_cpuh_tetap_wna_laki');
            $table->integer('jml_cpubr_tetap_wna_laki');
            $table->integer('jml_cpubl_tetap_wna_laki');
            $table->integer('jml_cpuh_tidaktetap_wna_laki');
            $table->integer('jml_cpubr_tidaktetap_wna_laki');
            $table->integer('jml_cpubl_tidaktetap_wna_laki');
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
        Schema::drop('ketenaga_kerjaan_umum');
    }
}
