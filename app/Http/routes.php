<?php
Route::get('/user/auth',['as'=>'userAuth','uses'=>'AuthController@authForm']);
Route::post('/user/auth',['as'=>'userAuthProcess','uses'=>'AuthController@authProcess']);
Route::get('/user/register',['as'=>'userRegister','uses'=>'AuthController@registerForm']);
Route::post('/user/register',['as'=>'userRegisterProcess','uses'=>'AuthController@registerProcess']);
Route::get('/user-confirmation/{email}/{token}',['as'=>'userConfirmation','uses'=>'AuthController@userConfirmation']);
Route::post('/user-confirmation',['as'=>'userConfirmationProcess','uses'=>'AuthController@userConfirmationProcess']);
Route::get('/cetakan/{id}',['as'=>'cetakanLaporan','uses'=>'CetakController@cetak']);


Route::group(['middleware'=>'auth'],function (){
    Route::get('/',['as'=>'backdEndDashboard','uses'=>'HomeController@index']);
    Route::get('/logout',['as'=>'userLogout','uses'=>'AuthController@logout']);
    Route::get('/perusahan',['as'=>'dataPerusahaan','uses'=>'PerusahaanController@index']);
    Route::post('/perusahaan',['as'=>'postDataPerusahaan','uses'=>'PerusahaanController@post']);

    Route::get('/ketenagakerjaan-umum',['as'=>'ketenagaKerjaanUmum','uses'=>'KetenagaKerjaanController@umum']);
    Route::post('/ketenagakerjaan-umum',['as'=>'postKetenagaKerjaanUmum','uses'=>'KetenagaKerjaanController@postUmum']);
    Route::get('/ketenagakerjaan/waktu-kerja',['as'=>'ketenagaKerjaanWaktuKerja','uses'=>'KetenagaKerjaanController@waktuKerja']);
    Route::post('/ketenagakerjaan/waktu-kerja',['as'=>'postKetenagaKerjaanWaktuKerja','uses'=>'KetenagaKerjaanController@postWaktuKerja']);
    Route::get('/ketenagakerjaan/pengupahan',['as'=>'ketenagaKerjaanPengupahan','uses'=>'KetenagaKerjaanController@pengupahan']);
    Route::post('/ketenagakerjaan/pengupahan',['as'=>'postKetenagaKerjaanPengupahan','uses'=>'KetenagaKerjaanController@postPengupahan']);

});
