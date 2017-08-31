@extends('app')
@section('title','9.BPJS,Program Pensiun')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">9.BPJS,Program Pensiun</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">9.BPJS,Program Pensiun</li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    @include('bpjs.tabkonten')
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    @include('bpjs.customscript')
@stop

