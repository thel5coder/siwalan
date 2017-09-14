<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 00.58
 */

namespace App\Repository\Contract;


interface IGroupKorwilRepository extends IBaseRepository
{
    public function readMasterKorwil($id);
}