<?php

namespace App\Http\Controllers;

use App\Services\KabupatenService;
use App\Services\MasterKorwilService;
use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    protected $userService;
    protected $kabupatenService;
    protected $masterKorwilService;

    public function __construct(UserService $userService,KabupatenService $kabupatenService,MasterKorwilService $masterKorwilService)
    {
        $this->userService = $userService;
        $this->kabupatenService = $kabupatenService;
        $this->masterKorwilService = $masterKorwilService;
    }

    public function index($level){
        $kabupaten = $this->kabupatenService->read('35')->getResult();
        return view('userman.index')
            ->with('kabupaten',$kabupaten)
            ->with('level',$level);
    }

    public function paginationByLevel($level){
        $param = $this->getPaginationParams();
        $response = $this->userService->paginationUserByLevel($param,$level);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function postUserDinas(){
        $response = $this->userService->createUserDinas(Input::all());

        return $this->getJsonResponse($response);
    }

    public function indexByKorwil($korwil){
        $dataKorwil = $this->masterKorwilService->readMasterKorwil($korwil)->getResult();

        return view('userman.indexkorwil')->with('dataKorwil',$dataKorwil);
    }

    public function paginationByKorwil(){
        $param = $this->getPaginationParams();
        $response = $this->userService->paginationByKorwil($param,Input::get('korwil'));

        return $this->parsePaginationResultToGridJson($response);
    }

    public function detailPerusahaanPerKorwil($id){
        $data = $this->userService->read($id)->getResult();

        return view('userman.detailperusahaan')
            ->with('dataPerusahaan',$data);
    }
}
