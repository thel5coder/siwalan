<?php

namespace App\Http\Controllers;

use App\Services\KetenagaKerjaanUmumService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class KetenagaKerjaanController extends Controller
{
    protected $ketenagaKerjaanUmumService;

    public function __construct(KetenagaKerjaanUmumService $kerjaanUmumService)
    {
        $this->ketenagaKerjaanUmumService = $kerjaanUmumService;
    }

    public function umum(){
        $data = $this->ketenagaKerjaanUmumService->read(auth()->user()->id)->getResult();

        if(count($data)>0){
            return view('ketenagakerjaan.umum')->with('data',$data);
        }else{
            return view('ketenagakerjaan.umum');
        }

    }

    public function postUmum(){
        $data = $this->ketenagaKerjaanUmumService->read(auth()->user()->id)->getResult();

        if(count($data)>0){
            $response = $this->ketenagaKerjaanUmumService->create(Input::all());
        }else{
            $response = $this->ketenagaKerjaanUmumService->update(Input::all());
        }

        return $this->getJsonResponse($response);
    }
}
