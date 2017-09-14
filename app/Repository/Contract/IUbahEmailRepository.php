<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 14/09/2017
 * Time: 01.16
 */

namespace App\Repository\Contract;


interface IUbahEmailRepository extends IBaseRepository
{
    public function changeStatusRequest($id,$statusRequest);

}