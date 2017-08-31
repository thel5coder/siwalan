<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 10.24
 */

namespace App\Services;


use App\Repository\Contract\IPengupahanRepository;
use App\Services\Response\ServiceResponseDto;

class PengupahanService extends BaseService
{
    protected $pengupahanRepository;

    public function __construct(IPengupahanRepository $pengupahanRepository)
    {
        $this->pengupahanRepository = $pengupahanRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $dataPengupahan = count($this->readByLapor($input['laporId'])->getResult());
        if($dataPengupahan>0){
            if(!$this->pengupahanRepository->update($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->pengupahanRepository->create($input)){
                $message =['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function readByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->pengupahanRepository->readByLapor($laporId));

        return $response;
    }

}