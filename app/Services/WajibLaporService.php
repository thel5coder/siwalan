<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 06.08
 */

namespace App\Services;


use App\Repository\Contract\ILaporRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;

class WajibLaporService extends BaseService
{
    protected $laporRepository;

    public function __construct(ILaporRepository $laporRepository)
    {
        $this->laporRepository = $laporRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        $isLaporExist = $this->isLaporExisting(date('Y'))->getResult();
        if($isLaporExist){
            $message = ['Anda sudah memiliki data wajib lapor untuk tahun ini'];
            $response->addErrorMessage($message);
        }else{
            $perusahaanId = auth()->user()->id;
            if(count($this->read($perusahaanId)->getResult()) ==0){
                $countLaporan = 1;
            }else{
                $countLaporan = $this->read($perusahaanId)->getResult();
            }

            $kodeWilayah = auth()->user()->kode_pos;
            $tahun = date('Y');
            $kodeKblui = auth()->user()->jenis_usaha_id;
            $laporanYangKe = count($countLaporan).'-'.date('d-m-Y');
            $tglLapor = date('Y-m-d');
            $laporanSelanjutnya = date('Y-m-d',strtotime('+1 years'));

            $param = [
                'perusahaanId'=>$perusahaanId,
                'tglLapor'=>$tglLapor,
                'kodeWilayah'=>$kodeWilayah,
                'tahun'=>$tahun,
                'kodeKblui'=>$kodeKblui,
                'laporanKe'=>$laporanYangKe,
                'laporanSelanjutnya'=>$laporanSelanjutnya,
            ];

            if(!$this->laporRepository->create($param)){
                $message = ['Gagal membuat registrasi wajib lapor'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->laporRepository,$id);
    }

    public function pagination($param){
        return $this->getPaginationObject($this->laporRepository,$param);
    }

    public function paginationByPerusahaan($param){
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->laporRepository->getPaginationByPerusahaan($this->parsePaginationParam($param));
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function isLaporExisting($tahun){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->checkExistingLapor($tahun));

        return $response;
    }
}