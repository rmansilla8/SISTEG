<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- Jasny Bootstrap -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/jquery/dist/jasny-bootstrap.min.css') }}">
    <!-- Columnas con scrollbar -->
    <!-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/helper-css/scrollbar_columns.css') }}"> -->
    <!-- InputMask -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/jquery/dist/inputmask.min.css') }}">

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/filtering/row-based/range_dates.js"></script> -->
    <!-- <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-uk.js"></script> -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/helper-css/icon-on-input.css') }}">
    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/select2/select2.min.css') }}">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatable'))
        <!-- DataTables with bootstrap 3 style
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">-->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatable/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatable/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/datatable/buttons.dataTables.min.css') }}">
    @endif

    @if(config('adminlte.plugins.sweetalert'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert2.min.css')}}">
    @endif

    @if(config('adminlte.plugins.toastr'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/toastr/toastr.min.css')}}">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')



<!-- <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script> -->
<script src="{{ asset('vendor/adminlte/vendor/datatable/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/modal-steps.min.js') }}"></script>



@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="{{ asset('vendor/adminlte/vendor/select2/select2.min.js') }}"></script>
@endif

@if(config('adminlte.plugins.datatable'))
    <!-- DataTables with bootstrap 3 renderer
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>-->
    <script src="{{ asset('vendor/adminlte/vendor/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/datatable/datetime-moment.js') }}"></script>
    <!-- <script src="{{ asset('vendor/adminlte/vendor/datatable/dataTables.dateFormat.js') }}"></script> -->
    <!-- <script src="{{ asset('vendor/adminlte/vendor/datatable/date-uk.js') }}"></script> -->


@endif

@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
@endif

@if(config('adminlte.plugins.sweetalert'))
    <!-- ChartJS -->
    <script src="{{ asset('vendor/adminlte/vendor/sweetalert/sweetalert2.min.js')}}"></script>
@endif

@if(config('adminlte.plugins.toastr'))
    <!-- ChartJS -->
    <script src="{{ asset('vendor/adminlte/vendor/toastr/toastr.min.js')}}" defer></script>

@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>

@yield('adminlte_js')

</body>
</html>
