@extends('app')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-with-borders m-b-0">
                <div class="panel-heading">
                    <h3>Ketenaga Kerjaan - Umum</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table-bordered table-hover table-striped">
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
                                <th> >= 18 th </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhLakiTetapLebih18"/>
                                </th>
                                <th><input type="text" class="form-control" id="wniCpubrLakiTetapLebih18"/></th>
                                <th><input type="text" class="form-control" id="wniCpublLakiTetapLebih18"/></th>
                                <th><input type="text" class="form-control" id="wniCpuhLakiTidakTetapLebih18"/></th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrLakiTidakTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublLakiTidakTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" readonly id="jmlWniLakiLebih18"/>
                                </th>
                            </tr>
                            <tr>
                                <th> >= 15 th s/d < 18 th </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhLakiTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrLakiTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublLakiTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhLakiTidakTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrLakiTidakTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublLakiTidakTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWniLakiKurang18" readonly/>
                                </th>
                            </tr>
                            <tr>
                                <th>>= 15 th</th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhLakiTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrLakiTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublLakiTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhLakiTidakTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhLakiTidakTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublLakiTidakTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWniLakiLebih15" readonly/>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="3">Wanita</th>
                                <th> >= 18 th </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhWanitaTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrWanitaTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublWanitaTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhWanitaTidakTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrWanitaTidakTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublWanitaTidakTetapLebih18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWniWanitaLebih18" readonly/>
                                </th>
                            </tr>
                            <tr>
                                <th>>= 15 th s/d <18 th</th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhWanitaTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrWanitaTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublWanitaTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhWanitaTidakTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrWanitaTidakTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublWanitaTidakTetapKurang18"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWniWanitaKurang18" readonly/>
                                </th>
                            </tr>
                            <tr>
                                <th>>= 15 th</th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhWanitaTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrWanitaTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublWanitaTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpuhWanitaTidakTetapLebih1"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpubrWanitaTidakTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wniCpublWanitaTidakTetapLebih15"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWniWanitaLebih15" readonly/>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="2">WNA</th>
                                <th colspan="2">Laki-laki</th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpuhLakiTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpubrLakiTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpublLakiTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpuhLakiTidakTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpubrLakiTidakTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpublLakiTidakTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWnaLaki" readonly/>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">Wanita</th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpuhWanitaTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpubrWanitaTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpublWanitaTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpuhWanitaTidakTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpubrWanitaTidakTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="wnaCpublWanitaTidakTetap"/>
                                </th>
                                <th>
                                    <input type="text" class="form-control" id="jmlWnaWanita" readonly/>
                                </th>
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
                                    <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

