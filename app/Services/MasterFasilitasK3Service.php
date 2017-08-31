<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 14.23
 */

namespace App\Services;


use App\Repository\Contract\IMasterFasilitasK3Repository;

class MasterFasilitasK3Service extends BaseService
{
    protected $masterFasilitasK3Repository;

    public function __construct(IMasterFasilitasK3Repository $masterFasilitasK3Repository)
    {
        $this->masterFasilitasK3Repository = $masterFasilitasK3Repository;
    }

    public function create($input){

    }

    public function read($id){

    }

    public function showAll(){
        return $this->getAllObject($this->masterFasilitasK3Repository);
    }
}