<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{!! asset('assets/css/app.css') !!}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@yield("body")
<script src="{!! asset('assets/js/vendor.js') !!}"></script>
<script src="{!! asset('assets/js/app.js') !!}"></script>
@if(session("success"))
<script>
    swal({
        title: "{{ trans('keywords.success') }}",
        text: "{{ session('success') }}",
        type: "success",
        confirmButtonText: "{{ trans('keywords.ok') }}"
    });
</script>
@endif
</body>
</html>