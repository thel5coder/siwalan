<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 08.22
 */

namespace App\Services;


use App\Repository\Contract\IDetailCtkiTelahBerangkatRepository;
use App\Services\Response\ServiceResponseDto;

class DetailCtkiTelahBerangkatService extends BaseService
{
    protected $detailCtkiTelahBerangkatRepository;

    public function __construct(IDetailCtkiTelahBerangkatRepository $detailCtkiTelahBerangkatRepository)
    {
        $this->detailCtkiTelahBerangkatRepository = $detailCtkiTelahBerangkatRepository;
    }

    protected function isNamaJabatanExist($id,$namaJabatan){
        $response = new ServiceResponseDto();

        $response->setResult($this->detailCtkiTelahBerangkatRepository->checkJabatan($id,$namaJabatan));

        return $response;
    }

    protected function isKodeJabatanExist($id,$kodeJabatan){
        $response = new ServiceResponseDto();

        $response->setResult($this->detailCtkiTelahBerangkatRepository->checkKodeJabatan($id,$kodeJabatan));

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
            if(!$this->detailCtkiTelahBerangkatRepository->create($input)){
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
            if(!$this->detailCtkiTelahBerangkatRepository->update($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->detailCtkiTelahBerangkatRepository,$id);
    }

    public function readByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->detailCtkiTelahBerangkatRepository->readByLapor($laporId));

        return $response;
    }

    public function delete($id){
        return $this->deleteObject($this->detailCtkiTelahBerangkatRepository,$id);
    }

    public function deleteByLapor($laporId){
        $response = new ServiceResponseDto();

        if(!$this->detailCtkiTelahBerangkatRepository->deleteByLapor($laporId)){
            $message = ['Gagal menghapus'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function paginationByLapor($param,$laporId){
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->detailCtkiTelahBerangkatRepository->paginationByLapor($this->parsePaginationParam($param), $laporId);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }
}