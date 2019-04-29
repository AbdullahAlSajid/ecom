<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="{{asset('website/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
    <link href="{{asset('website/themes/css/bootstrappage.css')}}" rel="stylesheet"/>

    <!-- global styles -->
    <link href="{{asset('website/themes/css/flexslider.css')}}" rel="stylesheet"/>
    <link href="{{asset('website/themes/css/main.css')}}" rel="stylesheet"/>

    <!-- scripts -->
    <script src="{{asset('website/themes/js/jquery-1.7.2.min.js')}}"></script>
    <script src="{{asset('website/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/themes/js/superfish.js')}}"></script>
    <script src="{{asset('website/themes/js/jquery.scrolltotop.js')}}"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @include('flash::message')
    <div id="top-bar" class="container">
        <!--Top Bar-->
        @include('website.components.top-bar')
    </div>
    <div id="wrapper" class="container">
        <!--Nav Bar-->
        @include('website.components.nav-bar')

        <!--Contents-->
        @yield('contents')

        <!--Footer-->
        @include('website.components.footer')
    </div>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <!--Extra Scripts-->
    @stack('scripts')
</body>
</html>