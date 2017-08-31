@extends('app')
@section('title','Pengupahan')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">5. Pengupahan,Tunjaangan Hari Raya Keagamaan,Bonus/Gratifikasi</span>
                </h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">5. Pengupahan,Tunjaangan Hari Raya Keagamaan,Bonus/Gratifikasi</li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <form id="frmPengupahan" class="form-horizontal">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">Pengupahan,Tunjaangan Hari Raya Keagamaan,Bonus/Gratifikasi</h5>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" value="{{$laporId}}" id="laporId"/>

                        @if(count($dataPengupahan)>0)
                            <div class="row">
                                <div class="form-group">
                                    <label for="upahDiBayar" class="control-label col-md-4">Jumlah Upah Seluruh Pekerja
                                        yang
                                        Di Bayarkan</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-lg" id="upahDiBayar"
                                               name="upahDiBayar"
                                               value="{{$dataPengupahan->jumlah_upah_pekerja_dibayarkan}}"
                                               onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tingkatUpahTertinggi" class="control-label col-md-4">Tingkat Upah
                                        Tertinggi</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-lg" id="tingkatUpahTertinggi"
                                               name="tingkatUpahTertinggi" onkeypress="return hanyaAngka(event)"
                                               value="{{$dataPengupahan->tingkat_upah_tertinggi}}"
                                               required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tingkatUpahTerendah" class="control-label col-md-4">Tingkat Upah
                                        Terendah</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-lg" id="tingkatUpahTerendah"
                                               name="tingkatUpahTerendah" onkeypress="return hanyaAngka(event)"
                                               value="{{$dataPengupahan->tingkat_upah_terendah}}"
                                               required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jmlPenerimaUmkUmpUmsk" class="control-label col-md-4">Jumlah Pekerja
                                        Penerima UMK/UMP/UMSK</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="jmlPenerimaUmkUmpUmsk"
                                               name="jmlPenerimaUmkUmpUmsk" onkeypress="return hanyaAngka(event)"
                                               placeholder="Dalam angka"
                                               value="{{$dataPengupahan->jumlah_penerima_umk_ump_umsk}}" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="jmlPenerimaUmkUmpUmskPersen" class="control-label col-md-4"></label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="jmlPenerimaUmkUmpUmskPersen"
                                               name="jmlPenerimaUmkUmpUmskPersen"
                                               onkeypress="return hanyaAngka(event)" placeholder="Dalam persen"
                                               value="{{$dataPengupahan->jumlah_penerima_umk_ump_umsk_dalam_persen}}"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tunjanganHariRayaKeagamaan" class="control-label col-md-4">Tunjangan
                                        Hari
                                        Raya Keagamaan</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="tunjanganHariRayaKeagamaan" value="1 bulan upah"
                                                   required @if($dataPengupahan->tunjangan_hari_raya_keagamaan == '1 bulan upah') {{'checked'}} @endif>
                                            1 bulan upah
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="tunjanganHariRayaKeagamaan" value=">1 bulan upah"
                                                   required @if($dataPengupahan->tunjangan_hari_raya_keagamaan == '>1 bulan upah') {{'checked'}} @endif>
                                            >1 bulan upah
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bonusGratifikasi"
                                           class="control-label col-md-4">Bonus/Gratifikasi</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="bonusGratifikasi" value="1 bulan gaji"
                                                   required @if($dataPengupahan->bonus_gratifikasi =='1 bulan gaji'){{'checked'}}@endif>
                                            1
                                            bulan gaji
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="bonusGratifikasi" value=">1 bulan gaji" required @if($dataPengupahan->bonus_gratifikasi =='>1 bulan gaji'){{'checked'}}@endif>
                                            >1
                                            bulan gaji
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="bonusGratifikasi" value="<1 bulan gaji" required @if($dataPengupahan->bonus_gratifikasi =='<1 bulan gaji'){{'checked'}}@endif>
                                            <1
                                            bulan gaji
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="form-group">
                                    <label for="upahDiBayar" class="control-label col-md-4">Jumlah Upah Seluruh Pekerja
                                        yang
                                        Di Bayarkan</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-lg" id="upahDiBayar"
                                               name="upahDiBayar"
                                               value="0" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tingkatUpahTertinggi" class="control-label col-md-4">Tingkat Upah
                                        Tertinggi</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-lg" id="tingkatUpahTertinggi"
                                               name="tingkatUpahTertinggi" onkeypress="return hanyaAngka(event)"
                                               value="0"
                                               required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tingkatUpahTerendah" class="control-label col-md-4">Tingkat Upah
                                        Terendah</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control input-lg" id="tingkatUpahTerendah"
                                               name="tingkatUpahTerendah" onkeypress="return hanyaAngka(event)"
                                               value="0"
                                               required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jmlPenerimaUmkUmpUmsk" class="control-label col-md-4">Jumlah Pekerja
                                        Penerima UMK/UMP/UMSK</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="jmlPenerimaUmkUmpUmsk"
                                               name="jmlPenerimaUmkUmpUmsk" onkeypress="return hanyaAngka(event)"
                                               placeholder="Dalam angka" required>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="jmlPenerimaUmkUmpUmskPersen" class="control-label col-md-4"></label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="jmlPenerimaUmkUmpUmskPersen"
                                               name="jmlPenerimaUmkUmpUmskPersen"
                                               onkeypress="return hanyaAngka(event)" placeholder="Dalam persen"
                                               required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tunjanganHariRayaKeagamaan" class="control-label col-md-4">Tunjangan
                                        Hari
                                        Raya Keagamaan</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="tunjanganHariRayaKeagamaan" value="1 bulan upah"
                                                   required> 1 bulan upah
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="tunjanganHariRayaKeagamaan" value=">1 bulan upah"
                                                   required> >1 bulan upah
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bonusGratifikasi"
                                           class="control-label col-md-4">Bonus/Gratifikasi</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input type="radio" name="bonusGratifikasi" value="1 bulan gaji" required> 1
                                            bulan gaji
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="bonusGratifikasi" value=">1 bulan gaji" required>
                                            >1
                                            bulan gaji
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="bonusGratifikasi" value="<1 bulan gaji" required>
                                            <1
                                            bulan gaji
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="panel-footer">
                        <div class="heading-elements">
                            <button type="submit" class="btn btn-primary heading-btn pull-left"><i
                                        class="fa fa-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('customscript')
    <script>
        var tunjanganHariRaya = '';
        $(document).ready(function () {
            $('#upahDiBayar').number(true);

            $('#tingkatUpahTertinggi').number(true);

            $('#tingkatUpahTerendah').number(true);

            $('#frmPengupahan').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    jmlPenerimaUmkUmpUmsk: {
                        required: true
                    },
                    jmlPenerimaUmkUmpUmskPersen: {
                        required: true
                    },
                    tunjanganHariRayaKeagamaan: {
                        required: true
                    },
                    bonusGratifikasi: {
                        required: true
                    }
                },

                messages: {
                    jmlPenerimaUmkUmpUmsk: {
                        required: "Jumlah pekerja penerima UMK/UMP/UMSK harus di isi"
                    },
                    jmlPenerimaUmkUmpUmskPersen: {
                        required: "Jumlah pekerja penerima UMK/UMP/UMSK dalam persen harus di isi"
                    },
                    tunjanganHariRayaKeagamaan: {
                        required: "Pilih salah satu"
                    },
                    bonusGratifikasi: {
                        required: "Pilih salah satu"
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

//                    console.log(parseInt($('#tingkatUpahTerendah').val()));

                    $.ajax({
                        url: "{{route('postPengupahan')}}",
                        method: "POST",
                        data: {
                            laporId: $('#laporId').val(),
                            upahDiBayarkan: parseInt($('#upahDiBayar').val()),
                            tingkatUpahTertinggi: parseInt($('#tingkatUpahTertinggi').val()),
                            tingkatUpahTerendah: parseInt($('#tingkatUpahTerendah').val()),
                            jmlPenerimaUmkUmpUmsk: $('#jmlPenerimaUmkUmpUmsk').val(),
                            jmlPenerimaUmkUmpUmskPersen: $('#jmlPenerimaUmkUmpUmskPersen').val(),
                            tunjanganHariRayaKeagamaan: $('input[name=tunjanganHariRayaKeagamaan]:checked').val(),
                            bonusGratifikasi: $('input[name=bonusGratifikasi]:checked').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                notificationMessage('Berhasil', 'success');
                                setTimeout(function () {
                                    location.reload();
                                }, 2000);
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

