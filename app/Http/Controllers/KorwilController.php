<?php

namespace App\Http\Controllers;

use App\Services\GropKorwilService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KorwilController extends Controller
{
    protected $groupKorwilService;

    public function __construct(GropKorwilService $gropKorwilService)
    {
        $this->groupKorwilService = $gropKorwilService;
    }

    public function readGroupKorwil($id){
        $response = $this->groupKorwilService->read($id)->getResult();

        return response()->json([
            'idKorwil'=>$response->korwil_id,
            'kabupatenId'=>$response->kabupaten_id,
            'namaKorwil'=>$response->nama_korwil
        ]);
    }
}
