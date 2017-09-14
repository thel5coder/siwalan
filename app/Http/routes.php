<?php
Route::get('/', ['as' => 'userAuth', 'uses' => 'HomeController@authForm']);
Route::post('/user-auth', ['as' => 'userAuthProcess', 'uses' => 'AuthController@authProcess']);
Route::post('/user/register', ['as' => 'userRegisterProcess', 'uses' => 'AuthController@registerProcess']);
Route::get('/user-confirmation/{email}/{token}', ['as' => 'userConfirmation', 'uses' => 'AuthController@userConfirmation']);
Route::post('/user-confirmation', ['as' => 'userConfirmationProcess', 'uses' => 'AuthController@userConfirmationProcess']);
Route::post('/pagination',['as'=>'paginationFront','uses'=>'HomeController@frontPagination']);
Route::get('/get-kecamatan/{kabupatenId}', ['as' => 'getKecamatan', 'uses' => 'KecamatanController@getAll']);
Route::get('/get-korwil/{kabupatenId}', ['as' => 'getKorwil', 'uses' => 'KorwilController@readGroupKorwil']);
Route::get('/lupa-password',['as'=>'lupaPassword','uses'=>'AuthController@lupaPassword']);
Route::get('/form-reset-password/{email}',['as'=>'formLupaPassword','uses'=>'AuthController@formResetPassword']);
Route::post('/form-reset-password',['as'=>'postResetPassword','uses'=>'AuthController@postResetPassword']);

Route::get('/tes', ['as' => 'coba', function () {
    return auth()->user()->id;
}]);


