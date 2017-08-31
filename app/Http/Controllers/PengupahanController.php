<?php

namespace App\Http\Controllers;

use App\Services\PengupahanService;
use App\Services\Response\ServiceResponseDto;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PengupahanController extends Controller
{
    protected $pengupahanService;

    public function __construct(PengupahanService $pengupahanService)
    {
        $this->pengupahanService = $pengupahanService;
    }

    public function index($laporId){
        $dataPengupahan = $this->pengupahanService->readByLapor($laporId)->getResult();

        return view('pengupahan.index')
            ->with('laporId',$laporId)
            ->with('dataPengupahan',$dataPengupahan);
    }

    public function post(){
        $response = $this->pengupahanService->create(Input::all());

        return $this->getJsonResponse($response);
    }
}
