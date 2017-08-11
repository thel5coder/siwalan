<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 14/07/2017
 * Time: 13.02
 */

namespace App\Services;


use App\Repository\Contract\ILokasiRepository;
use App\Services\Response\ServiceResponseDto;

class LokasiService extends BaseService
{
    protected $lokasiRepository;

    public function __construct(ILokasiRepository $lokasiRepository)
    {
        $this->lokasiRepository = $lokasiRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $isLokasiExist = $this->isLokasiExist($input['namaLokasi'],'');

        if($isLokasiExist->getResult()){
            $message = ['Lokasi sudah ada'];
            $response->addErrorMessage($message);
        }else{
            if(!$this->lokasiRepository->create($input)){
                $message= ['Gagal menambahkan lokasi'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->lokasiRepository,$id);
    }

    public function showAll(){
        return $this->getAllObject($this->lokasiRepository);
    }

    public function update($input){
        $response = new ServiceResponseDto();
        $isLokasiExist = $this->isLokasiExist($input['namaLokasi'],$input['id']);

        if($isLokasiExist->getResult()){
            $message = ['Lokasi sudah ada'];
            $response->addErrorMessage($message);
        }else{
            if(!$this->lokasiRepository->update($input)){
                $message= ['Gagal menambahkan lokasi'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->lokasiRepository,$id);
    }

    public function pagination($param){
        return $this->getPaginationObject($this->lokasiRepository,$param);
    }

    protected function isLokasiExist($namaLokasi,$id){
        $response = new ServiceResponseDto();

        $response->setResult($this->lokasiRepository->checkNamaLokasi($namaLokasi,$id));

        return $response;
    }

}