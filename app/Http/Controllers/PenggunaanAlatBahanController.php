<?php

namespace App\Http\Controllers;

use App\Services\MasterAlatBahanService;
use App\Services\PenggunaanAlatBahanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PenggunaanAlatBahanController extends Controller
{
    protected $masterAlatBahanService;
    protected $penggunaanAlatBahanService;

    public function __construct(MasterAlatBahanService $masterAlatBahanService, PenggunaanAlatBahanService $penggunaanAlatBahanService)
    {
        $this->masterAlatBahanService = $masterAlatBahanService;
        $this->penggunaanAlatBahanService = $penggunaanAlatBahanService;
    }

    public function index($laporId)
    {
        $dataAlatBahan = $this->masterAlatBahanService->showAll()->getResult();

        return view('penggunaanalatbahan.index')->with('laporId', $laporId)->with('dataAlatBahan', $dataAlatBahan);
    }

    public function paginationByLapor($laporId){
        $param = $this->getPaginationParams();
        $response = $this->penggunaanAlatBahanService->paginationByLaporId($param,$laporId);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function post(){
        $response = $this->penggunaanAlatBahanService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function update(){
        $response = $this->penggunaanAlatBahanService->update(Input::all());

        return $this->getJsonResponse($response);
    }

    public function delete($id){
        $response = $this->penggunaanAlatBahanService->delete($id);

        return $this->getJsonResponse($response);
    }

    public function readByAlat($id){
        $response = $this->penggunaanAlatBahanService->readByAlatId($id)->getResult();

        return response()->json(['count'=>count($response),'data'=>$response]);
    }
}
