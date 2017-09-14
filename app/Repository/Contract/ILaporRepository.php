<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 06.02
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface ILaporRepository extends IBaseRepository
{
    public function checkExistingLapor($tahun);

    public function getPaginationByPerusahaan(PaginationParam $param);

    public function getCountWajibLapor();

    public function getLastWajibLapor();

    public function getCountWajibLaporModerasiPerPerusahaan();

    public function getCountWajibLaporRevisiPerPerusahaan();

    public function getCountWajibLaporValidPerPerusahaan();

    public function getCountAllWajibLapor();

    public function getCountWajibLaporModerasi();

    public function getCountWajibLaporRevisi();

    public function getCountWajibLaporValid();

    public function paginationByStatusLapor(PaginationParam $param,$korwil,$status);

    public function changeStatusLapor($id,$status);

    public function paginationByTahun(PaginationParam $param,$tahun);

    public function paginationByKabupaten(PaginationParam $param,$kabupaten,$tahun);

    public function paginationByKecamatan(PaginationParam $param,$kecamatan,$tahun);
}