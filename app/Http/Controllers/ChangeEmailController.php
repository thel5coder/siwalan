<?php

namespace App\Http\Controllers;

use App\Services\UbahEmailService;
use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ChangeEmailController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(){
        return view('requestubahemail.index');
    }

    public function pagination()
    {
        $param = $this->getPaginationParams();
        $response = $this->userService->paginationUbahEmail($param);

        return $this->parsePaginationResultToGridJson($response);
    }

    public function post()
    {
        $response = $this->userService->createRequestUbahEmail(Input::all());

        return $this->getJsonResponse($response);
    }

    public function changeStatus()
    {
        $response = $this->userService->changeStatusUbahEmail(Input::get('id'), Input::get('status'), Input::get('newEmail'),Input::get('oldEmail'),Input::get('userId'));

        return $this->getJsonResponse($response);
    }
}
