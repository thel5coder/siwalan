<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 18/08/2017
 * Time: 06.18
 */

namespace App\Repository\Actions;


use App\Models\KetenagaKerjaanUmumModel;
use App\Repository\Contract\IKetenagaKerjaanUmumRepository;
use App\Repository\Contract\Pagination\PaginationParam;

class KetenagaKerjaanUmumRepository implements IKetenagaKerjaanUmumRepository
{
    public function create($input)
    {
        $umum = new KetenagaKerjaanUmumModel();
        $umum->perusahaan_id = auth()->user()->id;
        $umum->jml_cpuh_tetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTetapWniLakiLebih18'];
        $umum->jml_cpubr_tetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTetapWniLakiLebih18'];
        $umum->jml_cpubl_tetap_wni_laki_lebih_dari_18 = $input['jmlCpublTetapWniLakiLebih18'];
        $umum->jml_cpuh_tetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTetapWniLakiKurang18'];
        $umum->jml_cpubr_tetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTetapWniLakiKurang18'];
        $umum->jml_cpubl_tetap_wni_laki_kurang_dari_18 = $input['jmlCpublTetapWniLakiKurang18'];
        $umum->jml_cpuh_tetap_wni_laki_lebih_15 = $input['jmlCpuhTetapWniLakiLebih15'];
        $umum->jml_cpubr_tetap_wni_laki_lebih_15 = $input['jmlCpubrTetapWniLakiLebih15'];
        $umum->jml_cpubl_tetap_wni_laki_lebih_15 = $input['jmlCpublTetapWniLakiLebih15'];
        $umum->jml_cpuh_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tetap_wni_wanita_lebih_dari_15 = $input['jmlCpuhTetapWniWanitaLebih15'];
        $umum->jml_cpubr_tetap_wni_wanita_lebih_dari_15 = $input['jmlCpubrTetapWniWanitaLebih15'];
        $umum->jml_cpubl_tetap_wni_wanita_lebih_dari_15 = $input['jmlCpublTetapWniWanitaLebih15'];
        $umum->jml_cpuh_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTidakTetapWniLakiLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTidakTetapWniLakiLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpublTidakTetapWniLakiLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTidakTetapWniLakiKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTidakTetapWniLakiKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpublTidakTetapWniLakiKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_lebih_15 = $input['jmlCpuhTidakTetapWniLakiLebih15'];
        $umum->jml_cpubr_tidaktetap_wni_laki_lebih_15 = $input['jmlCpubrTidakTetapWniLakiLebih15'];
        $umum->jml_cpubl_tidaktetap_wni_laki_lebih_15 = $input['jmlCpublTidakTetapWniLakiLebih15'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTidakTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTidakTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_15 = $input['jmlCpuhTidakTetapWniWanitaLebih15'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_15 = $input['jmlCpubrTidakTetapWniWanitaLebih15'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_15 = $input['jmlCpublTidakTetapWniWanitaLebih15'];
        $umum->jml_cpuh_tetap_wna_laki = $input['jmlCpuhTetapWnaLaki'];
        $umum->jml_cpubr_tetap_wna_laki = $input['jmlCpubrTetapWnaLaki'];
        $umum->jml_cpubl_tetap_wna_laki = $input['jmlCpublTetapWnaLaki'];
        $umum->jml_cpuh_tidaktetap_wna_laki = $input['jmlCpuhTidakTetapWnaLaki'];
        $umum->jml_cpubr_tidaktetap_wna_laki = $input['jmlCpubrTidakTetapWnaLaki'];
        $umum->jml_cpubl_tidaktetap_wna_laki = $input['jmlCpubrTidakTetapWnaLaki'];
        $umum->jml_cpuh_tetap_wna_wanita = $input['jmlCpuhTetapWnaWanita'];
        $umum->jml_cpubr_tetap_wna_wanita = $input['jmlCpubrTetapWnaWanita'];
        $umum->jml_cpubl_tetap_wna_wanita = $input['jmlCpublTetapWnaWanita'];
        $umum->jml_cpuh_tidaktetap_wna_wanita = $input['jmlCpuhTidakTetapWanita'];
        $umum->jml_cpubr_tidaktetap_wna_wanita = $input['jmlCpubrTidakTetapWanita'];
        $umum->jml_cpubl_tidaktetap_wna_wanita = $input['jmlCpublTidakTetapWanita'];

        return $umum->save();
    }

    public function update($input)
    {
        $umum = KetenagaKerjaanUmumModel::where('perusahaan_id','=',$input['id']);
        $umum->perusahaan_id = auth()->user()->id;
        $umum->jml_cpuh_tetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTetapWniLakiLebih18'];
        $umum->jml_cpubr_tetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTetapWniLakiLebih18'];
        $umum->jml_cpubl_tetap_wni_laki_lebih_dari_18 = $input['jmlCpublTetapWniLakiLebih18'];
        $umum->jml_cpuh_tetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTetapWniLakiKurang18'];
        $umum->jml_cpubr_tetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTetapWniLakiKurang18'];
        $umum->jml_cpubl_tetap_wni_laki_kurang_dari_18 = $input['jmlCpublTetapWniLakiKurang18'];
        $umum->jml_cpuh_tetap_wni_laki_lebih_15 = $input['jmlCpuhTetapWniLakiLebih15'];
        $umum->jml_cpubr_tetap_wni_laki_lebih_15 = $input['jmlCpubrTetapWniLakiLebih15'];
        $umum->jml_cpubl_tetap_wni_laki_lebih_15 = $input['jmlCpublTetapWniLakiLebih15'];
        $umum->jml_cpuh_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tetap_wni_wanita_lebih_dari_15 = $input['jmlCpuhTetapWniWanitaLebih15'];
        $umum->jml_cpubr_tetap_wni_wanita_lebih_dari_15 = $input['jmlCpubrTetapWniWanitaLebih15'];
        $umum->jml_cpubl_tetap_wni_wanita_lebih_dari_15 = $input['jmlCpublTetapWniWanitaLebih15'];
        $umum->jml_cpuh_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpuhTidakTetapWniLakiLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpubrTidakTetapWniLakiLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_lebih_dari_18 = $input['jmlCpublTidakTetapWniLakiLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpuhTidakTetapWniLakiKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpubrTidakTetapWniLakiKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_laki_kurang_dari_18 = $input['jmlCpublTidakTetapWniLakiKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_laki_lebih_15 = $input['jmlCpuhTidakTetapWniLakiLebih15'];
        $umum->jml_cpubr_tidaktetap_wni_laki_lebih_15 = $input['jmlCpubrTidakTetapWniLakiLebih15'];
        $umum->jml_cpubl_tidaktetap_wni_laki_lebih_15 = $input['jmlCpublTidakTetapWniLakiLebih15'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpuhTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpubrTidakTetapWniWanitaLebih18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18 = $input['jmlCpublTidakTetapWniWanitaLebih18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpuhTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpubrTidakTetapWniWanitaKurang18'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_18 = $input['jmlCpublTidakTetapWniWanitaKurang18'];
        $umum->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_15 = $input['jmlCpuhTidakTetapWniWanitaLebih15'];
        $umum->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_15 = $input['jmlCpubrTidakTetapWniWanitaLebih15'];
        $umum->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_15 = $input['jmlCpublTidakTetapWniWanitaLebih15'];
        $umum->jml_cpuh_tetap_wna_laki = $input['jmlCpuhTetapWnaLaki'];
        $umum->jml_cpubr_tetap_wna_laki = $input['jmlCpubrTetapWnaLaki'];
        $umum->jml_cpubl_tetap_wna_laki = $input['jmlCpublTetapWnaLaki'];
        $umum->jml_cpuh_tidaktetap_wna_laki = $input['jmlCpuhTidakTetapWnaLaki'];
        $umum->jml_cpubr_tidaktetap_wna_laki = $input['jmlCpubrTidakTetapWnaLaki'];
        $umum->jml_cpubl_tidaktetap_wna_laki = $input['jmlCpubrTidakTetapWnaLaki'];
        $umum->jml_cpuh_tetap_wna_wanita = $input['jmlCpuhTetapWnaWanita'];
        $umum->jml_cpubr_tetap_wna_wanita = $input['jmlCpubrTetapWnaWanita'];
        $umum->jml_cpubl_tetap_wna_wanita = $input['jmlCpublTetapWnaWanita'];
        $umum->jml_cpuh_tidaktetap_wna_wanita = $input['jmlCpuhTidakTetapWanita'];
        $umum->jml_cpubr_tidaktetap_wna_wanita = $input['jmlCpubrTidakTetapWanita'];
        $umum->jml_cpubl_tidaktetap_wna_wanita = $input['jmlCpublTidakTetapWanita'];

        return $umum->save();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        return KetenagaKerjaanUmumModel::where('perusahaan_id','=',$id)->first();
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