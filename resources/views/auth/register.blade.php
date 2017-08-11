@extends('auth')
@section('customstyle')
@stop
@section('title','Registrasi')
@section('content')
    <div class="page-content-inner" style="background-image: url(public/img/temp/login/2.jpg)">

        <!-- Register Page -->
        <div class="single-page-block-header">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="javascript: history.back();">
                            <img src="{{url('public/img/logo-inverse.png')}}" alt="Clean UI Admin Template" />
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
                        DAFTAR SEKARANG
                    </h3>
                    <br />
                    <form id="form-validation" name="form-validation" method="POST">
                        <div class="form-group">
                            <div class="form-input-icon form-input-icon-right">

                            </div>
                        </div>
                        <div class="form-group">
                            <input id="validation-password"
                                   class="form-control password"
                                   name="validation[password]"
                                   type="password" data-validation="[L>=6]"
                                   data-validation-message="$ must be at least 6 characters"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Repeat Password">
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary width-150">Sign Up</button>
                            <div class="checkbox margin-left-10">
                                <label>
                                    <input type="checkbox" name="example6" checked>
                                    Mail Subscription
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- End Register Page -->

    </div>

    <!-- Page Scripts -->
    <script>

        $(function () {

            // Form Validation
            $('#form-validation').validate({
                submit: {
                    settings: {
                        inputContainer: '.form-group',
                        errorListClass: 'form-control-error',
                        errorClass: 'has-danger'
                    }
                }
            });

            // Add class to body for change layout settings
            $('body').addClass('single-page');

            // Set Background Image for Form Block
            function setImage() {
                var imgUrl = $('.page-content-inner').css('background-image');

                $('.blur-placeholder').css('background-image', imgUrl);
            };

            function changeImgPositon() {
                var width = $(window).width(),
                        height = $(window).height(),
                        left = - (width - $('.single-page-block-inner').outerWidth()) / 2,
                        top = - (height - $('.single-page-block-inner').outerHeight()) / 2;


                $('.blur-placeholder').css({
                    width: width,
                    height: height,
                    left: left,
                    top: top
                });
            };

            setImage();
            changeImgPositon();

            $(window).on('resize', function(){
                changeImgPositon();
            });

            // Mouse Move 3d Effect
            var rotation = function(e){
                var perX = (e.clientX/$(window).width())-0.5;
                var perY = (e.clientY/$(window).height())-0.5;
                TweenMax.to(".effect-3d-element", 0.4, { rotationY:15*perX, rotationX:15*perY,  ease:Linear.easeNone, transformPerspective:1000, transformOrigin:"center" })
            };

            if (!cleanUI.hasTouch) {
                $('body').mousemove(rotation);
            }

        });

    </script>
    <!-- End Page Scripts -->
@stop
@section('customescript')

@stop
