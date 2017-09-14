@extends('auth')
@section('content')
    <div class="tabbable panel login-form width-1024">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#perusahaan" data-toggle="tab"><h6 class="text-semibold">Perusahaan Sudah Wajib Lapor</h6>
                </a></li>
            <li><a href="#basic-tab1" data-toggle="tab"><h6 class="text-semibold">Masuk</h6></a></li>
            <li><a href="#basic-tab2" data-toggle="tab"><h6 class="text-semibold">Daftar</h6></a></li>
        </ul>

        <div class="tab-content panel-body">
            <div class="tab-pane fade in active" id="perusahaan">
                <div class="text-center">
                    <img src="{{url('public/img/lambangjatim.jpg')}}"/>
                    <table align="center" width="100%">
                        <tr>
                            <td style="font-size: 200%"><strong>Sistem Informasi Wajib Lapor Perusahaan</strong></td>
                        </tr>
                        <tr>
                            <td style="font-size: 170%;">Pemerintah Provinsi Jawa Timur</td>
                        </tr>
                        <tr>
                            <td style="font-size: 170%">Dinas Ketenagakerjaan dan Transmigrasi</td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="panel panel-default panel-flat">
                        <div class="panel-body">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" id="tahunLapor" name="tahunLapor" class="form-control" placeholder="Tahun lapor"/>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="kabupaten" name="kabupaten">
                                        <option value="">PILIH KABUPATEN</option>
                                        @foreach($dataKabupaten as $kabupaten)
                                            <option value="{{$kabupaten->id}}">{{$kabupaten->nama_kabupaten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="kecamatan" name="kecamatan">
                                        <option value="">PILIH KECAMATAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="korwil" name="korwil" readonly>
                                    <input type="hidden" id="korwilId"/>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="icon-search4"></i> CARI</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblPerusahaan">
                            <thead>
                            <tr>
                                <th data-column-id="nama">Nama Perusahaan</th>
                                <th data-column-id="nama_kabupaten">Kabupaten</th>
                                <th data-column-id="nama_kecamatan">Kecamatan</th>
                                <th data-column-id="tgl_lapor">Tanggal Lapor</th>
                                <th data-column-id="nama_korwil">Korwil</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="basic-tab1">
                <form id="formLogin">
                    <div class="text-center">
                        <img src="{{url('public/img/lambangjatim.jpg')}}"/>
                        <table align="center" width="100%">
                            <tr>
                                <td style="font-size: 200%"><strong>Sistem Informasi Wajib Lapor Perusahaan</strong>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 170%;">Pemerintah Provinsi Jawa Timur</td>
                            </tr>
                            <tr>
                                <td style="font-size: 170%">Dinas Ketenagakerjaan dan Transmigrasi</td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email perusahaan"
                               required>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                               required>
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group login-options">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="1" id="remember" name="remember">
                                    Remember
                                </label>
                            </div>

                            <div class="col-sm-6 text-right">
                                <a href="#" data-toggle="modal" data-target="#modalLupaPassword">Forgot password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn bg-blue btn-block">Login <i
                                    class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
                <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a
                            href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
            </div>

            <div class="tab-pane fade" id="basic-tab2">
                <form id="frmRegistration">
                    <div class="text-center">
                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                        <h5 class="content-group">Buat Akun Baru
                            <small class="display-block">lengkapi form di bawah ini</small>
                        </h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan"
                               placeholder="Nama perusahaan" required>
                        <div class="form-control-feedback">
                            <i class="icon-office text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="email" class="form-control" id="emailPerusahaan" name="emailPerusahaan"
                               placeholder="Email perusahaan" required>
                        <div class="form-control-feedback">
                            <i class="icon-mail5 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" id="passwordPerusahaan" name="passwordPeruahaan"
                               placeholder="Password" required>
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" id="konfirmPassword" name="konfirmPassword"
                               placeholder="Ulangi Password" required>
                        <div class="form-control-feedback">
                            <i class="icon-redo text-muted"></i>
                        </div>
                    </div>
                    <input type="hidden" value="perusahaan" name="userLevel" id="userLevel"/>

                    <button type="submit" class="btn bg-indigo-400 btn-block">Register <i
                                class="icon-circle-right2 position-right"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalLupaPassword">
        <div class="modal-dialog" role="document">
            <form class="form-horizontal" id="frmLupaPassword">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Masukkan email yang anda gunakan untuk login ke Aplikasi SIWALAN</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="emailReset" name="emailReset" required/>
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
                        $('#kecamatan').children('option:not(:first)').remove().end();
                        $('#kecamatan').select2({
                            data: s
                        });

                    }
                });


                var urlGetKorwil = "{{url('get-korwil')}}/" + $(this).val();

                $.ajax({
                    url: urlGetKorwil,
                    method: "GET",
                    method: "GET",
                    success: function (s) {
                        $('#korwilId').val(s.idKorwil);
                        $('#korwil').val(s.namaKorwil);
                    }
                });

                $('#tblPerusahaan').bootgrid('reload');
            });

            $('#tahunLapor').datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });

            $('#tahunLapor').change(function () {
                $('#tblPerusahaan').bootgrid('reload');
            });

            $('#kecamatan').change(function () {
                $('#tblPerusahaan').bootgrid('reload');
            })

            $('#formLogin').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    email: {
                        email: true,
                        required: true
                    },
                    password: {
                        minlength: 6,
                        required: true
                    }
                },

                messages: {
                    email: {
                        email: "Email tidak valid",
                        required: "Email harus di isi"
                    },
                    password: {
                        minlength: "Password minimal 6 karakter",
                        required: "Password harus di isi"
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
                    runWaitMe('body', 'roundBounce', 'Mengautentikasi user...');

                    $.ajax({
                        url: "<?= route('userAuthProcess')?>",
                        method: "POST",
                        data: {
                            email: $('#email').val(),
                            password: $('#password').val(),
                            remember: $("input[name=remember]:checked").val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                window.location = "{{route('dashboard')}}";
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

            $('#frmRegistration').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    namaPerusahaan: {
                        required: true
                    },
                    emailPerusahaan: {
                        email: true,
                        required: true
                    },
                    passwordPerusahaan: {
                        minlength: 6,
                        required: true
                    },
                    konfirmPassword: {
                        required: true,
                        equalTo: '#passwordPerusahaan'
                    }
                },

                messages: {
                    namaPerusahaan: {
                        required: "Nama perusahaan harus di isi"
                    },
                    emailPerusahaan: {
                        email: "Email tidak valid",
                        required: "Email harus di isi"
                    },
                    passwordPerusahaan: {
                        minlength: "Password minimal 6 karakter",
                        required: "Password harus di isi"
                    },
                    konfirmPassword: {
                        required: "Konfirmasi password harus di isi",
                        equalTo: "Konfirmasi password tidak sama"
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
                    runWaitMe('body', 'roundBounce', 'Menyimpan Data...');

                    $.ajax({
                        url: "<?= route('userRegisterProcess')?>",
                        method: "POST",
                        data: {
                            _token: $('#_token').val(),
                            name: $('#namaPerusahaan').val(),
                            email: $('#emailPerusahaan').val(),
                            password: $('#konfirmPassword').val(),
                            userLevel: $('#userLevel').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                $('body').waitMe('hide');
                                notificationMessage('Cek email anda, untuk melakukan aktifasi akun', 'info');
                                setTimeout(function () {
                                    window.location = "{{route('userAuth')}}";
                                }, 5000);
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

            $('#frmLupaPassword').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    emailReset: {
                        email: true,
                        required: true
                    }
                },

                messages: {
                    emailReset: {
                        email: "Email tidak valid",
                        required: "Email harus di isi"
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
                    runWaitMe('body', 'roundBounce', 'Mengautentikasi user...');

                    $.ajax({
                        url: "<?= route('userAuthProcess')?>",
                        method: "POST",
                        data: {
                            email: $('#emailReset').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                notificationMessage('Check email untuk menerima intruksi selanjutnya langkah reset password','info');
                                setTimeout(function () {
                                    window.location = "{{url('/')}}";
                                },3000)
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
            var grid = $('#tblPerusahaan').bootgrid({
                ajax: true,
                post: function () {
                    return {
                        _token: "{{csrf_token()}}",
                        kabupaten: $('#kabupaten').val(),
                        kecamatan: $('#kecamatan').val(),
                        tahun:$('#tahunLapor').val()
                    };
                },
                url: "{{route('paginationFront')}}",
                formatters: {}
            }).on("loaded.rs.jquery.bootgrid", function () {

            });

        }
    </script>
@stop