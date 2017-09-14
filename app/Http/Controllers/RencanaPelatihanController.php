<?php

namespace App\Http\Controllers;

use App\Services\RencanaPelatihanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RencanaPelatihanController extends Controller
{
    protected $rencanaPelatihanService;

    public function __construct(RencanaPelatihanService $rencanaPelatihanService)
    {
        $this->rencanaPelatihanService = $rencanaPelatihanService;
    }

    public function pagination($laporId){
        $param = $this->getPaginationParams();
        $response = $this->rencanaPelatihanService->paginationByLapor($param,$laporId);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function post(){
        $response = $this->rencanaPelatihanService->create(Input::all());

        return  $this->getJsonResponse($response);
    }

    public function read($id){
        $data = $this->rencanaPelatihanService->read($id)->getResult();

        return response()->json(['count'=>count($data),'data'=>$data]);
    }

    public function update(){
        $response = $this->rencanaPelatihanService->update(Input::all());

        return $this->getJsonResponse($response);
    }

    public function delete($id){
        $response =$this->rencanaPelatihanService->delete($id);

        return $this->getJsonResponse($response);
    }
}
