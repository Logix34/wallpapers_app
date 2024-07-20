<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wallpaper| Limpid</title>
    <link href="{{asset('css/datatablestyle.css')}}" rel="stylesheet" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <script src="{{asset('js/all.js')}}" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('layout.header')
<div id="layoutSidenav">
    @include('layout.sidebar')
    <div id="layoutSidenav_content">
        @yield('content')
        @include('layout.footer')
    </div>
</div>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
{{--<script src="{{asset('js/Chart.min.js')}}" crossorigin="anonymous"></script>--}}
{{--<script src="assets/demo/chart-area-demo.js"></script>--}}
{{--<script src="assets/demo/chart-bar-demo.js"></script>--}}
<script src="{{asset('js/simple-datatables.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/toastr.min.css')}}">
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('success') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif
</script>
@yield('script')
</body>
</html>
