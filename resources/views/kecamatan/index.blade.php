@extends('app')
@section('title','Master Data Kecamatan')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">Master Data Kecamatan</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master Data Kecamatan</li>
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
                    <h5 class="panel-title">Master Data Kecamatan</h5>
                    <div class="heading-elements">
                        <select id="kabupaten" name="kabupaten">
                            <option value="">--Pilih Kabupaten--</option>
                            @foreach($dataKabupaten as $kabupaten)
                                <option value="{{$kabupaten->id}}">{{$kabupaten->nama_kabupaten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblKecamatan">
                            <thead>
                            <tr>
                                <th data-column-id="nama_kabupaten">Nama Kabupaten</th>
                                <th data-column-id="nama_kecamatan">Nama Kecamatan</th>
                            </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('customscript')
    <script>
        $(document).ready(function () {
            paginationTable();

            $('#kabupaten').select2();

            $('#kabupaten').change(function () {
                $('#tblKecamatan').bootgrid('reload');
            });

        });
        function paginationTable() {
            var grid = $('#tblKecamatan').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}",
                        kabupatenId:$('#kabupaten').val()
                    };
                },
                url: "{{route('paginationKecamatan')}}",
                formatters: {}
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop

