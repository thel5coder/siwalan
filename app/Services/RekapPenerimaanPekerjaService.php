<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 04/09/2017
 * Time: 09.03
 */

namespace App\Services;


use App\Repository\Contract\IRekapPenerimaanPekerjaRepository;
use App\Services\Response\ServiceResponseDto;

class RekapPenerimaanPekerjaService extends BaseService
{
    protected $rekapPenerimaanPekerjaRepository;

    public function __construct(IRekapPenerimaanPekerjaRepository $rekapPenerimaanPekerjaRepository)
    {
        $this->rekapPenerimaanPekerjaRepository = $rekapPenerimaanPekerjaRepository;
    }

    public function create($input){
        $response = new ServiceResponseDto();
        $data = count($this->read($input['laporId'])->getResult());

        if($data>0){
            if(!$this->rekapPenerimaanPekerjaRepository->update($input)){
                $message = ['Gagal mengubah'];
                $response->addErrorMessage($message);
            }
        }else{
            if(!$this->rekapPenerimaanPekerjaRepository->create($input)){
                $message = ['Gagal menyimpan'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    public function read($id){
        return $this->readObject($this->rekapPenerimaanPekerjaRepository,$id);
    }

}