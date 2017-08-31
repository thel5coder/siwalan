<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 21.45
 */

namespace App\Services;


use App\Repository\Contract\IBpjsKesehatanRepository;
use App\Services\Response\ServiceResponseDto;

class BpjsKesehatanService extends BaseService
{
    protected $bpjsKesehatanRepository;

    public function __construct(IBpjsKesehatanRepository $bpjsKesehatanRepository)
    {
        $this->bpjsKesehatanRepository = $bpjsKesehatanRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            if(!$this->bpjsKesehatanRepository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->bpjsKesehatanRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->bpjsKesehatanRepository,$id);
    }

}