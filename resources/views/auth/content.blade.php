@extends('auth')
@section('content')
    <div class="tabbable panel login-form width-650">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#basic-tab1" data-toggle="tab"><h6 class="text-semibold">Masuk</h6></a></li>
            <li><a href="#basic-tab2" data-toggle="tab"><h6 class="text-semibold">Daftar</h6></a></li>
        </ul>

        <div class="tab-content panel-body">
            <div class="tab-pane fade in active" id="basic-tab1">
                <form id="formLogin">
                    <div class="text-center">
                        <img src="{{url('public/img/logopemprovjatim.png')}}" width="40%" height="250px"/>
                        <table align="center" width="100%">
                            <tr>
                                <td style="font-size: 200%"><strong>Sistem Informasi Wajib Lapor Perusahaan</strong></td>
                            </tr>
                            <tr>
                                <td style="font-size: 170%;">Pemerintah Provinsi Jawa Timur</td>
                            </tr>
                            <tr>
                                <td style="font-size: 170%">Departemen Ketenagakerjaan dan Transmigrasi</td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email perusahaan" required>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
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
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
                <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
            </div>

            <div class="tab-pane fade" id="basic-tab2">
                <form id="frmRegistration">
                    <div class="text-center">
                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                        <h5 class="content-group">Buat Akun Baru <small class="display-block">lengkapi form di bawah ini</small></h5>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="text" class="form-control" id="namaPerusahaan" name="namaPerusahaan" placeholder="Nama perusahaan" required>
                        <div class="form-control-feedback">
                            <i class="icon-office text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email perusahaan" required>
                        <div class="form-control-feedback">
                            <i class="icon-mail5 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <div class="form-control-feedback">
                            <i class="icon-user-lock text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback has-feedback-left">
                        <input type="password" class="form-control" id="konfirmPassword" name="konfirmPassword" placeholder="Ulangi Password" required>
                        <div class="form-control-feedback">
                            <i class="icon-redo text-muted"></i>
                        </div>
                    </div>

                    {{--<div class="form-group">--}}
                    {{--<div class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input type="checkbox" class="styled" checked="checked">--}}
                    {{--Send me <a href="#">test account settings</a>--}}
                    {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input type="checkbox" class="styled" checked="checked">--}}
                    {{--Subscribe to monthly newsletter--}}
                    {{--</label>--}}
                    {{--</div>--}}

                    {{--<div class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input type="checkbox" class="styled">--}}
                    {{--Accept <a href="#">terms of service</a>--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <button type="submit" class="btn bg-indigo-400 btn-block">Register <i class="icon-circle-right2 position-right"></i></button>
                </form>
            </div>
        </div>
    </div>
    @stop
@section('customscript')
    <script>
        $(document).ready(function () {
            $('#formLogin').validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    email:{
                        email:true,
                        required:true
                    },
                    password:{
                        min:6,
                        required:true
                    }
                },

                messages: {
                    email:{
                        email:"Email tidak valid",
                        required:"Email harus di isi"
                    },
                    password:{
                        min:"Password minimal 6 karakter",
                        required:"Password harus di isi"
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
                            email:$('#email').val(),
                            password:$('#password').val(),
                            remember:$('#remember').val()
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
                    email:{
                        email:true,
                        required:true
                    },
                    password:{
                        min:6,
                        required:true
                    },
                    konfirmPassword:{
                        required:true,
                        equalTo:'#password'
                    }
                },

                messages: {
                    namaPerusahaan: {
                        required: "Nama perusahaan harus di isi"
                    },
                    email:{
                        email:"Email tidak valid",
                        required:"Email harus di isi"
                    },
                    password:{
                        min:"Password minimal 6 karakter",
                        required:"Password harus di isi"
                    },
                    konfirmPassword:{
                        required:"Konfirmasi password harus di isi",
                        equalTo:"Konfirmasi password tidak sama"
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
                            _token:$('#_token').val(),
                            name: $('#namaPerusahaan').val(),
                            email:$('#email').val(),
                            password:$('#password').val(),
                            userLevel:$('#userLevel').val()
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrow) {
                            $('body').waitMe('hide');
                            notificationMessage(errorThrow, 'error');
                        },
                        success: function (s) {
                            if (s.isSuccess) {
                                $('body').waitMe('hide');
                                notificationMessage('Cek email anda, untuk melakukan aktifasi akun','info');
                                setTimeout(function () {
                                    window.location = "{{route('userAuth')}}";
                                },5000);
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