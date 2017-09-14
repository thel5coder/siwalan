<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 08.14
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IDetailCtkiTelahBerangkatRepository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function deleteByLapor($laporId);

    public function paginationByLapor(PaginationParam $param,$laporId);

    public function checkJabatan($id,$jabatan);

    public function checkKodeJabatan($id,$kodeJabatan);
}