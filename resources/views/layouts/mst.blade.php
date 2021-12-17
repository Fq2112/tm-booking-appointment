<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="{{env('APP_NAME')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | {{env('APP_TITLE')}}</title>
    <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:400,700|Crete+Round:400i&display=swap" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/swiper.css')}}" type="text/css"/>

    <link rel="stylesheet" href="{{asset('css/medical.css')}}" type="text/css"/>

    <link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/glyphicons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/medical-icons.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/modal.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('js/swal2/dist/sweetalert2.min.css')}}" type="text/css"/>

    <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/media-query.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/colors.php?color=28B77A')}}" type="text/css"/>

    @stack('styles')

    <script src='https://www.google.com/recaptcha/api.js?onload=recaptchaCallback&render=explicit' async defer></script>
</head>

<body class="stretched page-transition use-nicescroll"
      data-loader-html="<div id='css3-spinner-svg-pulse-wrapper'><svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='https://www.w3.org/2000/svg' viewport='0 0 60 60' xmlns:xlink='https://www.w3.org/1999/xlink'><path id='css3-spinner-pulse' stroke='#28B77A' fill='none' stroke-width='2' stroke-linejoin='round' d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' /></svg></div>">

<!-- Modal -->
@include('layouts.partials._modal')

<!-- Main -->
<div id="wrapper" class="clearfix">
    <!-- Header -->
    <header id="header" class="transparent-header">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row justify-content-lg-between">
                    <!-- Logo -->
                    <div id="logo" class="me-lg-0 col-lg-3">
                        <a href="{{route('home')}}" class="standard-logo">
                            <img src="{{asset('images/logotype.png')}}" alt="{{env('APP_NAME')}}"></a>
                        <a href="{{route('home')}}" class="retina-logo">
                            <img src="{{asset('images/logotype.png')}}" alt="{{env('APP_NAME')}}"></a>
                    </div>

                    <div id="primary-menu-trigger">
                        <svg class="svg-trigger" viewBox="0 0 100 100">
                            <path
                                d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                            <path d="m 30,50 h 40"></path>
                            <path
                                d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                        </svg>
                    </div>

                    <nav class="primary-menu">
                        @include('layouts.partials._nav')
                    </nav>
                </div>
            </div>
        </div>

        @yield('slider')

        <div class="header-wrap-clone"></div>
    </header>

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer id="footer" style="background-color: #F5F5F5; border-top: 2px solid rgba(0,0,0,0.06);">
        <div id="copyrights" class="bg-transparent">
            <div class="container clearfix">
                <div class="row col-mb-30">
                    <div class="col-md-6 text-center text-md-start">
                        Copyrights &copy; {{now()->format('Y')}} All Rights Reserved by {{env('APP_NAME')}}.<br>
                        <div class="copyright-links"><a href="https://trustmedis.com/terms-and-conditions/">Terms & Conditions</a> / <a href="https://trustmedis.com/privacy-policy/">Privacy Policy</a></div>
                    </div>

                    <div class="col-md-6 text-center text-md-end">
                        <div class="d-flex justify-content-center justify-content-md-end">
                            <a href="mailto:{{env('MAIL_USERNAME')}}" class="social-icon si-small si-borderless si-google">
                                <i class="icon-email3"></i>
                                <i class="icon-email3"></i>
                            </a>
                            <a href="https://wa.me/62811341212" class="social-icon si-small si-borderless si-whatsapp">
                                <i class="icon-whatsapp"></i>
                                <i class="icon-whatsapp"></i>
                            </a>
                            <a href="https://fb.com/trustmedis/" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="https://instagram.com/trustmedis_id" class="social-icon si-small si-borderless si-instagram">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="https://linkedin.com/company/trustmedis" class="social-icon si-small si-borderless si-linkedin">
                                <i class="icon-linkedin"></i>
                                <i class="icon-linkedin"></i>
                            </a>
                            <a href="https://www.youtube.com/channel/UCoehOnJoqs8JM3KDa7avvxQ" class="social-icon si-small si-borderless si-youtube">
                                <i class="icon-youtube"></i>
                                <i class="icon-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up rounded-circle"></div>
<div class="myProgress">
    <div class="bar"></div>
</div>

<!-- JavaScripts -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/plugins.min.js')}}"></script>
<!-- Bootstrap Typeaheadjs Plugin -->
<script src="{{asset('js/typehead.js')}}"></script>
<script src="{{asset('js/underscore-min.js')}}"></script>
<!-- toggle password -->
<script src="{{asset('js/hideShowPassword.min.js')}}"></script
<!-- check-mobile -->
<script src="{{asset('js/checkMobileDevice.js')}}"></script>
<!-- Nicescroll -->
<script src="{{asset('js/nicescroll/jquery.nicescroll.js')}}"></script>
<!-- swal2 -->
<script src="{{asset('js/swal2/dist/sweetalert2.all.min.js')}}"></script>
<!-- Footer Scripts -->
<script src="{{asset('js/functions.js')}}"></script>

@yield('scripts')
@include('layouts.partials._script')
@include('layouts.partials._alert')
</body>
</html>
