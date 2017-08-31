<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 18.34
 */

namespace App\Repository\Contract;


interface IFasilitasKesejahteraanRepository extends IBaseRepository
{
    public function readByLapor($laporId);

    public function deleteByLapor($laporId);

}