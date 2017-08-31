<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 09.45
 */

namespace App\Repository\Contract;


interface IPengupahanRepository extends IBaseRepository
{
    public function readByLapor($laporId);
}