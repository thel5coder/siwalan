<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 10.04
 */

namespace App\Services;


use App\Repository\Contract\IRencanaPelatihanRepository;
use App\Repository\Contract\Pagination\PaginationParam;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;

class RencanaPelatihanService extends BaseService
{
    protected $rencanaPelatihanRepository;

    public function __construct(IRencanaPelatihanRepository $rencanaPelatihanRepository)
    {
        $this->rencanaPelatihanRepository = $rencanaPelatihanRepository;
    }

    protected function isKejuruanExist($laporId,$id,$kejuruan){
        $response= new ServiceResponseDto();

        $response->setResult($this->rencanaPelatihanRepository->checkKejuruan($laporId,$id,$kejuruan));

        return $response;
    }

    protected function isKodeKejuruanExist($laporId,$id,$kodeKejuruan){
        $response = new ServiceResponseDto();

        $response->setResult($this->rencanaPelatihanRepository->checkKodeKejuruan($laporId,$id,$kodeKejuruan));

        return $response;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $isKejuruanExist = $this->isKejuruanExist($input['laporId'],'',$input['kejuruan']);
        if($isKejuruanExist->getResult()){
            $message = ['Kejuruan sudah dalam data'];
            $response->addErrorMessage($message);
        }

        $isKodeKejuruanExist = $this->isKodeKejuruanExist($input['laporId'],'',$input['kejuruan']);
        if($isKodeKejuruanExist->getResult()){
            $message = ['Kode kejuruan sudah dalam data'];
            $response->addErrorMessage($message);
        }

        if(!$isKejuruanExist->getResult() && !$isKodeKejuruanExist->getResult()){
            if(!$this->rencanaPelatihanRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->rencanaPelatihanRepository,$id);
    }

    public function update($input){
        $response = new ServiceResponseDto();

        $isKejuruanExist = $this->isKejuruanExist($input['laporId'],$input['id'],$input['kejuruan']);
        if($isKejuruanExist->getResult()){
            $message = ['Kejuruan sudah dalam data'];
            $response->addErrorMessage($message);
        }

        $isKodeKejuruanExist = $this->isKodeKejuruanExist($input['laporId'],$input['id'],$input['kejuruan']);
        if($isKodeKejuruanExist->getResult()){
            $message = ['Kode kejuruan sudah dalam data'];
            $response->addErrorMessage($message);
        }

        if(!$isKejuruanExist->getResult() && !$isKodeKejuruanExist->getResult()){
            if(!$this->rencanaPelatihanRepository->update($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->rencanaPelatihanRepository,$id);
    }

    public function readByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->rencanaPelatihanRepository->readByLapor($laporId));

        return $response;
    }

    public function paginationByLapor($param,$laporId){
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->rencanaPelatihanRepository->paginationByLapor($this->parsePaginationParam($param),$laporId);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

}