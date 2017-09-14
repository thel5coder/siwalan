<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 10.02
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IRencanaPelatihanRepository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function deleteByLapor($laporId);

    public function checkKejuruan($laporId,$id,$kejuruan);

    public function checkKodeKejuruan($laporId,$id,$kodeKejuruan);

    public function paginationByLapor(PaginationParam $param,$laporId);
}