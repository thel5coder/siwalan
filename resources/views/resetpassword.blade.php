<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIWALAN - @yield('title')</title>
    @include('partials.htmlheader')
    @include('partials.script')
</head>
<body class="login-container login-cover" style="background: url('{{url("public/img/login_cover.jpg")}}') no-repeat;background-size: cover;">
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Tabbed form -->
            <div class="tabbable panel login-form width-1024">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#basic-tab1" data-toggle="tab"><h6 class="text-semibold">Reset Password</h6>
                        </a></li>
                </ul>
                <div class="tab-content panel-body">
                    <div class="tab-pane fade in active" id="basic-tab1">
                        <form id="frmResetPassword">
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
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                       required>
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" id="konfirmPassword" name="konfirmPassword"
                                       placeholder="Ulangi Password" required>
                                <div class="form-control-feedback">
                                    <i class="icon-redo text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-blue btn-block">Reset <i
                                            class="icon-reset position-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- /tabbed form -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="footer text-white text-center">
    &copy; 2017 All rights reserved Dinas Ketenagakerjaan dan Transmigrasi Provinsi Jawa Timur
</div>
<!-- /footer -->

@yield('customscript')
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $('#frmLupaPassword').validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            password: {
                minlength: true,
                required: true
            },
            konfirmPassword: {
                required: true,
                equalTo:'#password'
            }
        },

        messages: {
            password: {
                minlength: "Password minimal memiliki 8 karakter",
                required: "Password harus di isi"
            },
            konfirmPassword: {
                required: "Konfirmasi password harus di isi",
                equalTo:"Konfirmasi password harus sama dengan password"
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
</script>
</body>
</html>

