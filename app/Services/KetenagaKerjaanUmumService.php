<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 18/08/2017
 * Time: 06.40
 */

namespace App\Services;


use App\Repository\Contract\IKetenagaKerjaanUmumRepository;
use App\Services\Response\ServiceResponseDto;

class KetenagaKerjaanUmumService extends BaseService
{
    protected $ketenagaKerjaanUmumRepository;

    public function __construct(IKetenagaKerjaanUmumRepository $ketenagaKerjaanUmumRepository)
    {
        $this->ketenagaKerjaanUmumRepository = $ketenagaKerjaanUmumRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        if(!$this->ketenagaKerjaanUmumRepository->create($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->ketenagaKerjaanUmumRepository,$id);
    }

    public function showAll(){
        return $this->getAllObject($this->ketenagaKerjaanUmumRepository);
    }


    public function update($input){
        $response = new ServiceResponseDto();

        if(!$this->ketenagaKerjaanUmumRepository->update($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->ketenagaKerjaanUmumRepository,$id);
    }

}