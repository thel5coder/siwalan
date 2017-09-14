<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 30/08/2017
 * Time: 23.42
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IPenggunaanAlatBahanRepository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function readByAlatId($laporId,$alatId);

    public function checkIsExist($laporId,$alatId);

    public function paginationByLapor(PaginationParam $param,$laporId);
}