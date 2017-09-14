<?php

namespace App\Http\Controllers;

use App\Services\KabupatenService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KabupatenController extends Controller
{
    protected $kabupatenService;

    public function __construct(KabupatenService $kabupatenService)
    {
        $this->kabupatenService = $kabupatenService;
    }

    public function index(){
        return view('kabupaten.index');
    }

    public function pagination(){
        $param = $this->getPaginationParams();
        $response = $this->kabupatenService->pagination($param);

        return $this->parsePaginationResultToGridJson($response);
    }
}
