<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function authForm(){
        return view('auth.auth');
    }

    public function authProcess(){
        $response = $this->userService->authProcess(Input::all());

        return $this->getJsonResponse($response);
    }

    public function registerForm(){
        return view('auth.register');
    }

    public function registerProcess(){
        $response = $this->userService->create(Input::all());

        return $this->getJsonResponse($response);
    }

    public function userConfirmation($email,$token){
        return view('auth.konfirm')
            ->with('email',$email)
            ->with('token',$token);
    }

    public function userConfirmationProcess(){
        $response = $this->userService->activationUser(Input::get('email'),Input::get('token'));

        return $this->getJsonResponse($response);
    }

    public function logout(){
        Auth::logout();
        return redirect()->guest('user/auth');
    }
}
