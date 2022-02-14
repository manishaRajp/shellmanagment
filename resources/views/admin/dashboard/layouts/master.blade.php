<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('admin/dist/img/icons8-fast-cart-30.png') }}">
    <title>shell-management</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>


        <!-- Begin page -->
        <div id="wrapper">

            @include('admin.dashboard.layouts.menu')
            @include('admin.dashboard.layouts.header')
            {{-- @include('flash-message') --}}
            @yield('content')
            <!-- jQuery -->
            <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <!-- AdminLTE -->
            <script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>

            <!-- OPTIONAL SCRIPTS -->
            {{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}
            <!-- AdminLTE for demo purposes -->
            <script src="{{ asset('admin/dist/js/demo.js')}}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{ asset('admin/dist/js/pages/dashboard3.js')}}"></script>
            @stack('scripts')
        </body>
        @include('admin.dashboard.layouts.footer')
</html>
