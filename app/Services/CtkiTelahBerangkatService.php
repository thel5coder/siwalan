<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 08.00
 */

namespace App\Services;


use App\Repository\Contract\ICtkiTelahBerangkatRepository;
use App\Services\Response\ServiceResponseDto;

class CtkiTelahBerangkatService extends BaseService
{
    protected $ctkiTelahBerangkatRepository;

    public function __construct(ICtkiTelahBerangkatRepository $ctkiTelahBerangkatRepository)
    {
        $this->ctkiTelahBerangkatRepository = $ctkiTelahBerangkatRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = $this->read($input['laporId'])->getResult();

        if(count($data)>0){
            if(!$this->ctkiTelahBerangkatRepository->update($input)){
                $message =['Gagal menghubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->ctkiTelahBerangkatRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->ctkiTelahBerangkatRepository,$id);
    }

}