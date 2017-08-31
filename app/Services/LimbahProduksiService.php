<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 07.46
 */

namespace App\Services;


use App\Repository\Contract\ILimbahProduksiRepository;
use App\Services\Response\ServiceResponseDto;

class LimbahProduksiService extends BaseService
{
    protected $limbahProduksiRepository;

    public function __construct(ILimbahProduksiRepository $limbahProduksiRepository)
    {
        $this->limbahProduksiRepository = $limbahProduksiRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $dataLimbahProduksi = $this->readByLapor($input['laporId'])->getResult();
        if(count($dataLimbahProduksi)>0){
            $deleteDataLimbahProduksi = $this->deleteByLapor($input['laporId']);
            if($deleteDataLimbahProduksi->isSuccess()){
                for($i=0;$i<count($input['jenisLimbahProduksi']);$i++){
                    $param = [
                        'laporId'=>$input['laporId'],
                        'jenisLimbahProduksi'=>$input['jenisLimbahProduksi'][$i]
                    ];
                    if(!$this->limbahProduksiRepository->create($param)){
                        $message = ['Gagal menyimpan data ke-'.($i+1)];
                        $response->addErrorMessage($message);
                    }
                }
            }else{
                $response->addErrorMessage($deleteDataLimbahProduksi->getErrorMessages());
            }
        }else{
            for($i=0;$i<count($input['jenisLimbahProduksi']);$i++){
                $param = [
                    'laporId'=>$input['laporId'],
                    'jenisLimbahProduksi'=>$input['jenisLimbahProduksi'][$i]
                ];
                if(!$this->limbahProduksiRepository->create($param)){
                    $message = ['Gagal menyimpan data ke-'.($i+1)];
                    $response->addErrorMessage($message);
                }
            }
        }

        return $response;
    }

    protected function deleteByLapor($laporId){
        $response = new ServiceResponseDto();

        if(!$this->limbahProduksiRepository->deleteByLapor($laporId)){
            $message = ['Gagal menghapus data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function readByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->limbahProduksiRepository->readByLapor($laporId));

        return $response;
    }
}