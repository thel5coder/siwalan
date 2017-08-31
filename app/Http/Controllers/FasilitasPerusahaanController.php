<?php

namespace App\Http\Controllers;

use App\Services\FasilitasPerusahaanService;
use App\Services\MasterFasilitasK3Service;
use App\Services\MasterFasilitasKesejahteraanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FasilitasPerusahaanController extends Controller
{
    protected $fasilitasPerusahaanService;
    protected $masterFasilitasK3Service;
    protected $masterFasilitasKesejahteraanService;

    public function __construct(FasilitasPerusahaanService $fasilitasPerusahaanService, MasterFasilitasK3Service $masterFasilitasK3Service,
                                MasterFasilitasKesejahteraanService $masterFasilitasKesejahteraanService)
    {
        $this->fasilitasPerusahaanService = $fasilitasPerusahaanService;
        $this->masterFasilitasK3Service = $masterFasilitasK3Service;
        $this->masterFasilitasKesejahteraanService = $masterFasilitasKesejahteraanService;
    }

    public function index($laporId)
    {
        $dataFasilitasK3 = $this->fasilitasPerusahaanService->readFasilitasK3ByLapor($laporId)->getResult();
        $masterFasilitasK3 = $this->masterFasilitasK3Service->showAll()->getResult();
        $masterFasilitasKesejahteraan = $this->masterFasilitasKesejahteraanService->showAll()->getResult();
        $fasilitasKesejahteraan = $this->fasilitasPerusahaanService->readFasilitasKesejahteraanByLapor($laporId)->getResult();

        return view('fasilitasperusahaan.index')
            ->with('dataFasilitasK3', $dataFasilitasK3)
            ->with('masterFasilitasK3', $masterFasilitasK3)
            ->with('masterFasilitasKesejahteraan',$masterFasilitasKesejahteraan)
            ->with('dataFasilitasKesejahteraan',$fasilitasKesejahteraan)
            ->with('laporId', $laporId);
    }

    public function paginationFasilitasK3($laporId)
    {
        $param = $this->getPaginationParams();
        $response = $this->fasilitasPerusahaanService->paginationFasilitasK3ByLapor($param, $laporId);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function postFasilitasK3()
    {
        $response = $this->fasilitasPerusahaanService->createFasilitasK3(Input::all());

        return $this->getJsonResponse($response);
    }

    public function deleteFasilitasK3($id)
    {
        $response = $this->fasilitasPerusahaanService->deleteFasilitasK3($id);

        return $this->getJsonResponse($response);
    }

    public function readFasilitasK3($id)
    {
        $response = $this->fasilitasPerusahaanService->readFasilitasK3($id)->getResult();

        return response()->json(['count' => count($response), 'data' => $response]);
    }

    public function postFasilitasKesejahteraan(){
        $response = $this->fasilitasPerusahaanService->createFasilitasKesejahteraan(Input::all());

        return $this->getJsonResponse($response);
    }
}
