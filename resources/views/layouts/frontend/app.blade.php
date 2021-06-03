<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@stack('title') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Essential META Tags -->
    <meta content="author" name="MD. SAKIR AHMED">
    <meta content="keywords" name="sakir, ecommerce, api, developer">
    <meta property="og:title" content="MD. SAKIR AHMED">
    <meta property="og:description" content="Software Engineer | +880 1304-734623">
    <meta property="og:image" content="{{ asset('uploads/images/sakir-meta-image.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website"/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontend/img/favicon.ico') }}">
    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/lib/css/nivo-slider.css') }}" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/lib/css/preview.css') }}" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/demo.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/menu_elastic.css') }}"/>
    <script src="{{ asset('assets/frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!--====== AJAX ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="canvas-wrapper">
    <div class="content-wrap">
        <div class="content">
            <!-- header start -->
            <header class="header-area home-style-2" style="background-color:#aaaaaa;">
                <div class="header-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-3 col-xs-6">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <h3 style="margin:-5px;"><b>{{ config('app.name') }}</b></h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-9 col-xs-6">
                                <div class="cart-menu">
                                    @if (auth()->check())
                                    <div class="user user-style-3 f-right logout-btn">
                                        <a href="javascript:0" id="open-button">
                                            <i class="pe-7s-lock"></i>
                                        </a>
                                    </div>
                                    @endif
                                    <div class="search-style-2 f-right">
                                        <a class="icon-search-2" href="{{ route('login') }}">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                    </div>
                                    <div class="shopping-cart f-right">
                                        <a class="top-cart" href="{{ route('cart') }}"><i class="pe-7s-cart"></i></a>
                                        <span class="cart-counter">{{ count(cart_items()) }}</span>
                                    </div>
                                    <div class="main-menu f-right">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="{{ url('/') }}">home</a>
                                                </li>
                                                <li>
                                                    <a href="https://documenter.getpostman.com/view/11483227/TzXwExmU" target="_blank">API Documentation</a>
                                                </li>
                                                <li>
                                                    <a href="https://github.com/mdsakirahmed/interview-task" target="_blank">GitHub</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header end -->
            <!-- mobile-menu-area start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li>
                                            <a class="active1" href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="active1"><a class="active1" href="#">API Documentation</a>
                                            <ul>
                                                <li><a href="#">about us </a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area end -->
            <!-- shop area start -->
            @yield('content')
            <!-- shop area end -->
            <!-- footer area start -->
            <hr class="container bg-danger">
            <footer class="footer-area">
                <div class="container">
                    <div class="footer-top pt-60 pb-30">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <div class="footer-widget mb-30">
                                    <div class="footer-logo">
                                        <a href="{{ url('/') }}">
                                            <h3><b>{{ config('app.name') }}</b></h3>
                                        </a>
                                    </div>
                                    <div class="widget-info">
                                        <p>
                                            <i class="pe-7s-mail"></i>
                                            <span>
                                                    <a href="m.sakirahmed@gmail.com">m.sakirahmed@gmail.com</a>
                                                </span>
                                        </p>
                                        <p>
                                            <i class="pe-7s-call"></i>
                                            <span>+880 1304-734623 </span>
                                        </p>
                                    </div>
                                    <div class="footer-social">
                                        <ul>
                                            <li><a href="https://www.facebook.com/DeveloperSakir/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://www.linkedin.com/in/mdsakirahmed/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                            <li><a href="https://www.instagram.com/sakir.dev/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                            <li><a href="https://github.com/mdsakirahmed" target="_blank"><i class="fa fa-github"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 hidden-sm">
                                <div class="footer-widget mb-30">
                                    <div class="footer-title">
                                        <h3>Quick Link</h3>
                                    </div>
                                    <div class="widget-text">
                                        <ul>
                                            <li><a href="{{ route('login') }}"> Login </a></li>
                                            <li><a href="{{ route('register') }}"> Registration </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="footer-widget mb-30">
                                    <div class="footer-title">
                                        <h3>services</h3>
                                    </div>
                                    <div class="widget-text">
                                        <ul>
                                            <li><a href="{{ route('index') }}">eCommerce </a></li>
                                            <li><a href="{{ route('cart') }}">Cart </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3">
                                <div class="footer-widget mb-30">
                                    <div class="footer-title">
                                        <h3>About</h3>
                                    </div>
                                    <div class="widget-text">
                                        <ul>
                                            <li><a href="javascript:0"> <del>About Project </del> </a></li>
                                            <li><a href="javascript:0"> <del>Project SRS </del> </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div class="footer-widget mb-30">
                                    <div class="footer-title">
                                        <h3>API</h3>
                                    </div>
                                    <div class="widget-text">
                                        <ul>
                                            <li><a href="https://documenter.getpostman.com/view/11483227/TzXwExmU" target="_blank">API Collection </a></li>
                                            <li><a href="https://github.com/mdsakirahmed/interview-task" target="_blank">GitHub </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom ptb-20">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="copyright">
                                    <p>
                                        Copyright © {{ date('Y') }}
                                        <a href="https://sakir.dev/" target="_blank"> <b>SAKIR</b> </a>
                                         All Rights Reserved.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="payment f-right">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer area end -->
        </div>
        <!-- content end -->
    </div>
    <!-- content-wrap end -->
</div>
<!-- all js here -->
<script src="{{ asset('assets/backend/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/snap.svg-min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.meanmenu.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/lib/js/jquery.nivo.slider.js') }}"></script>
<script src="{{ asset('assets/frontend/lib/home.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/frontend/js/classie.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main3.js') }}"></script>
<script src="{{ asset('assets/helpers/helper.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')
@stack('script')
</body>
</html>
