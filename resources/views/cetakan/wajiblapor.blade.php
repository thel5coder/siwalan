<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/bootstrap.css')}}">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <th width="13%" scope="col">
            <img src="{{asset('public/img/logopemprovjatim.png')}}" height="168"/>
        </th>
        <th width="87%" scope="col" class="text-center"><p style="font-size: 40px;">PEMERINTAH PROVINSI JAWA TIMUR</p>
            <p style="font-size: 30px">DINAS TENAGA KERJA DAN TRANSMIGRASI</p>
            <p style="font-size:20px">Jalan Dukuh Menanggal No. 124 - 126 Telp. 031-8292648;Fax. 031-8294447</p>
            <p style="font-size: 30px;">SURABAYA (60234)</p></th>
    </tr>
    </tbody>
</table>
<hr>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <th scope="col" class="text-center">BENTUK LAPORAN</th>
    </tr>
    <tr>
        <th scope="col" class="text-center">Sebagaimana dimaksud pada Pasal 6 ayat(2) Undang - Undang 7 Tahun 1981</th>
    </tr>
    <tr>
        <th scope="col" class="text-center">tentang</th>
    </tr>
    <tr>
        <th scope="col" class="text-center"><p>Wajib Lapor Ketenagakerjaan di Perusahaan</p></th>
    </tr>
    </tbody>
</table>
<h5>A. KODEFIKIASI</h5>
<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#00000">
    <tbody>
    <tr>
        <th height="35" scope="col">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <th align="left" scope="col">1. Kode Wilayah:</th>
                    <th align="left" scope="col">2. No Pendaftaran:</th>
                    <th align="left" scope="col">3. Tahun:</th>
                    <th align="left" scope="col">4. Kode KBLI:</th>
                    <th align="left" scope="col">5. Laporan yang ke:</th>
                </tr>
                <tr>
                    <td align="center">{{$perusahaan->kode_pos}}{{$perusahaan->kode_korwil}}</td>
                    <td align="center">{{$lapor->id}}</td>
                    <td align="center">{{$lapor->tahun}}</td>
                    <td align="center">{{$perusahaan->jenis_usaha_id}}</td>
                    <td align="center">{{$lapor->laporan_ke}}</td>
                </tr>
                <tr>
                    <td align="left"><p>Kode Terakhir: </p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <th align="left" scope="col">01 = Korwil I</th>
                            </tr>
                            <tr>
                                <td align="left">02 = Korwil II</td>
                            </tr>
                            <tr>
                                <td align="left">03 = Korwil III</td>
                            </tr>
                            <tr>
                                <td align="left">04 = Korwil IV</td>
                            </tr>
                            <tr>
                                <td align="left">05 = Korwil V</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </th>
    </tr>
    </tbody>
