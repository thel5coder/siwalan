<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PerusahaanController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){

        return view('perusahaan.index');
    }

    public function post(){
        $response = $this->userService->update(Input::all());

        return $this->getJsonResponse($response);
    }
}
