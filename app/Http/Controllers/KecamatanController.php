<?php

namespace App\Http\Controllers;

use App\Services\KabupatenService;
use App\Services\KecamatanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class KecamatanController extends Controller
{
    protected $kecamatanService;
    protected $kabupatenService;

    public function __construct(KecamatanService $kecamatanService,KabupatenService $kabupatenService)
    {
        $this->kecamatanService = $kecamatanService;
        $this->kabupatenService = $kabupatenService;
    }

    public function getAll($kabupatenId){
        $data = $this->kecamatanService->read($kabupatenId)->getResult();

        return response()->json($data);
    }

    public function index(){
        $dataKabupaten = $this->kabupatenService->read('35')->getResult();

        return view('kecamatan.index')
            ->with('dataKabupaten',$dataKabupaten);
    }

    public function pagination(){
        $param = $this->getPaginationParams();
        $response = $this->kecamatanService->pagination($param,Input::get('kabupatenId'));

        return $this->parsePaginationResultToGridJson($response);
    }
}
