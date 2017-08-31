@extends('app')
@section('title','Detail Wajib Lapor')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Perusahaan</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Wajib Lapor</a></li>
                    <li class="active">Detail Wajib Lapor</li>
                </ul>
            </div>
            <div class="heading-elements">
                <a href="#" class="btn border-danger text-danger btn-flat"><i class="fa fa-file-text position-left"></i> Wajib Lapor Baru</a>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-body border-top-primary text-center">
                <button type="button" class="btn btn-info btn-float"><i class="icon-search4"></i> <span>Search</span></button>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>

    </script>
@stop

