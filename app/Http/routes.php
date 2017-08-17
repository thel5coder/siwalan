<?php
Route::get('/user/auth',['as'=>'userAuth','uses'=>'AuthController@authForm']);
Route::post('/user/auth',['as'=>'userAuthProcess','uses'=>'AuthController@authProcess']);
Route::get('/user/register',['as'=>'userRegister','uses'=>'AuthController@registerForm']);
Route::post('/user/register',['as'=>'userRegisterProcess','uses'=>'AuthController@registerProcess']);
Route::get('/user/confirmation/{email}/{token}',['as'=>'userConfirmation','uses'=>'AuthController@userConfirmation']);


Route::group(['middleware'=>'auth'],function (){
    Route::get('/',['as'=>'backdEndDashboard','uses'=>'Home@index']);
});
