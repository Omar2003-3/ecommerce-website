<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('userWeb/assets/images/favicon.png') }}" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('userWeb/assets/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('userWeb/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('userWeb/assets/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('userWeb/assets/css/responsive.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="hero_area">
        <!-- header section -->
        @include('UI.layouts.header')
        <!-- end header section -->
        
        <!-- slider section -->
        @include('UI.layouts.slider')
        <!-- end slider section -->
    </div>
    
    <!-- why section -->
    @include('UI.layouts.why')
    <!-- end why section -->
    
    <!-- arrival section -->
    @include('UI.layouts.arrival')
    <!-- end arrival section -->
    
    <!-- product section -->
    @include('UI.layouts.products')
    <!-- end product section -->

    <!-- subscribe section -->
    @include('UI.layouts.subscribe')
    <!-- end subscribe section -->
    
    <!-- client section -->
    @include('UI.layouts.client')
    <!-- end client section -->
    
    <!-- footer section -->
    @include('UI.layouts.footer')
    <!-- end footer section -->
    
    <!-- Scripts -->
    <script src="{{ asset('userWeb/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('userWeb/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('userWeb/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('userWeb/assets/js/custom.js') }}"></script>
</body>
</html>