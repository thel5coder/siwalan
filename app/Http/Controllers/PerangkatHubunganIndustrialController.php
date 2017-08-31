<?php

namespace App\Http\Controllers;

use App\Services\PerangkatHubunganKerjaService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PerangkatHubunganIndustrialController extends Controller
{
    protected $perangkatHubunganKerjaService;

    public function __construct(PerangkatHubunganKerjaService $perangkatHubunganKerjaService)
    {
        $this->perangkatHubunganKerjaService = $perangkatHubunganKerjaService;
    }

    public function index($laporId){
        $dataPerangkatHubunganKerja = $this->perangkatHubunganKerjaService->read($laporId)->getResult();

        return view('perangkathubindustri.index')
            ->with('laporId',$laporId)
            ->with('perangkatHubunganKerja',$dataPerangkatHubunganKerja);
    }

    public function postPerangkatHubunganKerja(){
        $response = $this->perangkatHubunganKerjaService->create(Input::all());

        return $this->getJsonResponse($response);
    }
}
