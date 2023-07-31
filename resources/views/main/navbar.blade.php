<!doctype html>
<html class="no-js" lang="zxx">
@php
$cookieValue = request()->cookie(rand());
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">

    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('icon/Icon_unican.png') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="body-wrapper" >

        <!-- HEADER AREA START (header-5) -->
        <header class="ltn__header-area ltn__header-5 ltn__header-transparent gradient-color-4---" style="background-color: rgb(255, 255, 255);">
            <!-- ltn__header-top-area start -->
            <div class="ltn__header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="ltn__top-bar-menu">
                                <ul>
                                    <style>
                                        a {
                                            text-decoration: none; 
                                            color: darkgray;
                                        }
                                    </style>
                                    <li><a href="https://www.google.com/maps/place/Universitas+Muhammadiyah+Kalimantan+Timur+Samarinda/@-0.4749719,117.1388952,15z/data=!4m2!3m1!1s0x0:0x108077d433712165?sa=X&ved=2ahUKEwimqYzZ1qGAAxX_2TgGHagnDBAQ_BJ6BAhZEAA&ved=2ahUKEwimqYzZ1qGAAxX_2TgGHagnDBAQ_BJ6BAhnEAg">
                                        <i class="icon-placeholder"></i>
                                         Jl. Ir. H. Juanda No.15, Sidodadi, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75124
                                        </a>
                                    </li>
                                    <li><a href="mailto:mustfauzan0@gmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> mustfauzan0@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="top-bar-right text-right">
                                <div class="ltn__top-bar-menu">
                                    <ul>
                                        <li>
                                            <!-- ltn__language-menu -->
                                            <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                                <ul>
                                                    <li><a href="#" class="dropdown-toggle"><span class="active-currency">Indonesian</span></a>
                                                        <ul>
                                                            <li><a href="#">Arabic</a></li>
                                                            <li><a href="#">English</a></li>
                                                            <li><a href="#">Chinese</a></li>
                                                            <li><a href="#">Indonesian</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <!-- ltn__social-media -->
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-top-area end -->

            <!-- ltn__header-middle-area start -->
            <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white sticky-active-into-mobile--- plr--9---">
                <div class="container">
                    <div class="row">
                        <div class="col " >
                            <div class="site-logo-wrap">
                                <div class="site-logo">
                                    <a href="{{ route('main.home') }}" rel="nofollow" alt="Logo">
                                        <img src="{{ asset('icon/Icon_unican.png') }}" alt="UNICAN" style="width: 55px;" class="navbar-brand logo rounded-3"> U N I C A
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col header-menu-column menu-color-white---">
                            <div class="header-menu d-none d-xl-block">
                                <nav>
                                    <div class="ltn__main-menu">
                                        <ul>
                                            <li class="menu-icon"><a href="{{ route('main.home') }}">Home</a>
                                            </li>
                                            <li class="menu-icon"><a href="{{ route('main.pr') }}">About</a>
                                                <ul>
                                                    <li><a href="{{ route('main.pr') }}">FAQ</a></li>
                                                    <li><a href="https://www.google.com/maps/place/Universitas+Muhammadiyah+Kalimantan+Timur+Samarinda/@-0.4749719,117.1388952,15z/data=!4m2!3m1!1s0x0:0x108077d433712165?sa=X&ved=2ahUKEwimqYzZ1qGAAxX_2TgGHagnDBAQ_BJ6BAhZEAA&ved=2ahUKEwimqYzZ1qGAAxX_2TgGHagnDBAQ_BJ6BAhnEAg">Google Map Locations</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('main.shop') }}">Shop</a>
                                            </li>
                                            <li><a href="{{ route('main.pr') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col ltn__header-options ltn__header-options-2">
                            <!-- user-menu -->
                            <div class="ltn__drop-menu user-menu">
                                <ul>
                                    <li>
                                        <a href="#"><i class="icon-user"></i></a>
                                        <ul>
                                            @if(Auth::id())
                                            <li><a href="{{ route('user.dashboard') }}" class="badge bg-white text-bg-light">
                                                        <img src="{{ asset('icon/astronaut.png') }}" class="img-fluid rounded-circle"
                                                            width="33.5" alt="user_comment">
                                                        <u style="font-size: 15px;" class="ms-1">{{Auth::user()->username}}</u>
                                                </a>
                                            </li>
                                            <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                                            <li><a href="{{ route('main.produk') }}">Wishlist</a></li>
                                            <li><a href="{{ route('logout') }}">Log-out</a></li>
                                            @else
                                            <li><a href="/client/login">Sign In</a></li>
                                            <li><a href="{{ route('user.sign_up') }}">Register</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- mini-cart -->
                            @Auth
                            @if(Auth::user()->user_type == 'Pembeli')
                            <div class="mini-cart-icon">
                                <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle" href="{{ route('main.produk') }}">
                                    <i class="icon-shopping-cart"></i>
                                    <sup>{{$hitung}}</sup>
                                </a>                            
                            </div>
                            @endif
                            @endauth
                            <!-- mini-cart -->
                            <!-- Mobile Menu Button -->
                            <div class="mobile-menu-toggle d-xl-none">
                                <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                    <svg viewBox="0 0 800 600">
                                        <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                        <path d="M300,320 L540,320" id="middle"></path>
                                        <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__header-middle-area end -->
        </header>
        <!-- HEADER AREA END -->

        

    </div>
    <!-- Body main wrapper end -->

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->

    <!-- All JS Plugins -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>