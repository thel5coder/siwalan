<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 22.49
 */

namespace App\Services;


use App\Repository\Contract\IProgramPensiunRepository;
use App\Services\Response\ServiceResponseDto;

class ProgramPensiunService extends BaseService
{
    protected $programPensiunRepository;

    public function __construct(IProgramPensiunRepository $programPensiunRepository)
    {
        $this->programPensiunRepository = $programPensiunRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            if(!$this->programPensiunRepository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->programPensiunRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->programPensiunRepository,$id);
    }
}