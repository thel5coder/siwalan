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
</script>
</body>
</html>