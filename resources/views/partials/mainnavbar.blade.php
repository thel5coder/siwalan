<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="index.html" class="logo">
            <img src="{{url('public/img/logodepnaker.png')}}" alt="Clean UI Admin Template" />
            <img class="logo-inverse" src="{{url('public/img/logodepnaker.png')}}" alt="Clean UI Admin Template" />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
            <li>
                <a class="left-menu-link" href="dashboards-beta.html">
                    <i class="left-menu-link-icon icmn-home
"><!-- --></i>
                    <span class="menu-top-hidden"></span> Dashboard
                </a>
            </li>
            <li class="left-menu-list-separator"><!-- --></li>
            <li>
                <a class="left-menu-link" href="{{route('dataPerusahaan')}}">
                    <i class="left-menu-link-icon fa fa-building"><!-- --></i>
                    Perusahaan
                </a>
            </li>

            <li>
                <a class="left-menu-link" href="{{route('indexLapor')}}">
                    <i class="left-menu-link-icon icmn-checkmark"><!-- --></i>
                    Register Wajib Lapor
                </a>
            </li>
            <li>
                <a class="left-menu-link" href="{{route('cetakanLaporan',['id'=>8])}}">
                    <i class="left-menu-link-icon icmn-printer"><!-- --></i>
                    Cetak
                </a>
            </li>
            <li>
                <a class="left-menu-link" href="{{route('userLogout')}}">
                    <i class="left-menu-link-icon icmn-printer"><!-- --></i>
                    Log Out
                </a>
            </li>
        </ul>
    </div>
</nav>