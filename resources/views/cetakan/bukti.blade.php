<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1" bordercolor="#00000" cellspacing="0" cellpadding="20">
    <tbody>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="5" cellpadding="20">
                <tbody>
                <tr>
                    <td><strong>a. Telah Mendaftar di </strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Dinas Tenaga Kerja dan Transmigrasi Provinsi Jawa Timur {{$wajibLapor->nama_korwil}}</strong></td>
                </tr>
                <tr>
                    <td><strong>b. Nomor Pendaftaran</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>Kode Wilayah: {{$wajibLapor->kode_pos}}{{$wajibLapor->kode_korwil}} No
                            Pendaftaran:{{$wajibLapor->id}} Tahun: {{$wajibLapor->tahun}} kodeKBLUI: {{$wajibLapor->jenis_usaha_id}}
                            laporan yan ke : {{$wajibLapor->laporan_ke}}</strong></td>
                </tr>
                <tr>
                    <td><strong>c.Tanggal Pendaftaran</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>{{$wajibLapor->tgl_lapor}}</strong></td>
                </tr>
                <tr>
                    <td><strong>d. Kewajiban Mendaftar Kembali</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong>{{date('d-m-Y',strtotime($wajibLapor->tgl_lapor_selanjutnya))}}</strong></td>
                </tr>
                </tbody>
            </table>
        </td>
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