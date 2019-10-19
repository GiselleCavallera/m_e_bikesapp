<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Movilidad y gestión de tráfico</title>
    @section('styles_laravel')
    
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/datatable-bootstrap.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link rel="stylesheet"  href="{{ asset('../public/css/fontawesome/fontawesome.min.css') }}" type="text/css" media="all">

    <!-- //for-mobile-apps -->
    <!--<link href="css/improve/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/improve/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/improve/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/improve/flexslider.css" type="text/css" media="screen" />-->
    <!-- css files -->
    <link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- //css files -->

    @show
    @yield('my_styles')
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        /*** Para funcionamiento pestañas ***/
        .panel.with-nav-tabs .panel-heading{
            padding: 5px 5px 0 5px;
        }
        .panel.with-nav-tabs .nav-tabs{
            border-bottom: none;
        }
        .panel.with-nav-tabs .nav-justified{
            margin-bottom: -1px;
        }
        /********************************************************************/
        /*** PANEL DEFAULT ***/
        .with-nav-tabs.panel-default .nav-tabs > li > a,
        .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
            color: #777;
        }
        .with-nav-tabs.panel-default .nav-tabs > .open > a,
        .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
        .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
            color: #777;
            background-color: #ddd;
            border-color: transparent;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.active > a,
        .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
            color: #555;
            background-color: #fff;
            border-color: #ddd;
            border-bottom-color: transparent;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
            background-color: #f5f5f5;
            border-color: #ddd;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
            color: #777;   
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
            background-color: #ddd;
        }
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
            color: #fff;
            background-color: #555;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12"> <!--col-md-offset-1 -->
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="{{ asset('js/jquery.js') }}"></script> 
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script> 
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('js/datatable-bootstrap.js') }}"></script> 
    <!--<script>
        $(document).ready(function(){
            $('#MyTable').dataTable();
        });
    </script> -->

    @yield('my_scripts')
</body>
</html>
