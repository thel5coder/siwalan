<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 01/09/2017
 * Time: 01.09
 */

namespace App\Services;


use App\Repository\Contract\IPerangkatOrganisasiRepository;
use App\Services\Response\ServiceResponseDto;

class PerangkatOrganisasiService extends BaseService
{
    protected $perangkatOrganisasiRepository;

    public function __construct(IPerangkatOrganisasiRepository $perangkatOrganisasiRepository)
    {
        $this->perangkatOrganisasiRepository = $perangkatOrganisasiRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            $delete = $this->delete($input['laporId']);
            if($delete->isSuccess()){
                for($i=0;$i<count($input['jenisPerangkatOrganisasi']);$i++){
                    $param = [
                        'laporId'=>$input['laporId'],
                        'jenisPerangkatOrganisasi'=>$input['jenisPerangkatOrganisasi'][$i]
                    ];
                    if(!$this->perangkatOrganisasiRepository->create($param)){
                        $message = ['Gagal menyimpan data ke-'.($i+1)];
                        $response->addErrorMessage($message);
                    }
                }
            }else{
                $response->addErrorMessage($delete->getErrorMessages());
            }
        }else{
            for($i=0;$i<count($input['jenisPerangkatOrganisasi']);$i++){
                $param = [
                    'laporId'=>$input['laporId'],
                    'jenisPerangkatOrganisasi'=>$input['jenisPerangkatOrganisasi'][$i]
                ];
                if(!$this->perangkatOrganisasiRepository->create($param)){
                    $message = ['Gagal menyimpan data ke-'.($i+1)];
                    $response->addErrorMessage($message);
                }
            }
        }

        return $response;

    }

    public function read($id){
        return $this->readObject($this->perangkatOrganisasiRepository,$id);
    }

    public function delete($id){
        return $this->deleteObject($this->perangkatOrganisasiRepository, $id);
    }
}