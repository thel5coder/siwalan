@extends('app')
@section('title','Master Data Korwil')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">Master Data Korwil</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master Data Korwil</li>
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
                    <h5 class="panel-title">Master Data Korwil</h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblMasterKowil">
                            <thead>
                            <tr>
                                <th data-column-id="nama_korwil">Nama Korwil</th>
                                <th data-column-id="nama_kabupaten" data-formatter="kabupatenKota" data-sortable="false">Kabupaten/Kota</th>
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

        });
        function paginationTable() {
            var grid = $('#tblMasterKowil').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{route('paginationMasterKorwil')}}",
                formatters: {}
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop

