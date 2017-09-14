<div class="row">
    <div class="col-md-12">
        <div class="panel panel-flat border-left-danger">
            <div class="panel-heading">
                <h6 class="panel-title">Selamat Datang {{auth()->user()->nama}}</h6>
            </div>

            <div class="panel-body">
                <table border="0" cellpadding="10" cellspacing="10">
                    <tr>
                        <td>
                            <strong>Alamat Perusahaan</strong>
                        </td>
                        <td>:</td>
                        <td>
                            <strong>{{auth()->user()->alamat_perusahaan}}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Nomor Telepon</strong>
                        </td>
                        <td>:</td>
                        <td>
                            <strong>{{auth()->user()->no_telepon}}</strong>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>Kabupaten</strong>
                        </td>
                        <td>:</td>
                        <td>
                            <strong>@if(isset($dataUser->nama_kabupaten)){{$dataUser->nama_kabupaten}}@endif</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Kecamatan</strong>
                        </td>
                        <td>:</td>
                        <td>
                            <strong>@if(isset($dataUser->nama_kecamatan)){{$dataUser->nama_kecamatan}}@endif</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Korwil</strong>
                        </td>
                        <td>:</td>
                        <td>
                            <strong>@if(isset($dataUser->nama_korwil)){{$dataUser->nama_korwil}}@endif</strong>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="panel bg-blue-400">
            <div class="panel-body">
                <div class="heading-elements">

                </div>

                <h3 class="no-margin">{{$jmlWajibLapor}}</h3>
                Jumlah Wajib Lapor
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel bg-blue-400">
            <div class="panel-body">
                <div class="heading-elements">
                </div>

                <h3 class="no-margin">{{$countWajibLaporModerasi}}</h3>
                Jumlah Wajib Lapor Dalam Tahap Moderasi
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel bg-blue-400">
            <div class="panel-body">
                <div class="heading-elements">
                </div>

                <h3 class="no-margin">{{$countWajibLaporRevisi}}</h3>
                Jumlah Wajib Lapor Dalam Tahap Revisi
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel bg-blue-400">
            <div class="panel-body">
                <div class="heading-elements">
                </div>

                <h3 class="no-margin">{{$countWajibLaporValid}}</h3>
                Jumlah Wajib Lapor Yang Valid
            </div>
        </div>
    </div>
</div>