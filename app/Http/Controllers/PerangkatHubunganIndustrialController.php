<?php

namespace App\Http\Controllers;

use App\Services\PerangkatHubunganKerjaService;
use App\Services\PerangkatOrganisasiService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PerangkatHubunganIndustrialController extends Controller
{
    protected $perangkatHubunganKerjaService;
    protected $perangkatOrganisasiService;

    public function __construct(PerangkatHubunganKerjaService $perangkatHubunganKerjaService,PerangkatOrganisasiService $perangkatOrganisasiService)
    {
        $this->perangkatHubunganKerjaService = $perangkatHubunganKerjaService;
        $this->perangkatOrganisasiService = $perangkatOrganisasiService;
    }

    public function index($laporId){
        $dataPerangkatHubunganKerja = $this->perangkatHubunganKerjaService->read($laporId)->getResult();
        $dataPerangkatOrganisasi = $this->perangkatOrganisasiService->read($laporId)->getResult();

        return view('perangkathubindustri.index')
            ->with('laporId',$laporId)
            ->with('perangkatOrganisasi',$dataPerangkatOrganisasi)
            ->with('perangkatHubunganKerja',$dataPerangkatHubunganKerja);
    }

    public function postPerangkatHubunganKerja(){
        $response = $this->perangkatHubunganKerjaService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postPerangkatOrganisasiKetenagakerjaan(){
        $response = $this->perangkatOrganisasiService->create(Input::all());

        return $this->getJsonResponse($response);
    }
}
