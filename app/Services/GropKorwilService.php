<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 01.05
 */

namespace App\Services;


use App\Repository\Contract\IGroupKorwilRepository;

class GropKorwilService extends BaseService
{

    protected $groupKorwilRepository;

    public function __construct(IGroupKorwilRepository $groupKorwilRepository)
    {
        $this->groupKorwilRepository = $groupKorwilRepository;
    }

    public function read($id){
        return $this->readObject($this->groupKorwilRepository,$id);
    }

}