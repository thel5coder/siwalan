@extends('app')
@section('title','Wajib Lapor')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Perusahaan</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Wajib Lapor</li>
                </ul>
            </div>
            <div class="heading-elements">
                @if($wajibLaporIsExist)
                    <button class="btn border-danger text-danger btn-flat" data-popup="tooltip" title="" data-placement="left" id="left" data-original-title="Anda sudah melakukan wajib lapor tahun ini, lakukan wajib lapor lagi tahun depan"><i
                                class="fa fa-file-text position-left"></i>
                        Wajib Lapor Baru</button>
                @else
                    @if($countWajibLapor>0)
                        <button id="btnWajibLaporBaru" class="btn border-danger text-danger btn-flat"><i
                                    class="fa fa-file-text position-left"></i>
                            Wajib Lapor Baru</button>
                    @else
                        <a href="#" data-toggle="modal" data-target="#myModal" class="btn border-danger text-danger btn-flat"><i
                                    class="fa fa-file-text position-left"></i>
                            Wajib Lapor Baru</a>
                    @endif
                @endif
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-default panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Data Wajib Lapors</h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblLapor">
                            <thead>
                            <tr>
                                <th data-column-id="laporan_ke">Laporan Yang Ke</th>
                                <th data-column-id="tgl_lapor">Tanggal Lapor</th>
                                <th data-column-id="detail" data-formatter="detail" data-sortable="false">Detail
                                </th>
                                <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">Aksi
                                </th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" id="frmLaporanKe">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Masukkan Laporan Perusahaan Anda Yang Ke Berapa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Laporan Yang Ke</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="laporanKe" name="laporanKe"
                                       onkeypress="return hanyaAngka(event)" required/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </form>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
