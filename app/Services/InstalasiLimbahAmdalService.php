<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 09.08
 */

namespace App\Services;


use App\Repository\Contract\IInstalasiLimbahAmdalRepository;
use App\Services\Response\ServiceResponseDto;

class InstalasiLimbahAmdalService extends BaseService
{
    protected $instalasiLimbahAmdalRepository;

    public function __construct(IInstalasiLimbahAmdalRepository $instalasiLimbahAmdalRepository)
    {
        $this->instalasiLimbahAmdalRepository = $instalasiLimbahAmdalRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $dataInstalasi = count($this->readByLapor($input['laporId'])->getResult());
        $param = [
            'laporId'=>$input['laporId'],
            'instalasiLimbah'=>$input['instalasiLimbah'],
            'sertifikatAmdal'=>$input['sertifikatAmdal'],
            'noSertifikat'=>$input['noSertifikat'],
            'tglSertifikat'=>date('Y-m-d',strtotime($input['tglSertifikat']))
        ];

        if($dataInstalasi>0){
            if(!$this->instalasiLimbahAmdalRepository->update($param)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->instalasiLimbahAmdalRepository->create($param)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function readByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->instalasiLimbahAmdalRepository->readByLapor($laporId));

        return $response;
    }

}