<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{url('public/img/logopemprovjatim.png')}}" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/placeholder.jpg" alt="">
                    Selamat Datang,
                    <span>{{auth()->user()->nama}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-mail5"></i>Ubah Email</a></li>
                    <li><a href="#"><i class="icon-key"></i> Ubah Password</a></li>
                </ul>
            </li>
            <li><a href="{{route('userLogout')}}"><i class="icon-exit"></i> Keluar</a></li>
        </ul>
    </div>
</div>