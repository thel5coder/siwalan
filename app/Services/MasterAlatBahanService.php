<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 00.53
 */

namespace App\Services;


use App\Repository\Contract\IMasterAlatBahanRepository;

class MasterAlatBahanService extends BaseService
{
    protected $masterAlatBahanRepository;

    public function __construct(IMasterAlatBahanRepository $masterAlatBahanRepository)
    {
        $this->masterAlatBahanRepository = $masterAlatBahanRepository;
    }

    public function create($input){

    }

    public function read($id){

    }

    public function showAll(){
        return $this->getAllObject($this->masterAlatBahanRepository);
    }

}