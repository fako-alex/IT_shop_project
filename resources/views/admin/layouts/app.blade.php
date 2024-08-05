<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title : '' }} | DIGITAL-GABON </title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css')}} ">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}} ">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css')}} ">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}} ">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/daterangepicker/daterangepicker.css')}} ">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css')}} ">
</head>

@yield('style')

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    @yield('content')
    @include('admin.layouts.footer')
</div>

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js')}} "></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('public/assets/plugins/jquery-ui/jquery-ui.min.js')}} "></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- ChartJS -->
<script src="{{ url('public/assets/plugins/chart.js/Chart.min.js')}} "></script>
<!-- Sparkline -->
<script src="{{ url('public/assets/plugins/sparklines/sparkline.js')}} "></script>
<!-- JQVMap -->
<script src="{{ url('public/assets/plugins/jqvmap/jquery.vmap.min.js')}} "></script>
<script src="{{ url('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}} "></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('public/assets/plugins/jquery-knob/jquery.knob.min.js')}} "></script>
<!-- daterangepicker -->
<script src="{{ url('public/assets/plugins/moment/moment.min.js')}} "></script>
<script src="{{ url('public/assets/plugins/daterangepicker/daterangepicker.js')}} "></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}} "></script>
<!-- Summernote -->
<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js')}} "></script>
<!-- overlayScrollbars -->
<script src="{{ url('public/assets/ plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.js')}} "></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('public/assets/dist/js/demo.js')}} "></script>
<script src="{{ url('public/assets/dist/js/pages/dashboard.js')}} "></script>
<script src="{{ url('public/assets/dist/js/pages/dashboard2.js')}} "></script>
<script src="{{ url('public/assets/dist/js/pages/dashboard3.js')}} "></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


@yield('scripts')

</body>
</html>
