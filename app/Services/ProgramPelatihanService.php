<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 09.21
 */

namespace App\Services;


use App\Repository\Contract\IProgramPelatihanRepository;
use App\Services\Response\ServiceResponseDto;

class ProgramPelatihanService extends BaseService
{
    protected $programPelatihanRepository;

    public function __construct(IProgramPelatihanRepository $programPelatihanRepository)
    {
        $this->programPelatihanRepository = $programPelatihanRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            if(!$this->programPelatihanRepository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->programPelatihanRepository->create($input)){
                $message= ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->programPelatihanRepository,$id);
    }

}