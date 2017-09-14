<?php

namespace App\Http\Controllers;

use App\Services\CtkiAkanBerangkatService;
use App\Services\CtkiTelahBerangkatService;
use App\Services\DetailCtkiAkanBerangkatService;
use App\Services\DetailCtkiTelahBerangkatService;
use App\Services\ProgramPelatihanService;
use App\Services\RekapPenerimaanPekerjaService;
use App\Services\RencanaPelatihanService;
use App\Services\Response\ServiceResponseDto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PekerjaController extends Controller
{
    protected $ctkiAkanBerangkatService;
    protected $detailCtkiAkanBerangkatService;
    protected $ctkiTelahBerangkatService;
    protected $detailCtkiTelahBerangkatService;
    protected $rekapPenerimaanPekerjaService;
    protected $programPelatihanService;
    protected $rencanaPelatihanService;

    public function __construct(CtkiAkanBerangkatService $ctkiAkanBerangkatService, DetailCtkiAkanBerangkatService $detailCtkiAkanBerangkatService,
                                CtkiTelahBerangkatService $ctkiTelahBerangkatService, DetailCtkiTelahBerangkatService $detailCtkiTelahBerangkatService,
                                RekapPenerimaanPekerjaService $rekapPenerimaanPekerjaService, ProgramPelatihanService $programPelatihanService,
                                RencanaPelatihanService $rencanaPelatihanService)
    {
        $this->ctkiAkanBerangkatService = $ctkiAkanBerangkatService;
        $this->detailCtkiAkanBerangkatService = $detailCtkiAkanBerangkatService;
        $this->ctkiTelahBerangkatService = $ctkiTelahBerangkatService;
        $this->detailCtkiTelahBerangkatService = $detailCtkiTelahBerangkatService;
        $this->rekapPenerimaanPekerjaService = $rekapPenerimaanPekerjaService;
        $this->programPelatihanService = $programPelatihanService;
        $this->rencanaPelatihanService = $rencanaPelatihanService;
    }

    public function index($laporId)
    {
        $dataCtkiAkanBerangkat = $this->ctkiAkanBerangkatService->read($laporId)->getResult();
        $detailCtkiAkanBerangkat = $this->detailCtkiAkanBerangkatService->readByLapor($laporId)->getResult();
        $ctkiTelahBerangkat = $this->ctkiTelahBerangkatService->read($laporId)->getResult();
        $detailCtkiTelahBerangkat = $this->detailCtkiTelahBerangkatService->readByLapor($laporId)->getResult();
        $rekapPenerimaanPekerja = $this->rekapPenerimaanPekerjaService->read($laporId)->getResult();
        $programPelatihan = $this->programPelatihanService->read($laporId)->getResult();
        $dataRencanaLatihan = $this->rencanaPelatihanService->readByLapor($laporId)->getResult();

        return view('pekerja.index')
            ->with('laporId', $laporId)
            ->with('detailCtkiAkanBerangkat', $detailCtkiAkanBerangkat)
            ->with('ctkiTelahBerangkat', $ctkiTelahBerangkat)
            ->with('detailCtkiTelahBerangkat', $detailCtkiTelahBerangkat)
            ->with('rekapPenerimaanPekerja', $rekapPenerimaanPekerja)
            ->with('programPelatihan', $programPelatihan)
            ->with('dataRencanaLatihan',$dataRencanaLatihan)
            ->with('ctkiAkanBerangkat', $dataCtkiAkanBerangkat);
    }

    public function postCtkiAkanBerangkat()
    {
        $response = $this->ctkiAkanBerangkatService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postCtkiTelahBerangkat()
    {
        $response = $this->ctkiTelahBerangkatService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function paginationDetailCtkiAkanBerangkatByLapor()
    {
        $param = $this->getPaginationParams();
        $response = $this->detailCtkiAkanBerangkatService->paginationByLapor($param, Input::get('laporId'));

        return $this->parsePaginationResultToGridJson($response);
    }

    public function postDetailCtkiAkanBerangkat()
    {
        $response = $this->detailCtkiAkanBerangkatService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function updateDetailCtkiAkanBerangkat()
    {
        $response = $this->detailCtkiAkanBerangkatService->update(Input::all());

        return $this->getJsonResponse($response);
    }

    public function readDetailCtkiAkanBerangkat($id)
    {
        $response = $this->detailCtkiAkanBerangkatService->read($id)->getResult();

        return response()->json(['count' => count($response), 'data' => $response]);
    }

    public function deleteDetailCtkiAkanBerangkat($id)
    {
        $response = $this->detailCtkiAkanBerangkatService->delete($id);

        return $this->getJsonResponse($response);
    }


    public function paginationDetailCtkiTelahBerangkatByLapor()
    {
        $param = $this->getPaginationParams();
        $response = $this->detailCtkiTelahBerangkatService->paginationByLapor($param, Input::get('laporId'));

        return $this->parsePaginationResultToGridJson($response);
    }

    public function postDetailCtkiTelahBerangkat()
    {
        $response = $this->detailCtkiTelahBerangkatService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function updateDetailCtkiTelahBerangkat()
    {
        $response = $this->detailCtkiTelahBerangkatService->update(Input::all());

        return $this->getJsonResponse($response);
    }

    public function readDetailCtkiTelahBerangkat($id)
    {
        $response = $this->detailCtkiTelahBerangkatService->read($id)->getResult();

        return response()->json(['count' => count($response), 'data' => $response]);
    }

    public function deleteDetailCtkiTelahBerangkat($id)
    {
        $response = $this->detailCtkiTelahBerangkatService->delete($id);

        return $this->getJsonResponse($response);
    }

    public function postRekapJumlahPekerja()
    {
        $response = $this->rekapPenerimaanPekerjaService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postProgramPelatihan()
    {
        $response = $this->programPelatihanService->create(Input::all());

        return $this->getJsonResponse($response);
    }


}