Route::group(['middleware' => 'auth'], function () {
    Route::post('/change-password',['as'=>'changePassword','uses'=>'AuthController@changePassword']);
    Route::post('/request-change-email',['as'=>'postRequestChangeEmail','uses'=>'ChangeEmailController@post']);

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    Route::get('/logout', ['as' => 'userLogout', 'uses' => 'AuthController@logout']);
    Route::get('/perusahan', ['as' => 'dataPerusahaan', 'uses' => 'PerusahaanController@index']);
    Route::post('/perusahaan/post-data-umum-perusahaan', ['as' => 'postDataUmumPerusahaan', 'uses' => 'PerusahaanController@postDataUmumPerusahaan']);
    Route::post('/perusahaan/post-data-legal-perusahaan', ['as' => 'postDataLegalPerusahaan', 'uses' => 'PerusahaanController@postDataLegalPerusahaan']);
    Route::post('/perusahaan/post-data-pengelolah-perusahaan', ['as' => 'postDataPengelolahPerusahaan', 'uses' => 'PerusahaanController@postDataPengelolahPerusahaan']);


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
    Route::get('/penggunaan-alat-bahan-read-alat/{laporId}/{alatId}', ['as' => 'readByAlatId', 'uses' => 'PenggunaanAlatBahanController@readByAlat']);

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


    Route::get('/pekerja/{laporId}',['as'=>'indexPekerja','uses'=>'PekerjaController@index']);
    Route::post('/ctki-akan-berangkat/create',['as'=>'postCtkiAkanBerangkat','uses'=>'PekerjaController@postCtkiAkanBerangkat']);
    Route::post('/ctki-telah-berangkat/create',['as'=>'postCtkiTelahBerangkat','uses'=>'PekerjaController@postCtkiTelahBerangkat']);
    Route::post('/detail-ctki-akan-berangkat/create',['as'=>'postDetailCtkiAkanBerangkat','uses'=>'PekerjaController@postDetailCtkiAkanBerangkat']);
    Route::post('/detail-ctki-akan-berangkat-pagination',['as'=>'paginationDetailCtkiAkanBerangkat','uses'=>'PekerjaController@paginationDetailCtkiAkanBerangkatByLapor']);
    Route::post('/detail-ctki-akan-berangka/update',['as'=>'updateDetailCtkiAkanBerangkat','uses'=>'PekerjaController@updateDetailCtkiAkanBerangkat']);
    Route::get('/detail-ctki-akan-berangkat/read/{id}',['as'=>'readDetailCtkiAkanBerangkat','uses'=>'PekerjaController@readDetailCtkiAkanBerangkat']);
    Route::post('/rekap-pekerja/create',['as'=>'postRekapJumlahPekerja','uses'=>'PekerjaController@postRekapJumlahPekerja']);
    Route::post('/detail-ctki-telah-berangkat/create',['as'=>'postDetailCtkiTelahBerangkat','uses'=>'PekerjaController@postDetailCtkiTelahBerangkat']);
    Route::post('/detail-ctki-telah-berangkat-pagination',['as'=>'paginationDetailCtkiTelahBerangkat','uses'=>'PekerjaController@paginationDetailCtkiTelahBerangkatByLapor']);
    Route::post('/detail-,ctki-telah-berangka/update',['as'=>'updateDetailCtkiTelahBerangkat','uses'=>'PekerjaController@updateDetailCtkiTelahBerangkat']);
    Route::get('/detail-ctki-telah-berangkat/read/{id}',['as'=>'readDetailCtkiTelahBerangkat','uses'=>'PekerjaController@readDetailCtkiTelahBerangkat']);
    Route::post('/detail-ctki-telah-berangkat/delete/{id}',['as'=>'deleteDetailCtkiTelahBerangkat','uses'=>'PekerjaController@deleteDetailCtkiTelahBerangkat']);
    Route::post('/program-pelatihan/create',['as'=>'postProgramPelatihan','uses'=>'PekerjaController@postProgramPelatihan']);

    Route::post('/rencana-pelatihan/{laporId}',['as'=>'paginationRencanaPelatihan','uses'=>'RencanaPelatihanController@pagination']);
    Route::post('/rencana-pelatihan-create',['as'=>'postRencanaPelatihan','uses'=>'RencanaPelatihanController@post']);
    Route::get('/rencana-pelatihan-read/{id}',['as'=>'readRencanaPelatihan','uses'=>'RencanaPelatihanController@read']);
    Route::post('/rencana-pelatihan-update',['as'=>'updateRencanaPelatihan','uses'=>'RencanaPelatihanController@update']);
    Route::post('/rencana-pelatihan-delete/{id}',['as'=>'deleteRencanaPelatihan','uses'=>'RencanaPelatihanController@delete']);

    Route::get('/cetak-wajib-lapor/{id}/{perusahaanid}',['as'=>'cetakWajibLapor','uses'=>'CetakController@cetak']);
    Route::get('/cetak-bukti-lapor/{id}',['as'=>'cetakBuktiLapor','uses'=>'CetakController@cetakBuktiLapor']);

    Route::group(['middleware'=>'auth.admindinas'],function (){
        Route::get('/users/{level}',['as'=>'indexUsersPerLevel','uses'=>'UserController@index']);
        Route::post('/users/{level}',['as'=>'paginationUsersPerLevel','uses'=>'UserController@paginationByLevel']);
        Route::post('/users-create',['as'=>'postUserDinas','uses'=>'UserController@postUserDinas']);

        Route::get('/data-perusahaan',['as'=>'indexDataPerusahaan','uses'=>'DataPerusahaanController@index']);

        Route::get('/master-kabupaten',['as'=>'indexKabupaten','uses'=>'KabupatenController@index']);
        Route::post('/master-kabupaten',['as'=>'paginationKabupaten','uses'=>'KabupatenController@pagination']);

        Route::get('/master-kecamatan',['as'=>'indexKecamatan','uses'=>'KecamatanController@index']);
        Route::post('/master-kecamatan',['as'=>'paginationKecamatan','uses'=>'KecamatanController@pagination']);

        Route::get('/master-korwil',['as'=>'indexMasterKorwil','uses'=>'MasterKorwilController@index']);
        Route::post('/master-korwil',['as'=>'paginationMasterKorwil','uses'=>'MasterKorwilController@pagination']);

        Route::get('/request-ubah-email',['as'=>'indexRequestUbahEmail','uses'=>'ChangeEmailController@index']);
        Route::post('/request-ubah-email',['as'=>'paginationRequestUbahEmail','uses'=>'ChangeEmailController@pagination']);
        Route::post('/request-ubah-email/change-status',['as'=>'changeStatusRequestChangeEmail','uses'=>'ChangeEmailController@changeStatus']);
    });

    Route::group(['middleware'=>'auth.pengawas'],function (){
        Route::get('/perusahaan-per-korwil/{korwil}',['as'=>'indexPerusahaanKorwil','uses'=>'UserController@indexByKorwil']);
        Route::post('/perusahaan-per-korwil',['as'=>'paginationPerusahaanByKorwil','uses'=>'UserController@paginationByKorwil']);
        Route::get('/perusahaan-per-korwil/detail/{id}',['detailPerusahaanPerKorwil','uses'=>'UserController@detailPerusahaanPerKorwil']);
        Route::get('/wajib-lapor/{status}',['as'=>'indexWajibLaporStatus','uses'=>'LaporController@indexByStatus']);
        Route::post('/wajib-lapor/{status}',['as'=>'paginationWajibLaporByStatus','uses'=>'LaporController@paginationByStatus']);
        Route::post('/wajib-lapor-change-status/{id}/{status}',['as'=>'changeStatusWajibLapor','uses'=>'LaporController@changeStatus']);
    });
});
