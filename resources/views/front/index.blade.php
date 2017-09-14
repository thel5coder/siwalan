@extends('auth')
@section('content')
    <div class="tabbable panel login-form width-1024">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#basic-tab1" data-toggle="tab"><h6 class="text-semibold">Data Perusahaan</h6>
                </a></li>
        </ul>
        <div class="tab-content panel-body">
            <div class="tab-pane fade in active" id="basic-tab1">
                <div class="text-center">
                    <img src="{{url('public/img/lambangjatim.jpg')}}"/>
                    <table align="center" width="100%">
                        <tr>
                            <td style="font-size: 200%"><strong>Sistem Informasi Wajib Lapor Perusahaan</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 170%;">Pemerintah Provinsi Jawa Timur</td>
                        </tr>
                        <tr>
                            <td style="font-size: 170%">Departemen Ketenagakerjaan dan Transmigrasi</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="panel panel-default panel-flat">
                        <div class="panel-body">
                            <form class="form-inline">
                                <div class="form-group">
                                    <select class="form-control" id="kabupaten" name="kabupaten">
                                        <option value="">PILIH KABUPATEN</option>
                                        @foreach($dataKabupaten as $kabupaten)
                                            <option value="{{$kabupaten->id}}">{{$kabupaten->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                        <option value="">PILIH KECAMATAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="korwil" name="korwil" readonly>
                                    <input type="hidden" id="korwilId"/>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="icon-search4"></i> CARI</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblPerusahaan">
                            <thead>
                            <tr>
                                <th data-column-id="email">Email Perusahaan</th>
                                <th data-column-id="nama">Nama Perusahaan</th>
                                <th data-column-id="nama_kabupaten">Kabupaten</th>
                                <th data-column-id="nama_kecamatan">Kecamatan</th>
                                <th data-column-id="no_telepon">No Telepon</th>
                                <th data-column-id="alamat_perusahaan">Alamat</th>
                                <th data-column-id="nama_korwil">Korwil</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <form>
                        <a href="{{route('userAuth')}}" class="btn bg-indigo-400 btn-block">Login Ke Dashboard<i class="icon-circle-right2 position-right"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).ready(function () {
            $('#kabupaten').select2();
            paginationTable();
        });

        function paginationTable() {
            var grid = $('#tblPerusahaan').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{route('paginationFront')}}",
                formatters: {
                }
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop