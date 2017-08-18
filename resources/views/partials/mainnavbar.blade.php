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
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon fa fa-bar-chart"><!-- --></i>
                    Keadaan Ketenaga Kerjaan
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <a class="left-menu-link" href="{{route('ketenagaKerjaanUmum')}}">
                            Umum
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="#">
                            Alat Perusahaan
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="{{route('ketenagaKerjaanWaktuKerja')}}">
                            Waktu Kerja
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="{{route('ketenagaKerjaanPengupahan')}}">
                            Pengupahan Kerja
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="#">
                            Fasilitas Perusahaan
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="left-menu-link" href="components-mail-templates.html">
                    <i class="left-menu-link-icon icmn-user-check"><!-- --></i>
                    Jaminan Sosial
                </a>
            </li>
            <li class="left-menu-list-submenu">
                <a class="left-menu-link" href="javascript: void(0);">
                    <i class="left-menu-link-icon fa fa-briefcase"><!-- --></i>
                    Rencana Kerja
                </a>
                <ul class="left-menu-list list-unstyled">
                    <li>
                        <a class="left-menu-link" href="ecommerce-dashboard.html">
                            Umum
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-products-catalog.html">
                            Alat Perusahaan
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-product-details.html">
                            Waktu Kerja
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-product-edit.html">
                            Pengupahan Kerja
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-products-list.html">
                            Fasilitas Perusahaan
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-products-list.html">
                            Program Pelatihan
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-products-list.html">
                            Rencana Kerja
                        </a>
                    </li>
                    <li>
                        <a class="left-menu-link" href="ecommerce-products-list.html">
                            Rencana Pelatihan
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="left-menu-link" href="components-mail-templates.html">
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
        </ul>
    </div>
</nav>