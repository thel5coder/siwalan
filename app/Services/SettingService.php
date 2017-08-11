<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 15/07/2017
 * Time: 02.16
 */

namespace App\Services;


use App\Repository\Contract\ISettingRepository;
use App\Services\Response\ServiceResponseDto;
use Efriandika\LaravelSettings\Facades\Settings;

class SettingService extends BaseService
{

    protected $settingRepository;

    public function __construct(ISettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $isKeyExist = $this->isKeyExist($input['key'])->getResult();
        if($isKeyExist){
            $message = ['Setting sudah ada'];
            $response->addErrorMessage($message);
        }else{
            if(!Settings::set($input['key'],$input['value'])){
                $message = ['Gagal menyimpan setting'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    protected function isKeyExist($key){
        $response = new ServiceResponseDto();

        $response->setResult($this->settingRepository->checkSettingKey($key));

        return $response;
    }

    public function read($key){
        return $this->readObject($this->settingRepository,$key);
    }


    public function delete($key){
        return $this->deleteObject($this->settingRepository,$key);
    }

    public function pagination($param){
        return $this->getPaginationObject($this->settingRepository,$param);
    }

}