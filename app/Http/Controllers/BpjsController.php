<?php

namespace App\Http\Controllers;

use App\Services\BpjsKesehatanService;
use App\Services\BpjsKetenagakerjaanService;
use App\Services\ProgramPensiunService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class BpjsController extends Controller
{
    protected $bpjsKetenagakerjaanService;
    protected $bpjsKesehatanService;
    protected $programPensiunService;

    public function __construct(BpjsKetenagakerjaanService $bpjsKetenagakerjaanService, BpjsKesehatanService $bpjsKesehatanService,
                                ProgramPensiunService $programPensiunService)
    {
        $this->bpjsKetenagakerjaanService = $bpjsKetenagakerjaanService;
        $this->bpjsKesehatanService = $bpjsKesehatanService;
        $this->programPensiunService = $programPensiunService;
    }

    public function index($laporId)
    {
        $dataBpjsKetenagakerjaan = $this->bpjsKetenagakerjaanService->read($laporId)->getResult();
        $dataBpjsKesehatan = $this->bpjsKesehatanService->read($laporId)->getResult();
        $dataProgramPensiun = $this->programPensiunService->read($laporId)->getResult();

        return view('bpjs.index')
            ->with('bpjsKetenagakerjaan', $dataBpjsKetenagakerjaan)
            ->with('bpjsKesehatan', $dataBpjsKesehatan)
            ->with('programPensiun',$dataProgramPensiun)
            ->with('laporId', $laporId);
    }

    public function postBpjsKetenagakerjaan()
    {
        $response = $this->bpjsKetenagakerjaanService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postBpjsKesehatan()
    {
        $response = $this->bpjsKesehatanService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postProgramPensiun(){
        $response = $this->programPensiunService->create(Input::all());

        return $this->getJsonResponse($response);
    }
}
