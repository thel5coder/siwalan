<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 19.36
 */

namespace App\Services;


use App\Repository\Contract\IBpjsKetenagakerjaanRepository;
use App\Services\Response\ServiceResponseDto;

class BpjsKetenagakerjaanService extends BaseService
{
    protected $bpjsKetenagaKerjaanRepository;

    public function __construct(IBpjsKetenagakerjaanRepository $bpjsKetenagakerjaanRepository)
    {
        $this->bpjsKetenagaKerjaanRepository = $bpjsKetenagakerjaanRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $data = count($this->read($input['laporId'])->getResult());
        if($data>0){
            if(!$this->bpjsKetenagaKerjaanRepository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->bpjsKetenagaKerjaanRepository->create($input)){
                $message =['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->bpjsKetenagaKerjaanRepository,$id);
    }


}