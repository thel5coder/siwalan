<?php

namespace App\Http\Controllers;

use App\Services\KepemilikanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class KepemilikanController extends Controller
{
    protected $kepemilikanService;

    public function __construct(KepemilikanService $kepemilikanService)
    {
        $this->kepemilikanService = $kepemilikanService;
    }

    public function pagination(){
        $param = $this->getPaginationParams();
        $response = $this->kepemilikanService->pagination($param);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function post(){
        $response = $this->kepemilikanService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function update(){
        $response = $this->kepemilikanService->update(Input::all());

        return $this->getJsonResponse($response);
    }

    public function delete($id){
        $response = $this->kepemilikanService->delete($id);

        return $this->getJsonResponse($response);
    }
}
