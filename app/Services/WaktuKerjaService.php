<?php
/**
 * Created by PhpStorm.
 * User: syaikhul
 * Date: 23/08/2017
 * Time: 09.39
 */

namespace App\Services;


use App\Repository\Contract\IMasterWaktuKerjaRepository;
use App\Repository\Contract\IWaktuKerjaRepository;
use App\Services\Response\ServiceResponseDto;

class WaktuKerjaService extends BaseService
{
    protected $masterWaktuKerjaRepository;
    protected $waktuKerjaRepository;

    public function __construct(IMasterWaktuKerjaRepository $masterWaktuKerjaRepository, IWaktuKerjaRepository $waktuKerjaRepository)
    {
        $this->masterWaktuKerjaRepository = $masterWaktuKerjaRepository;
        $this->waktuKerjaRepository = $waktuKerjaRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();

        $dataWaktuKerja = $this->readByLapor($input['laporId'])->getResult();
        if (count($dataWaktuKerja) > 0) {
            $delete = $this->deleteByLapor($input['laporId']);
            if ($delete->isSuccess()) {
                for ($i = 0; $i < count($input['masterKerjaId']); $i++) {
                    $param = [
                        'laporId' => $input['laporId'],
                        'masterKerjaId' => $input['masterKerjaId'][$i]
                    ];
                    if (!$this->waktuKerjaRepository->create($param)) {
                        $message = ['Gagal menyimpan pada data ke' . ($i + 1)];
                        $response->addErrorMessage($message);
                    }
                }
            } else {
                $response->addErrorMessage($delete->getErrorMessages());
            }
        } else {
            for ($i = 0; $i < count($input['masterKerjaId']); $i++) {
                $param = [
                    'laporId' => $input['laporId'],
                    'masterKerjaId' => $input['masterKerjaId'][$i]
                ];
                if (!$this->waktuKerjaRepository->create($param)) {
                    $message = ['Gagal menyimpan pada data ke' . ($i + 1)];
                    $response->addErrorMessage($message);
                }
            }
        }

        return $response;
    }

    public function readMasterWaktuKerja($id)
    {
        return $this->readObject($this->masterWaktuKerjaRepository, $id);
    }

    public function readByLapor($laporId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->waktuKerjaRepository->readByWajibLapor($laporId));

        return $response;
    }

    public function showAllMasterWaktuKerja()
    {
        return $this->getAllObject($this->masterWaktuKerjaRepository);
    }

    public function readWaktuKerja($id)
    {
        return $this->readObject($this->waktuKerjaRepository, $id);
    }

    public function deleteByLapor($laporId)
    {
        $response = new ServiceResponseDto();

        if (!$this->waktuKerjaRepository->deleteByWajibLapor($laporId)) {
            $message = ['Gagal menghapus'];
            $response->addErrorMessage($response);
        }

        return $response;
    }
}