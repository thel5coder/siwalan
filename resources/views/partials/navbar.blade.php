<div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i
                        class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
        <ul class="nav navbar-nav">
            @if(auth()->user()->user_level =='perusahaan')
                <li @if(\Illuminate\Support\Facades\Route::currentRouteName() =='dashboard') class="active" @endif><a
                            href="{{route('dashboard')}}"><i class="icon-home position-left"></i> Dashboard</a></li>
                <li @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'dataPerusahaan') class="active" @endif>
                    <a href="{{route('dataPerusahaan')}}"><i class="icon-office"></i> Perusahaan</a></li>
                <li @if(\Illuminate\Support\Facades\Route::currentRouteName() == 'indexLapor') class="active" @endif><a
                            href="{{route('indexLapor')}}"><i class="icon-file-check"></i> Wajib Lapor</a></li>
            @elseif(auth()->user()->user_level =='admin-dinas')
                <li @if(\Illuminate\Support\Facades\Route::currentRouteName() =='dashboard') class="active" @endif><a
                            href="{{route('dashboard')}}"><i class="icon-home position-left"></i> Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-folder position-left"></i> Master Data <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-200">
                        <li><a href="{{route('indexKabupaten')}}"><i class="icon-city"></i> Master Data Kabupaten</a>
                        </li>
                        <li><a href="{{route('indexKecamatan')}}"><i class="icon-city"></i> Master Data Kecamatan</a>
                        </li>
                        <li><a href="{{route('indexMasterKorwil')}}"><i class="icon-section"></i> Master Data Korwil</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="icon-folder3 position-left"></i> User Management <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu width-200">
                        <li><a href="{{url('/users/admin-dinas')}}"><i class="icon-user-check"></i> User Admin Disnaker</a>
                        </li>
                        <li><a href="{{url('/users/pengawas')}}"><i class="icon-user-check"></i> User Pengawas</a></li>
                        <li><a href="{{url('/users/perusahaan')}}"><i class="icon-user-tie"></i> User Perusahaan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('indexRequestUbahEmail')}}">
                        <i class="icon-key"></i>
                        Permintaan Rubah Email</a>
                </li>
            @else
                <li @if(\Illuminate\Support\Facades\Route::currentRouteName() =='dashboard') class="active" @endif><a
                            href="{{route('dashboard')}}"><i class="icon-home position-left"></i> Dashboard</a></li>
                <li><a
                            href="{{route('indexPerusahaanKorwil',['korwil'=>auth()->user()->korwil])}}"><i
                                class="icon-office position-left"></i>Perusahaan</a></li>
                <li><a
                            href="{{route('indexWajibLaporStatus',['status'=>'moderasi'])}}"><i
                                class="icon-briefcase"></i> Wajib Lapor Moderasi</a></li>
                <li><a
                            href="{{route('indexWajibLaporStatus',['status'=>'revisi'])}}"><i
                                class="icon-briefcase"></i> Wajib Lapor Revisi</a></li>
                <li><a
                            href="{{route('indexWajibLaporStatus',['status'=>'valid'])}}"><i class="icon-briefcase"></i>
                        Wajib Lapor Valid</a></li>
            @endif


        </ul>
    </div>
</div>