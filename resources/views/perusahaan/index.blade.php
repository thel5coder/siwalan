@extends('app')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <form id="frmPerusahaan">
                <div class="panel panel-with-borders m-b-0">
                    <div class="panel-body">
                        <div class="nav-tabs-horizontal">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript: void(0);" data-toggle="tab"
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
                                    <div class="form-group">
                                        <label for="namaPerusahaan">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan"
                                               placeholder="Nama perusahaan" value="{{ucwords(auth()->user()->nama)}}"
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
                                        <label for="kelurahan">Kelurahan/Kecamatan</label>
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                               placeholder="Keluarahan" value="{{auth()->user()->kelurahan}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten">Kabupaten</label>
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                               placeholder="Kabupaten" value="{{auth()->user()->kabupaten}}" required>
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
                                            <option value="Pertanian,Kehutanan,dan Perikanan" @if(auth()->user()->jenis_usaha == 'Pertanian,Kehutanan,dan Perikanan') {{'selected'}} @endif>
                                                Pertanian, Kehutanan,dan Perikanan
                                            </option>
                                            <option value="Pertambangan dan Penggalian" @if(auth()->user()->jenis_usaha == 'Pertambangan dan Penggalian') {{'selected'}} @endif>
                                                Pertambangan dan Penggalian
                                            </option>
                                            <option value="Industri Pegolahan" @if(auth()->user()->jenis_usaha == 'Industri Pegolahan') {{'selected'}} @endif>
                                                Industri Pengolahan
                                            </option>
                                            <option value="Pengadaan Listrik,Gas,Uap/Air Panas dan Udara Dingin" @if(auth()->user()->jenis_usaha == 'Pengadaan Listrik,Gas,Uap/Air Panas dan Udara Dingin') {{'selected'}} @endif>
                                                Pengadaan Listrik,Gas,Uap/Air Panas dan Udara Dingin
                                            </option>
                                            <option value="Pengelolaan Air, Pengelolaan Air Limbah Pengelolaan dan Daur Ulang Sampang dan Aktivitas Remediasi" @if(auth()->user()->jenis_usaha == 'Pengelolaan Air, Pengelolaan Air Limbah Pengelolaan dan Daur Ulang Sampang dan Aktivitas Remediasi') {{'selected'}} @endif>
                                                Pengelolaan Air, Pengelolaan Air Limbah Pengelolaan dan Daur Ulang
                                                Sampang dan Aktivitas Remediasi
                                            </option>
                                            <option value="Konstruksi" @if(auth()->user()->jenis_usaha == 'Konstruksi') {{'selected'}} @endif>
                                                Konstruksi
                                            </option>
                                            <option value="Perdagangan Besardan eceran;Reparasi dan Perawatan Mobil dan Sepeda Motor" @if(auth()->user()->jenis_usaha == 'Perdagangan Besardan eceran;Reparasi dan Perawatan Mobil dan Sepeda Motor') {{'selected'}} @endif>
                                                Perdagangan Besardan eceran;Reparasi dan Perawatan Mobil dan Sepeda
                                                Motor
                                            </option>
                                            <option value="Pengangkutan dan Pergudangan" @if(auth()->user()->jenis_usaha == 'Pengangkutan dan Pergudangan') {{'selected'}} @endif>
                                                Pengangkutan dan Pergudangan
                                            </option>
                                            <option value="Penyediaan Akomodasi dan Penyediaan Makan Minum" @if(auth()->user()->jenis_usaha == 'Penyediaan Akomodasi dan Penyediaan Makan Minum') {{'selected'}} @endif>
                                                Penyediaan
                                                Akomodasi dan Penyediaan Makan Minum
                                            </option>
                                            <option value="Informasi dan Komunikasi" @if(auth()->user()->jenis_usaha == 'Informasi dan Komunikasi') {{'selected'}} @endif>
                                                Informasi dan Komunikasi
                                            </option>
                                            <option value="Aktivitas Keuangan dan Asuransi" @if(auth()->user()->jenis_usaha == 'Aktivitas Keuangan dan Asuransi') {{'selected'}} @endif>
                                                Aktivitas Keuangan dan
                                                Asuransi
                                            </option>
                                            <option value="Real Estat" @if(auth()->user()->jenis_usaha == 'Real Estat') {{'selected'}} @endif>
                                                Real Estat
                                            </option>
                                            <option value="Aktivitas Profesional, Ilmiah dan Teknis" @if(auth()->user()->jenis_usaha == 'Aktivitas Profesional, Ilmiah dan Teknis') {{'selected'}} @endif>
                                                Aktivitas
                                                Profesional, Ilmiah dan Teknis
                                            </option>
                                            <option value="Aktivitas Penyewaaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan Agen Perjalanan dan Penunjang Usaha Lainnya" @if(auth()->user()->jenis_usaha == 'Aktivitas Penyewaaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan Agen Perjalanan dan Penunjang Usaha Lainnya') {{'selected'}} @endif>
                                                Aktivitas Penyewaaan dan Sewa Guna Usaha Tanpa Hak Opsi,
                                                Ketenagakerjaan Agen Perjalanan dan Penunjang Usaha Lainnya
                                            </option>
                                            <option value="Administrasi Pemerintahaan, Pertahanan dan Jaminan Sosial Wajib" @if(auth()->user()->jenis_usaha == 'Administrasi Pemerintahaan, Pertahanan dan Jaminan Sosial Wajib') {{'selected'}} @endif>
                                                Administrasi Pemerintahaan, Pertahanan dan Jaminan Sosial Wajib
                                            </option>
                                            <option value="Pendidikan" @if(auth()->user()->jenis_usaha == 'Pendidikan') {{'selected'}} @endif>
                                                Pendidikan
                                            </option>
                                            <option value="Aktivitas Kesehatan Manusia dan Aktivitas Sosial" @if(auth()->user()->jenis_usaha == 'Aktivitas Kesehatan Manusia dan Aktivitas Sosial') {{'selected'}} @endif>
                                                Aktivitas
                                                Kesehatan Manusia dan Aktivitas Sosial
                                            </option>
                                            <option value="Kebudayaan,Hiburan dan Rekreasi" @if(auth()->user()->jenis_usaha == 'Kebudayaan,Hiburan dan Rekreasi') {{'selected'}} @endif>
                                                Kebudayaan,Hiburan dan
                                                Rekreasi
                                            </option>
                                            <option value="Aktivitas Jasa Lainya" @if(auth()->user()->jenis_usaha == 'Aktivitas Jasa Lainya') {{'selected'}} @endif>
                                                Aktivitas Jasa Lainnya
                                            </option>
                                            <option value="Aktivitas Rumah Tangga sebagai Pemberi Kerja;Aktivitas yang Menghasilkan Barang dan Jasa oleh Rumah Tangga yang Digunakan untuk Memenuhi Kebutuhan Sendiri" @if(auth()->user()->jenis_usaha == 'Aktivitas Rumah Tangga sebagai Pemberi Kerja;Aktivitas yang Menghasilkan Barang dan Jasa oleh Rumah Tangga yang Digunakan untuk Memenuhi Kebutuhan Sendiri') {{'selected'}} @endif>
                                                Aktivitas Rumah Tangga sebagai Pemberi Kerja;Aktivitas yang Menghasilkan
                                                Barang dan Jasa oleh Rumah Tangga yang Digunakan untuk Memenuhi
                                                Kebutuhan Sendiri
                                            </option>
                                            <option value="Kegiatan Badan International dan Badan Ekstra Internasional Lainnya" @if(auth()->user()->jenis_usaha == 'Kegiatan Badan International dan Badan Ekstra Internasional Lainnya') {{'selected'}} @endif>
                                                Kegiatan Badan International dan Badan Ekstra Internasional Lainnya
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="produkAkhir">Produk Akhir</label>
                                        <input type="text" class="form-control" id="produkAkhir" name="produkAkhir"
                                               placeholder="Produk Akhir" value="{{auth()->user()->produk_akhir}}"
                                               required>
                                    </div>

                                </div>
                                <div class="tab-pane" id="profile2" role="tabpanel">
                                    <div class="form-group">
                                        <label for="namaPemilik">Nama Pemilik Perusahaan</label>
                                        <input type="text" class="form-control" id="namaPemilik" name="namaPemilik"
                                               placeholder="Nama pemilik perusahaan"
                                               value="{{auth()->user()->nama_pemilik}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatPemilik">Alamat Pemilik</label>
                                        <textarea class="form-control" id="alamatPemilik" name="alamatPemilik"
                                                  placeholder="Alamat pemilik perusahaan"
                                                  value="{{auth()->user()->alamat_pemilik}}"
                                                  required>{{auth()->user()->alamat_pemilik}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="namaPengelolah">Nama Pengelolah Perusahaan</label>
                                        <input type="text" class="form-control" id="namaPengelolah"
                                               name="namaPengelolah"
                                               placeholder="Nama pengelolah perusahaan"
                                               value="{{auth()->user()->nama_pengelolah}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatPengelolah">Alamat Pengelolah</label>
                                        <textarea class="form-control" id="alamatPengelolah" name="alamatPengelolah"
                                                  placeholder="Alamat pengelolah perusahaan"
                                                  value="{{auth()->user()->alamat_pengelolah}}"
                                                  required>{{auth()->user()->alamat_pengelolah}}</textarea>
                                    </div>

                                </div>
                                <div class="tab-pane" id="messages2" role="tabpanel">
                                    <div class="form-group">
                                        <label for="tglPendirian">Tanggal Pendirian Perusahaan</label>
                                        <input type="text" class="form-control tglDatePicker" id="tglPendirian"
                                               name="tglPendirian"
                                               placeholder="Tanggal Pendirian Perusahaan"
                                               value="{{auth()->user()->tanggal_pendirian}}"
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
                                    <div class="form-group">
                                        <label for="tglPerpindahanPerusahaan">Tanggal Perpindahan Perusahaan</label>
                                        <input type="text" class="form-control tglDatePicker"
                                               id="tglPerpindahanPerusahaan" name="tglPerpindahanPerusahaan"
                                               placeholder="Tanggal Perpindahan Perusahaan"
                                               value="{{auth()->user()->tgl_perpindahan_perusahaan}}"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamatLama">Alamat Lama</label>
                                        <textarea type="text" class="form-control" id="alamatLama" name="alamatLama"
                                                  placeholder="Alamat lama"
                                                  required>{{auth()->user()->alamat_lama}}</textarea>
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
                                            <option value="Asing" @if(auth()->user()->status_pemilikan == 'Asing') {{'selected'}} @endif>Asing</option>
                                            <option value="Perum" @if(auth()->user()->status_pemilikan == 'Perum') {{'selected'}} @endif>Perum</option>
                                            <option value="Perusahaan Daerah" @if(auth()->user()->status_pemilikan == 'Perusahaan Daerah') {{'selected'}} @endif>Perusahaan Daerah</option>
                                            <option value="Yayasan" @if(auth()->user()->status_pemilikan == 'Yayasan') {{'selected'}} @endif>Yayasan</option>
                                            <option value="Koperasi" @if(auth()->user()->status_pemilikan == 'Koperasi') {{'selected'}} @endif>Koperasi</option>
                                            <option value="Perseorangan" @if(auth()->user()->status_pemilikan == 'Perseorangan') {{'selected'}} @endif>Perseorangan</option>
                                            <option value="Badan usaha lainnya" @if(auth()->user()->status_pemilikan == 'Badan usaha lainnya') {{'selected'}} @endif>Badan Usaha Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="statusPermodalan">Status Permodalan</label>
                                        <select name="statusPermodalan" id="statusPermodalan" class="form-control" required>
                                            <option value="" @if(auth()->user()->status_permodalan == '') {{'selected'}} @endif>Pilih Status Permodalan</option>
                                            <option value="PMDN" @if(auth()->user()->status_permodalan =='PMDN') {{'selected'}} @endif>PMDN</option>
                                            <option value="PMA" @if(auth()->user()->status_permodalan =='PMA') {{'selected'}} @endif>PMA</option>
                                            <option value="Swasta Nasional" @if(auth()->user()->status_permodalan =='Swasta Nasional') {{'selected'}} @endif>Swasta Nasional</option>
                                            <option value="Persero" @if(auth()->user()->status_permodalan == 'Persero') {{'selected'}} @endif>Persero</option>
                                            <option value="Joint Venture" @if(auth()->user()->status_permodalan =='Joint Venture') {{'selected'}} @endif>Joint Venture</option>
                                        </select>
                                    </div>
                                    <input type="hidden" id="id" value="{{auth()->user()->id}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="icon-check"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('customscript')
    <script src="{{asset('public/vendors/jquery-validation/js/jquery.validate.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#frmPerusahaan').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    namaPerusahaan:{
                        required:true
                    },
                    alamat:{
                        required:true
                    },
                    noTelepon:{
                        required:true
                    },
                    kelurahan:{
                        required:true
                    },
                    kabupaten:{
                        required:true
                    },
                    kodePos:{
                        required:true
                    },
                    jenisUsaha:{
                        required:true
                    },
                    produkAkhir:{
                        required:true
                    },
                    namaPemilik:{
                        required:true
                    },
                    alamatPemilik:{
                        required:true
                    },
                    namaPengelolah:{
                        required:true
                    },
                    alamatPengelolah:{
                        required:true
                    },
                    tglPendirian:{
                        required:true
                    },
                    nomorAktaPendirian:{
                        required:true
                    },
                    statusPerusahaan:{
                        required:true
                    },
                    statusPemilikan:{
                        required:true
                    },
                    statusPermodalan:{
                        required:true
                    }
                },

                messages: {
                    namaPerusahaan:{
                        required:"Nama perusahaan harus di isi"
                    },
                    alamat:{
                        required:"Alamat harus di isi"
                    },
                    noTelepon:{
                        required:"No Telepon perusahaan harus di isi"
                    },
                    kelurahan:{
                        required:"Kelurahan harus di isi"
                    },
                    kabupaten:{
                        required:"Kabupaten harus di isi"
                    },
                    kodePos:{
                        required:"Kode Pos harus di isi"
                    },
                    jenisUsaha:{
                        required:"Jenis usaha harus di isi"
                    },
                    produkAkhir:{
                        required:"Produk akhir harus di isi"
                    },
                    namaPemilik:{
                        required:"Nama pemilik harus di isi"
                    },
                    alamatPemilik:{
                        required:"Alamat pemilik harus di isi"
                    },
                    namaPengelolah:{
                        required:"Nama pengelolah harus di isi"
                    },
                    alamatPengelolah:{
                        required:"Alamat pengelolah harus di isi"
                    },
                    tglPendirian:{
                        required:"Tanggal pendirian harus di isi"
                    },
                    nomorAktaPendirian:{
                        required:"Nomor akta pendirian harus di isi"
                    },
                    statusPerusahaan:{
                        required:"Status perusahaan harus di isi"
                    },
                    statusPemilikan:{
                        required:"Status Pemilikan harus di isi"
                    },
                    statusPermodalan:{
                        required:"Status permodalan harus di isi"
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
                        url: "<?= route('postDataPerusahaan')?>",
                        method: "POST",
                        data: {
                            id:$('#id').val(),
                            namPerusahaan:$('#namaPerusahaan').val(),
                            alamatPerusahaan:$('#alamat').val(),
                            noTelepon:$('#noTelepon').val(),
                            kelurahan:$('#kelurahan').val(),
                            kabupaten:$('#kabupaten').val(),
                            kodePos:$('#kodePos').val(),
                            jenisUsaha:$('#jenisUsaha').val(),
                            produkAkhir:$('#produkAkhir').val(),
                            namaPemilik:$('#namaPemilik').val(),
                            alamatPemilik:$('#alamatPemilik').val(),
                            namaPengelolah:$('#namaPengelolah').val(),
                            alamatPengelolah:$('#alamatPengelolah').val(),
                            tglPendirian:$('#tglPendirian').val(),
                            nomorAktaPendirian:$('#nomorAktaPendirian').val(),
                            tglPerpindahanPerusahaan:$('#tglPerpindahanPerusahaan').val(),
                            alamatLama:$('#alamatLama').val(),
                            statusPerusahaan:$('#statusPerusahaan').val(),
                            jumlahCabangIndonesia:$('#jumlahCabangIndonesia').val(),
                            jumlahCabangLuarIndonesia:$('#jumlahCabangLuarIndonesia').val(),
                            statusPemilikan:$('#statusPemilikan').val(),
                            statusPermodalan:$('#statusPermodalan').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                notificationMessage('Berhasil','success');
                                setTimeout(function () {
                                    window.location.reload();
                                },3000);
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
        });
    </script>
@stop

