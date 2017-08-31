@extends('auth')
@section('customstyle')
@stop
@section('title','Registrasi')
@section('content')
    <div class="page-content-inner" >

        <!-- Register Page -->
        <div class="single-page-block-header">
            <div class="row">

            </div>
        </div>
        <div class="single-page-block">
            <div class="single-page-block-inner effect-3d-element">
                <div class="blur-placeholder"><!-- --></div>
                <div class="single-page-block-form">
                    <h3 class="text-center">
                        <i class="icmn-user-tie margin-right-10"></i>
                        Wajib Lapor
                    </h3>
                    <br />
                    <form id="formRegistration">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama perusahaan" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email perusahaan" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="konfirmPassword" name="konfirmPassword" placeholder="Repeat Password" required>
                        </div>
                        <input type="hidden" value="{{csrf_token()}}" id="_token" name="_token"/>
                        <input type="hidden" value="perusahaan" name="userLevel" id="userLevel"/>
                        <div class="form-actions">
                            <input type="submit" class="btn btn-primary width-150" value="Daftar"/>
                        </div>
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
                name: {
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
                name: {
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
                        name: $('#name').val(),
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
