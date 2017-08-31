<?php

namespace App\Http\Controllers;

use App\Services\WaktuKerjaService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class WaktuKerjaController extends Controller
{
    protected $waktuKerjService;

    public function __construct(WaktuKerjaService $waktuKerjaService)
    {
        $this->waktuKerjService = $waktuKerjaService;
    }

    public function index($laporId){
        $masterWaktuKerja = $this->waktuKerjService->showAllMasterWaktuKerja()->getResult();
        $waktuKerja = $this->waktuKerjService->readByLapor($laporId)->getResult();
        return view('waktukerja.index')
            ->with('masterWaktuKerja',$masterWaktuKerja)
            ->with('waktuKerja',$waktuKerja)
            ->with('laporId',$laporId);
    }

    public function post(){
        $response = $this->waktuKerjService->create(Input::all());

        return $this->getJsonResponse($response);
    }
}
