<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 04.46
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IKepemilikanRepository extends IBaseRepository
{
    public function paginationByPerusahaan(PaginationParam $param,$perusahaanId);
}