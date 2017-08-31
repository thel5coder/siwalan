<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 00.49
 */

namespace App\Services;


use App\Repository\Contract\IPenggunaanAlatBahanRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;

class PenggunaanAlatBahanService extends BaseService
{
    protected $penggunaanAlatBahanRepository;

    public function __construct(IPenggunaanAlatBahanRepository $penggunaanAlatBahanRepository)
    {
        $this->penggunaanAlatBahanRepository = $penggunaanAlatBahanRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        $isAlatExist = $this->isAlatExist($input['alatId'])->getResult();

        if ($isAlatExist) {
            if (!$this->penggunaanAlatBahanRepository->update($input)) {
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        } else {
            if (!$this->penggunaanAlatBahanRepository->create($input)) {
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    protected function isAlatExist($alatId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->penggunaanAlatBahanRepository->checkIsExist($alatId));

        return $response;
    }

    public function read($id)
    {
        return $this->readObject($this->penggunaanAlatBahanRepository, $id);
    }

    public function readByLapor($laporId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->penggunaanAlatBahanRepository->readByLapor($laporId));

        return $response;
    }

    public function readByAlatId($alatId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->penggunaanAlatBahanRepository->readByAlatId($alatId));

        return $response;
    }

    public function showAll()
    {
        return $this->getAllObject($this->penggunaanAlatBahanRepository);
    }

    public function delete($id)
    {
        return $this->deleteObject($this->penggunaanAlatBahanRepository, $id);
    }

    public function pagination($param)
    {
        return $this->getPaginationObject($this->penggunaanAlatBahanRepository, $param);
    }

    public function paginationByLaporId($param, $laporId)
    {
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->penggunaanAlatBahanRepository->paginationByLapor($this->parsePaginationParam($param), $laporId);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }
}