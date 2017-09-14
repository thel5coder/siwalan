@extends('app')
@section('title','Perusahaan')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Data Perusahaan {{$dataKorwil->nama_korwil}}</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Perusahaan {{$dataKorwil->nama_korwil}}</li>
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
                    <h5 class="panel-title">Data Perusahaan {{$dataKorwil->nama_korwil}}</h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblPerusahaanPerKorwil">
                            <thead>
                            <tr>
                                <th data-column-id="email">Email Perusahaan</th>
                                <th data-column-id="nama">Nama Perusahaan</th>
                                <th data-column-id="nama_kabupaten">Kabupaten</th>
                                <th data-column-id="nama_kecamatan">Kecamatan</th>
                                <th data-column-id="no_telepon">No Telepon</th>
                                <th data-column-id="nama_korwil">Korwil</th>
                                <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">Aksi
                                </th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
                <input type="hidden" id="korwil" value="{{$dataKorwil->id}}"/>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).ready(function () {
            paginationTable();

        });
        var urlDetail = "{{url('/perusahaan-per-korwil/detail')}}";
        function paginationTable() {
            var grid = $('#tblPerusahaanPerKorwil').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}",
                        korwil: $('#korwil').val()
                    };
                },
                url: "{{route('paginationPerusahaanByKorwil')}}",
                formatters: {
                    "aksi": function (column, row) {
                        return "<a href=\""+urlDetail+"/"+row.id+"\" class=\"btn btn-primary\"><i class=\"fa fa-search-plus\"></i>Detail</a>";
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop

