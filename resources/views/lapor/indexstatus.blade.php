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
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-default panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">Data Wajib Lapor</h5>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblLapor">
                            <thead>
                            <tr>
                                <th data-column-id="nama">Nama Perusahaan</th>
                                <th data-column-id="laporan_ke">Laporan Yang Ke</th>
                                <th data-column-id="tgl_lapor">Tanggal Lapor</th>
                                <th data-column-id="nama_korwil">Korwil</th>
                                <th data-column-id="status" data-formatter="status" data-sortable="false">Status
                                </th>
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
@stop
@section('customscript')
    <script>
        $(document).ready(function () {

            paginationTable();

        });

        var urlWaktuKerja = "{{url('/waktu-kerja')}}";
        var urlCetakWajibLapor = "{{url('/cetak-wajib-lapor')}}";
        var urlCetakBuktiLapor = "{{url('/cetak-bukti-lapor')}}";
        var urlPagination = "{{url('/wajib-lapor')}}/" + "{{$status}}";
        function paginationTable() {
            var grid = $('#tblLapor').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}",
                        korwil: "{{auth()->user()->korwil}}"
                    };
                },
                url: urlPagination,
                formatters: {
                    "detail": function (column, row) {
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
                    },
                    "aksi": function (column, row) {
                        return "<a href=\"" + urlCetakBuktiLapor + "/" + row.id + "\" class=\"btn btn-warning\" target='_blank'> Cetak Bukti</a>&nbsp;&nbsp;" +
                                "<a href=\"" + urlCetakWajibLapor + "/" + row.id + "/" + row.perusahaan_id + "\" class=\"btn btn-info cmdCetakLapor\" target=\"_blank\"> Cetak Wajib Lapor</a>"
                    },
                    "status": function (column, row) {
                        console.log(row.status);
                        if(row.status =='Moderasi'){
                            return "<select class=\"form-control cmdChangeStatus\" data-row-id=\"" + row.id + "\">" +
                                    "<option value=\"\"></option>" +
                                    "<option value=\"Moderasi\" selected>Moderasi</option>" +
                                    "<option value=\"Revisi\">Revisi</option>" +
                                    "<option value=\"Valid\">Valid</option>" +
                                    "</select>"
                        }else if(row.status =='Revisi'){
                            return "<select class=\"form-control cmdChangeStatus\" data-row-id=\"" + row.id + "\">" +
                                    "<option value=\"\"></option>" +
                                    "<option value=\"Moderasi\">Moderasi</option>" +
                                    "<option value=\"Revisi\" selected>Revisi</option>" +
                                    "<option value=\"Valid\">Valid</option>" +
                                    "</select>"
                        }else{
                            return "<select class=\"form-control cmdChangeStatus\" data-row-id=\"" + row.id + "\">" +
                                    "<option value=\"\"></option>" +
                                    "<option value=\"Moderasi\">Moderasi</option>" +
                                    "<option value=\"Revisi\">Revisi</option>" +
                                    "<option value=\"Valid\" selected>Valid</option>" +
                                    "</select>"
                        }
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
                });
                grid.find('.cmdChangeStatus').change(function () {
                    var url = "{{url('/wajib-lapor-change-status')}}/"+$(this).data('row-id')+"/"+$(this).val();
                    swal({
                        title: "Yakin ingin mengubah status wajib lapor perusahaan ini?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Ubah Status!'
                    }).then(function () {
                        runWaitMe('body','roundBounce',"Menyimpan...");
                        $.ajax({
                            url:url,
                            method: "POST",
                            error: function (XMLHttpRequest, textStatus, errorThrown) {
                                $('body').waitMe('hide');
                                notificationMessage(errorThrown, 'error');
                                $('#tblLapor').bootgrid('reload');
                            },
                            success: function (s) {
                                $('body').waitMe('hide');
                                if(s.isSuccess){
                                    $('#tblLapor').bootgrid('reload');
                                }else{
                                    var errorMessagesCount = s.message.length;
                                    for (var i = 0; i < errorMessagesCount; i++) {
                                        notificationMessage(s.message[i], 'error');
                                    }
                                }
                            }
                        });
                    });
                })
            });

        }
    </script>
@stop

