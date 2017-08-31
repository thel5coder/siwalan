<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 18/08/2017
 * Time: 06.40
 */

namespace App\Services;


use App\Repository\Contract\IUmumRepository;
use App\Services\Response\ServiceResponseDto;

class UmumService extends BaseService
{
    protected $umumRepository;

    public function __construct(IUmumRepository $umumRepository)
    {
        $this->umumRepository = $umumRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        if(!$this->umumRepository->create($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->umumRepository,$id);
    }

    public function showAll(){
        return $this->getAllObject($this->umumRepository);
    }


    public function update($input){
        $response = new ServiceResponseDto();

        if(!$this->umumRepository->update($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->umumRepository,$id);
    }

}