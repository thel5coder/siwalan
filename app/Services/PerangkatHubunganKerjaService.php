<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 23.21
 */

namespace App\Services;


use App\Repository\Contract\IPerangkatHubunganKerjaRepository;
use App\Services\Response\ServiceResponseDto;

class PerangkatHubunganKerjaService extends BaseService
{
    protected $perangkatHubunganKerjaRepository;

    public function __construct(IPerangkatHubunganKerjaRepository $perangkatHubunganKerjaRepository)
    {
        $this->perangkatHubunganKerjaRepository = $perangkatHubunganKerjaRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            if(!$this->perangkatHubunganKerjaRepository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->perangkatHubunganKerjaRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->perangkatHubunganKerjaRepository,$id);
    }

}