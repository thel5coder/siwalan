@extends('auth')
@section('customstyle')
@stop
@section('title','Login')
@section('content')
    <div class="page-content-inner" >

        <!-- Register Page -->
        <div class="single-page-block-header">


        </div>
        <div class="single-page-block">
            <div class="single-page-block-inner effect-3d-element">
                <div class="blur-placeholder"><!-- --></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row text-center">
                            <img src="{{url('public/img/logopemprovjatim.png')}}" width="200" height="300"/>
                            <h3 style="color: blue;">Sistem Informasi Wajib Lapor</h3>
                            <h4>Pemerintah Provinsi Jawa Timur</h4>

                        </div>
                    </div>
                </div>
                <div class="single-page-block-form">
                    <h3 class="text-center" style="color: red;">
                        <i class="icmn-user-tie margin-right-10"></i>
                        Login
                    </h3>
                    <br />
                    <form id="formRegistration">

                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email perusahaan" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>

                        <input type="hidden" value="{{csrf_token()}}" id="_token" name="_token"/>

                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary width-150" value="Login"/>
                           <p> <div class="checkbox">
                                <input type="checkbox" value="1" id="remember" name="remember"/>Ingat saya
                            </div>
                            </p>
                        </div>
                        <p> Belum Punya akun, <a href="{{route('userRegister')}}" class="btn btn-link">Daftar</a> </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Register Page -->

    </div>

@stop
@section('customscript')
    <script src="{{asset('public/vendors/jquery-validation/js/jquery.validate.js')}}"></script>
    <script>
        var token ="{{csrf_token()}}";
        var userLevel = "perusahaan";
        $(document).ready(function () {
            $('#formRegistration').validate({
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
                                window.location = "{{route('backdEndDashboard')}}";
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
