<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 21.56
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IKecamatanRepository extends IBaseRepository
{
    public function paginationByKabupaten(PaginationParam $param,$kabupatenId);

}