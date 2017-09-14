<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 02/09/2017
 * Time: 13.35
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IDetailCtkiAkanBerangkatRepository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function deleteByLapor($laporId);

    public function paginationByLapor(PaginationParam $param,$laporId);

    public function checkJabatan($id,$jabatan);

    public function checkKodeJabatan($id,$kodeJabatan);
}