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


    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets/js/app.min.js')}}"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">

        <div class="login-logo">
            <b>TS3</b>CP
        </div>
        <div class="login-box-body">
            @yield('content')
        </div>


    </div>

    <footer class="main-footer" style="margin-left: 0; position: absolute; bottom: 0px; width: 100%;">
        <div class="pull-right hidden-xs">
            João Reis
        </div>
        <strong>Copyright &copy; {{  date('Y') }} <a href="https://www.jreis.pt">João Reis</a>.</strong> All rights reserved.
    </footer>
    <div class="control-sidebar-bg"></div>

</body>
</html>