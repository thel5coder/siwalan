<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 13/09/2017
 * Time: 10.03
 */

namespace App\Services;


use App\Repository\Contract\IGroupKorwilRepository;
use App\Services\Response\ServiceResponseDto;

class MasterKorwilService extends BaseService
{
    protected $masterKowilRepository;

    public function __construct(IGroupKorwilRepository $groupKorwilRepository)
    {
        $this->masterKowilRepository = $groupKorwilRepository;
    }

    public function pagination($param){
        return $this->getPaginationObject($this->masterKowilRepository,$param);
    }

    public function readMasterKorwil($id){
        $response = new ServiceResponseDto();

        $response->setResult($this->masterKowilRepository->readMasterKorwil($id));

        return $response;
    }
}