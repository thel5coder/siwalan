<?php

namespace App\Http\Controllers;

use App\Services\InstalasiLimbahAmdalService;
use App\Services\LimbahProduksiService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PengolahanLimbahController extends Controller
{
    protected $limbahProduksiService;
    protected $instalasiLimbahAmdalService;

    public function __construct(LimbahProduksiService $limbahProduksiService,InstalasiLimbahAmdalService $instalasiLimbahAmdalService)
    {
        $this->limbahProduksiService = $limbahProduksiService;
        $this->instalasiLimbahAmdalService = $instalasiLimbahAmdalService;
    }

    public function index($laporId){
        $dataLimbahProduksi = $this->limbahProduksiService->readByLapor($laporId)->getResult();
        $dataInstalasiLimbahAmdal = $this->instalasiLimbahAmdalService->readByLapor($laporId)->getResult();
        return view('pengolahanlimbah.index')
            ->with('laporId',$laporId)
            ->with('dataInstalasiLimbahAmdal',$dataInstalasiLimbahAmdal)
            ->with('dataLimbahProduksi',$dataLimbahProduksi);
    }

    public function postLimbahProduksi(){
        $response = $this->limbahProduksiService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postInstalasiLimbahAmdal(){
        $response = $this->instalasiLimbahAmdalService->create(Input::all());

        return $this->getJsonResponse($response);
    }
}
