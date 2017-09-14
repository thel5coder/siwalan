@extends('app')
@section('title','Welcome')
@section('content')
    @if(auth()->user()->user_level =='perusahaan')
        @include('dashboard.perusahaan')
    @else
        @include('dashboard.dinas')
    @endif
@stop

