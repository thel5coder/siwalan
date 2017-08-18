<html>
<link rel="stylesheet" type="text/css" href="{{url('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<body>
<div class="row">
    <div class="col-md-3 col-md-offset-1">
        <img src="{{url('public/img/logodepnaker.png')}}" width="200" height="200"/>
    </div>
    <div class="col-md-8 text-center">
        <h2>PEMERINTAH PROVINSI JAWA TIMUR</h2>
        <h1>DINAS TENAGA KERJA DAN TRANSMIGRASI</h1>
        <h6>Jalan Dukuh Menanggal No.124 - 126 Telp. 031 - 8292648;Fax. 031-8294447</h6>
        <h3>SURABAYA (60234)</h3>
    </div>
</div>
<hr style="line-height: 50%">
<div class="row">
    <h4 class="text-center">Bentuk Laporan</h4>
    <p class="text-center">Sebagaimana dimaksud pada Pasal 6 Ayat (2) Undang - Undang 7 Tahun 1981 tentang Wajib Lapor Ketenagakerjaan di Perusahaan</p>
</div>
<div class="row">
    <h5>B.Keadaan Perusahaan</h5>
</div>
<div class="row">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Point</th>
            <th>Isi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1.</td>
            <td>
                Nama Perusahaan
            </td>
            <td>{{$data['nama']}}</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>
                Alamat Perusahaan
            </td>
            <td>
                {{$data['alamat_perusahaan']}}
            </td>
        </tr>
        <tr>
            <td>3.</td>
            <td>No. Telepon</td>
            <td>
                {{$data['no_telepon']}}
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kelurahan</td>
            <td>{{$data['kelurahan']}}</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kabupaten</td>
            <td>{{$data['kabupaten']}}</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Kode Pos</td>
            <td>{{$data['kode_pos']}}</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Jenis Usaha</td>
            <td>{{$data['jenis_usaha']}}</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Produk Akhir</td>
            <td>{{$data['produk_akhir']}}</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Nama dan Alamat Pemilik Perusahaan</td>
            <td>
                <p>{{$data['nama_pemilik']}}</p>
                <p>{{$data['alamat_pemilik']}}</p>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Nama dan Alamat Pengelolah Perusahaan</td>
            <td>
                <p>{{$data['nama_pengelolah']}}</p>
                <p>{{$data['alamat_pengelolah']}}</p>
            </td>
        </tr>
        <tr>
            <td>11</td>
            <td>Pendirian Perusahaan</td>
            <td>

            </td>
        </tr>
        <tr>
            <td>12</td>
            <td>Nomor Akta Pendirian</td>
            <td>{{$data['nomor_akta_pendirian']}}</td>
        </tr>
        <tr>
            <td>13</td>
            <td>Perpindahan Perusahaan</td>
            <td>

            </td>
        </tr>
        <tr>
            <td>14</td>
            <td>Alamat lama</td>
            <td>
                {{$data['alamat_lama']}}
            </td>
        </tr>
        <tr>
            <td>15</td>
            <td>Status Perusahaan</td>
            <td>
                <p>{{$data['status_perusahaan']}}</p>
                <p>Jumlah cabang: Indonesia : {{$data['jumlah_cabang_di_indonesia']}}, di Luar Indonesia : {{$data['jumlah_cabang_luar_indonesia']}}</p>
            </td>
        </tr>
        <tr>
            <td>16</td>
            <td>Status Pemilikan</td>
            <td>
                {{$data['status_pemilikan']}}
            </td>
        </tr>
        <tr>
            <td>17</td>
            <td>Status Permodalan</td>
            <td>{{$data['status_permodalan']}}</td>
        </tr>
        </tbody>
    </table>

</div>
<div class="row">
    <h5>KEADAAN KETENAGAKERJAAN</h5>
