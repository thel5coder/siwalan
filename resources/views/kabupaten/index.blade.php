@extends('app')
@section('title','Master Data Kabupaten')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Master Data Kabupaten</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master Data Kabupaten</li>
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
                    <h5 class="panel-title">Master Data Kabupaten</h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblKabupaten">
                            <thead>
                            <tr>
                                <th data-column-id="nama_kabupaten">Nama Kabupaten</th>
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
            var grid = $('#tblKabupaten').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{route('paginationKabupaten')}}",
                formatters: {

                }
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop

