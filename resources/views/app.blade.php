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
<body>
<!-- Main navbar -->
@include('partials.topbar')
<!-- /main navbar -->


<!-- Second navbar -->
@include('partials.navbar')
<!-- /second navbar -->

<!-- Page header -->
@yield('pageheader')
<!-- /page header -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            @yield('content')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $(document).ready(function () {
        $('#frmUbahPassword').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                password: {
                    required: true,
                    minlength:8
                },
                konfirmasiPassword: {
                    required: true,
                    equalTo:'#password'
                }
            },

            messages: {
                password: {
                    required: "Password harus di isi",
                    minlength:"Password minimal terdiri dari 8 karakter"
                },
                konfirmasiPassword: {
                    required: "Konfirmasi password harus di isi",
                    equalTo:'Konfirmasi password harus sama dengan password'
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
                    url: "<?= route('changePassword')?>",
                    method: "POST",
                    data:{
                        id:"{{auth()->user()->id}}",
                        password:$('#password').val()
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
        $('#frmUbahEmail').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email:true
                }
            },

            messages: {
                email: {
                    required: "Email harus di isi",
                    email:"Email tidak valid"
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
                    url: "<?= route('postRequestChangeEmail')?>",
                    method: "POST",
                    data:{
                        userId:"{{auth()->user()->id}}",
                        email:$('#email').val(),
                        alasan:$('#alasan').val()
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
    })
</script>
</body>
</html>