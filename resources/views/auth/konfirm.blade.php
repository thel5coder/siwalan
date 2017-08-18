@extends('auth')
@section('customstyle')
@stop
@section('title','Registrasi')
@section('content')
    <div class="page-content-inner" style="background-image: url({{asset('public/img/temp/login/2.jpg')}})">

        <!-- Register Page -->
        <div class="single-page-block-header">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="javascript: history.back();">
                            <img src="{{url('public/img/logodepnaker.png')}}" alt="Clean UI Admin Template" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-page-block">
            <div class="single-page-block-inner effect-3d-element">
                <div class="blur-placeholder"><!-- --></div>
                <div class="single-page-block-form">
                    <h3 class="text-center">
                        <i class="icmn-user-tie margin-right-10"></i>

                    </h3>
                    <br />
                </div>
            </div>
        </div>

        <!-- End Register Page -->

    </div>

@stop
@section('customscript')
    <script>
        var token ="{{csrf_token()}}";
        var tokenAktivasi = "{{$token}}";
        var email = "{{$email}}";

        $(document).ready(function () {
            runWaitMe('body', 'roundBounce', 'Mengaktifkan user..');
            $.ajax({
                url: "<?= route('userConfirmationProcess')?>",
                method: "POST",
                data: {
                    _token:token,
                    email:email,
                    token:tokenAktivasi
                },
                error: function (XMLHttpRequest, textStatus, errorThrow) {
                    $('body').waitMe('hide');
                    notificationMessage(errorThrow, 'error');
                },
                success: function (s) {
                    if (s.isSuccess) {
                        window.location = "{{route('userAuth')}}";
                    } else {
                        $('body').waitMe('hide');
                        var errorMessagesCount = s.message.length;
                        for (var i = 0; i < errorMessagesCount; i++) {
                            notificationMessage(s.message[i], 'error');
                        }
                    }
                }
            });
        });
    </script>
@stop
