@extends('app')
@section('title','Fasilitas Perusahaan')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span
                            class="text-semibold">8. Fasilitas Perusahaan</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('indexLapor')}}">Data Wajib Lapor</a></li>
                    <li class="active">8. Fasilitas Perusahaan</li>
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
                                   data-target="#fasilitasK3" role="tab">
                                    <i class="fa fa-heartbeat"></i>
                                    Fasilitas Keselamatan dan Kesehatan Kerja
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript: void(0);" data-toggle="tab"
                                   data-target="#fasilitasKesejahteraan" role="tab">
                                    <i class="fa fa-line-chart"></i>
                                    Fasilitas Kesejahteraan
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content padding-vertical-20">
                            <input type="hidden" id="laporId" value="{{$laporId}}"/>
                            <div class="tab-pane active" id="fasilitasK3" role="tabpanel">
                                <form id="frmFasilitasK3" class="form-horizontal">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label for="fasilitasK3" class="control-label col-md-3">Pilih Fasilitas
                                                    Keselamatan dan Kesehatan Kerja Yang Tersedia</label>
                                                <div class="col-md-4">
                                                    <select class="form-control" id="fasilitasK3Id" name="fasilitasK3Id"
                                                            required>
                                                        <option value="">Pilih Fasilitas</option>
                                                        @foreach($masterFasilitasK3 as $fasilitasK3)
                                                            <option value="{{$fasilitasK3->id}}"
                                                                    data-row-isammount="{{$fasilitasK3->is_ammount}}">{{$fasilitasK3->nama_fasilitas_keselamatan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="jumlahFasilitas">
                                                <label for="jumlah" class="control-label col-md-3"></label>
                                                <div class="col-md-4">
                                                    <input type="text" id="jumlah" name="jumlah" class="form-control"
                                                           onkeypress="return hanyaAngka(event)"
                                                           placeholder="Masukkan jumlah fasilitas"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="btnSubmit" class="col-md-3 control-label"></label>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary heading-btn pull-left">
                                                        <i
                                                                class="fa fa-check"></i> Simpan
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover"
                                                           id="tblFasilitasK3">
                                                        <thead>
                                                        <tr>
                                                            <th data-column-id="nama_fasilitas_keselamatan">Nama
                                                                Alat/Bahan
                                                            </th>
                                                            <th data-column-id="jumlah" data-formatter="jumlah">Jumlah
                                                            </th>
                                                            <th data-column-id="aksi" data-formatter="aksi"
                                                                data-sortable="false">Aksi
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
                            <div class="tab-pane" id="fasilitasKesejahteraan" role="tabpanel">
                                <form id="frmFasilitasKesejahteraan" class="form-horizontal">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                @if(count($dataFasilitasKesejahteraan)>0)
                                                    @foreach($masterFasilitasKesejahteraan as $masterKesejahteraan)
                                                        <div class="col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="fasilitasKesejahteraan"
                                                                           class="fasilitasKesejahteraan"
                                                                           value="{{$masterKesejahteraan->id}}"
                                                                    @foreach($dataFasilitasKesejahteraan as $fasilitasKesejahteraan)
                                                                        @if($fasilitasKesejahteraan->fasilitas_kesejahteraan_id == $masterKesejahteraan->id)
                                                                            {{'checked'}}
                                                                                @endif
                                                                            @endforeach
                                                                    >
                                                                    {{$masterKesejahteraan->nama_fasilitas_kesejahteraan}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    @foreach($masterFasilitasKesejahteraan as $masterKesejahteraan)
                                                        <div class="col-md-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="fasilitasKesejahteraan"
                                                                           class="fasilitasKesejahteraan"
                                                                           value="{{$masterKesejahteraan->id}}">
                                                                    {{$masterKesejahteraan->nama_fasilitas_kesejahteraan}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
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
        var fasilitasKesejahteraanId = [];
        $(document).ready(function () {
            paginationTable();

            $('#jumlah').hide();

            $('#fasilitasK3').change(function () {
                var selected = $(this).find('option:selected');
                if (selected.data('row-isammount') == 1) {
                    $('#jumlah').show();
                } else {
                    $('#jumlah').hide();
                }
                getFasilitasK3();
            });
            $('#frmFasilitasK3').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    fasilitasK3Id: {
                        required: true
                    }
                },

                messages: {
                    fasilitasK3Id: {
                        required: "Pilih salah satu fasilitas dahulu"
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
                        url: "<?= route('postFasilitasK3')?>",
                        method: "POST",
                        data: {
                            laporId: $('#laporId').val(),
                            fasilitasK3Id: $('#fasilitasK3Id').val(),
                            jumlah: $('#jumlah').val()

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

            $('.fasilitasKesejahteraan').change(function () {
                fasilitasKesejahteraanId = []
                $('.fasilitasKesejahteraan').each(function () {
                    if ($(this).prop('checked')) {
                        fasilitasKesejahteraanId.push($(this).val());
                    }
                })

                console.log(fasilitasKesejahteraanId);
            });

            $('#frmFasilitasKesejahteraan').submit(function (e) {
                e.preventDefault();
                runWaitMe('body', 'roundBounce', 'Menyimpan...');

                if (fasilitasKesejahteraanId.length == 0) {
                    $('body').waitMe('hide');
                    notificationMessage('Pilih salah satu fasilitas dahulu', 'error');
                    return false;
                } else {
                    $.ajax({
                        url: "{{route('postFasilitasKesejahteraan')}}",
                        method: "POST",
                        data: {
                            laporId: $('#laporId').val(),
                            fasilitasKesejahteraanId: fasilitasKesejahteraanId
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
                    });
                }
            });
        });

        function paginationTable() {
            var grid = $('#tblFasilitasK3').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{url('fasilitas-k3')}}/" + $('#laporId').val(),
                formatters: {
                    "aksi": function (column, row) {
                        return "<button type=\"button\" class=\"btn btn-warning cmdBtnDelete\" data-row-id=\"" + row.id + "\"><i class=\"fa fa-trash\"></i> Hapus</button>";
                    },
                    "jumlah": function (column, row) {
                        if (row.jumlah != '0') {
                            return row.jumlah;
                        }
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {
                grid.find('.cmdBtnDelete').click(function () {
                    var url = "{{url('fasilitas-k3/delete')}}/" + $(this).data('row-id');
                    popUpConfirmation(url, 'tblFasilitasK3', 'Yakin ingin menghapus data fasilitas keselamtan dan kesehatan kerja ini?', 'Menghapus...');
                })
            });

        }

        function getFasilitasK3() {
            $.ajax({
                url: "{{url('fasilitas-k3/read')}}/" + $('#fasilitasK3Id').val(),
                method: "GET",
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.count > 0) {
                        console.log(s.data);
                        $('#jumlah').val(s.data.jumlah);
                    }
                }
            })
        }

    </script>
@stop

