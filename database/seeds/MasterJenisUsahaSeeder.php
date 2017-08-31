<?php

use Illuminate\Database\Seeder;

class MasterJenisUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('master_jenis_usaha')->insert([
           'kode_jenis_usaha'=>'1',
            'nama_jenis_usaha'=>'Pertanian, Kehutanan,dan Perikanan',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'2',
            'nama_jenis_usaha'=>'Pertambangan dan Penggalian',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'3',
            'nama_jenis_usaha'=>'Industri Pengolahan',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'4',
            'nama_jenis_usaha'=>'Pengadaan Listrik,Gas,Uap/Air Panas dan Udara Dingin',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'5',
            'nama_jenis_usaha'=>'Pengadaan Listrik,Gas,Uap/Air Panas dan Udara Dingin',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'6',
            'nama_jenis_usaha'=>'Konstruksi',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'7',
            'nama_jenis_usaha'=>'Perdagangan Besar dan Eceran, Reparasi dan Perawatan Mobil',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'8',
            'nama_jenis_usaha'=>'Transportasi dan Pergudangan',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'9',
            'nama_jenis_usaha'=>'Penyediaan Akomodasi dan Penyediaan Makan Minum',
        ]);

        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'10',
            'nama_jenis_usaha'=>'Informasi dan Komunikasi',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'11',
            'nama_jenis_usaha'=>'Jasa Keungan dan Asuransi',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'12',
            'nama_jenis_usaha'=>'Real Estat',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'13',
            'nama_jenis_usaha'=>'Jasa Profesional, Ilmiah dan Teknis',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'14',
            'nama_jenis_usaha'=>'Jasa Persewaan Ketenagakerjaan, Agen Perjalanan dan Penunjangan Usaha Lainnya',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'15',
            'nama_jenis_usaha'=>'Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'16',
            'nama_jenis_usaha'=>'Jasa Pendidikan',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'17',
            'nama_jenis_usaha'=>'Jasa Kesehatan dan Kegiatan Sosial',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'18',
            'nama_jenis_usaha'=>'Kebudayaan,Hiburan, dan Rekreasi',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'19',
            'nama_jenis_usaha'=>'Kegiatan Jasa Lainnya',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'20',
            'nama_jenis_usaha'=>'Jasa Perorangan Yang Melayani Rumah Tangga;Kegiatan Yang Menghasilkan',
        ]);
        \DB::table('master_jenis_usaha')->insert([
            'kode_jenis_usaha'=>'21',
            'nama_jenis_usaha'=>'Kegiatan Badan Internasional dan Badang Ekstra Internasional Lainnya',
        ]);
    }
}
