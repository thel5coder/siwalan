@extends('app')
@section('title','Umum')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">1. Umum</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">1. Umum</li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-default panel-flat">
                <div class="panel-heading">
                    <h4 class="panel-title">Ketenaga Kerjaan - Umum</h4>
                </div>
                <form id="frmUmum">
                    <input type="hidden" id="laporId" value="{{$laporId}}"/>
                    <div class="table-responsive">
                        @if(count($data)>0)
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th rowspan="3" colspan="2">Tenaga Kerja</th>
                                    <th rowspan="3">Kelompok Umur</th>
                                    <th colspan="6">Hubungan Kerja</th>
                                    <th rowspan="3">Jumlah</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Tetap</th>
                                    <th colspan="3">Tideak Tetap</th>
                                </tr>
                                <tr>
                                    <th>CPUH</th>
                                    <th>CPUBR</th>
                                    <th>CPUBL</th>
                                    <th>CPUH</th>
                                    <th>CPUBR</th>
                                    <th>CPUBL</th>
                                </tr>
                                <tr>
                                    <th rowspan="6">WNI</th>
                                    <th rowspan="3">Laki-laki</th>
                                    <th> >= 18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTetapCpuh"
                                               value="{{$data->jml_cpuh_tetap_wni_laki_lebih_dari_18}}"
                                               id="wniCpuhLakiTetapLebih18"/>
                                    </th>
                                    <th><input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTetapCpubr"
                                               value="{{$data->jml_cpubr_tetap_wni_laki_lebih_dari_18}}"
                                               id="wniCpubrLakiTetapLebih18"/></th>
                                    <th><input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTetapCpubl"
                                               value="{{$data->jml_cpubl_tetap_wni_laki_lebih_dari_18}}"
                                               id="wniCpublLakiTetapLebih18"/></th>
                                    <th><input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTidakTetapCpuh"
                                               value="{{$data->jml_cpuh_tidaktetap_wni_laki_lebih_dari_18}}"
                                               id="wniCpuhLakiTidakTetapLebih18"/></th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTidakTetapCpubr"
                                               value="{{$data->jml_cpubr_tidaktetap_wni_laki_lebih_dari_18}}"
                                               id="wniCpubrLakiTidakTetapLebih18"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTidakTetapCpubl"
                                               value="{{$data->jml_cpubl_tidaktetap_wni_laki_lebih_dari_18}}"
                                               id="wniCpublLakiTidakTetapLebih18"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" readonly id="jmlWniLakiLebih18"
                                               value="{{$data->jml_wni_laki_lebih_dari_18}}"/>
                                    </th>
                                </tr>
                                <tr>
                                    <th> >= 15 th s/d < 18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTetapCpuh"
                                               id="wniCpuhLakiTetapKurang18"
                                               value="{{$data->jml_cpuh_tetap_wni_laki_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTetapCpubr"
                                               id="wniCpubrLakiTetapKurang18"
                                               value="{{$data->jml_cpubr_tetap_wni_laki_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTetapCpubl"
                                               id="wniCpublLakiTetapKurang18"
                                               value="{{$data->jml_cpubl_tetap_wni_laki_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhLakiTidakTetapKurang18"
                                               value="{{$data->jml_cpuh_tidaktetap_wni_laki_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrLakiTidakTetapKurang18"
                                               value="{{$data->jml_cpubr_tidaktetap_wni_laki_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublLakiTidakTetapKurang18"
                                               value="{{$data->jml_cpubl_tidaktetap_wni_laki_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniLakiKurang18" value="{{$data->jml_wni_laki_kurang_dari_18}}"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>< 15 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTetapCpuh"
                                               id="wniCpuhLakiTetapKurangDari15"
                                               value="{{$data->jml_cpuh_tetap_wni_laki_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTetapCpubr"
                                               id="wniCpubrLakiTetapKurangDari15"
                                               value="{{$data->jml_cpubr_tetap_wni_laki_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTetapCpubl"
                                               id="wniCpublLakiTetapKurangDari15"
                                               value="{{$data->jml_cpubl_tetap_wni_laki_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhLakiTidakTetapKurangDari15"
                                               value="{{$data->jml_cpuh_tidaktetap_wni_laki_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrLakiTidakTetapKurangDari15"
                                               value="{{$data->jml_cpubr_tidaktetap_wni_laki_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublLakiTidakTetapKurangDari15"
                                               value="{{$data->jml_cpubl_tidaktetap_wni_laki_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniLakiKurangDari15" value="{{$data->jml_wni_laki_kurang_dari_15}}"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th rowspan="3">Wanita</th>
                                    <th> >= 18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTetapCpuh"
                                               id="wniCpuhWanitaTetapLebih18"
                                               value="{{$data->jml_cpuh_tetap_wni_wanita_lebih_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTetapCpubr"
                                               id="wniCpubrWanitaTetapLebih18"
                                               value="{{$data->jml_cpubr_tetap_wni_wanita_lebih_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTetapCpubl"
                                               id="wniCpublWanitaTetapLebih18"
                                               value="{{$data->jml_cpubl_tetap_wni_wanita_lebih_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhWanitaTidakTetapLebih18"
                                               value="{{$data->jml_cpuh_tidaktetap_wni_wanita_lebih_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrWanitaTidakTetapLebih18"
                                               value="{{$data->jml_cpubr_tidaktetap_wni_wanita_lebih_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublWanitaTidakTetapLebih18"
                                               value="{{$data->jml_cpubl_tidaktetap_wni_wanita_lebih_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniWanitaLebih18" value="{{$data->jml_wni_wanita_lebih_dari_18}}"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>>= 15 th s/d <18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTetapCpuh"
                                               id="wniCpuhWanitaTetapKurang18"
                                               value="{{$data->jml_cpuh_tetap_wni_wanita_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTetapCpubr"
                                               id="wniCpubrWanitaTetapKurang18"
                                               value="{{$data->jml_cpubr_tetap_wni_wanita_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTetapCpubl"
                                               id="wniCpublWanitaTetapKurang18"
                                               value="{{$data->jml_cpubl_tetap_wni_wanita_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhWanitaTidakTetapKurang18"
                                               value="{{$data->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrWanitaTidakTetapKurang18"
                                               value="{{$data->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublWanitaTidakTetapKurang18"
                                               value="{{$data->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_18}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja"
                                               id="jmlWniWanitaKurang18" value="{{$data->jml_wni_wanita_kurang_dari_18}}" readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>< 15 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTetapCpuh"
                                               id="wniCpuhWanitaTetapKurangDari15"
                                               value="{{$data->jml_cpuh_tetap_wni_wanita_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTetapCpubr"
                                               id="wniCpubrWanitaTetapKurangDari15"
                                               value="{{$data->jml_cpubr_tetap_wni_wanita_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTetapCpubl"
                                               id="wniCpublWanitaTetapKurangDari15"
                                               value="{{$data->jml_cpubl_tetap_wni_wanita_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhWanitaTidakTetapLebih1"
                                               value="{{$data->jml_cpuh_tidaktetap_wni_wanita_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrWanitaTidakTetapKurangDari15"
                                               value="{{$data->jml_cpubr_tidaktetap_wni_wanita_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublWanitaTidakTetapKurangDari15"
                                               value="{{$data->jml_cpubl_tidaktetap_wni_wanita_kurang_dari_15}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniWanitaKurangDari15" value="{{$data->jml_wni_wanita_kurang_dari_15}}"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th rowspan="2">WNA</th>
                                    <th colspan="2">Laki-laki</th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTetapCpuh" id="wnaCpuhLakiTetap"
                                               value="{{$data->jml_cpuh_tetap_wna_laki}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTetapCpubr" id="wnaCpubrLakiTetap"
                                               value="{{$data->jml_cpubr_tetap_wna_laki}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTetapCpubl" id="wnaCpublLakiTetap"
                                               value="{{$data->jml_cpubl_tetap_wna_laki}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTidakTetapCpuh" id="wnaCpuhLakiTidakTetap"
                                               value="{{$data->jml_cpuh_tidaktetap_wna_laki}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTidakTetapCpubr" id="wnaCpubrLakiTidakTetap"
                                               value="{{$data->jml_cpubr_tidaktetap_wna_laki}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTidakTetapCpubl" id="wnaCpublLakiTidakTetap"
                                               value="{{$data->jml_cpubl_tidaktetap_wna_laki}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWnaLaki" value="{{$data->jml_wna_laki}}" readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">Wanita</th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTetapCpuh" id="wnaCpuhWanitaTetap"
                                               value="{{$data->jml_cpuh_tetap_wna_wanita}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTetapCpubr" id="wnaCpubrWanitaTetap"
                                               value="{{$data->jml_cpubr_tetap_wna_wanita}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTetapCpubl" id="wnaCpublWanitaTetap"
                                               value="{{$data->jml_cpubl_tetap_wna_wanita}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTidakTetapCpuh"
                                               id="wnaCpuhWanitaTidakTetap" value="{{$data->jml_cpuh_tidaktetap_wna_wanita}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTidakTetapCpubr"
                                               id="wnaCpubrWanitaTidakTetap" value="{{$data->jml_cpubr_tidaktetap_wna_wanita}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTidakTetapCpubl"
                                               id="wnaCpublWanitaTidakTetap" value="{{$data->jml_cpubl_tidaktetap_wna_wanita}}"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWnaWanita" value="{{$data->jml_wna_wanita}}" readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="3">Jumlah</td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTetapCpuh" value="{{$data->jml_tenaga_kerja_tetap_cpuh}}" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTetapCpubr" value="{{$data->jml_tenaga_kerja_tetap_cpubr}}" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTetapCpubl" value="{{$data->jml_tenaga_kerja_tetap_cpubl}}" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTidakTetapCpuh" value="{{$data->jml_tenaga_kerja_tidak_tetap_cpuh}}" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTidakTetapCpubr" value="{{$data->jml_tenaga_kerja_tidak_tetap_cpubr}}" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTidakTetapCpubl" value="{{$data->jml_tenaga_kerja_tidak_tetap_cpubl}}" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="totalTenagaKerja" value="{{$data->total_pekerja}}" class="form-control" readonly/>
                                    </td>
                                    <input type="hidden" id="id" value="{{$data->id}}"/>
                                </tr>
                                <tr>
                                    <th colspan="10">
                                        <p>CPUH : Cara Pembayaran Upah Harian</p>
                                        <p>CPUBR : Cara Pembayaran Upah Borongan</p>
                                        <p>CPUBL : Cara Pembayaran Upah Bulanan</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="10">
                                        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        @else
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th rowspan="3" colspan="2">Tenaga Kerja</th>
                                    <th rowspan="3">Kelompok Umur</th>
                                    <th colspan="6">Hubungan Kerja</th>
                                    <th rowspan="3">Jumlah</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Tetap</th>
                                    <th colspan="3">Tideak Tetap</th>
                                </tr>
                                <tr>
                                    <th>CPUH</th>
                                    <th>CPUBR</th>
                                    <th>CPUBL</th>
                                    <th>CPUH</th>
                                    <th>CPUBR</th>
                                    <th>CPUBL</th>
                                </tr>
                                <tr>
                                    <th rowspan="6">WNI</th>
                                    <th rowspan="3">Laki-laki</th>
                                    <th> >= 18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTetapCpuh"
                                               value="0"
                                               id="wniCpuhLakiTetapLebih18"/>
                                    </th>
                                    <th><input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTetapCpubr"
                                               value="0"
                                               id="wniCpubrLakiTetapLebih18"/></th>
                                    <th><input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTetapCpubl"
                                               value="0"
                                               id="wniCpublLakiTetapLebih18"/></th>
                                    <th><input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTidakTetapCpuh"
                                               value="0"
                                               id="wniCpuhLakiTidakTetapLebih18"/></th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTidakTetapCpubr"
                                               value="0"
                                               id="wniCpubrLakiTidakTetapLebih18"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiLebihDari18 jmlTenagaTidakTetapCpubl"
                                               value="0"
                                               id="wniCpublLakiTidakTetapLebih18"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" readonly id="jmlWniLakiLebih18"
                                               value="0"/>
                                    </th>
                                </tr>
                                <tr>
                                    <th> >= 15 th s/d < 18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTetapCpuh"
                                               id="wniCpuhLakiTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTetapCpubr"
                                               id="wniCpubrLakiTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTetapCpubl"
                                               id="wniCpublLakiTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhLakiTidakTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrLakiTidakTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari18 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublLakiTidakTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniLakiKurang18" value="0"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>< 15 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTetapCpuh"
                                               id="wniCpuhLakiTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTetapCpubr"
                                               id="wniCpubrLakiTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTetapCpubl"
                                               id="wniCpublLakiTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhLakiTidakTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrLakiTidakTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniLakiKurangDari15 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublLakiTidakTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniLakiKurangDari15" value="0"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th rowspan="3">Wanita</th>
                                    <th> >= 18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTetapCpuh"
                                               id="wniCpuhWanitaTetapLebih18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTetapCpubr"
                                               id="wniCpubrWanitaTetapLebih18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTetapCpubl"
                                               id="wniCpublWanitaTetapLebih18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhWanitaTidakTetapLebih18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrWanitaTidakTetapLebih18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaLebihDari18 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublWanitaTidakTetapLebih18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniWanitaLebih18" value="0"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>>= 15 th s/d <18 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTetapCpuh"
                                               id="wniCpuhWanitaTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTetapCpubr"
                                               id="wniCpubrWanitaTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTetapCpubl"
                                               id="wniCpublWanitaTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhWanitaTidakTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrWanitaTidakTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari18 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublWanitaTidakTetapKurang18"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja"
                                               id="jmlWniWanitaKurang18" value="0" readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th>< 15 th</th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTetapCpuh"
                                               id="wniCpuhWanitaTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTetapCpubr"
                                               id="wniCpubrWanitaTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTetapCpubl"
                                               id="wniCpublWanitaTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTidakTetapCpuh"
                                               id="wniCpuhWanitaTidakTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTidakTetapCpubr"
                                               id="wniCpubrWanitaTidakTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWniWanitaKurangDari15 jmlTenagaTidakTetapCpubl"
                                               id="wniCpublWanitaTidakTetapKurangDari15"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWniWanitaKurangDari15" value="0"
                                               readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th rowspan="2">WNA</th>
                                    <th colspan="2">Laki-laki</th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTetapCpuh" id="wnaCpuhLakiTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTetapCpubr" id="wnaCpubrLakiTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTetapCpubl" id="wnaCpublLakiTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTidakTetapCpuh" id="wnaCpuhLakiTidakTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTidakTetapCpubr" id="wnaCpubrLakiTidakTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaLaki jmlTenagaTidakTetapCpubl" id="wnaCpublLakiTidakTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWnaLaki" value="0" readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="2">Wanita</th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTetapCpuh" id="wnaCpuhWanitaTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTetapCpubr" id="wnaCpubrWanitaTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTetapCpubl" id="wnaCpublWanitaTetap"
                                               value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTidakTetapCpuh"
                                               id="wnaCpuhWanitaTidakTetap" value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTidakTetapCpubr"
                                               id="wnaCpubrWanitaTidakTetap" value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlWnaWanita jmlTenagaTidakTetapCpubl"
                                               id="wnaCpublWanitaTidakTetap" value="0"/>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control jmlTenagaKerja" id="jmlWnaWanita" value="0" readonly/>
                                    </th>
                                </tr>
                                <tr>
                                    <td colspan="3">Jumlah</td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTetapCpuh" value="0" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTetapCpubr" value="0" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTetapCpubl" value="0" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTidakTetapCpuh" value="0" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTidakTetapCpubr" value="0" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="jmlTenagaKerjaTidakTetapCpubl" value="0" class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" id="totalTenagaKerja" value="0" class="form-control" readonly/>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="10">
                                        <p>CPUH : Cara Pembayaran Upah Harian</p>
                                        <p>CPUBR : Cara Pembayaran Upah Borongan</p>
                                        <p>CPUBL : Cara Pembayaran Upah Bulanan</p>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="10">
                                        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan
                                        </button>
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).ready(function () {
            $('.jmlWniLakiLebihDari18').keyup(function () {
                var sum = 0;

                $(".jmlWniLakiLebihDari18").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWniLakiLebih18').val(sum);

                calc();
            });

            $('.jmlWniLakiKurangDari18').keyup(function () {
                var sum = 0;
                $(".jmlWniLakiKurangDari18").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWniLakiKurang18').val(sum);

                calc();
            });

            $('.jmlWniLakiKurangDari15').keyup(function () {
                var sum = 0;
                $(".jmlWniLakiKurangDari15").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWniLakiKurangDari15').val(sum);

                calc();
            });

            $('.jmlWniWanitaLebihDari18').keyup(function(){
                var sum = 0;
                $(".jmlWniWanitaLebihDari18").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWniWanitaLebih18').val(sum);

                calc();
            });

            $('.jmlWniWanitaKurangDari18').keyup(function () {
                var sum = 0;
                $(".jmlWniWanitaKurangDari18").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWniWanitaKurang18').val(sum);

                calc();
            });

            $('.jmlWniWanitaKurangDari15').keyup(function () {
                var sum = 0;
                $(".jmlWniWanitaKurangDari15").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWniWanitaKurangDari15').val(sum);

                calc();
            });

            $('.jmlWnaLaki').keyup(function () {
                var sum = 0;
                $(".jmlWnaLaki").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWnaLaki').val(sum);

                calc();
            });

            $('.jmlWnaWanita').keyup(function () {
                var sum = 0;
                $(".jmlWnaWanita").each(function () {
                    sum += +$(this).val();
                });
                $('#jmlWnaWanita').val(sum);

                calc();
            });

            $('#frmUmum').submit(function (e) {
                e.preventDefault();
                runWaitMe('body','roundBounce','Menyimpan...');

                $.ajax({
                    url:"{{route('postUmum')}}",
                    method:"POST",
                    data:{
                        id:$('#id').val(),
                        jmlCpuhTetapWniLakiLebih18:$('#wniCpuhLakiTetapLebih18').val(),
                        jmlCpubrTetapWniLakiLebih18:$('#wniCpubrLakiTetapLebih18').val(),
                        jmlCpublTetapWniLakiLebih18:$('#wniCpublLakiTetapLebih18').val(),
                        jmlCpuhTetapWniLakiKurang18:$('#wniCpuhLakiTetapKurang18').val(),
                        jmlCpubrTetapWniLakiKurang18:$('#wniCpubrLakiTetapKurang18').val(),
                        jmlCpublTetapWniLakiKurang18:$('#wniCpublLakiTetapKurang18').val(),
                        jmlCpuhTetapWniLakiKurang15:$('#wniCpuhLakiTetapKurangDari15').val(),
                        jmlCpubrTetapWniLakiKurang15:$('#wniCpubrLakiTetapKurangDari15').val(),
                        jmlCpublTetapWniLakiKurang15:$('#wniCpublLakiTetapKurangDari15').val(),
                        jmlCpuhTetapWniWanitaLebih18:$('#wniCpuhWanitaTetapLebih18').val(),
                        jmlCpubrTetapWniWanitaLebih18:$('#wniCpubrWanitaTetapLebih18').val(),
                        jmlCpublTetapWniWanitaLebih18:$('#wniCpublWanitaTetapLebih18').val(),
                        jmlCpuhTetapWniWanitaKurang18:$('#wniCpuhWanitaTetapKurang18').val(),
                        jmlCpubrTetapWniWanitaKurang18:$('#wniCpubrWanitaTetapKurang18').val(),
                        jmlCpublTetapWniWanitaKurang18:$('#wniCpublWanitaTetapKurang18').val(),
                        jmlCpuhTetapWniWanitaKurang15:$('#wniCpuhWanitaTetapKurangDari15').val(),
                        jmlCpubrTetapWniWanitaKurang15:$('#wniCpubrWanitaTetapKurangDari15').val(),
                        jmlCpublTetapWniWanitaKurang15:$('#wniCpublWanitaTetapKurangDari15').val(),
                        jmlCpuhTidakTetapWniLakiLebih18:$('#wniCpuhLakiTidakTetapLebih18').val(),
                        jmlCpubrTidakTetapWniLakiLebih18:$('#wniCpubrLakiTidakTetapLebih18').val(),
                        jmlCpublTidakTetapWniLakiLebih18:$('#wniCpublLakiTidakTetapLebih18').val(),
                        jmlCpuhTidakTetapWniLakiKurang18:$('#wniCpuhLakiTidakTetapKurang18').val(),
                        jmlCpubrTidakTetapWniLakiKurang18:$('#wniCpubrLakiTidakTetapKurang18').val(),
                        jmlCpublTidakTetapWniLakiKurang18:$('#wniCpublLakiTidakTetapKurang18').val(),
                        jmlCpuhTidakTetapWniLakiKurang15:$('#wniCpuhLakiTidakTetapKurangDari15').val(),
                        jmlCpubrTidakTetapWniLakiKurang15:$('#wniCpubrLakiTidakTetapKurangDari15').val(),
                        jmlCpublTidakTetapWniLakiKurang15:$('#wniCpublLakiTidakTetapKurangDari15').val(),
                        jmlCpuhTidakTetapWniWanitaLebih18:$('#wniCpuhWanitaTidakTetapLebih18').val(),
                        jmlCpubrTidakTetapWniWanitaLebih18:$('#wniCpubrWanitaTidakTetapLebih18').val(),
                        jmlCpublTidakTetapWniWanitaLebih18:$('#wniCpublWanitaTidakTetapLebih18').val(),
                        jmlCpuhTidakTetapWniWanitaKurang18:$('#wniCpuhWanitaTidakTetapKurang18').val(),
                        jmlCpubrTidakTetapWniWanitaKurang18:$('#wniCpubrWanitaTidakTetapKurang18').val(),
                        jmlCpublTidakTetapWniWanitaKurang18:$('#wniCpublWanitaTidakTetapKurang18').val(),
                        jmlCpuhTidakTetapWniWanitaKurang15:$('#wniCpuhWanitaTidakTetapKurangDari15').val(),
                        jmlCpubrTidakTetapWniWanitaKurang15:$('#wniCpubrWanitaTidakTetapKurangDari15').val(),
                        jmlCpublTidakTetapWniWanitaKurang15:$('#wniCpublWanitaTidakTetapKurangDari15').val(),
                        jmlCpuhTetapWnaLaki:$('#wnaCpuhLakiTetap').val(),
                        jmlCpubrTetapWnaLaki:$('#wnaCpubrLakiTetap').val(),
                        jmlCpublTetapWnaLaki:$('#wnaCpublLakiTetap').val(),
                        jmlCpuhTidakTetapWnaLaki:$('#wnaCpuhLakiTidakTetap').val(),
                        jmlCpubrTidakTetapWnaLaki:$('#wnaCpubrLakiTidakTetap').val(),
                        jmlCpublTidakTetapWnaLaki:$('#wnaCpublLakiTidakTetap').val(),
                        jmlCpuhTetapWnaWanita:$('#wnaCpuhWanitaTetap').val(),
                        jmlCpubrTetapWnaWanita:$('#wnaCpubrWanitaTetap').val(),
                        jmlCpublTetapWnaWanita:$('#wnaCpublWanitaTetap').val(),
                        jmlCpuhTidakTetapWanita:$('#wnaCpuhWanitaTidakTetap').val(),
                        jmlCpubrTidakTetapWanita:$('#wnaCpubrWanitaTidakTetap').val(),
                        jmlCpublTidakTetapWanita:$('#wnaCpublWanitaTidakTetap').val(),
                        jmlTenagaKerjaTetapCpuh:$('#jmlTenagaKerjaTetapCpuh').val(),
                        jmlTenagaKerjaTetapCpubr:$('#jmlTenagaKerjaTetapCpubr').val(),
                        jmlTenagaKerjaTetapCpubl:$('#jmlTenagaKerjaTetapCpubl').val(),
                        jmlTenagaKerjaTidakTetapCpuh:$('#jmlTenagaKerjaTidakTetapCpuh').val(),
                        jmlTenagaKerjaTidakTetapCpubr:$('#jmlTenagaKerjaTidakTetapCpubr').val(),
                        jmlTenagaKerjaTidakTetapCpubl:$('#jmlTenagaKerjaTidakTetapCpubl').val(),
                        jmlWniLakiLebihDari18:$('#jmlWniLakiLebih18').val(),
                        jmlWniLakiKurangDari18:$('#jmlWniLakiKurang18').val(),
                        jmlWniLakiKurangDari15:$('#jmlWniLakiKurangDari15').val(),
                        jmlWniWanitaLebihDari18:$('#jmlWniWanitaLebih18').val(),
                        jmlWniWanitaKurangDari18:$('#jmlWniWanitaKurang18').val(),
                        jmlWniWanitaKurangDari15:$('#jmlWniWanitaKurangDari15').val(),
                        jmlWnaLaki:$('#jmlWnaLaki').val(),
                        jmlWnaWanita:$('#jmlWnaWanita').val(),
                        totalPegawai:$('#totalTenagaKerja').val(),
                        laporId:$('#laporId').val()
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            $('body').waitMe('hide');
                            notificationMessage('Berhasil', 'success');
                            setTimeout(function () {
                                window.location = "{{route('indexLapor')}}";
                            }, 2000);
                        } else {
                            $('body').waitMe('hide');
                            var errorMessagesCount = s.message.length;
                            for (var i = 0; i < errorMessagesCount; i++) {
                                notificationMessage(s.message[i], 'error');
                            }
                        }
                    }
                });
            })
        });

        function calc(){
            var totalTenagaKerja = 0;
            var jmlTenagaTetapCpuh = 0;
            var jmlTenagaTetapCpubr = 0;
            var jmlTenagaTetapCpubl = 0;
            var jmlTenagaTidakTetapCpuh = 0;
            var jmlTenagaTidakTetapCpubr = 0;
            var jmlTenagaTidakTetapCpubl = 0;

            $('.jmlTenagaTetapCpuh').each(function () {
                jmlTenagaTetapCpuh += +$(this).val();
            });

            $('.jmlTenagaTetapCpubr').each(function () {
                jmlTenagaTetapCpubr += +$(this).val();
            });

            $('.jmlTenagaTetapCpubl').each(function () {
                jmlTenagaTetapCpubl += +$(this).val();
            });

            $('.jmlTenagaTidakTetapCpuh').each(function () {
                jmlTenagaTidakTetapCpuh += +$(this).val();
            });

            $('.jmlTenagaTidakTetapCpubr').each(function () {
                jmlTenagaTidakTetapCpubr += +$(this).val();
            });

            $('.jmlTenagaTidakTetapCpubl').each(function () {
                jmlTenagaTidakTetapCpubl += +$(this).val();
            });

            $('.jmlTenagaKerja').each(function () {
                totalTenagaKerja += +$(this).val();
            });

            $('#jmlTenagaKerjaTetapCpuh').val(jmlTenagaTetapCpuh);
            $('#jmlTenagaKerjaTetapCpubr').val(jmlTenagaTetapCpubr);
            $('#jmlTenagaKerjaTetapCpubl').val(jmlTenagaTetapCpubl);
            $('#jmlTenagaKerjaTidakTetapCpuh').val(jmlTenagaTidakTetapCpuh);
            $('#jmlTenagaKerjaTidakTetapCpubr').val(jmlTenagaTidakTetapCpubr);
            $('#jmlTenagaKerjaTidakTetapCpubl').val(jmlTenagaTidakTetapCpubl);
            $('#totalTenagaKerja').val(totalTenagaKerja);
        }
    </script>
@stop

