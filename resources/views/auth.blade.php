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
<body class="theme-default">

<section class="page-content">
    @yield('content')
</section>

<div class="main-backdrop"><!-- --></div>

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