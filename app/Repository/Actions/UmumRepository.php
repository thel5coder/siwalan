<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 18/08/2017
 * Time: 06.18
 */

namespace App\Repository\Actions;


use App\Models\UmumModel;
use App\Repository\Contract\IUmumRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class UmumRepository implements IUmumRepository
{
    public function create($input)
    {
        $umum = new UmumModel();
        $umum->perusahaan_id = auth()->user()->id;
        $umum->lapor_id = $input['laporId'];
        $umum->jml_cpuh_tetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTetapWniLakiLebih18'];
        $umum->jml_cpubr_tetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTetapWniLakiLebih18'];
        $umum->jml_cpubl_tetap_wni_laki_lebih_dari_18 = $input['jmlCpublTetapWniLakiLebih18'];
        $umum->jml_cpuh_tetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTetapWniLakiKurang18'];
        $umum->jml_cpubr_tetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTetapWniLakiKurang18'];
        $umum->jml_cpubl_tetap_wni_laki_kurang_dari_18 = $input['jmlCpublTetapWniLakiKurang18'];
        $umum->jml_cpuh_tetap_wni_laki_kurang_dari_15 = $input['jmlCpuhTetapWniLakiKurang15'];
        $umum->jml_cpubr_tetap_wni_laki_kurang_dari_15 = $input['jmlCpubrTetapWniLakiKurang15'];
        $umum->jml_cpubl_tetap_wni_laki_kurang_dari_15 = $input['jmlCpublTetapWniLakiKurang15'];
        $umum->jml_cpuh_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tetap_wni_wanita_kurang_dari_15 = $input['jmlCpuhTetapWniWanitaKurang15'];
        $umum->jml_cpubr_tetap_wni_wanita_kurang_dari_15 = $input['jmlCpubrTetapWniWanitaKurang15'];
        $umum->jml_cpubl_tetap_wni_wanita_kurang_dari_15 = $input['jmlCpublTetapWniWanitaKurang15'];
        $umum->jml_cpuh_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTidakTetapWniLakiLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTidakTetapWniLakiLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpublTidakTetapWniLakiLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTidakTetapWniLakiKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTidakTetapWniLakiKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpublTidakTetapWniLakiKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_15 = $input['jmlCpuhTidakTetapWniLakiKurang15'];
        $umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_15 = $input['jmlCpubrTidakTetapWniLakiKurang15'];
        $umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_15 = $input['jmlCpublTidakTetapWniLakiKurang15'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTidakTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTidakTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_15 = $input['jmlCpuhTidakTetapWniWanitaKurang15'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_15 = $input['jmlCpubrTidakTetapWniWanitaKurang15'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_15 = $input['jmlCpublTidakTetapWniWanitaKurang15'];
        $umum->jml_cpuh_tetap_wna_laki = $input['jmlCpuhTetapWnaLaki'];
        $umum->jml_cpubr_tetap_wna_laki = $input['jmlCpubrTetapWnaLaki'];
        $umum->jml_cpubl_tetap_wna_laki = $input['jmlCpublTetapWnaLaki'];
        $umum->jml_cpuh_tidaktetap_wna_laki = $input['jmlCpuhTidakTetapWnaLaki'];
        $umum->jml_cpubr_tidaktetap_wna_laki = $input['jmlCpubrTidakTetapWnaLaki'];
        $umum->jml_cpubl_tidaktetap_wna_laki = $input['jmlCpublTidakTetapWnaLaki'];
        $umum->jml_cpuh_tetap_wna_wanita = $input['jmlCpuhTetapWnaWanita'];
        $umum->jml_cpubr_tetap_wna_wanita = $input['jmlCpubrTetapWnaWanita'];
        $umum->jml_cpubl_tetap_wna_wanita = $input['jmlCpublTetapWnaWanita'];
        $umum->jml_cpuh_tidaktetap_wna_wanita = $input['jmlCpuhTidakTetapWanita'];
        $umum->jml_cpubr_tidaktetap_wna_wanita = $input['jmlCpubrTidakTetapWanita'];
        $umum->jml_cpubl_tidaktetap_wna_wanita = $input['jmlCpublTidakTetapWanita'];
        $umum->jml_tenaga_kerja_tetap_cpuh = $input['jmlTenagaKerjaTetapCpuh'];
        $umum->jml_tenaga_kerja_tetap_cpubr = $input['jmlTenagaKerjaTetapCpubr'];
        $umum->jml_tenaga_kerja_tetap_cpubl = $input['jmlTenagaKerjaTetapCpubl'];
        $umum->jml_tenaga_kerja_tidak_tetap_cpuh = $input['jmlTenagaKerjaTidakTetapCpuh'];
        $umum->jml_tenaga_kerja_tidak_tetap_cpubr = $input['jmlTenagaKerjaTidakTetapCpubr'];
        $umum->jml_tenaga_kerja_tidak_tetap_cpubl = $input['jmlTenagaKerjaTidakTetapCpubl'];
        $umum->jml_wni_laki_lebih_dari_18 = $input['jmlWniLakiLebihDari18'];
        $umum->jml_wni_laki_kurang_dari_18 = $input['jmlWniLakiKurangDari18'];
        $umum->jml_wni_laki_kurang_dari_15 = $input['jmlWniLakiKurangDari15'];
        $umum->jml_wni_wanita_lebih_dari_18 = $input['jmlWniWanitaLebihDari18'];
        $umum->jml_wni_wanita_kurang_dari_18 = $input['jmlWniWanitaKurangDari18'];
        $umum->jml_wni_wanita_kurang_dari_15 = $input['jmlWniWanitaKurangDari15'];
        $umum->jml_wna_laki = $input['jmlWnaLaki'];
        $umum->jml_wna_wanita = $input['jmlWnaWanita'];
        $umum->total_pekerja = $input['totalPegawai'];


        return $umum->save();
    }

    public function update($input)
    {
        $umum = UmumModel::find($input['id']);
        $umum->lapor_id = $input['laporId'];
        $umum->jml_cpuh_tetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTetapWniLakiLebih18'];
        $umum->jml_cpubr_tetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTetapWniLakiLebih18'];
        $umum->jml_cpubl_tetap_wni_laki_lebih_dari_18 = $input['jmlCpublTetapWniLakiLebih18'];
        $umum->jml_cpuh_tetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTetapWniLakiKurang18'];
        $umum->jml_cpubr_tetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTetapWniLakiKurang18'];
        $umum->jml_cpubl_tetap_wni_laki_kurang_dari_18 = $input['jmlCpublTetapWniLakiKurang18'];
        $umum->jml_cpuh_tetap_wni_laki_kurang_dari_15 = $input['jmlCpuhTetapWniLakiKurang15'];
        $umum->jml_cpubr_tetap_wni_laki_kurang_dari_15 = $input['jmlCpubrTetapWniLakiKurang15'];
        $umum->jml_cpubl_tetap_wni_laki_kurang_dari_15 = $input['jmlCpublTetapWniLakiKurang15'];
        $umum->jml_cpuh_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tetap_wni_wanita_kurang_dari_15 = $input['jmlCpuhTetapWniWanitaKurang15'];
        $umum->jml_cpubr_tetap_wni_wanita_kurang_dari_15 = $input['jmlCpubrTetapWniWanitaKurang15'];
        $umum->jml_cpubl_tetap_wni_wanita_kurang_dari_15 = $input['jmlCpublTetapWniWanitaKurang15'];
        $umum->jml_cpuh_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTidakTetapWniLakiLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTidakTetapWniLakiLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpublTidakTetapWniLakiLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTidakTetapWniLakiKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTidakTetapWniLakiKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpublTidakTetapWniLakiKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_15 = $input['jmlCpuhTidakTetapWniLakiKurang15'];
        $umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_15 = $input['jmlCpubrTidakTetapWniLakiKurang15'];
        $umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_15 = $input['jmlCpublTidakTetapWniLakiKurang15'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTidakTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTidakTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_15 = $input['jmlCpuhTidakTetapWniWanitaKurang15'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_15 = $input['jmlCpubrTidakTetapWniWanitaKurang15'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_15 = $input['jmlCpublTidakTetapWniWanitaKurang15'];
        $umum->jml_cpuh_tetap_wna_laki = $input['jmlCpuhTetapWnaLaki'];
        $umum->jml_cpubr_tetap_wna_laki = $input['jmlCpubrTetapWnaLaki'];
        $umum->jml_cpubl_tetap_wna_laki = $input['jmlCpublTetapWnaLaki'];
        $umum->jml_cpuh_tidaktetap_wna_laki = $input['jmlCpuhTidakTetapWnaLaki'];
        $umum->jml_cpubr_tidaktetap_wna_laki = $input['jmlCpubrTidakTetapWnaLaki'];
        $umum->jml_cpubl_tidaktetap_wna_laki = $input['jmlCpublTidakTetapWnaLaki'];
        $umum->jml_cpuh_tetap_wna_wanita = $input['jmlCpuhTetapWnaWanita'];
        $umum->jml_cpubr_tetap_wna_wanita = $input['jmlCpubrTetapWnaWanita'];
        $umum->jml_cpubl_tetap_wna_wanita = $input['jmlCpublTetapWnaWanita'];
        $umum->jml_cpuh_tidaktetap_wna_wanita = $input['jmlCpuhTidakTetapWanita'];
        $umum->jml_cpubr_tidaktetap_wna_wanita = $input['jmlCpubrTidakTetapWanita'];
        $umum->jml_cpubl_tidaktetap_wna_wanita = $input['jmlCpublTidakTetapWanita'];
        $umum->jml_tenaga_kerja_tetap_cpuh = $input['jmljmlTenagaKerjaTetapCpuh'];
        $umum->jml_tenaga_kerja_tetap_cpubr = $input['jmlTenagaKerjaTetapCpubr'];
        $umum->jml_tenaga_kerja_tetap_cpubl = $input['jmlTenagaKerjaTetapCpubl'];
        $umum->jml_tenaga_kerja_tidak_tetap_cpuh = $input['jmlTenagaKerjaTidakTetapCpuh'];
        $umum->jml_tenaga_kerja_tidak_tetap_cpubr = $input['jmlTenagaKerjaTidakTetapCpubr'];
        $umum->jml_tenaga_kerja_tidak_tetap_cpubl = $input['jmlTenagaKerjaTidakTetapCpubl'];
        $umum->jml_wni_laki_lebih_dari_18 = $input['jmlWniLakiLebihDari18'];
        $umum->jml_wni_laki_kurang_dari_18 = $input['jmlWniLakiKurangDari18'];
        $umum->jml_wni_laki_kurang_dari_15 = $input['jmlWniLakiKurangDari15'];
        $umum->jml_wni_wanita_lebih_dari_18 = $input['jmlWniWanitaLebihDari18'];
        $umum->jml_wni_wanita_kurang_dari_18 = $input['jmlWniWanitaKurangDari18'];
        $umum->jml_wni_wanita_kurang_dari_15 = $input['jmlWniWanitaKurangDari15'];
        $umum->jml_wna_laki = $input['jmlWnaLaki'];
        $umum->jml_wna_wanita = $input['jmlWnaWanita'];
        $umum->total_pekerja = $input['totalPegawai'];

        return $umum->save();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return UmumModel::where('lapor_id','=',$id)->first();
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }


}