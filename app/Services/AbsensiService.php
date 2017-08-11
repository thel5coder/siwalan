<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 15/07/2017
 * Time: 01.54
 */

namespace App\Services;


use App\Repository\Contract\IAbsensiRepository;
use App\Services\Response\ServicePaginationResponseDto;
use App\Services\Response\ServiceResponseDto;
use Efriandika\LaravelSettings\Facades\Settings;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiService extends BaseService
{
    protected $absensiRepository;

    public function __construct(IAbsensiRepository $absensiRepository)
    {
        $this->absensiRepository = $absensiRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();

        date_default_timezone_set("Asia/Jakarta");
        $tglAbsensi = date('Y-m-d');
        $jamAbsensi = date('H:i:s');
        $jamTenggangAbsenMasuk = Settings::get('JamTenggangAbsenMasuk');
        $intervalTenggangAbsenMasuk = Settings::get('IntervalTenggangAbsenMasuk');
        $jamTenggangAbsenKeluar = Settings::get('JamTenggangAbsenKeluar');
        $intervalTenggangAbsenKeluar = Settings::get('IntervalTenggangAbsenKeluar');

        if($input['jenisAbsen']=='Masuk'){
            $interval =abs($jamAbsensi - strtotime($jamTenggangAbsenMasuk));
            $intervalInMinute = round($interval/60);
            if($intervalInMinute>$intervalTenggangAbsenMasuk){
                $status = 'Terlambat';
            }else{
                $status = 'Tepat';
            }
        }else{
            $interval =abs($jamAbsensi - strtotime($jamTenggangAbsenKeluar));
            $intervalInMinute = round($interval/60);
            if($intervalInMinute<$intervalTenggangAbsenKeluar){
                $status = 'Tepat';
            }else{
                $status = 'Pulang Awal';
            }
        }

        $param = [
            'lokasiId'=>$input['lokasiId'],
            'tglAbsensi'=>$tglAbsensi,
            'jamAbsensi'=>$jamAbsensi,
            'keterangan'=>$input['keterangan'],
            'jenisAbsen'=>$input['jenisAbsen'],
            'status'=>$status
        ];

        $this->absensiRepository->create($param);

        return $response;
    }


    public function paginationAbsenMasuk($param){
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->absensiRepository->paginationAbsenMasuk($this->parsePaginationParam($param));
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function paginationAbsenKeluar($param){
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->absensiRepository->paginationAbsenKeluar($this->parsePaginationParam($param));
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    public function paginationAbsenPerUser($param,$userId,$jenisAbsen){
        $response = new ServicePaginationResponseDto();

        $pagingResult = $this->absensiRepository->paginationAbsenPerUser($this->parsePaginationParam($param),$userId,$jenisAbsen);
        $response->setCurrentPage($param['pageIndex']);
        $response->setPageSize($param['pageSize']);
        $response->setTotalCount($pagingResult->getTotalCount());
        $response->setResult($pagingResult->getResult());

        return $response;
    }

    protected function getDataAbsenPertanggal($tglMulai,$tglAkhir,$jenisAbsen){
        $response = new ServiceResponseDto();

        $response->setResult($this->absensiRepository->getAbsenPertanggal($tglMulai,$tglAkhir,$jenisAbsen));

        return $response;
    }

    protected function getDataAbsenTahunBulan($thnBln,$jenisAbsen){
        $response = new ServiceResponseDto();

        $response->setResult($this->absensiRepository->getAbsenPerTahunBulan($thnBln,$jenisAbsen));

        return $response;
    }

    public function exportAbsen($input){
        $response = new ServiceResponseDto();

        if($input['jenisExport']=='pertanggal'){
            $data = $this->getDataAbsenPertanggal($input['tglMulai'],$input['tglAkhir'],$input['jenisAbsen'])->getResult();
            if(!$result = Excel::create('Absensi Tanggal'.$input['tglMulai'] . '-' . $input['tglAkhir'], function ($excel) use ($data) {
                $excel->sheet('Data Absen', function ($sheet) use ($data) {
                    $sheet->fromArray($data);
                });
            })->download('pdf')){
                $message = ['Gagal export'];
                $response->addErrorMessage($message);
            }else{
                $response->setResult($result);
            }
        }elseif ($input['jenisExport']=='perbulan'){
            $data = $this->getDataAbsenTahunBulan($input['dtpBulan'],$input['jenisAbsen'])->getResult();
            if(!$result = Excel::create('Absensi Bulan'.$input['dtpBulan'], function ($excel) use ($data) {
                $excel->sheet('Data Absen', function ($sheet) use ($data) {
                    $sheet->fromArray($data);
                });
            })->download('pdf')){
                $message = ['Gagal export'];
                $response->addErrorMessage($message);
            }else{
                $response->setResult($result);
            }

        }else{
            $data = $this->getDataAbsenTahunBulan($input['dtpTahun'],$input['jenisAbsen'])->getResult();
            if(!$result = Excel::create('Absensi Tahun'.$input['dtpTahun'], function ($excel) use ($data) {
                $excel->sheet('Data Absen', function ($sheet) use ($data) {
                    $sheet->fromArray($data);
                });
            })->download('pdf')){
                $message = ['Gagal export'];
                $response->addErrorMessage($message);
            }else{
                $response->setResult($result);
            }
        }




        return $response;
    }

}