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
            @yield('content')
            <!-- /tabbed form -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="footer text-white text-center">
    &copy; 2017. <a href="#" class="text-white">SIWALAN</a> by <a href="http://themeforest.net/user/Kopyov" class="text-white" target="_blank">Depnakertrans Provinsi Jatim</a>
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
</script>
</body>
</html>