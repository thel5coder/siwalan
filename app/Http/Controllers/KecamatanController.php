<?php

namespace App\Http\Controllers;

use App\Services\KecamatanService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KecamatanController extends Controller
{
    protected $kecamatanService;

    public function __construct(KecamatanService $kecamatanService)
    {
        $this->kecamatanService = $kecamatanService;
    }

    public function getAll($kabupatenId){
        $data = $this->kecamatanService->read($kabupatenId)->getResult();

        return response()->json($data);
    }
}