</div>
<div class="row">
    <table class="table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th rowspan="3" colspan="2">Tenaga Kerja</th>
            <th rowspan="3">Kelompok Umur</th>
            <th colspan="6">Hubungan Kerja</th>
            <th rowspan="3">Jumlah</th>
        </tr>
        <tr>
            <th colspan="3">Tetap</th>
            <th colspan="3">Tideak Tetap</th>
        </tr>
        <tr>
            <th>CPUH</th>
            <th>CPUBR</th>
            <th>CPUBL</th>
            <th>CPUH</th>
            <th>CPUBR</th>
            <th>CPUBL</th>
        </tr>
        <tr>
            <th rowspan="6">WNI</th>
            <th rowspan="3">Laki-laki</th>
            <th> >= 18 th </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhLakiTetapLebih18"/>
            </th>
            <th><input type="text" class="form-control" id="wniCpubrLakiTetapLebih18"/></th>
            <th><input type="text" class="form-control" id="wniCpublLakiTetapLebih18"/></th>
            <th><input type="text" class="form-control" id="wniCpuhLakiTidakTetapLebih18"/></th>
            <th>
                <input type="text" class="form-control" id="wniCpubrLakiTidakTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublLakiTidakTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" readonly id="jmlWniLakiLebih18"/>
            </th>
        </tr>
        <tr>
            <th> >= 15 th s/d < 18 th </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhLakiTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrLakiTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublLakiTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhLakiTidakTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrLakiTidakTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublLakiTidakTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWniLakiKurang18" readonly/>
            </th>
        </tr>
        <tr>
            <th>>= 15 th</th>
            <th>
                <input type="text" class="form-control" id="wniCpuhLakiTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrLakiTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublLakiTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhLakiTidakTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhLakiTidakTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublLakiTidakTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWniLakiLebih15" readonly/>
            </th>
        </tr>
        <tr>
            <th rowspan="3">Wanita</th>
            <th> >= 18 th </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhWanitaTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrWanitaTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublWanitaTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhWanitaTidakTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrWanitaTidakTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublWanitaTidakTetapLebih18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWniWanitaLebih18" readonly/>
            </th>
        </tr>
        <tr>
            <th>>= 15 th s/d <18 th</th>
            <th>
                <input type="text" class="form-control" id="wniCpuhWanitaTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrWanitaTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublWanitaTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhWanitaTidakTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrWanitaTidakTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublWanitaTidakTetapKurang18"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWniWanitaKurang18" readonly/>
            </th>
        </tr>
        <tr>
            <th>>= 15 th</th>
            <th>
                <input type="text" class="form-control" id="wniCpuhWanitaTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrWanitaTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublWanitaTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpuhWanitaTidakTetapLebih1"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpubrWanitaTidakTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wniCpublWanitaTidakTetapLebih15"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWniWanitaLebih15" readonly/>
            </th>
        </tr>
        <tr>
            <th rowspan="2">WNA</th>
            <th colspan="2">Laki-laki</th>
            <th>
                <input type="text" class="form-control" id="wnaCpuhLakiTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpubrLakiTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpublLakiTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpuhLakiTidakTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpubrLakiTidakTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpublLakiTidakTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWnaLaki" readonly/>
            </th>
        </tr>
        <tr>
            <th colspan="2">Wanita</th>
            <th>
                <input type="text" class="form-control" id="wnaCpuhWanitaTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpubrWanitaTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpublWanitaTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpuhWanitaTidakTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpubrWanitaTidakTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="wnaCpublWanitaTidakTetap"/>
            </th>
            <th>
                <input type="text" class="form-control" id="jmlWnaWanita" readonly/>
            </th>
        </tr>
        <tr>
            <th colspan="10">
                <p>CPUH : Cara Pembayaran Upah Harian</p>
                <p>CPUBR : Cara Pembayaran Upah Borongan</p>
                <p>CPUBL : Cara Pembayaran Upah Bulanan</p>
            </th>
        </tr>
        </thead>
    </table>
</div>
</body>
</html>