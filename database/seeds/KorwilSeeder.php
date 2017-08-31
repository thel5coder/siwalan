<?php

use Illuminate\Database\Seeder;

class KorwilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('master_korwil')->insert([
            'kode_korwil'=>'01',
            'nama_korwil'=>'Korwil I'
        ]);
        \DB::table('master_korwil')->insert([
            'kode_korwil'=>'02',
            'nama_korwil'=>'Korwil II'
        ]);

        \DB::table('master_korwil')->insert([
            'kode_korwil'=>'03',
            'nama_korwil'=>'Korwil III'
        ]);

        \DB::table('master_korwil')->insert([
            'kode_korwil'=>'04',
            'nama_korwil'=>'Korwil IV'
        ]);

        \DB::table('master_korwil')->insert([
            'kode_korwil'=>'05',
            'nama_korwil'=>'Korwil V'
        ]);

        \DB::table('master_korwil')->insert([
            'kode_korwil'=>'06',
            'nama_korwil'=>'Korwil VI'
        ]);
    }
}
