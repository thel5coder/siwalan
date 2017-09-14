<div class="nav-tabs-horizontal">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#ctkiAkanBerangkat" role="tab">
                <i class="icon-briefcase"></i>
                Rencana CTKI yang akan diberangkatkan 12 bulan mendatang
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#detailCtkiAkanBerangkat" role="tab">
                <i class="icon-make-group"></i>
                Detail rencana CTKI yang akan diberangkatkan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#ctkiTelahBerangkat" role="tab">
                <i class="icon-make-group"></i>
                CTKI yang telah di berangkatkan 12 terakhir
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#detailCtkiTelahBerangkat" role="tab">
                <i class="icon-make-group"></i>
                Detail CTKI yang telah di berangkatkan 12 terakhir
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#rekapPekerja" role="tab">
                <i class="icon-make-group"></i>
                Rekap penerimaan pekerja 12 bulan terkahir dan pekerja berhenti 12 bulan terkahir
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#programPelatihan" role="tab">
                <i class="icon-gear"></i>
                Program Pelatihan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
               data-target="#rencanaLatihan" role="tab">
                <i class="icon-train"></i>
                Rencana Kebutuhan Latihan bagi Pekerja(Di rinci menurut kejuruan)
            </a>
        </li>
    </ul>
    <div class="tab-content padding-vertical-20">
        <input type="hidden" id="laporId" value="{{$laporId}}"/>
        <div class="tab-pane active" id="ctkiAkanBerangkat" role="tabpanel">
            @include('pekerja.formctkiakanberangkat')
        </div>
        <div class="tab-pane" id="detailCtkiAkanBerangkat" role="tabpanel">
            @include('pekerja.formdetailctkiakanberangkat')
        </div>
        <div class="tab-pane" id="ctkiTelahBerangkat" role="tabpanel">
            @include('pekerja.formctkitelahberangkat')
        </div>
        <div class="tab-pane" id="detailCtkiTelahBerangkat" role="tabpanel">
            @include('pekerja.formdetailctkitelahberangkat')
        </div>
        <div class="tab-pane" id="rekapPekerja" role="tabpanel">
            @include('pekerja.formrekappekerja')
        </div>
        <div class="tab-pane" id="programPelatihan" role="tabpanel">
            @include('pekerja.programpelatihan')
        </div>
        <div class="tab-pane" id="rencanaLatihan" role="tabpanel">
            @include('pekerja.rencanalatihan')
        </div>
    </div>
</div>