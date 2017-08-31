@extends('app')
@section('title','Penggunaan Alat dan Bahan')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">3. Penggunaan Alat dan Bahan</span>
                </h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">3. Penggunaan Alat dan Bahan</li>
                </ul>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <form id="frmPenggunaanAlatBahan" class="form-horizontal">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h4 class="panel-title">Form Penggunaan Alat dan Bahan</h4>
                        </div>
                        <div class="panel-body">
                            <input type="hidden" value="{{$laporId}}" id="laporId"/>
                            <input type="hidden" id="id" />
                            <div class="row">
                                <div class="form-group">
                                    <label for="alat" class="control-label col-md-4">Alat/Bahan</label>
                                    <div class="col-md-8">
                                        <select id="alat" name="alat" class="form-control">
                                            <option value="">Pilih Alat / Bahan</option>
                                            @foreach($dataAlatBahan as $masterAlatBahan)
                                                <option value="{{$masterAlatBahan->id}}">{{$masterAlatBahan->nama_alat_bahan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="placeHolderSubAlat">
                                    <label for="subAlat" class="col-md-4 control-label"></label>
                                    <div class="col-md-4">
                                        <input type="text" id="subAlat" name="subAlat" class="form-control" placeholder="Masukkan nama alat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah" class="control-label col-md-4">Jumlah</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah" onkeypress="return hanyaAngka(event)"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="btnSubmit" class="control-label col-md-4"></label>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary heading-btn pull-left" id="btnSubmit" name="btnSubmit"><i
                                                    class="fa fa-check"></i> Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <legend class="text-center text-bold">Data Penggunaan Alat dan Bahan</legend>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tblPengunaanAlatBahan">
                                        <thead>
                                        <tr>
                                            <th data-column-id="nama_alat_bahan">Nama Alat/Bahan</th>
                                            <th data-column-id="sub_alat">Nama Alat / Bahan</th>
                                            <th data-column-id="jumlah">Jumlah</th>
                                            <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">Aksi
                                            </th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).ready(function () {
            paginationTable();
            $('#placeHolderSubAlat').hide();
            $('#alat').change(function () {
                if($(this).val() == '3' || $(this).val() == '6' || $(this).val() == '12' || $(this).val() == '16'){
                    $('#placeHolderSubAlat').show();
                }else{
                    $('#placeHolderSubAlat').hide();
                }

                readByAlatId($(this).val());
            });

            $('#frmPenggunaanAlatBahan').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    alat:{
                        required:true
                    },
                    jumlah:{
                        required:true
                    }
                },

                messages: {
                    alat:{
                        required:"Pilih salah satu alat/bahan"
                    },
                    jumlah:{
                        required:"Jumlah harus di isi"
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

                    var id = $('#id').val();

                    $.ajax({
                        url: "{{route('postPenggunaanAlatBahan')}}",
                        method: "POST",
                        data: {
                            id:id,
                            laporId:$('#laporId').val(),
                            alatId:$('#alat').val(),
                            jumlah:$('#jumlah').val(),
                            subAlat:$('#subAlat').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            $('body').waitMe('hide');
                            if (s.isSuccess) {
                                notificationMessage('Berhasil','success');
                                $('#tblPengunaanAlatBahan').bootgrid('reload');
                                $('#jumlah').val('');
                                $('#alat').val('');
                            } else {
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

        var urlWaktuKerja = "{{url('/waktu-kerja')}}";
        function paginationTable() {
            var grid = $('#tblPengunaanAlatBahan').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{url('penggunaan-alat-bahan')}}/"+$('#laporId').val(),
                formatters: {
                    "aksi": function (column, row) {
                        return "<button type=\"button\" class=\"btn btn-warning cmdBtnDelete\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i> Hapus</button>";
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {
                grid.find('.cmdBtnDelete').click(function () {
                    var url = "{{url('penggunaan-alat-bahan-delete')}}/"+$(this).data('row-id');
                    popUpConfirmation(url,'tblPengunaanAlatBahan','Yakin ingin menghapus data penggunaan alat dan bahan','Menghapus...');
                })
            });

        }

        function readByAlatId(alatId) {
            url = "{{url('penggunaan-alat-bahan-read-alat')}}/"+alatId;
            $.ajax({
                url:url,
                method:"GET",
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if(s.count >0){
                        $('#id').val(s.data.id);
                        $('#jumlah').val(s.data.jumlah);
                        $('#alat').val(s.data.alat_id);
                        $('#subAlat').val(s.data.sub_alat);
                    }
                }
            })
        }
    </script>
@stop

