<div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav">
            <li @if(\Illuminate\Support\Facades\Route::currentRouteName() =='dashboard') class="active" @endif><a href="{{route('dashboard')}}"><i class="icon-home position-left"></i> Dashboard</a></li>
            <li @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'dataPerusahaan') class="active" @endif><a href="{{route('dataPerusahaan')}}"><i class="icon-office"></i> Perusahaan</a></li>
            <li @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'indexLapor') class="active" @endif><a href="{{route('indexLapor')}}"><i class="icon-file-check"></i> Wajib Lapor</a> </li>
        </ul>
    </div>
</div>