@section('customscript')
    <script>
        $(document).ready(function () {

            paginationTable();

            $('#btnLaporBaru').click(function () {
                runWaitMe('body', 'roundBounce', 'Membuat registrasi baru wajib lapor...');
                $.ajax({
                    url: "{{route('createLapor')}}",
                    method: "POST",
                    error: function (XMLHttpRequest, textStatus, errorThrow) {
                        $('body').waitMe('hide');
                        notificationMessage(errorThrow, 'error');
                    },
                    success: function (s) {
                        if (s.isSuccess) {
                            $('body').waitMe('hide');
                            notificationMessage('Berhasil', 'success');
                            setTimeout(function () {
                                $('#tblLapor').bootgrid('reload');
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
            });

            $('#frmLaporanKe').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    laporanKe: {
                        required: true
                    }
                },

                messages: {
                    laporanKe: {
                        required: true
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
                        url: "<?= route('createLapor')?>",
                        method: "POST",
                        data: {
                            laporanKe: $('#laporanKe').val(),
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

            $('#btnWajibLaporBaru').click(function () {
                runWaitMe('body', 'roundBounce', 'Menyimpan...');
                $.ajax({
                    url: "<?= route('createLapor')?>",
                    method: "POST",
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
                });
            });
        });

        var urlWaktuKerja = "{{url('/waktu-kerja')}}";
        var urlCetakWajibLapor = "{{url('/cetak-wajib-lapor')}}";
        var urlCetakBuktiLapor = "{{url('/cetak-bukti-lapor')}}";
        function paginationTable() {
            var grid = $('#tblLapor').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{route('paginationLapor')}}",
                formatters: {
                    "detail": function (column, row) {
                        if(row.status =='Valid'){
                            return "<select class=\"form-control cmdSelect\" data-row-id=\"" + row.id + "\" disabled>" +
                                    "<option value=\"0\">Pilih Menu</option>" +
                                    "<option value=\"1\"> Ketenaga Kerjaan Umum</option>" +
                                    "<option value=\"2\"> Waktu Kerja</option>" +
                                    "<option value=\"3\"> Penggunaan Alat dan Bahan</option>" +
                                    "<option value=\"4\"> Pengolahan Limba</option>" +
                                    "<option value=\"5\"> Pengupahan</option>" +
                                    "<option value=\"6\"> Fasilitas Perusahaan</option>" +
                                    "<option value=\"7\"> BPJS,Program Pensiun</option>" +
                                    "<option value=\"8\"> Perangkat Hubungan Industrial</option>" +
                                    "<option value=\"9\"> Pekerja</option>" +
                                    "</select>";
                        }else{
                            return "<select class=\"form-control cmdSelect\" data-row-id=\"" + row.id + "\">" +
                                    "<option value=\"0\">Pilih Menu</option>" +
                                    "<option value=\"1\"> Ketenaga Kerjaan Umum</option>" +
                                    "<option value=\"2\"> Waktu Kerja</option>" +
                                    "<option value=\"3\"> Penggunaan Alat dan Bahan</option>" +
                                    "<option value=\"4\"> Pengolahan Limba</option>" +
                                    "<option value=\"5\"> Pengupahan</option>" +
                                    "<option value=\"6\"> Fasilitas Perusahaan</option>" +
                                    "<option value=\"7\"> BPJS,Program Pensiun</option>" +
                                    "<option value=\"8\"> Perangkat Hubungan Industrial</option>" +
                                    "<option value=\"9\"> Pekerja</option>" +
                                    "</select>";
                        }

//                        return "<div class=\"btn-group\" data-toggle=\"buttons\">" +
//                                "<a href=\"#\" class=\"btn btn-info cmdUbah\" data-row-id=\"" + row.id + "\">Ketenaga Kerjaan Umum</a>" +
//                                "<a href=\"" + urlWaktuKerja + "/" + row.id + "\" class=\"btn btn-info cmdDelete\" data-row-id=\"" + row.id + "\" >Waktu Kerja</a>" +
//                                "<a href=\"" + urlWaktuKerja + "/" + row.id + "\" class=\"btn btn-info cmdDelete\" data-row-id=\"" + row.id + "\" >Penggunaan Alat dan Bahan</a>" +
//                                "<a href=\"#\" class=\"btn btn-info cmdDelete\" data-row-id=\"" + row.id + "\" >Pengolahan Limba</a>" +
//                                "<a href=\"#\" class=\"btn btn-info cmdUbah\" data-row-id=\"" + row.id + "\">Pengupahan</a>" +
//                                "<a href=\"#\" class=\"btn btn-info cmdDelete\" data-row-id=\"" + row.id + "\" >Fasilitas Perusahaan</a>" +
//                                "<a href=\"#\" class=\"btn btn-info cmdDelete\" data-row-id=\"" + row.id + "\" >BPJS</a>" +
//                                "<a href=\"#\" class=\"btn btn-info cmdDelete\" data-row-id=\"" + row.id + "\" >Pekerja</a>" +
//                                "</div>";
                    },
                    "aksi": function (column, row) {
                        return "<a href=\"" + urlCetakBuktiLapor + "/" + row.id + "\" class=\"btn btn-warning\" target='_blank'> Cetak Bukti</a>&nbsp;&nbsp;" +
                                "<a href=\"" + urlCetakWajibLapor + "/" + row.id + "/" + row.perusahaan_id + "\" class=\"btn btn-info cmdCetakLapor\" target=\"_blank\"> Cetak Wajib Lapor</a>"
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {
                grid.find('.cmdSelect').change(function () {
                    var val = $(this).val();
                    if (val != 0) {
                        switch (val) {
                            case "1":
                                var url = "{{url('umum')}}";
                                window.location = url + "/" + $(this).data('row-id');
                                break;
                            case "2":
                                var url = "{{url('waktu-kerja')}}";
                                window.location = url + "/" + $(this).data('row-id');
                                break;
                            case "3":
                                var url = "{{url('penggunaan-alat-bahan')}}";
                                window.location = url + "/" + $(this).data('row-id');
                                break;
                            case "4":
                                var url = "{{url('pengolahan-limbah')}}/" + $(this).data('row-id');
                                window.location = url;
                                break;
                            case "5":
                                var url = "{{url('pengupahan')}}/" + $(this).data('row-id');
                                window.location = url;
                                break;
                            case "6":
                                var url = "{{url('fasilitas-perusahaan')}}/" + $(this).data('row-id');
                                window.location = url;
                                break;
                            case "7":
                                var url = "{{url('bpjs')}}/" + $(this).data('row-id');
                                window.location = url;
                                break;
                            case "8":
                                var url = "{{url('perangkat-hubungan-industrial')}}/" + $(this).data('row-id');
                                window.location = url;
                                break;
                            case "9":
                                var url = "{{url('pekerja')}}/" + $(this).data('row-id');
                                window.location = url;
                                break;
                            default:
                                break;

                        }
                    }
                })
            });

        }
    </script>
@stop

