<?php

namespace App\Http\Controllers;

use App\Services\UmumService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UmumController extends Controller
{
    protected $umumService;

    public function __construct(UmumService $umumService)
    {
        $this->umumService = $umumService;
    }

    public function index($laporId)
    {
        $data = $this->umumService->read($laporId)->getResult();
        return view('umum.index')->with('data',$data)->with('laporId',$laporId);
    }

    public function post(){
        $response = $this->umumService->create(Input::all());

        return $this->getJsonResponse($response);
    }

}
