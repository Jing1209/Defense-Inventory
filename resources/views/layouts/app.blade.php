<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Outside -->
    <link href="{{asset('assets/extra-libs/c3/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/libs/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                @include('layouts.navbar')
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            @include('layouts.sidebar')
        </aside>
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
</body>

</html>

<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<!-- apps -->
<script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
<script src="{{asset('dist/js/feather.min.js')}}"></script>
<script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('dist/js/custom.min.js')}}"></script>
<!--This page JavaScript -->
<script src="{{asset('assets/extra-libs/c3/d3.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/c3/c3.min.js')}}"></script>
{{-- <script src="{{asset('assets/libs/chartist/dist/chartist.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script> --}}
<script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/extra-libs/datatables.net/js/jquery.dataTables.js')}}"></script>
{{-- <script src="{{asset('dist/js/pages/dashboards/dashboard1.min.js')}}"></script> --}}
<script src="{{asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>