<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 14.25
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IFasilitasK3Repository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function deleteByLapor($laporId);

    public function paginationByLapor(PaginationParam $param,$laporId);
}