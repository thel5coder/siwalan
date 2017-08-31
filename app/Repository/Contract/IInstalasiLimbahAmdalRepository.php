<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 09.03
 */

namespace App\Repository\Contract;


interface IInstalasiLimbahAmdalRepository extends IBaseRepository
{
    public function readByLapor($laporId);
}