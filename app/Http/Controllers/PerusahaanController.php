<?php

namespace App\Http\Controllers;

use App\Models\KabupatenModel;
use App\Services\JenisUsahaService;
use App\Services\KabupatenService;
use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PerusahaanController extends Controller
{
    protected $userService;
    protected $kabupatenService;
    protected $jenisUsahaService;

    public function __construct(UserService $userService,KabupatenService $kabupatenService,JenisUsahaService $jenisUsahaService)
    {
        $this->kabupatenService = $kabupatenService;
        $this->userService = $userService;
        $this->jenisUsahaService = $jenisUsahaService;
    }

    public function index(){
        $dataKabupaten = $this->kabupatenService->read('35')->getResult();
        $dataJenisUsaha = $this->jenisUsahaService->getAll()->getResult();
        return view('perusahaan.index')
            ->with('kabupaten',$dataKabupaten)
            ->with('jenisUsaha',$dataJenisUsaha);
    }

    public function postDataUmumPerusahaan(){
        $response = $this->userService->updateDataUmumPerusahaan(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postDataLegalPerusahaan(){
        $response = $this->userService->updateDataLegalPerusahaan(Input::all());

        return $this->getJsonResponse($response);
    }

    public function postDataPengelolahPerusahaan(){
        $response = $this->userService->updateDataPengelolah(Input::all());

        return $this->getJsonResponse($response);
    }
}
