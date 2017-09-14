<?php

namespace App\Http\Controllers;

use App\Services\MasterKorwilService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MasterKorwilController extends Controller
{
    protected $masterKorwilService;

    public function __construct(MasterKorwilService $masterKorwilService)
    {
        $this->masterKorwilService = $masterKorwilService;
    }

    public function index(){
        return view('masterkorwil.index');
    }

    public function pagination(){
        $param = $this->getPaginationParams();
        $response = $this->masterKorwilService->pagination($param);

        return $this->parsePaginationResultToGridJson($response);
    }
}
