<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class CetakController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function cetak($id){
        $data = $this->userService->read($id)->getResult();
        $pdf = App::make('dompdf.wrapper');

        $pdf = $pdf->loadView('cetakan.cetak',compact('data'));

        return $pdf->setPaper('A4','portrait')->stream();
    }
}
