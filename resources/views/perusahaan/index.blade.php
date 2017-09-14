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
                                               value="{{ucwords(auth()->user()->nama)}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat Perusahaan</label>
                                        <textarea class="form-control" id="alamat" name="alamat"
                                                  placeholder="Alamat perusahaan"
                                                  required>{{auth()->user()->alamat_perusahaan}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="noTelepon">No.Telepon</label>
                                        <input type="text" class="form-control" id="noTelepon" name="noTelepon"
                                               placeholder="Nomor Telepon perusahaan"
                                               value="{{auth()->user()->no_telepon}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten</label>
                                        <select class="form-control" id="kabupaten" name="kabupaten" required>
                                            <option value="" @if(auth()->user()->kabupaten =='') {{'selected'}} @endif></option>
                                            @foreach($kabupaten as $dataKabupaten)
                                                <option value="{{$dataKabupaten['id']}}" @if(auth()->user()->kabupaten == $dataKabupaten['id']) <?= 'selected' ?> @endif>{{$dataKabupaten['nama_kabupaten']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan/Kecamatan </label>
                                        <select class="form-control" id="kelurahan" name="kelurahan" required>
                                            <option value="" @if(auth()->user()->kelurahan =='') {{'selected'}} @endif></option>
                                            @if(auth()->user()->kelurahan !='' || auth()->user()->kelurahan != NULL)
                                                <?php
                                                $kecamatan = \App\Models\KecamatanModel::where('id_kabkota', '=', auth()->user()->kabupaten)->get();
                                                ?>
                                                @foreach($kecamatan as $dataKecamatan)
                                                    <option value="{{$dataKecamatan['id']}}" @if(auth()->user()->kelurahan == $dataKecamatan['id']) <?= 'selected'?> @endif>{{$dataKecamatan['nama_kecamatan']}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="korwil">Korwil</label>
                                        @if(auth()->user()->korwil !='')
                                            <?php
                                            $dataKorwil = \App\Models\GroupKorwil::join('master_korwil', 'master_korwil.id', '=', 'group_korwil.korwil_id')
                                                    ->select('master_korwil.nama_korwil', 'group_korwil.kabupaten_id', 'group_korwil.korwil_id')
                                                    ->where('group_korwil.kabupaten_id', '=', auth()->user()->kabupaten)
                                                    ->first();

                                            ?>
                                            <input type="text" id="korwil" name="korwil" class="form-control"
                                                   value="{{$dataKorwil->nama_korwil}}"
                                                   readonly/>
                                            <input type="hidden" id="idKorwil" name="idKorwil"
                                                   value="{{auth()->user()->korwil}}"/>
                                        @else
                                            <input type="text" id="korwil" name="korwil" class="form-control"
                                                   readonly/>
                                            <input type="hidden" id="idKorwil" name="idKorwil"/>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="kodePos">Kode Pos</label>
                                        <input type="text" class="form-control" id="kodePos" name="kodePos"
                                               placeholder="Kode Pos" value="{{auth()->user()->kode_pos}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenisUsaha">Jenis Usaha</label>
                                        <select id="jenisUsaha" name="jenisUsaha" class="form-control" required>
                                            <option value="" @if(auth()->user()->jenis_usaha == '') {{'selected'}} @endif>
                                                Pilih Jenis Usaha
                                            </option>
                                            @foreach($jenisUsaha as $dataJenisUsaha)
                                                <option value="{{$dataJenisUsaha->id}}" @if(auth()->user()->jenis_usaha_id == $dataJenisUsaha->id) {{'selected'}} @endif>{{$dataJenisUsaha->nama_jenis_usaha}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="produkAkhir">Produk Akhir</label>
                                        <input type="text" class="form-control" id="produkAkhir" name="produkAkhir"
                                               placeholder="Produk Akhir" value="{{auth()->user()->produk_akhir}}"
                                               required>
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
                                                        Pengurus
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content padding-vertical-20">
                                                <div class="tab-pane active" id="pemilik" role="tabpanel">
                                                    <div class="row">
                                                        <form id="formPemilik">
                                                            <div class="form-group">
                                                                <label for="namaPemilik">Nama Pemilik</label>
                                                                <input type="text" id="namaPemilik"
                                                                       name="namaPemilik" class="form-control"
                                                                       required/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamatPemilik">Alamat Pemilik</label>
                                                                <textarea id="alamatPemilik" name="alamatPemilik"
                                                                          class="form-control" required></textarea>
                                                            </div>
                                                            <input type="hidden" id="id" value=""/>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary"
                                                                       value="Simpan">
                                                            </div>
                                                        </form>
                                                    </div>
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
                                                            <label for="namaPengelolah">Nama Pengurus</label>
                                                            <input type="text" id="namaPengelolah"
                                                                   name="namaPengelolah" class="form-control" required
                                                                   value="{{auth()->user()->nama_pengelolah}}"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="alamatPengelolah">Alamat Pengurus</label>
                                                            <textarea class="form-control" id="alamatPengelolah"
                                                                      name="alamatPengelolah"
                                                                      required>{{auth()->user()->alamat_pengelolah}}</textarea>
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
                                               value="{{date('d-m-Y',strtotime(auth()->user()->tanggal_pendirian))}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nomorAktaPendirian">Nomor Akta Pendirian</label>
                                        <input type="text" class="form-control" id="nomorAktaPendirian"
                                               name="nomorAktaPendirian"
                                               placeholder="Nomor Akta Pendirian"
                                               value="{{auth()->user()->nomor_akta_pendirian}}"
                                               required>
                                    </div>
                                    <div class="form-group pindah">
                                        <label for="tglPerpindahanPerusahaan">Tanggal Perpindahan Perusahaan</label>
                                        <input type="text" class="form-control tglDatePicker"
                                               id="tglPerpindahanPerusahaan" name="tglPerpindahanPerusahaan"
                                               placeholder="Tanggal Perpindahan Perusahaan"
                                               value="{{date('d-m-Y',strtotime(auth()->user()->tgl_perpindahan_perusahaan))}}"
                                               >
                                    </div>
                                    <div class="form-group pindah">
                                        <label for="alamatLama">Alamat Lama</label>
                                        <textarea type="text" class="form-control" id="alamatLama" name="alamatLama"
                                                  placeholder="Alamat lama"
                                                  >{{auth()->user()->alamat_lama}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPerusahaan">Status Perusahaan</label>
                                        <select id="statusPerusahaan" name="statusPerusahaan" class="form-control"
                                                required>
                                            <option value="" @if(auth()->user()->status_perusahaan == '') {{'selected'}} @endif>
                                                Pilih Status Perusahaan
                                            </option>
                                            <option value="Pusat" @if(auth()->user()->status_perusahaan == 'Pusat') {{'selected'}} @endif>
                                                Pusat
                                            </option>
                                            <option value="Cabang" @if(auth()->user()->status_perusahaan == 'Cabang') {{'selected'}} @endif>
                                                Cabang
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahCabangIndonesia">Jumlah Cabang Di Indonesia</label>
                                        <input type="text" class="form-control" id="jumlahCabangIndonesia"
                                               name="jumlahCabangIndonesia"
                                               placeholder="Jumlah cabang di indonesia"
                                               value="{{auth()->user()->jumlah_cabang_di_indonesia}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlahCabangLuarIndonesia">Jumlah Cabang Luar Indonesia</label>
                                        <input type="text" class="form-control" id="jumlahCabangLuarIndonesia"
                                               name="jumlahCabangLuarIndonesia"
                                               placeholder="Jumlah cabang luar indonesia"
                                               value="{{auth()->user()->jumlah_cabang_luar_indonesia}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPemilikan">Status Pemilikan</label>
                                        <select id="statusPemilikan" name="statusPemilikan" class="form-control"
                                                required>
                                            <option value="" @if(auth()->user()->status_pemilikan == '') {{'selected'}} @endif>
                                                Pilih Status Pemilikan Perusahaan
                                            </option>
                                            <option value="Swasta" @if(auth()->user()->status_pemilikan == 'Swasta') {{'selected'}} @endif>
                                                Swasta
                                            </option>
                                            <option value="Persero" @if(auth()->user()->status_pemilikan == 'Persero') {{'selected'}} @endif>
                                                Persero
                                            </option>
                                            <option value="Asing" @if(auth()->user()->status_pemilikan == 'Asing') {{'selected'}} @endif>
                                                Asing
                                            </option>
                                            <option value="Perum" @if(auth()->user()->status_pemilikan == 'Perum') {{'selected'}} @endif>
                                                Perum
                                            </option>
                                            <option value="Perusahaan Daerah" @if(auth()->user()->status_pemilikan == 'Perusahaan Daerah') {{'selected'}} @endif>
                                                Perusahaan Daerah
                                            </option>
                                            <option value="Yayasan" @if(auth()->user()->status_pemilikan == 'Yayasan') {{'selected'}} @endif>
                                                Yayasan
                                            </option>
                                            <option value="Koperasi" @if(auth()->user()->status_pemilikan == 'Koperasi') {{'selected'}} @endif>
                                                Koperasi
                                            </option>
                                            <option value="Perseorangan" @if(auth()->user()->status_pemilikan == 'Perseorangan') {{'selected'}} @endif>
                                                Perseorangan
                                            </option>
                                            <option value="Badan usaha lainnya" @if(auth()->user()->status_pemilikan == 'Badan usaha lainnya') {{'selected'}} @endif>
                                                Badan Usaha Lainnya
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPermodalan">Status Permodalan</label>
                                        <select name="statusPermodalan" id="statusPermodalan" class="form-control"
                                                required>
                                            <option value="" @if(auth()->user()->status_permodalan == '') {{'selected'}} @endif>
                                                Pilih Status Permodalan
                                            </option>
                                            <option value="PMDN" @if(auth()->user()->status_permodalan =='PMDN') {{'selected'}} @endif>
                                                PMDN
                                            </option>
                                            <option value="PMA" @if(auth()->user()->status_permodalan =='PMA') {{'selected'}} @endif>
                                                PMA
                                            </option>
                                            <option value="Swasta Nasional" @if(auth()->user()->status_permodalan =='Swasta Nasional') {{'selected'}} @endif>
                                                Swasta Nasional
                                            </option>
                                            <option value="Persero" @if(auth()->user()->status_permodalan == 'Persero') {{'selected'}} @endif>
                                                Persero
                                            </option>
                                            <option value="Joint Venture" @if(auth()->user()->status_permodalan =='Joint Venture') {{'selected'}} @endif>
                                                Joint Venture
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Simpan"/>
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
            $('select').select2();

            $('#tglPendirian').datepicker({
                format: 'dd-mm-yyyy'
            });

            $('#tglPerpindahanPerusahaan').datepicker({
                format: 'dd-mm-yyyy'
            });

            $('#kabupaten').change(function (e) {
                var url = "{{url('/get-kecamatan')}}/" + $(this).val();
                $.ajax({
                    url: url,
                    method: "GET",
                    success: function (s) {
                        $('#kelurahan').children('option:not(:first)').remove().end();
                        $('#kelurahan').select2({
                            data: s
                        });

                    }
                });


                var urlGetKorwil = "{{url('get-korwil')}}/" + $(this).val();

                $.ajax({
                    url: urlGetKorwil,
                    method: "GET",
                    success: function (s) {
                        $('#idKorwil').val(s.idKorwil);
                        $('#korwil').val(s.namaKorwil);
                    }
                });
            });

            $('#formPerusahaanUmum').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    namaPerusahaan: {
                        required: true
                    },
                    alamat: {
                        required: true
                    },
                    noTelepon: {
                        required: true
                    },
                    kelurahan: {
                        required: true
                    },
                    kabupaten: {
                        required: true
                    },
                    kodePos: {
                        required: true
                    },
                    jenisUsaha: {
                        required: true
                    },
                    produkAkhir: {
                        required: true
                    }
                },

                messages: {
                    namaPerusahaan: {
                        required: "Nama perusahaan harus di isi"
                    },
                    alamat: {
                        required: "Alamat harus di isi"
                    },
                    noTelepon: {
                        required: "No Telepon perusahaan harus di isi"
                    },
                    kelurahan: {
                        required: "Kelurahan harus di isi"
                    },
                    kabupaten: {
                        required: "Kabupaten harus di isi"
                    },
                    kodePos: {
                        required: "Kode Pos harus di isi"
                    },
                    jenisUsaha: {
                        required: "Jenis usaha harus di isi"
                    },
                    produkAkhir: {
                        required: "Produk akhir harus di isi"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit

                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                        error.insertAfter($('#register_tnc_error'));
                    } else if (element.closest('.input-icon').size() === 1) {
                        error.insertAfter(element.closest('.input-icon'));
                    } else {
                        error.insertAfter(element);
                    }
                },

                submitHandler: function (form) {
                    runWaitMe('body', 'roundBounce', 'Menyimpan...');

                    $.ajax({
                        url: "<?= route('postDataUmumPerusahaan')?>",
                        method: "POST",
                        data: {
                            id: $('#id').val(),
                            namPerusahaan: $('#namaPerusahaan').val(),
                            alamatPerusahaan: $('#alamat').val(),
                            noTelepon: $('#noTelepon').val(),
                            kelurahan: $('#kelurahan').val(),
                            kabupaten: $('#kabupaten').val(),
                            kodePos: $('#kodePos').val(),
                            jenisUsaha: $('#jenisUsaha').val(),
                            produkAkhir: $('#produkAkhir').val(),
                            korwilId: $('#idKorwil').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                notificationMessage('Berhasil', 'success');
                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                $('body').waitMe('hide');
                                var errorMessagesCount = s.message.length;
                                for (var i = 0; i < errorMessagesCount; i++) {
                                    notificationMessage(s.message[i], 'error');
                                }
                            }
                        }
                    })
                }
            });
            $('#formLegal').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    tglPendirian: {
                        required: true
                    },
                    nomorAktaPendirian: {
                        required: true
                    },
                    statusPerusahaan: {
                        required: true
                    },
                    statusPemilikan: {
                        required: true
                    },
                    statusPermodalan: {
                        required: true
                    }
                },

                messages: {
                    tglPendirian: {
                        required: "Tanggal pendirian harus di isi"
                    },
                    nomorAktaPendirian: {
                        required: "Nomor akta pendirian harus di isi"
                    },
                    statusPerusahaan: {
                        required: "Status perusahaan harus di isi"
                    },
                    statusPemilikan: {
                        required: "Status Pemilikan harus di isi"
                    },
                    statusPermodalan: {
                        required: "Status permodalan harus di isi"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit

                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                        error.insertAfter($('#register_tnc_error'));
                    } else if (element.closest('.input-icon').size() === 1) {
                        error.insertAfter(element.closest('.input-icon'));
                    } else {
                        error.insertAfter(element);
                    }
                },

                submitHandler: function (form) {
                    runWaitMe('body', 'roundBounce', 'Menyimpan...');

                    $.ajax({
                        url: "<?= route('postDataLegalPerusahaan')?>",
                        method: "POST",
                        data: {
                            tglPendirian: $('#tglPendirian').val(),
                            nomorAktaPendirian: $('#nomorAktaPendirian').val(),
                            tglPerpindahanPerusahaan: $('#tglPerpindahanPerusahaan').val(),
                            alamatLama: $('#alamatLama').val(),
                            statusPerusahaan: $('#statusPerusahaan').val(),
                            jumlahCabangIndonesia: $('#jumlahCabangIndonesia').val(),
                            jumlahCabangLuarIndonesia: $('#jumlahCabangLuarIndonesia').val(),
                            statusPemilikan: $('#statusPemilikan').val(),
                            statusPermodalan: $('#statusPermodalan').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                notificationMessage('Berhasil', 'success');
                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                $('body').waitMe('hide');
                                var errorMessagesCount = s.message.length;
                                for (var i = 0; i < errorMessagesCount; i++) {
                                    notificationMessage(s.message[i], 'error');
                                }
                            }
                        }
                    })
                }
            });
            $('#formPengelolah').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    namaPengelolah: {
                        required: true
                    },
                    alamatPengelolah: {
                        required: true
                    }
                },

                messages: {
                    namaPengelolah: {
                        required: "Nama pengelolah harus di isi"
                    },
                    alamatPengelolah: {
                        required: "Alamat pengelolah harus di isi"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit

                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                        error.insertAfter($('#register_tnc_error'));
                    } else if (element.closest('.input-icon').size() === 1) {
                        error.insertAfter(element.closest('.input-icon'));
                    } else {
                        error.insertAfter(element);
                    }
                },

                submitHandler: function (form) {
                    runWaitMe('body', 'roundBounce', 'Menyimpan...');

                    $.ajax({
                        url: "<?= route('postDataPengelolahPerusahaan')?>",
                        method: "POST",
                        data: {
                            namaPengelolah: $('#namaPengelolah').val(),
                            alamatPengelolah: $('#alamatPengelolah').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                notificationMessage('Berhasil', 'success');
                                setTimeout(function () {
                                    window.location.reload();
                                }, 3000);
                            } else {
                                $('body').waitMe('hide');
                                var errorMessagesCount = s.message.length;
                                for (var i = 0; i < errorMessagesCount; i++) {
                                    notificationMessage(s.message[i], 'error');
                                }
                            }
                        }
                    })
                }
            });
            $('#formPemilik').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    namaPemilik: {
                        required: true
                    },
                    alamatPemilik: {
                        required: true
                    }
                },

                messages: {
                    namaPemilik: {
                        required: "Nama pemilik harus di isi"
                    },
                    alamatPemilik: {
                        required: "Alamat pemilik harus di isi"
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit

                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                },

                errorPlacement: function (error, element) {
                    if (element.attr("name") == "tnc") { // insert checkbox errors after the container
                        error.insertAfter($('#register_tnc_error'));
                    } else if (element.closest('.input-icon').size() === 1) {
                        error.insertAfter(element.closest('.input-icon'));
                    } else {
                        error.insertAfter(element);
                    }
                },

                submitHandler: function (form) {
                    var url;
                    var id = $('#id').val();

                    runWaitMe('body', 'roundBounce', 'Menyimpan...');

                    if ($('#id').val() != '') {
                        url = "{{route('updateKepemilikan')}}";
                    } else {
                        url = "{{route('postKepemilikan')}}";
                    }

                    $.ajax({
                        url: url,
                        method: "POST",
                        data: {
                            id: $('#id').val(),
                            namaPemilik: $('#namaPemilik').val(),
                            alamatPemilik: $('#alamatPemilik').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                $('body').waitMe('hide');
                                notificationMessage('Berhasil', 'success');
                                setTimeout(function () {
                                    $('#tblPemilik').bootgrid('reload');
                                }, 3000);
                            } else {
                                $('body').waitMe('hide');
                                var errorMessagesCount = s.message.length;
                                for (var i = 0; i < errorMessagesCount; i++) {
                                    notificationMessage(s.message[i], 'error');
                                }
                            }
                        }
                    })
                }
            });

            paginationTable();
        });


        function paginationTable() {
            var grid = $('#tblPemilik').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}",
                        perusahaanId:"{{auth()->user()->id}}"
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

