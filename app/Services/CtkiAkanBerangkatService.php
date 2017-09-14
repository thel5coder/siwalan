<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 01/09/2017
 * Time: 01.58
 */

namespace App\Services;


use App\Repository\Contract\ICtkiAkanBerangkatRepository;
use App\Services\Response\ServiceResponseDto;

class CtkiAkanBerangkatService extends BaseService
{
    protected $ctkiAkanBerangkatRepository;

    public function __construct(ICtkiAkanBerangkatRepository $ctkiAkanBerangkatRepository)
    {
        $this->ctkiAkanBerangkatRepository = $ctkiAkanBerangkatRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            if(!$this->ctkiAkanBerangkatRepository->update($input)){
                $message =['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->ctkiAkanBerangkatRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->ctkiAkanBerangkatRepository,$id);
    }

}