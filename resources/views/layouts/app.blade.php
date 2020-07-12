<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>StackOverload</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css_login/bootstrap.min.css')}}">
    
    <link href="{{asset('sbadmin2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css_login/style.css')}}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css_login/default.css')}}">
    <link rel="shortcut icon" href="{{ asset('/img/icon2.ico')}}" type="image/x-icon">
</head>
<body id="top">
<div class="page_loader"></div>

<!-- Login 16 start -->
<div class="login-16">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-5 col-md-12 bg-img none-992 align-self-center">
                <div class="info">
                    <div class="logo clearfix">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="btn-section clearfix">
                        <a href="{{ route('login') }}" style="margin-bottom: 10px;" class="link-btn active btn-1 default-bg">{{ __('Sign In') }}</a>
                        <div class="clearfix"></div>
                        <a href="{{ route('register') }}" class="link-btn active btn-1 default-bg">{{ __('Sign Up') }}</a>
                    </div>
                    <ul class="social-list">
                        <li>
                            <a href="#" class="facebook-bg">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter-bg">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="google-bg">
                                <i class="fab fa-google-plus-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin-bg">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 bg-color-8 align-self-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- Login 16 end -->

<!-- External JS libraries -->
<script src="{{ asset('css_login/jquery-2.2.0.min.js.download')}}"></script>
<script src="{{ asset('css_login/popper.min.js.download')}}"></script>
<script src="{{ asset('css_login/bootstrap.min.js.download')}}"></script>
<!-- Custom JS Script -->

</body>
</html>