<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 07.37
 */

namespace App\Repository\Contract;


interface ILimbahProduksiRepository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function deleteByLapor($laporId);
}