<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 23.00
 */

namespace App\Services;


use App\Repository\Contract\IJenisUsahaRepository;

class JenisUsahaService extends BaseService
{
    protected $jenisUsahaRepository;

    public function __construct(IJenisUsahaRepository $jenisUsahaRepository)
    {
        $this->jenisUsahaRepository = $jenisUsahaRepository;
    }

    public function getAll(){
        return $this->getAllObject($this->jenisUsahaRepository);
    }

}