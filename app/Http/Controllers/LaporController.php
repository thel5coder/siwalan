<?php

namespace App\Http\Controllers;

use App\Services\WajibLaporService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LaporController extends Controller
{
    protected $laporService;

    public function __construct(WajibLaporService $laporService)
    {
        $this->laporService = $laporService;
    }

    public function index(){
        $isExistingWajibLapor = $this->laporService->isLaporExisting(date('Y'))->getResult();
        $countDataWajibLapor = $this->laporService->getCountWajibLapor()->getResult();

        return view('lapor.index')
            ->with('wajibLaporIsExist',$isExistingWajibLapor)
            ->with('countWajibLapor',$countDataWajibLapor);
    }

    public function pagination(){
        $param = $this->getPaginationParams();
        $response = $this->laporService->paginationByPerusahaan($param);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function post(){
        $response = $this->laporService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function detail($id){
        $data = $this->laporService->read($id)->getResult();

        return view('lapor.detail')->with('data',$data);
    }

    public function indexByStatus($status){

        return view('lapor.indexstatus')
            ->with('status',$status);
    }
    public function paginationByStatus($status){
        $param = $this->getPaginationParams();
        $response = $this->laporService->paginationByStatus($param,Input::get('korwil'),$status);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function changeStatus($id,$status){
        $response = $this->laporService->changeStatus($id,$status);

        return $this->getJsonResponse($response);
    }
}
