@extends('app')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">4. Limbah Produksi</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">4. Limbah Produksi</li>
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
                                   data-target="#limbahProduksi" role="tab">
                                    <i class="fa fa-recycle"></i>
                                    Limbah Produksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
                                   data-target="#amdal" role="tab">
                                    <i class="fa fa-archive"></i>
                                    Instalasi Pengolah Limbah dan Amdal
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content padding-vertical-20">
                            <input type="hidden" id="laporId" value="{{$laporId}}"/>
                            <div class="tab-pane active" id="limbahProduksi" role="tabpanel">

                                <form id="frmLimbahProduksi">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            @if(count($dataLimbahProduksi)>0)
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="limbahProduksi"
                                                               name="limbahProduksi"
                                                               value="Padat"
                                                        @foreach($dataLimbahProduksi as $limbahProduksi)
                                                            @if($limbahProduksi->jenis_limbah_produksi == 'Padat')
                                                                {{'checked'}}
                                                                    @endif
                                                                @endforeach
                                                        > Padat
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="limbahProduksi"
                                                               name="limbahProduksi"
                                                               value="Cair" @foreach($dataLimbahProduksi as $limbahProduksi)
                                                            @if($limbahProduksi->jenis_limbah_produksi == 'Cair')
                                                                {{'checked'}}
                                                                    @endif
                                                                @endforeach>
                                                        Cair
                                                    </label>

                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="limbahProduksi"
                                                               name="limbahProduksi"
                                                               value="Gas" @foreach($dataLimbahProduksi as $limbahProduksi)
                                                            @if($limbahProduksi->jenis_limbah_produksi == 'Gas')
                                                                {{'checked'}}
                                                                    @endif
                                                                @endforeach>
                                                        Gas
                                                    </label>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="limbahProduksi"
                                                               name="limbahProduksi"
                                                               value="Padat"
                                                        > Padat
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="limbahProduksi"
                                                               name="limbahProduksi"
                                                               value="Cair">
                                                        Cair
                                                    </label>

                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" class="limbahProduksi"
                                                               name="limbahProduksi"
                                                               value="Gas">
                                                        Gas
                                                    </label>
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
                            <div class="tab-pane" id="amdal" role="tabpanel">
                                <form id="frmAmdal" class="form-horizontal">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            @if(count($dataInstalasiLimbahAmdal)>0)
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="instalasiPengolahLimbah"
                                                               class="col-md-3 control-label">Instalasi
                                                            Pengolahan Limbah</label>
                                                        <div class="col-md-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" class="instalasiLimbah"
                                                                       name="instalasiLimbah"
                                                                       value="1" @if($dataInstalasiLimbahAmdal->instalasi_limbah == 1) {{'checked'}} @endif>
                                                                Ada
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" class="instalasiLimbah"
                                                                       name="instalasiLimbah"
                                                                       value="0" @if($dataInstalasiLimbahAmdal->instalasi_limbah == 0) {{'checked'}} @endif>
                                                                Tidak Ada
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sertifikatAmdal"
                                                               class="col-md-3 control-label">Amdal</label>
                                                        <div class="col-md-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" class="sertifikatAmdal"
                                                                       name="sertifikatAmdal"
                                                                       value="1" @if($dataInstalasiLimbahAmdal->sertifikat_amdal == 1) {{'checked'}} @endif>
                                                                Ada
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" class="sertifikatAmdal"
                                                                       name="sertifikatAmdal"
                                                                       value="0" @if($dataInstalasiLimbahAmdal->sertifikat_amdal == 0) {{'checked'}} @endif>
                                                                Tidak Ada
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="noSertifikat" class="control-label col-md-3">No
                                                            Sertifikat</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="noSertifikat"
                                                                   name="noSertifikat"
                                                                   placeholder="Masukkan nomor sertifikat"
                                                                   value="{{$dataInstalasiLimbahAmdal->no_sertifikat}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglSertifikat" class="control-label col-md-3">Tanggal
                                                            Sertifikat</label>
                                                        <div class="col-md-4">
                                                            <input type="text" id="tglSertifikat" name="tglSertifikat"
                                                                   class="form-control"
                                                                   value="{{date('d-m-Y',strtotime($dataInstalasiLimbahAmdal->tgl_sertifikat))}}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="instalasiPengolahLimbah"
                                                               class="col-md-3 control-label">Instalasi
                                                            Pengolahan Limbah</label>
                                                        <div class="col-md-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" class="instalasiLimbah"
                                                                       name="instalasiLimbah"
                                                                       value="1">
                                                                Ada
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" class="instalasiLimbah"
                                                                       name="instalasiLimbah"
                                                                       value="0">
                                                                Tidak Ada
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sertifikatAmdal"
                                                               class="col-md-3 control-label">Amdal</label>
                                                        <div class="col-md-9">
                                                            <label class="radio-inline">
                                                                <input type="radio" class="sertifikatAmdal"
                                                                       name="sertifikatAmdal"
                                                                       value="1">
                                                                Ada
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" class="sertifikatAmdal"
                                                                       name="sertifikatAmdal"
                                                                       value="0">
                                                                Tidak Ada
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="noSertifikat" class="control-label col-md-3">No
                                                            Sertifikat</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="noSertifikat"
                                                                   name="noSertifikat"
                                                                   placeholder="Masukkan nomor sertifikat"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglSertifikat" class="control-label col-md-3">Tanggal
                                                            Sertifikat</label>
                                                        <div class="col-md-4">
                                                            <input type="text" id="tglSertifikat" name="tglSertifikat"
                                                                   class="form-control"/>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('customscript')
    <script>
        var jenisLimbahProduksi = [];

        $(document).ready(function () {

            $('#tglSertifikat').datepicker({
                format: 'dd-mm-yyyy'
            });

            $('.limbahProduksi').change(function () {
                jenisLimbahProduksi = [];
                $('.limbahProduksi').each(function () {
                    if ($(this).prop('checked')) {
                        jenisLimbahProduksi.push($(this).val());
                    }
                });

                console.log(jenisLimbahProduksi);
            });
            $('#frmLimbahProduksi').submit(function (e) {
                e.preventDefault();
                runWaitMe('body', 'roundBounce', 'Menyimpan...');
                if (jenisLimbahProduksi.length == 0) {
                    $('body').waitMe('hide');
                    notificationMessage('Pilih salah satu jenis limbah', 'error');
                    return false;
                } else {
                    $.ajax({
                        url: "{{route('postLimbahProduksi')}}",
                        method: "POST",
                        data: {
                            laporId: $('#laporId').val(),
                            jenisLimbahProduksi: jenisLimbahProduksi
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

            $('#frmAmdal').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    instalasiLimbah: {
                        required: true
                    },
                    sertifikatAmdal: {
                        required: true
                    },
                },

                messages: {
                    instalasiLimbah: {
                        required: "Pilih ada atau tidak ada"
                    },
                    sertifikatAmdal: {
                        required: "Pilih ada atau tidak ada"
                    },
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
                        url: "<?= route('postInstalasiLimbahAmdal')?>",
                        method: "POST",
                        data: {
                            laporId: $('#laporId').val(),
                            instalasiLimbah: $('input[name=instalasiLimbah]').val(),
                            sertifikatAmdal: $('input[name=sertifikatAmdal]').val(),
                            noSertifikat: $('#noSertifikat').val(),
                            tglSertifikat: $('#tglSertifikat').val()
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
        });

    </script>
@stop

