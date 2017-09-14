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
            $isWajibLaporExist = $this->getCountWajibLapor()->getResult();
            if($isWajibLaporExist){
                $countLaporan = $this->getLastWajibLapor()->getResult() + 1;
            }else{
                $countLaporan = $input['laporanKe'];
            }
            if(auth()->user()->kode_pos =='' || auth()->user()->jenis_usaha_id == ''){
                $message = ['Lengkapi data perusahaan dahulu di menu perusahaan'];
                $response->addErrorMessage($message);
            }else{
                $kodeWilayah = auth()->user()->kode_pos;
                $tahun = date('Y');
                $kodeKblui = auth()->user()->jenis_usaha_id;
                $laporanYangKe = $countLaporan.'-'.date('d-m-Y');
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

    public function paginationByStatus($param,$korwil,$status){
        $response = new ServicePaginationResponseDto();


        $pagingResult = $this->laporRepository->paginationByStatusLapor($this->parsePaginationParam($param),$korwil,$status);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function isLaporExisting($tahun){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->checkExistingLapor($tahun));

        return $response;
    }

    public function getCountWajibLapor(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLapor());

        return $response;
    }

    protected function getLastWajibLapor(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getLastWajibLapor());

        return $response;
    }

    public function getCountWajibLaporModerasiPerUser(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLaporModerasiPerPerusahaan());

        return $response;
    }

    public function getCountWajibLaporRevisiPerUser(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLaporValidPerPerusahaan());

        return $response;
    }

    public function getCountWajibLaporValidPerUser(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLaporRevisiPerPerusahaan());

        return $response;
    }

    public function getCountAllWajibLapor(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountAllWajibLapor());

        return $response;
    }

    public function getCountWajibLaporModerasi(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLaporModerasi());

        return $response;
    }

    public function getCountWajibLaporRevisi(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLaporRevisi());

        return $response;
    }

    public function getCountWajibLaporValid(){
        $response = new ServiceResponseDto();

        $response->setResult($this->laporRepository->getCountWajibLaporValid());

        return $response;
    }

    public function changeStatus($id,$status){
        $response = new ServiceResponseDto();

        if(!$this->laporRepository->changeStatusLapor($id,$status)){
            $message= ['Gagal menyimpan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function paginationFilter($filter,$param){
        if($filter['kabupaten']==''){
            return $this->paginationFilterTahun($param,$filter['tahun']);
        }else{
            if($filter['kecamatan']==''){
                return $this->paginationFilterByKabupaten($param,$filter['kabupaten'],$filter['tahun']);
            }else{
                return $this->paginationFilterByKecamatan($param,$filter['kecamatan'],$filter['tahun']);
            }
        }
    }

    protected function paginationFilterTahun($param,$tahun){
        $response = new ServicePaginationResponseDto();
        if($tahun ==''){
            $tahunFilter = date('Y');
        }else{
            $tahunFilter = $tahun;
        }

        $pagingResult = $this->laporRepository->paginationByTahun($this->parsePaginationParam($param), $tahunFilter);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function paginationFilterByKabupaten($param,$kabupaten,$tahun){
        $response = new ServicePaginationResponseDto();
        if($tahun ==''){
            $tahunFilter = date('Y');
        }else{
            $tahunFilter = $tahun;
        }

        $pagingResult = $this->laporRepository->paginationByKabupaten($this->parsePaginationParam($param),$kabupaten,$tahunFilter);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function paginationFilterByKecamatan($param,$kecamatan,$tahun){
        $response = new ServicePaginationResponseDto();
        if($tahun ==''){
            $tahunFilter = date('Y');
        }else{
            $tahunFilter = $tahun;
        }

        $pagingResult = $this->laporRepository->paginationByKecamatan($this->parsePaginationParam($param),$kecamatan,$tahunFilter);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }
}