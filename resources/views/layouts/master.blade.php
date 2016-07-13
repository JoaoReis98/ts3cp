<!DOCTYPE html>
<html>
<head>
    <title>TS3 Control Panel - @yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script type="text/javascript" src="{{URL::asset('assets/js/jQuery-2.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/pace.min.js')}}"></script>


    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/layout.css')}}" />

    <link rel="stylesheet" type="text/css" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap.css')}}" />

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/all_skins.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/pace.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/select2.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/dataTables.bootstrap.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/datepicker.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/sweetalert.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/jvectormap.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/timepicker.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/bootstrap3-wysihtml5.min.css')}}" />



    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>


    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.inputmask.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.inputmask.date.extension.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.inputmask.extension.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/select2.full.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/countdown.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/Chart.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/datepicker.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/sweetalert.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/mapvector.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/worldmill.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/timepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/app.min.js')}}"></script>

</head>
<style>
    .remove-link-color {
        color: inherit !important;
    }
</style>
<body class="hold-transition skin-red sidebar-mini fixed">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.left_sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    TS3
                    <small>Control Panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Main</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

            @yield('content')
            </section>
        </div>



        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                João Reis
            </div>
            <strong>Copyright &copy; {{  date('Y') }} <a href="https://www.jreis.pt">João Reis</a>.</strong> All rights reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();
            });
        </script>
    </div>
</body>
</html>