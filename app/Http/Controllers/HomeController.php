<?php

namespace App\Http\Controllers;

use App\Services\KabupatenService;
use App\Services\UserService;
use App\Services\WajibLaporService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    protected $userService;
    protected $laporService;
    protected $kabupatenService;

    public function __construct(UserService $userService, WajibLaporService $wajibLaporService,KabupatenService $kabupatenService)
    {
        $this->userService = $userService;
        $this->laporService = $wajibLaporService;
        $this->kabupatenService = $kabupatenService;
    }

    public function authForm(){
        $kabupaten = $this->kabupatenService->read('35')->getResult();

        return view('auth.content')->with('dataKabupaten',$kabupaten);
    }

    public function index()
    {
        $dataUser = $this->userService->read(auth()->user()->id)->getResult();
        $jmlWajibLapor = $this->laporService->getCountWajibLapor()->getResult();
        $countWajibLaporModerasi = $this->laporService->getCountWajibLaporModerasiPerUser()->getResult();
        $countWajibLaporRevisi = $this->laporService->getCountWajibLaporModerasiPerUser()->getResult();
        $countWajibLaporValid = $this->laporService->getCountWajibLaporValidPerUser()->getResult();
        $countLaporModerasi = $this->laporService->getCountWajibLaporModerasi()->getResult();
        $countLaporRevisi = $this->laporService->getCountWajibLaporRevisi()->getResult();
        $countLaporValid = $this->laporService->getCountWajibLaporValid()->getResult();
        $countAllLapor = $this->laporService->getCountAllWajibLapor()->getResult();

        return view('dashboard.index')
            ->with('dataUser', $dataUser)
            ->with('jmlWajibLapor',$jmlWajibLapor)
            ->with('countWajibLaporModerasi',$countWajibLaporModerasi)
            ->with('countWajibLaporRevisi',$countWajibLaporRevisi)
            ->with('countWajibLaporValid',$countWajibLaporValid)
            ->with('countLaporModerasi',$countLaporModerasi)
            ->with('countLaporRevisi',$countLaporRevisi)
            ->with('countLaporValid',$countLaporValid)
            ->with('countAllLapor',$countAllLapor);
    }

    public function front(){

        return view('front.index')
            ->with('dataKabupaten',$kabupaten);
    }

    public function frontPagination(){
        $param = $this->getPaginationParams();
        $response = $this->laporService->paginationFilter(Input::all(),$param);

        return $this->parsePaginationResultToGridJson($response);
    }
}