</table>
<h5>B. Keadaan Perusahaan</h5>
<table width="100%" border="1" bordercolor="#00000" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <td width="3%" scope="col"><strong>1.</strong></td>
        <td width="97%" scope="col">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="27%" align="left" scope="col"><strong>a. Nama Perusahaan</strong></td>
                    <td width="3%" align="center" scope="col"><strong>:</strong></td>
                    <td width="70%" align="left" scope="col"><strong>{{$perusahaan->nama}}</strong></td>
                </tr>
                <tr>
                    <td align="left"><strong>b. Alamat Perusahaan</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td align="left"><strong>{{$perusahaan->alamat_perusahaan}}</strong></td>
                </tr>
                <tr>
                    <td align="left"><strong>No. Telp/Fax</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td align="left"><strong>{{$perusahaan->no_telepon}}</strong></td>
                </tr>
                <tr>
                    <td align="left"><strong>Kelurahan/Kecamatan</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td align="left"><strong>{{$perusahaan->nama_kecamatan}}</strong></td>
                </tr>
                <tr>
                    <td align="left"><strong>Kabuptan/Kota</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td align="left"><strong>{{$perusahaan->nama_kabupaten}}</strong></td>
                </tr>
                <tr>
                    <td align="left"><strong>Kode Pos</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td align="left"><strong>{{$perusahaan->kode_pos}}</strong></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><strong>2</strong></td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="27%" scope="col"><strong>a. Jenis Usaha</strong></td>
                    <td width="3%" align="center" scope="col"><strong>:</strong></td>
                    <td width="70%" scope="col"><strong>&nbsp;
                            {{$perusahaan->nama_jenis_usaha}}</strong></td>
                </tr>
                <tr>
                    <td><strong>b. Produk Akhir</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td><strong>{{$perusahaan->produk_akhir}}</strong></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><strong>3.</strong></td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="27%" scope="col"><strong>a. Nama dan Alamat Pemilik Perusahaan</strong></td>
                    <td width="3%" align="center" scope="col"><strong>:</strong></td>
                    <td width="70%" scope="col"><strong></strong></td>
                </tr>
                <tr>
                    <td><strong>b. Nama dan Alamat Pengurus Perusahaan</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td><strong>{{$perusahaan->nama_pengelolah}} alamat : {{$perusahaan->alamat_pengelolah}}</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><strong>4.</strong></td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="27%"><strong>a. Pendirian Perusahaan</strong></td>
                    <td width="3%" align="center"><strong>:</strong></td>
                    <td width="70%"><strong>{{date('d-m-Y',strtotime($perusahaan->tanggal_pendirian))}}</strong></td>
                </tr>
                <tr>
                    <td><strong>b. Nomor Akta Pendirian</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td><strong>{{$perusahaan->nomor_akta_pendirian}}</strong></td>
                </tr>
                <tr>
                    <td><strong>c. Perpindahan Perusahaan</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td><strong>{{date('d-m-Y',strtotime($perusahaan->tgl_perpindahan_perusahaan))}}</strong></td>
                </tr>
                <tr>
                    <td><strong>d. Alamat Lama</strong></td>
                    <td align="center"><strong>:</strong></td>
                    <td><strong>{{$perusahaan->alamat_lama}}</strong></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><strong>5.</strong></td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td><strong>Status Perusahaan: {{$perusahaan->status_perusahaan}}</strong></td>
                    <td><strong>Jumlah Cabang :
                        </strong>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td><strong>di Indonesia: </strong></td>
                                <td>{{$perusahaan->jumlah_cabang_di_indonesia}}</td>
                            </tr>
                            <tr>
                                <td><strong>di Luar Indonesia</strong></td>
                                <td>{{$perusahaan->jumlah_cabang_luar_indonesia}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><strong>6. </strong></td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="27%"><strong>Status Pemilikan</strong></td>
                    <td width="3%" align="center"><strong>:</strong></td>
                    <td width="70%"><strong>{{$perusahaan->status_pemilikan}}</strong></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td><strong>7</strong></td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="27%"><strong>Status Permodalan</strong></td>
                    <td width="3%" align="center"><strong>:</strong></td>
                    <td width="70%"><strong>{{$perusahaan->status_permodalan}}</strong></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
<h5>C. Keadaan Ketenagakerjaan</h5>
<table width="100%" border="1" bordercolor="#000000" cellspacing="0" cellpadding="0"
       style="border-left:thin #000000;border-bottom:thin #000000;border-right:thin #000000;border-top:thin #000000">
    <tbody>
    <tr style="border-bottom:thin #000000">
        <td width="9%">1. Umum</td>
        <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="3">
            @include('cetakan.umum')
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td colspan="3">Waktu Kerja
            <div class="row">
                <div class="container">
                    @foreach($dataMasterWaktuKerja as $masterWaktuKerja)
                        <div class="col-md-4">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="{{$masterWaktuKerja->id}}"
                                @foreach($waktuKerja as $dataWaktuKerja)
                                    @if($dataWaktuKerja->waktu_kerja_id == $masterWaktuKerja->id)
                                        {{'checked'}}
                                            @endif
                                        @endforeach
                                > {{$masterWaktuKerja->nama_waktu_kerja}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>3.</td>
        <td colspan="3">Penggunaan Alat dan bahan
            <p>

            </p>
        </td>
    </tr>
    <tr>
        <td valign="top">4.</td>
        <td colspan="3"><p>Limbah Produksi</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>

                <tr>
                    <td width="29%">a. Limbah Produksi</td>
                    <td width="71%">
                        <div class="container">
                            <table border="0" cellspacing="20" cellpadding="20">
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1"
                                            @foreach($dataLimbahProduksi as $limbahProduksi)
                                                @if($limbahProduksi->jenis_limbah_produksi =='Padat')
                                                    {{'checked'}}
                                                        @endif
                                                    @endforeach
                                            > Padat
                                        </label>
                                    </td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1"
                                            @foreach($dataLimbahProduksi as $limbahProduksi)
                                                @if($limbahProduksi->jenis_limbah_produksi =='Cair')
                                                    {{'checked'}}
                                                        @endif
                                                    @endforeach
                                            > Cair
                                        </label>
                                    </td>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1"
                                            @foreach($dataLimbahProduksi as $limbahProduksi)
                                                @if($limbahProduksi->jenis_limbah_produksi =='Gas')
                                                    {{'checked'}}
                                                        @endif
                                                    @endforeach
                                            > Gas
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>b. Instalasi Pengolah Limbah</td>
                    <td>
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tbody>
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($instalasiLimbahAmdal->instalasi_limbah ==1) {{'checked'}} @endif>
                                        Ada
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($instalasiLimbahAmdal->instalasi_limbah ==0) {{'checked'}} @endif>
                                        Tidak Ada
                                    </label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>c. Amdal</td>
                    <td>
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tbody>
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($instalasiLimbahAmdal->amdal ==1) {{'checked'}} @endif>
                                        Ada
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($instalasiLimbahAmdal->amdal ==0) {{'checked'}} @endif>
                                        Tidak Ada
                                    </label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><p>d. Sertifikat No. &nbsp;&nbsp;&nbsp;{{$instalasiLimbahAmdal->no_sertifikat}}</p>
                        <?php
                        $date = explode('-', $instalasiLimbahAmdal->tgl_sertifikat);
                        ?>
                        <p> Tanggal : {{$date[2]}} &nbsp;&nbsp;&nbsp; Bulan: {{$date['1']}} &nbsp;&nbsp;&nbsp; Tahun
                            : {{$date[0]}}</p></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>5.</td>
        <td colspan="3"><p>Pengupahan</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="43%">a. Jumlah upah seluruh pekerja ang dibayarkan</td>
                    <td width="57%">Rp. {{$pengupahan->jumlah_upah_pekerja_dibayarkan}}</td>
                </tr>
                <tr>
                    <td>b. Tingkat upah tertinggi</td>
                    <td>Rp. {{$pengupahan->tingkat_upah_tertinggi}}</td>
                </tr>
                <tr>
                    <td>c. Tingkat upah terendah</td>
                    <td>Rp.{{$pengupahan->tingkat_upah_terendah}}</td>
                </tr>
                <tr>
                    <td>d. Jumlah pekerja Penerima UMK/UMP/UMSK</td>
                    <td>{{$pengupahan->jumlah_penerima_umk_ump_umsk}}
                        &nbsp;&nbsp;(&nbsp;&nbsp;{{$pengupahan->jumlah_umk_ump_umsk_dalam_persen}}%)
                    </td>
                </tr>
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>6.</td>
        <td width="33%">Tunjangan Hari Raya Keagamaan</td>
        <td width="2%">:</td>
        <td width="56%">
            <table border="0" cellspacing="20" cellpadding="20">
                <tbody>
                <tr>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1"
                                   value="option1" @if($pengupahan->tunjangan_hari_raya_keagamaan  =='1 bulan upah') {{'checked'}}@endif>
                            1 Bulan Upah
                        </label>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox"
                                   id="inlineCheckbox1" @if($pengupahan->tunjangan_hari_raya_keagamaan  =='>1 bulan upah') {{'checked'}}@endif>
                            >1 Bulan Upah
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td>Bonus/Gratifikasi</td>
        <td>:</td>
        <td>
            <table border="0" cellspacing="20" cellpadding="20">
                <tbody>
                <tr>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1"
                                   value="option1" @if($pengupahan->bonus_gratifikasi  =='1 bulan gaji') {{'checked'}}@endif>
                            1 Bulan Gaji
                        </label>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox"
                                   id="inlineCheckbox1" @if($pengupahan->bonus_gratifikasi  =='>1 bulan gaji') {{'checked'}}@endif>
                            >1 Bulan Gaji
                        </label>
                    </td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="checkbox"
                                   id="inlineCheckbox1" @if($pengupahan->bonus_gratifikasi  =='<1 bulan gaji') {{'checked'}}@endif>
                            <1 Bulan Gaji
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td valign="top">8</td>
        <td colspan="3"><p>Fasilitas Perusahaan</p>
            <p>a. Fasilitas Keselamatan dan Kesehatan Kerja</p>
            @foreach($dataMasterFasilitasK3 as $masterFaslitasK3)
                <div class="col-md-4">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                        @foreach($fasilitasPerusahaanK3 as $fasilitasK3)
                            @if($fasilitasK3->fasilitas_k3_id == $masterFaslitasK3->id)
                                {{'checked'}}
                                    @endif
                                @endforeach
                        > {{$masterFaslitasK3->nama_fasilitas_keselamatan}}&nbsp;&nbsp;
                        @foreach($fasilitasPerusahaanK3 as $fasilitasK3)
                            @if($masterFaslitasK3->id == $fasilitasK3->fasilitas_k3_id)
                                @if($fasilitasK3->jumlah !=0)
                                    {{$fasilitasK3->jumlah}}
                                @endif
                            @endif
                        @endforeach
                    </label>
                </div>
            @endforeach
            <p>b. Fasilitas Kesejahteraan</p>
            @foreach($dataMasterFasilitasKesejahteraan as $masterFasilitasKesejahteraan)
                <div class="col-md-4">
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                        @foreach($fasilitasPerusahaanKesejahteraan as $fasilitasKesejahteraan)
                            @if($fasilitasKesejahteraan->fasilitas_kesejahteraan_id == $masterFasilitasKesejahteraan->id)
                                {{'checked'}}
                                    @endif
                                @endforeach
                        > {{$masterFasilitasKesejahteraan->nama_fasilitas_kesejahteraan}}
                    </label>
                </div>
            @endforeach
            <p><strong>Keterangan</strong></p>
            <p><strong>*): Diisi jumlah dengan angka</strong></p>
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td colspan="3"><p>BPJS(Badan Penyelenggara Jaminan Sosial) Ketenagakerjaan</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="33%">a. Mulai menjadi peserta</td>
                    <td width="3%">:</td>
                    <?php $tglBpjsKetenagaKerjaan = explode('-', $bpjsKetenagaKerjaan->mulai_menjadi_peserta)?>
                    <td width="64%">Tanggal : {{$tglBpjsKetenagaKerjaan[2]}}&nbsp;&nbsp;Bulan
                        : {{$tglBpjsKetenagaKerjaan[1]}} &nbsp;&nbsp;Tahun:{{$tglBpjsKetenagaKerjaan[0]}}</td>
                </tr>
                <tr>
                    <td>b. Nomor Pendaftaran</td>
                    <td>:</td>
                    <td>{{$bpjsKetenagaKerjaan->nomor_pendaftaran}}</td>
                </tr>
                <tr>
                    <td>c. Jumlah Peserta</td>
                    <td>:</td>
                    <td>{{$bpjsKetenagaKerjaan->jumlah_peserta}}</td>
                </tr>
                <tr>
                    <td><p><label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                @if($bpjsKetenagaKerjaan->jaminan_kecelakaan_kerja !='' || $bpjsKetenagaKerjaan->jaminan_kecelakan_kerja !=null)
                                    {{'checked'}}
                                        @endif
                                > 1. Jaminan Kecelakaan Kerja
                                &nbsp;&nbsp;{{$bpjsKetenagaKerjaan->jaminan_kecelakaan_kerja}}
                            </label></p>
                        <p><label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                @if($bpjsKetenagaKerjaan->jaminan_kematian !='' || $bpjsKetenagaKerjaan->jaminan_kematian !=null)
                                    {{'checked'}}
                                        @endif
                                > 2. Jaminan Kematian &nbsp;&nbsp;{{$bpjsKetenagaKerjaan->jaminan_kematian}}
                            </label></p>
                        <p><label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                @if($bpjsKetenagaKerjaan->jaminan_hari_tua !='' || $bpjsKetenagaKerjaan->jaminan_hari_tua !=null)
                                    {{'checked'}}
                                        @endif
                                > 3. Jaminan hari Tua &nbsp;&nbsp;{{$bpjsKetenagaKerjaan->jaminan_hari_tua}}
                            </label>
                        </p>
                        <p><label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                @if($bpjsKetenagaKerjaan->jaminan_pensiun !='' || $bpjsKetenagaKerjaan->jaminan_pensiun !=null)
                                    {{'checked'}}
                                        @endif
                                > 4. Jaminan Pensiun &nbsp;&nbsp;{{$bpjsKetenagaKerjaan->jaminan_pensiun}}
                            </label>
                        </p>
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><p>Keterangan</p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td width="3%"><strong>A</strong></td>
                                <td width="3%"><strong>:</strong></td>
                                <td width="94%"><strong>Badan Penyelenggara adalah BPJS Ketenagakerjaan</strong></td>
                            </tr>
                            <tr>
                                <td><strong>B</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong>Badan Penyelenggara adalah selain BPJS Ketenagakerjaan</strong></td>
                            </tr>
                            <tr>
                                <td><strong>C</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong>Ditanggung Sendiri</strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>10.</td>
        <td colspan="3"><p>BPJS(Badan Penyelenggara Jaminan Sosial) Kesehatan</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="33%"><strong>a. Mulai menjadi peserta</strong></td>
                    <td width="3%"><strong>:</strong></td>
                    <?php $tglBpjsKesehatan = explode('-', $bpjsKesehatan->mulai_menjadi_peserta)?>
                    <td width="64%">Tanggal: {{$tglBpjsKesehatan[2]}}&nbsp;&nbsp;Bulan: {{$tglBpjsKesehatan[1]}}&nbsp;&nbsp;Tahun: {{$tglBpjsKesehatan[0]}}</td>
                </tr>
                <tr>
                    <td><strong>b. Nomor pendaftaran</strong></td>
                    <td><strong>:</strong></td>
                    <td>{{$bpjsKesehatan->nomor_pendaftaran}}</td>
                </tr>
                <tr>
                    <td><strong>c. Jumlah peserta</strong></td>
                    <td><strong>:</strong></td>
                    <td>Tenaga Kerja: {{$bpjsKesehatan->jumlah_peserta_tenaga_kerja}} &nbsp;&nbsp;&nbsp;&nbsp;Keluarga
                        : {{$bpjsKesehatan->jumlah_peserta_keluarga}}</td>
                </tr>
                <tr>
                    <td><strong><label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1"
                                @if($bpjsKesehatan->jaminan_pemeliharaan_kesehatan !='' || $bpjsKesehatan->jaminan_pemeliharaan_kesehatan!=null)
                                    {{'checked'}}
                                        @endif
                                > d. Jaminan Pemeliharaan Kesehatan
                                &nbsp;&nbsp;{{$bpjsKesehatan->jaminan_pemeliharaan_kesehatan}}
                            </label>></strong></td>
                    <td></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><p>Keterangan: </p>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td><strong>A</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong>Badan Penyelenggara adalah BPJS Kesehatan</strong></td>
                            </tr>
                            <tr>
                                <td height="43"><strong>B</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong>Badan Penyelenggara adalah selain BPJS Kesehatan</strong></td>
                            </tr>
                            <tr>
                                <td><strong>C</strong></td>
                                <td><strong>:</strong></td>
                                <td><strong>Ditanggung Sendiri</strong></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>11</td>
        <td colspan="3"><p>Program Pensiun</p>
            <p>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1"
                    @if($programPensiun->jenis_program_pensiun == 1)
                        {{'checked'}}
                            @endif
                    > Dilaksanakan oleh Dana Pensiun Pemberi Kerja
                </label>
            </p>
            <p>
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" value="option1"
                    @if($programPensiun->jenis_program_pensiun == 2)
                        {{'checked'}}
                            @endif
                    > Dilaksanakan oleh Dana Pensiun Lembaaga Keuangan
                </label>
            </p>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td colspan="3"><p>Perangkat Hubungan Industrial</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td colspan="3">a. Perangkat Hub Kerja</td>
                    <td colspan="2">&nbsp;
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tbody>
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @if($perangkatHubunganKerja->pk == 1)
                                            {{'checked'}}
                                                @endif
                                        > PK
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @if($perangkatHubunganKerja->pp == 1)
                                            {{'checked'}}
                                                @endif
                                        > PP
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @if($perangkatHubunganKerja->kkb == 1)
                                            {{'checked'}}
                                                @endif
                                        > KKB
                                    </label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        &nbsp;&nbsp;
                    </td>
                    @if($perangkatHubunganKerja->pk == 1 || $perangkatHubunganKerja->kkb == 1)
                        <?php $tglPKKKB = explode('-', $perangkatHubunganKerja->tgl_pengesahan_pk_kkb)?>
                        <td width="60%">Tg Pengesahan PK/KKB: tanggal : {{$tglPKKKB[2]}} &nbsp;&nbsp;
                            bulan: {{$tglPKKKB[1]}} &nbsp;&nbsp; tahun: {{$tglPKKKB[0]}}</td>
                    @endif
                </tr>
                <tr>
                    <td colspan="3">b. Perangkat Organisasi Ketenagakerjaan</td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table border="0" cellspacing="20" cellpadding="20">
                            <tbody>
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @foreach($perangkatOrganisasi as $perangkatOrg)
                                            @if($perangkatOrg->jenis_perangkat_organisasi == 'Bipartit')
                                                {{'checked'}}
                                                    @endif
                                                @endforeach
                                        > Bipartit
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @foreach($perangkatOrganisasi as $perangkatOrg)
                                            @if($perangkatOrg->jenis_perangkat_organisasi == 'SPTP')
                                                {{'checked'}}
                                                    @endif
                                                @endforeach
                                        > SPTP
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @foreach($perangkatOrganisasi as $perangkatOrg)
                                            @if($perangkatOrg->jenis_perangkat_organisasi == 'Org.Pek')
                                                {{'checked'}}
                                                    @endif
                                                @endforeach
                                        > Org.Pek
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @foreach($perangkatOrganisasi as $perangkatOrg)
                                            @if($perangkatOrg->jenis_perangkat_organisasi == 'P2K')
                                                {{'checked'}}
                                                    @endif
                                                @endforeach
                                        > P2K
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1"
                                        @foreach($perangkatOrganisasi as $perangkatOrg)
                                            @if($perangkatOrg->jenis_perangkat_organisasi == 'Apindo')
                                                {{'checked'}}
                                                    @endif
                                                @endforeach
                                        > Apindo
                                    </label>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td width="4%"><strong>PK</strong></td>
                    <td width="1%"><strong>:</strong></td>
                    <td width="20%"><strong>Perjanjian Kerja</strong></td>
                    <td width="13%"><strong>SPTP</strong></td>
                    <td width="2%"><strong>:</strong></td>
                    <td><strong>Serikat Pekerja Tingkat Perusahaan</strong></td>
                </tr>
                <tr>
                    <td><strong>PP</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Peraturan Perusahaan</strong></td>
                    <td><strong>Org. Pek</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Organisasi Pekerja yang ada di Perusahaan</strong></td>
                </tr>
                <tr>
                    <td><strong>KKB</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Kesepakatan Kerja Bersama</strong></td>
                    <td><strong>Apindo</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Asosisasi Perusahaan Indonesia</strong></td>
                </tr>
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>13</td>
        <td colspan="3"><p>Rencana Pekerja yang di butuhkan dalam 12 bulan yang akan datang/Rencana CTKI yang akan di
                berangkatkan:</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td>a. Jumlah : {{$ctkiAkanBerangkat->total}} Orang &nbsp;&nbsp;&nbsp;
                        L: {{$ctkiAkanBerangkat->jumlah_laki}}Orang
                        &nbsp;&nbsp;&nbsp;P: {{$ctkiAkanBerangkat->perempuan}}Orang
                    </td>
                </tr>
                <tr>
                    <td>Perincian Rencana Kebutuhan Pekerja 12 bulang yang akan datang</td>
                </tr>
                </tbody>
            </table>
            <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
                <thead>
                <tr>
                    <th width="15%" rowspan="3" valign="top"><strong>Nama Jabatan</strong></th>
                    <th width="12%" rowspan="3" valign="top"><strong>Kode</strong></th>
                    <th colspan="8" rowspan="2" align="center"><strong>Pendidikan</strong></th>
                    <th colspan="6" align="center"><strong>Hubungan Kerja</strong></th>
                </tr>
                <tr>
                    <th colspan="2" align="center"><strong>WNI</strong></th>
                    <th colspan="2" align="center"><strong>WNA</strong></th>
                    <th colspan="2" align="center"><strong>PENC</strong></th>
                </tr>
                <tr>
                    <th width="4%"><strong>SD</strong></th>
                    <th width="5%"><strong>SMTP</strong></th>
                    <th width="5%"><strong>SMTA</strong></th>
                    <th width="3%"><strong>D3</strong></th>
                    <th width="3%"><strong>S1</strong></th>
                    <td width="3%"><strong>S2</strong></td>
                    <th width="3%"><strong>S3</strong></th>
                    <th width="6%"><strong>Jumlah</strong></th>
                    <th width="4%" align="center"><strong>Tetap</strong></th>
                    <th width="7%" align="center"><strong>Tidak Tetap</strong></th>
                    <th width="5%" align="center"><strong>Tetap</strong></th>
                    <th width="6%" align="center"><strong>Tidak Tetap</strong></th>
                    <th width="4%" align="center"><strong>Tetap</strong></th>
                    <th width="15%" align="center"><strong>Tidak Tetap</strong></th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataDetailCtkiAkanBerangkat as $detailCtkiAkanBerangkat)
                    <tr>
                        <td>{{$detailCtkiAkanBerangkat->nama_jabatan}}</td>
                        <td>{{$detailCtkiAkanBerangkat->kode_jabatan}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_sd}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_smtp}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_smta}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_d3}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_s1}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_s2}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_s3}}</td>
                        <td>{{$detailCtkiAkanBerangkat->total}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_wni_tetap}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_wni_tidak_tetap}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_wna_tetap}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_wna_tidak_tetap}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_penca_tetap}}</td>
                        <td>{{$detailCtkiAkanBerangkat->jml_penca_tidak_tetap}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td>14</td>
        <td colspan="3"><p>Rencana 12 Bulan terkahir/CTKI yang sudah diberangkatkan 12 bulan terakhir</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td>a. Jumlah: {{$ctkiTelahBerangkat->total}}Orang &nbsp;&nbsp;&nbsp;
                        L:{{$ctkiTelahBerangkat->jumlah_laki}}Orang &nbsp;&nbsp;&nbsp;
                        P:{{$ctkiTelahBerangkat->jumlah_perempuan}}Orang
                    </td>
                </tr>
                <tr>
                    <td>b. Perincian Rencana Kebutuhan Pekerja 12 Bulan yang akan terakhir</td>
                </tr>
                </tbody>
            </table>
            <table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
                <thead>
                <tr>
                    <th width="13%" rowspan="3" valign="top"><strong>Nama Jabatan</strong></th>
                    <th width="12%" rowspan="3" valign="top"><strong>Kode </strong></th>
                    <th colspan="8" rowspan="2" align="center"><strong>Pendidikan</strong></th>
                    <th colspan="6" align="center"><strong>Hubungan Kerja</strong></th>
                </tr>
                <tr>
                    <th colspan="2" align="center"><strong>WNI</strong></th>
                    <th colspan="2" align="center"><strong>WNA</strong></th>
                    <th colspan="2" align="center"><strong>PENCA</strong></th>
                </tr>
                <tr>
                    <th width="4%" align="center"><strong>SD</strong></th>
                    <th width="5%" align="center"><strong>SMTP</strong></th>
                    <th width="4%" align="center"><strong>SMTA</strong></th>
                    <th width="4%" align="center"><strong>D3</strong></th>
                    <th width="3%" align="center"><strong>S1</strong></th>
                    <th width="4%" align="center"><strong>S2</strong></th>
                    <th width="4%" align="center"><strong>S3</strong></th>
                    <th width="6%" align="center"><strong>Jumlah</strong></th>
                    <th width="5%" align="center"><strong>Tetap</strong></th>
                    <th width="6%" align="center"><strong>Tidak Tetap</strong></th>
                    <th width="5%" align="center"><strong>Tetap</strong></th>
                    <th width="7%" align="center"><strong>Tidak Tetap</strong></th>
                    <th width="5%" align="center"><strong>Tetap </strong></th>
                    <th width="13%" align="center"><strong>Tidak Tetap</strong></th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataDetailCtkiTelahBerangkat as $detailCtkiTelahBerangkat)
                    <tr>
                        <td>{{$detailCtkiTelahBerangkat->nama_jabatan}}</td>
                        <td>{{$detailCtkiTelahBerangkat->kode_jabatan}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_sd}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_smtp}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_smta}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_d3}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_s1}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_s2}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_s3}}</td>
                        <td>{{$detailCtkiTelahBerangkat->total}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_wni_tetap}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_wni_tidak_tetap}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_wna_tetap}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_wna_tidak_tetap}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_penca_tetap}}</td>
                        <td>{{$detailCtkiTelahBerangkat->jml_penca_tidak_tetap}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td rowspan="2">15</td>
        <td><strong>a. Jumlah Penerimaan Pekerja selama 12 bulan terakhir</strong></td>
        <td><strong>:</strong></td>
        <td><strong>{{$rekapPenerimaanPekerja->jml_penerimaan_pekerja}}</strong></td>
    </tr>
    <tr>
        <td><strong>b. Jumlah Pekerja Berhenti selama 12 bulan terkahir</strong></td>
        <td><strong>:</strong></td>
        <td><strong>{{$rekapPenerimaanPekerja->jml_pekerja_berhenti}}Orang</strong></td>
    </tr>
    <tr>
        <td valign="top">16</td>
        <td colspan="3"><p>Program Pelatihan</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td width="24%">a. Program Pelatihan bagi Pekerja</td>
                    <td width="76%">
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->program_pelatihan_bagi_pekerja == 1) {{'checked'}} @endif>
                                        Ada
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->program_pelatihan_bagi_pekerja == 0) {{'checked'}} @endif>
                                        Tidak Ada
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>b. Program Pemegangan</td>
                    <td>
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->program_pemegangan == 1) {{'checked'}} @endif>
                                        Ada
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->program_pemegangan == 0) {{'checked'}} @endif>
                                        Tidak Ada
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>c. Fasilitas Pelatihan</td>
                    <td>
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->fasilitas_pelatihan == 1) {{'checked'}} @endif>
                                        Ada
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->fasilitas_pelatihan == 0) {{'checked'}} @endif>
                                        Tidak Ada
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>d. Program Pengindonesiaan</td>
                    <td>
                        <table border="0" cellpadding="20" cellspacing="20">
                            <tr>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->program_pengindonesiaan == 1) {{'checked'}} @endif>
                                        Ada
                                    </label>
                                </td>
                                <td>&nbsp;&nbsp;&nbsp;</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1"
                                               value="option1" @if($programPelatihan->program_pengindonesiaan == 0) {{'checked'}} @endif>
                                        Tidak Ada
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
            <p></p></td>
    </tr>
    <tr>
        <td valign="top">17</td>
        <td colspan="3"><p>Perencanaan Kebutuhan Latihan bagi Pekerja (Dirinci Menurut Kejuruan)</p>
            <table width="100%" border="1" bordercolor="#000000" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td><strong>Kejuruan</strong></td>
                    <td><strong>Kode</strong></td>
                    <td><strong>Jumlah Peserta</strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <p>&nbsp;</p></td>
    </tr>
    </tbody>
</table>
<script type="text/javascript" src="{{url('public/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        window.print();
    });
</script>
</body>
</html>