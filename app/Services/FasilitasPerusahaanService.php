<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 31/08/2017
 * Time: 14.28
 */

namespace App\Services;


use App\Repository\Contract\IFasilitasK3Repository;
use App\Repository\Contract\IFasilitasKesejahteraanRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;

class FasilitasPerusahaanService extends BaseService
{
    protected $fasilitasK3Repository;
    protected $fasilitasKesejahteraanRepository;

    public function __construct(IFasilitasK3Repository $fasilitasK3Repository,IFasilitasKesejahteraanRepository $fasilitasKesejahteraanRepository)
    {
        $this->fasilitasK3Repository = $fasilitasK3Repository;
        $this->fasilitasKesejahteraanRepository = $fasilitasKesejahteraanRepository;
    }

    public function createFasilitasK3($input)
    {
        $response = new ServiceResponseDto();

        $dataFasilitasK3 = count($this->readFasilitasK3($input['fasilitasK3Id'])->getResult());

        if ($dataFasilitasK3 > 0) {
            if(!$this->fasilitasK3Repository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        } else {
            if(!$this->fasilitasK3Repository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($response);
            }
        }

        return $response;
    }

    public function readFasilitasK3ByLapor($laporId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->fasilitasK3Repository->readByLapor($laporId));

        return $response;
    }


    public function readFasilitasK3($id){
        return $this->readObject($this->fasilitasK3Repository,$id);
    }

    protected function deleteFasilitasK3ByLapor($laporId)
    {
        $response = new ServiceResponseDto();

        if (!$this->fasilitasK3Repository->deleteByLapor($laporId)) {
            $message = ['Gagal menghapus'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function deleteFasilitasK3($id){
        return $this->deleteObject($this->fasilitasK3Repository,$id);
    }

    public function paginationFasilitasK3ByLapor($param,$laporId){
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->fasilitasK3Repository->paginationByLapor($this->parsePaginationParam($param), $laporId);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function createFasilitasKesejahteraan($input){
        $response = new ServiceResponseDto();
        $dataFasilitasKesejahteraan = count($this->readFasilitasKesejahteraanByLapor($input['laporId'])->getResult());

        if($dataFasilitasKesejahteraan>0){
            $deleteFasilitas = $this->deleteFasilitasKesejahteraanByLapor($input['laporId']);
            if($deleteFasilitas->isSuccess()){
                for($i=0;$i<count($input['fasilitasKesejahteraanId']);$i++){
                    $param = [
                        'laporId'=>$input['laporId'],
                        'fasilitasKesejahteraanId'=>$input['fasilitasKesejahteraanId'][$i]
                    ];
                    if(!$this->fasilitasKesejahteraanRepository->create($param)){
                        $message = ['Gagal menyimpan data ke-'.($i+1)];
                        $response->addErrorMessage($message);
                    }
                }
            }else{
                $response->addErrorMessage($deleteFasilitas->getErrorMessages());
            }
        }else{
            for($i=0;$i<count($input['fasilitasKesejahteraanId']);$i++){
                $param = [
                    'laporId'=>$input['laporId'],
                    'fasilitasKesejahteraanId'=>$input['fasilitasKesejahteraanId'][$i]
                ];
                if(!$this->fasilitasKesejahteraanRepository->create($param)){
                    $message = ['Gagal menyimpan data ke-'.($i+1)];
                    $response->addErrorMessage($message);
                }
            }
        }

        return $response;
    }

    public function readFasilitasKesejahteraanByLapor($laporId){
        $response = new ServiceResponseDto();

        $response->setResult($this->fasilitasKesejahteraanRepository->readByLapor($laporId));

        return $response;
    }

    public function deleteFasilitasKesejahteraanByLapor($laporId){
        $response = new ServiceResponseDto();

        if(!$this->fasilitasKesejahteraanRepository->deleteByLapor($laporId)){
            $message= ['Gagal menghapus'];
            $response->addErrorMessage($message);
        }

        return $response;
    }
}