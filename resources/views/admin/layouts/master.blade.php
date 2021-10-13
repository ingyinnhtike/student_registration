<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Registeraion | Dashboard</title>
    @php($site_name = config('common.site'))
    @if($site_name == 'um1_yangon')
        <link rel="icon" type="image/png" href="{{asset('logo.png')}}"/>
    @elseif($site_name == 'nuac')
        <link rel="icon" type="image/png" href="{{asset('logo.jpg')}}"/>
@endif
<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('panel/bootstrap/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('panel/font-awesome/font-awesome.min.css')}} ">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('panel/dist/css/AdminLTE.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/Chart.min.css')}} ">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('panel/dist/css/_all-skins.min.css')}}">

<!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('panel/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{asset('panel/datepicker/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('panel/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css ">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css"/>

    <link rel="stylesheet"
          href="{{asset('css/bootstrap4-toggle.min.css')}}"/>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    {{--Here comes the body/contaianer--}}

    @include('admin.layouts.main-header')
    @include('admin.layouts.main-sidebar')

    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- /.content -->
            @include('admin.partials.flash-message')
            @yield('content')
        </section>
    </div>

    @include('admin.layouts.main-footer')
    {{--@include('admin.layouts.control-sidebar')--}}
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('panel/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('panel/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('panel/bootstrap/bootstrap.min.js')}}"></script>

<script src="{{asset('panel/raphael/raphael.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('panel/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('panel/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('panel/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>


<script src="{{asset('panel/moment/moment.min.js')}}"></script>

<!-- daterangepicker -->
<script src="{{asset('panel/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('panel/datepicker/bootstrap-datepicker.min.js')}}"></script>

<!-- Slimscroll -->
<script src="{{asset('panel/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('panel/fastclick/fastclick.js')}}"></script>

<script src="{{asset('js/Chart.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('panel/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/bootstrap4-toggle.min.js')}}"></script>


<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>

<script src="/vendor/datatables/buttons.server-side.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
{{--    Sweet Alert--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@stack('scripts')
</body>
</html>
