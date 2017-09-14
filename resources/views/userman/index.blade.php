@extends('app')
@section('title','Wajib Lapor')
@section('pageheader')
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User</span></h4>

                <ul class="breadcrumb breadcrumb-caret position-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li>User Managemen</li>
                    <li class="active">User {{$level}}</li>
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
                    <h5 class="panel-title">Data User {{$level}}</h5>
                    <div class="heading-elements">
                        @if(auth()->user()->user_level =='admin-dinas' && ($level =='pengawas' || $level =='admin-dinas'))
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i
                                        class="icon-add-to-list"></i>
                                Tambah User
                            </button>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        @if($level == 'admin dinas' || $level =='pengawas')
                            <table class="table table-striped table-bordered table-hover" id="tblUser">
                                <thead>
                                <tr>
                                    <th data-column-id="email">Email Perusahaan</th>
                                    <th data-column-id="nama">Nama Perusahaan</th>
                                    <th data-column-id="nama_kecamatan">Nama Kecamatan</th>
                                    <th data-column-id="nama_kabupaten">Nama Kabupaten</th>
                                    <th data-column-id="alamat">Alamat</th>
                                    <th data-column-id="nama_korwil">Korwil</th>
                                    <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">Aksi
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        @else
                            <table class="table table-striped table-bordered table-hover" id="tblUser">
                                <thead>
                                <tr>
                                    <th data-column-id="email">Email</th>
                                    <th data-column-id="nama">Nama</th>
                                    <th data-column-id="alamat">Alamat</th>
                                    <th data-column-id="nama_korwil">Korwil</th>
                                    <th data-column-id="is_active" data-formatter="isActive" data-sortable="false">Status
                                        User
                                    </th>
                                    <th data-column-id="aksi" data-formatter="aksi" data-sortable="false">Aksi
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        @endif

                    </div>
                </div>
                <input type="hidden" id="level" value="{{$level}}"/>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" id="frmAddUser">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="nama" name="nama" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="email" name="email" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten" class="col-md-3 control-label">Kabupaten</label>
                            <div class="col-md-4">
                                <select class="form-control" id="kabupaten" name="kabupaten" required>
                                    <option value=""></option>
                                    @foreach($kabupaten as $dataKabupaten)
                                        <option value="{{$dataKabupaten['id']}}">{{$dataKabupaten['nama_kabupaten']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan" class="col-md-3 control-label">Kelurahan/Kecamatan </label>
                            <div class="col-md-4">
                                <select class="form-control" id="kelurahan" name="kelurahan" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Korwil</label>
                            <div class="col-md-4">
                                <input type="text" id="korwil" name="korwil" value="" class="form-control"/>
                                <input type="hidden" id="korwilId" name="korwilId"/>
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
            $('#kabupaten').select2();
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
                        $('#korwilId').val(s.idKorwil);
                        $('#korwil').val(s.namaKorwil);
                    }
                });
            });
            paginationTable();

            $('#frmAddUser').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    nama: {
                        required: true
                    },
                    email: {
                        required: true,
                        email:true,
                    },
                    kelurahan: {
                        required: true
                    },
                    kabupaten: {
                        required: true
                    }
                },

                messages: {
                    nama: {
                        required: "Nama harus di isi"
                    },
                    email: {
                        required: "Email harus di isi",
                        email:"Email tidak valid"
                    },
                    kelurahan: {
                        required: "Kecamatan harus di isi"
                    },
                    kabupaten: {
                        required: "Kabupaten harus di isi"
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
                        url: "<?= route('postUserDinas')?>",
                        method: "POST",
                        data: {
                            name: $('#nama').val(),
                            email:$('#email').val(),
                            kelurahan: $('#kelurahan').val(),
                            kabupaten: $('#kabupaten').val(),
                            userLevel: $('#level').val(),
                            korwilId: $('#korwilId').val()
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
        function paginationTable() {
            var grid = $('#tblUser').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}"
                    };
                },
                url: "{{url('/users')}}/" + $('#level').val(),
                formatters: {
                    "aksi": function (column, row) {
                        return "<a href=\"#\" class=\"btn btn-warning\" target='_blank'> Reset Password</a>&nbsp;&nbsp;";
                    },
                    "isActive": function (column, row) {
                        if (row.is_active == '1') {
                            return "<select id=\"selectIsActive\" class=\"selectIsActive\" data-row-id=\"" + row.id + "\">" +
                                    "<option value=\"1\" selected>Active</option>" +
                                    "<option value=\"0\">Tidak Active</option>" +
                                    "</select>";
                        } else {
                            return "<select id=\"selectIsActive\" class=\"selectIsActive\" data-row-id=\"" + row.id + "\">" +
                                    "<option value=\"1\">Active</option>" +
                                    "<option value=\"0\" selected>Tidak Active</option>" +
                                    "</select>";
                        }
                    }
                }
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop

