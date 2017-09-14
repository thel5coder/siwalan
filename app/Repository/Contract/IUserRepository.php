<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 14/07/2017
 * Time: 12.02
 */

namespace App\Repository\Contract;


use App\Repository\Contract\Pagination\PaginationParam;

interface IUserRepository extends IBaseRepository
{

    public function checkEmail($email, $id);

    public function checkUserIsActive($email);

    public function changeActiveStatus($id,$status);

    public function userConfirmation($email,$token);

    public function updateDataUmumPerusahaan($perusahaanId,$param);

    public function updateDataLegalitasPerusahaan($perusahaanId,$param);

    public function updateDataPengelolah($perusahaanId,$param);

    public function getCountRegisterUserPerDay();

    public function getCountRegisterUserPerMont();

    public function paginationUserByUserLevel(PaginationParam $param,$userLevel);

    public function paginationPerusahaanByKorwil(PaginationParam $param,$korwil);

    public function createUserDinas($input);

    public function changePassword($id,$password);

    public function updateUserDinas($input);

    public function paginationByKabupaten(PaginationParam $param,$kabupaten);

    public function paginationByKecamatan(PaginationParam $param,$kecamatan);

    public function changeEmail($id,$email);
}