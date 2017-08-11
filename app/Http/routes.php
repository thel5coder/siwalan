<?php
Route::get('/user/auth',['as'=>'userAuth','uses'=>'AuthController@authForm']);
Route::post('/user/auth',['as'=>'userAuthProcess','uses'=>'AuthController@authProcess']);
Route::get('/user/register',['as'=>'userRegister','uses'=>'AuthController@registerForm']);
Route::post('/user/register',['as'=>'userRegisterProcess','uses'=>'AuthController@registerProcess']);


Route::get('/', function () {
    return view('app');
});
