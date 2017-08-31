<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 04.55
 */

namespace App\Services;


use App\Repository\Contract\IKepemilikanRepository;
use App\Services\Response\ServiceResponseDto;

class KepemilikanService extends BaseService
{
    protected $kepemilikanRepository;

    public function __construct(IKepemilikanRepository $kepemilikanRepository)
    {
        $this->kepemilikanRepository = $kepemilikanRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        if(!$this->kepemilikanRepository->create($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->kepemilikanRepository,$id);
    }

    public function showAll(){
        return $this->getAllObject($this->kepemilikanRepository);
    }

    public function update($input){
        $response = new ServiceResponseDto();

        if(!$this->kepemilikanRepository->update($input)){
            $message = ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->kepemilikanRepository,$id);
    }

    public function pagination($param){
        return $this->getPaginationObject($this->kepemilikanRepository,$param);
    }

}