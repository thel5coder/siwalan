<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 02/09/2017
 * Time: 15.47
 */

namespace App\Services;


use App\Repository\Contract\IDetailCtkiAkanBerangkatRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;

class DetailCtkiAkanBerangkatService extends BaseService
{
    protected $detailCtkiAkanBerangkatRepository;

    public  function __construct(IDetailCtkiAkanBerangkatRepository $detailCtkiAkanBerangkatRepository)
    {
        $this->detailCtkiAkanBerangkatRepository = $detailCtkiAkanBerangkatRepository;
    }

    protected function isNamaJabatanExist($id,$namaJabatan){
        $response = new ServiceResponseDto();

        $response->setResult($this->detailCtkiAkanBerangkatRepository->checkJabatan($id,$namaJabatan));

        return $response;
    }

    protected function isKodeJabatanExist($id,$kodeJabatan){
        $response = new ServiceResponseDto();

        $response->setResult($this->detailCtkiAkanBerangkatRepository->checkKodeJabatan($id,$kodeJabatan));

        return $response;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $namaJabatanIsExist = $this->isNamaJabatanExist('',$input['namaJabatan'])->getResult();
        if($namaJabatanIsExist){
            $message = ['Nama jabatan sudah ada dalam data'];
            $response->addErrorMessage($message);
        }

        $kodeJabatanExist = $this->isKodeJabatanExist('',$input['kodeJabatan'])->getResult();
        if($kodeJabatanExist){
            $message = ['Kode jabatan sudah ada dalam data'];
            $response->addErrorMessage($message);
        }

        if(!$kodeJabatanExist && !$namaJabatanIsExist){
            if(!$this->detailCtkiAkanBerangkatRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function update($input){
        $response = new ServiceResponseDto();

        $namaJabatanIsExist = $this->isNamaJabatanExist($input['id'],$input['namaJabatan'])->getResult();
        if($namaJabatanIsExist){
            $message = ['Nama jabatan sudah ada dalam data'];
            $response->addErrorMessage($message);
        }

        $kodeJabatanExist = $this->isKodeJabatanExist($input['id'],$input['kodeJabatan'])->getResult();
        if($kodeJabatanExist){
            $message = ['Kode jabatan sudah ada dalam data'];
            $response->addErrorMessage($message);
        }

        if(!$kodeJabatanExist && !$namaJabatanIsExist){
            if(!$this->detailCtkiAkanBerangkatRepository->update($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->detailCtkiAkanBerangkatRepository,$id);
    }

    public function readByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->detailCtkiAkanBerangkatRepository->readByLapor($laporId));

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->detailCtkiAkanBerangkatRepository,$id);
    }

    public function deleteByLapor($laporId){
        $response = new ServiceResponseDto();

        if(!$this->detailCtkiAkanBerangkatRepository->deleteByLapor($laporId)){
            $message = ['Gagal menghapus'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function paginationByLapor($param,$laporId){
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->detailCtkiAkanBerangkatRepository->paginationByLapor($this->parsePaginationParam($param), $laporId);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

}