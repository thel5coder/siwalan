<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 09.42
 */

namespace App\Repository\Contract;


interface IWaktuKerjaRepository extends IBaseRepository
{
    public function readByWajibLapor($laporId);

    public function deleteByWajibLapor($laporId);
}