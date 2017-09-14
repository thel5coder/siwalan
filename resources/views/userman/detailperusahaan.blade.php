@extends('app')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Perusahaan</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Perusahaan</li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-flat">
                <div class="panel-body">
                    <div class="nav-tabs-horizontal">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
                                   data-target="#home2" role="tab">
                                    <i class="icmn-home"></i>
                                    Perusahaan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
                                   data-target="#profile2" role="tab">
                                    <i class="icmn-users"></i>
                                    Kepemilikan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
                                   data-target="#messages2" role="tab">
                                    <i class="icmn-database"></i>
                                    Legal
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content padding-vertical-20">
                            <div class="tab-pane active" id="home2" role="tabpanel">
                                <form id="formPerusahaanUmum">
                                    <div class="form-group">
                                        <label for="namaPerusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="namaPerusahaan"
                                               name="namaPerusahaan"
                                               placeholder="Nama perusahaan"
                                               value="{{ucwords($dataPerusahaan->nama)}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Perusahaan</label>
                                        <textarea class="form-control" id="alamat" name="alamat"
                                                  placeholder="Alamat perusahaan"
                                                  disabled>{{$dataPerusahaan->alamat_perusahaan}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="noTelepon">No.Telepon</label>
                                        <input type="text" class="form-control" id="noTelepon" name="noTelepon"
                                               placeholder="Nomor Telepon perusahaan"
                                               value="{{$dataPerusahaan->no_telepon}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten</label>
                                       <input type="text" id="kabupaten" class="form-control" name="kabupaten" value="{{$dataPerusahaan->nama_kabupaten}}" disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan/Kecamatan </label>
                                        <input type="text" id="kelurahan" class="form-control" name="kelurahan" value="{{$dataPerusahaan->nama_kecamatan}}" disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="korwil">Korwil</label>
                                        <input type="text" id="korwil" name="korwil" class="form-control" value="{{$dataPerusahaan->nama_korwil}}"
                                               disabled/>
                                    </div>
                                    <div class="form-group">
                                        <label for="kodePos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kodePos" name="kodePos"
                                               placeholder="Kode Pos" value="{{$dataPerusahaan->kode_pos}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisUsaha">Jenis Usaha</label>
                                        <input type="text" class="form-control" id="jenisUsaha" name="jenisUsaha"
                                               placeholder="Kode Pos" value="{{$dataPerusahaan->nama_jenis_usaha}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="produkAkhir">Produk Akhir</label>
                                        <input type="text" class="form-control" id="produkAkhir" name="produkAkhir"
                                               placeholder="Produk Akhir" value="{{$dataPerusahaan->produk_akhir}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Simpan"/>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="profile2" role="tabpanel">
                                <div class="panel panel-with-borders m-b-0">
                                    <div class="panel-body">
                                        <div class="nav-tabs-horizontal">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="javascript: void(0);"
                                                       data-toggle="tab"
                                                       data-target="#pemilik" role="tab">
                                                        <i class="icmn-user"></i>
                                                        Pemilik
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="javascript: void(0);"
                                                       data-toggle="tab"
                                                       data-target="#pengolah" role="tab">
                                                        <i class="icmn-user-tie"></i>
                                                        Pengelolah
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content padding-vertical-20">
                                                <div class="tab-pane active" id="pemilik" role="tabpanel">
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover"
                                                                   id="tblPemilik">
                                                                <thead>
                                                                <tr>
                                                                    <th data-column-id="nama_pemilik">Nama Pemilik</th>
                                                                    <th data-column-id="alamat_pemilik">Alamat Pemilik
                                                                    </th>
                                                                    <th data-column-id="commands" data-formatter="aksi"
                                                                        data-sortable="false">Action
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="pengolah" role="tabpanel">
                                                    <form id="formPengelolah">
                                                        <div class="form-group">
                                                            <label for="namaPengelolah">Nama Pengelolah</label>
                                                            <input type="text" id="namaPengelolah"
                                                                   name="namaPengelolah" class="form-control" disabled
                                                                   value="{{$dataPerusahaan->nama_pengelolah}}"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamatPengelolah">Alamat Pengelolah</label>
                                                            <textarea class="form-control" id="alamatPengelolah"
                                                                      name="alamatPengelolah"
                                                                      disabled>{{$dataPerusahaan->alamat_pengelolah}}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"
                                                                   value="Simpan">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="messages2" role="tabpanel">
                                <form id="formLegal">
                                    <div class="form-group">
                                        <label for="tglPendirian">Tanggal Pendirian Perusahaan</label>
                                        <input type="text" class="form-control tglDatePicker" id="tglPendirian"
                                               name="tglPendirian"
                                               placeholder="Tanggal Pendirian Perusahaan"
                                               value="{{date('d-m-Y',strtotime($dataPerusahaan->tanggal_pendirian))}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomorAktaPendirian">Nomor Akta Pendirian</label>
                                        <input type="text" class="form-control" id="nomorAktaPendirian"
                                               name="nomorAktaPendirian"
                                               placeholder="Nomor Akta Pendirian"
                                               value="{{$dataPerusahaan->nomor_akta_pendirian}}"
                                               disabled>
                                    </div>
                                    <div class="form-group pindah">
                                        <label for="tglPerpindahanPerusahaan">Tanggal Perpindahan Perusahaan</label>
                                        <input type="text" class="form-control tglDatePicker"
                                               id="tglPerpindahanPerusahaan" name="tglPerpindahanPerusahaan"
                                               placeholder="Tanggal Perpindahan Perusahaan" disabled
                                               value="{{date('d-m-Y',strtotime($dataPerusahaan->tgl_perpindahan_perusahaan))}}"
                                        >
                                    </div>
                                    <div class="form-group pindah">
                                        <label for="alamatLama">Alamat Lama</label>
                                        <textarea type="text" class="form-control" id="alamatLama" name="alamatLama"
                                                  placeholder="Alamat lama" disabled
                                        >{{$dataPerusahaan->alamat_lama}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPerusahaan">Status Perusahaan</label>
                                        <input type="text" class="form-control" id="statusPerusahaan"
                                               name="statusPerusahaan"
                                               value="{{$dataPerusahaan->status_perusahaan}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahCabangIndonesia">Jumlah Cabang Di Indonesia</label>
                                        <input type="text" class="form-control" id="jumlahCabangIndonesia"
                                               name="jumlahCabangIndonesia"
                                               placeholder="Jumlah cabang di indonesia"
                                               value="{{$dataPerusahaan->jumlah_cabang_di_indonesia}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahCabangLuarIndonesia">Jumlah Cabang Luar Indonesia</label>
                                        <input type="text" class="form-control" id="jumlahCabangLuarIndonesia"
                                               name="jumlahCabangLuarIndonesia"
                                               placeholder="Jumlah cabang luar indonesia"
                                               value="{{$dataPerusahaan->jumlah_cabang_luar_indonesia}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPemilikan">Status Pemilikan</label>
                                        <input type="text" class="form-control" id="statusPemilikan"
                                               name="statusPemilikan"
                                               placeholder="Jumlah cabang luar indonesia"
                                               value="{{$dataPerusahaan->status_pemilikan}}"
                                               disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPermodalan">Status Permodalan</label>
                                        <input type="text" class="form-control" id="statusPermodalan"
                                               name="statusPermodalan"
                                               placeholder="Jumlah cabang luar indonesia"
                                               value="{{$dataPerusahaan->status_permodalan}}"
                                               disabled>
                                    </div>
                                </form>
                                <input type="hidden" id="id" value="{{auth()->user()->id}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>

        $(document).ready(function () {
            paginationTable();
        });


        function paginationTable() {
            var grid = $('#tblPemilik').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}",
                        perusahaanId:"{{$dataPerusahaan->id}}"
                    };
                },
                url: "{{route('paginationKepemilikan')}}",
                formatters: {
                    "aksi": function (column, row) {
                        console.log(row.nama_pemilik);
                        return "<a href=\"#\" class=\"btn btn-warning cmdUbah\" data-row-id=\"" + row.id + "\" data-row-namapemilik=\"" + row.nama_pemilik + "\" data-row-alamatpemilik=\"" + row.alamat_pemilik + "\">Ubah</a>" +
                                "<a href=\"#\" class=\"btn btn-danger cmdDelete\" data-row-id=\"" + row.id + "\" >Hapus</a>";
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {
                grid.find('.cmdDelete').click(function () {
                    var url;
                    url = "{{url('/kepemilikan/delete')}}/" + $(this).data('row-id');

                    popUpConfirmation(url, 'tblPemilik', 'Yakin ingin menghapus data kepemilikan?', 'Menghapus..', '');
                });
                grid.find('.cmdUbah').click(function () {
                    $('#id').val($(this).data('row-id'));
                    $('#namaPemilik').val($(this).data('row-namapemilik'));
                    $('#alamatPemilik').val($(this).data('row-alamatpemilik'));
                    $('#namaPemilik').focus();
                });
            });

        }
    </script>
@stop

