<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 22/08/2017
 * Time: 22.00
 */

namespace App\Services;


use App\Repository\Contract\IKecamatanRepository;
use App\Services\Response\ServiceResponseDto;

class KecamatanService extends BaseService
{
    protected $kecamatanRepository;

    public function __construct(IKecamatanRepository $kecamatanRepository)
    {
        $this->kecamatanRepository = $kecamatanRepository;
    }

    public function read($id){
        $response = new ServiceResponseDto();
        $data = $this->kecamatanRepository->read($id);

        for($i=0;$i<count($data);$i++){
            $result[]=[
                'id'=>$data[$i]->id,
                'text'=>$data[$i]->nama_kecamatan
            ];
        }

        $response->setResult($result);

        return $response;
    }

}