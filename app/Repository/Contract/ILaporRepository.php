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
}