@extends('app')
@section('title','10.Perangkat Hubungan Industrial')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">10.Perangkat Hubungan Industrial</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">10.Perangkat Hubungan Industrial</li>
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
                    @include('perangkathubindustri.tabkonten')
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    @include('perangkathubindustri.customscript')
@stop

