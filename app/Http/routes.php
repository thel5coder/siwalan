<?php
Route::get('/user/auth', ['as' => 'userAuth', 'uses' => 'AuthController@authForm']);
Route::post('/user/auth', ['as' => 'userAuthProcess', 'uses' => 'AuthController@authProcess']);
Route::get('/user/register', ['as' => 'userRegister', 'uses' => 'AuthController@registerForm']);
Route::post('/user/register', ['as' => 'userRegisterProcess', 'uses' => 'AuthController@registerProcess']);
Route::get('/user-confirmation/{email}/{token}', ['as' => 'userConfirmation', 'uses' => 'AuthController@userConfirmation']);
Route::post('/user-confirmation', ['as' => 'userConfirmationProcess', 'uses' => 'AuthController@userConfirmationProcess']);
Route::get('/cetakan/{id}', ['as' => 'cetakanLaporan', 'uses' => 'CetakController@cetak']);
Route::get('/tes', ['as' => 'coba', function () {
    return \Illuminate\Support\Facades\Route::currentRouteName();
}]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    Route::get('/logout', ['as' => 'userLogout', 'uses' => 'AuthController@logout']);
    Route::get('/perusahan', ['as' => 'dataPerusahaan', 'uses' => 'PerusahaanController@index']);
    Route::post('/perusahaan/post-data-umum-perusahaan', ['as' => 'postDataUmumPerusahaan', 'uses' => 'PerusahaanController@postDataUmumPerusahaan']);
    Route::post('/perusahaan/post-data-legal-perusahaan', ['as' => 'postDataLegalPerusahaan', 'uses' => 'PerusahaanController@postDataLegalPerusahaan']);
    Route::post('/perusahaan/post-data-pengelolah-perusahaan', ['as' => 'postDataPengelolahPerusahaan', 'uses' => 'PerusahaanController@postDataPengelolahPerusahaan']);
    Route::get('/get-kecamatan/{kabupatenId}', ['as' => 'getKecamatan', 'uses' => 'KecamatanController@getAll']);
    Route::get('/get-korwil/{kabupatenId}', ['as' => 'getKorwil', 'uses' => 'KorwilController@readGroupKorwil']);

    Route::post('/kepemilikan', ['as' => 'paginationKepemilikan', 'uses' => 'KepemilikanController@pagination']);
    Route::post('/kepemilikan/create', ['as' => 'postKepemilikan', 'uses' => 'KepemilikanController@post']);
    Route::post('/kepemilikan/update', ['as' => 'updateKepemilikan', 'uses' => 'KepemilikanController@update']);
    Route::post('/kepemilikan/delete/{id}', ['as' => 'deleteKepemilikan', 'uses' => 'KepemilikanController@delete']);


    Route::get('/lapor', ['as' => 'indexLapor', 'uses' => 'LaporController@index']);
    Route::post('/lapor', ['as' => 'paginationLapor', 'uses' => 'LaporController@pagination']);
    Route::post('/lapor/create', ['as' => 'createLapor', 'uses' => 'LaporController@post']);
    Route::get('lapor/detail/{id}', ['as' => 'detailLapor', 'uses' => 'LaporController@detail']);

    Route::get('/umum/{laporId}', ['as' => 'indexUmum', 'uses' => 'UmumController@index']);
    Route::post('/umum', ['as' => 'postUmum', 'uses' => 'UmumController@post']);

    Route::get('/waktu-kerja/{laporId}', ['as' => 'indexWaktuKerja', 'uses' => 'WaktuKerjaController@index']);
    Route::post('/waktu-kerja', ['as' => 'postWaktuKerja', 'uses' => 'WaktuKerjaController@post']);

    Route::get('/penggunaan-alat-bahan/{laporId}', ['as' => 'indexPenggunaanAlatBahan', 'uses' => 'PenggunaanAlatBahanController@index']);
    Route::post('/penggunaan-alat-bahan/{laporId}', ['as' => 'paginationByLaporPenggunaanAlatBahan', 'uses' => 'PenggunaanAlatBahanController@paginationByLapor']);
    Route::post('/penggunaan-alat-bahan-creates', ['as' => 'postPenggunaanAlatBahan', 'uses' => 'PenggunaanAlatBahanController@post']);
    Route::post('/penggunaan-alat-bahan-delete/{id}', ['as' => 'deletePenggunaanAlatBahan', 'uses' => 'PenggunaanAlatBahanController@delete']);
    Route::get('/penggunaan-alat-bahan-read-alat/{alatId}', ['as' => 'readByAlatId', 'uses' => 'PenggunaanAlatBahanController@readByAlat']);

    Route::get('/pengolahan-limbah/{laporId}', ['as' => 'indexPengolahanLimbah', 'uses' => 'PengolahanLimbahController@index']);
    Route::post('/limbah-produksi/create', ['as' => 'postLimbahProduksi', 'uses' => 'PengolahanLimbahController@postLimbahProduksi']);
    Route::post('/instalasi-limbah-amdal/create', ['as' => 'postInstalasiLimbahAmdal', 'uses' => 'PengolahanLimbahController@postInstalasiLimbahAmdal']);

    Route::get('/pengupahan/{laporId}', ['as' => 'indexPengupahan', 'uses' => 'PengupahanController@index']);
    Route::post('/pengupahan-create', ['as' => 'postPengupahan', 'uses' => 'PengupahanController@post']);

    Route::get('/fasilitas-perusahaan/{laporId}', ['as' => 'indexFasilitasPerusahaan', 'uses' => 'FasilitasPerusahaanController@index']);
    Route::post('/fasilitas-k3/{laporId}', ['as' => 'paginationFasilitasK3', 'uses' => 'FasilitasPerusahaanController@paginationFasilitasK3']);
    Route::post('/fasilitas-k3-post', ['as' => 'postFasilitasK3', 'uses' => 'FasilitasPerusahaanController@postFasilitasK3']);
    Route::post('/fasilitas-k3/delete/{id}', ['as' => 'deleteFasilitasK3', 'uses' => 'FasilitasPerusahaanController@deleteFasilitasK3']);
    Route::get('/fasilitas-k3/read/{id}', ['as' => 'readFasilitasK3', 'uses' => 'FasilitasPerusahaanController@readFasilitasK3']);
    Route::post('/fasilitas-kesejahteraan', ['as' => 'postFasilitasKesejahteraan', 'uses' => 'FasilitasPerusahaanController@postFasilitasKesejahteraan']);

    Route::get('/bpjs/{laporId}', ['as' => 'indexBpjs', 'uses' => 'BpjsController@index']);
    Route::post('/bpjs-ketenagakerjaan/create', ['as' => 'postBpjsKetenagakerjaan', 'uses' => 'BpjsController@postBpjsKetenagakerjaan']);
    Route::post('/bpjs-kesehatan/create', ['as' => 'postBpjsKesehatan', 'uses' => 'BpjsController@postBpjsKesehatan']);
    Route::post('/program-pensiun/create', ['as' => 'postProgramPensiun', 'uses' => 'BpjsController@postProgramPensiun']);

    Route::get('/perangkat-hubungan-industrial/{laporId}', ['as' => 'indexPerangkatHubunganIndustrial', 'uses' => 'PerangkatHubunganIndustrialController@index']);
    Route::post('/perangkat-hubungan-kerja/create', ['as' => 'postPerangkatHubunganKerja', 'uses' => 'PerangkatHubunganIndustrialController@postPerangkatHubunganKerja']);
    Route::post('/perangkat-organisasi-ketenagakerjaan/create', ['as' => 'postPerangkatOrganisasiKetenagakerjaan', 'uses' => 'PerangkatHubunganIndustrialController@postPerangkatOrganisasiKetenagakerjaan']);


});
