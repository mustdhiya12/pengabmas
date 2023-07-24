<!DOCTYPE html>
<html>
@php
$cookieValue = request()->cookie(rand());
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('icon/Icon_unican.png') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
<div class="row justify-content-between" style="width: auto;">
        <nav class="navbar navbar-expand-lg navbar-light mx-background-top-linear rdr navbar-shrink"
            style="position: fixed; z-index: 999; width: 100%;">
            <div class="container-fluid px-4 px-lg-5" id="imheader">
                <div class="col-4 d-flex align-items-center" style="padding-left: 6%;">
                    <div style="background: linear-gradient(45deg, #005cd9 21%, #ffac4c 90%); border-radius: 3px; width: 55px;">
                        <a href="{{ route('main.home') }}" rel="nofollow">
                            <img src="{{ asset('icon/Icon_unican.png') }}" alt="UNICAN" style="width: 55px;" class="navbar-brand logo rounded-3">
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="open-overlay">
                        <div class="bar-top"></div>
                        <div class="bar-middle"></div>
                        <div class="bar-bottom"></div>
                    </div>
                </div>
                <div class="overlay-navigation">
                    <ul>
                        <li style="background: rgba(245, 245, 245, 0.3) ;"><a class="nav-link" href="{{ route('main.home') }}">Home</a></li>
                        <li style="background: rgba(245, 245, 245, 0.3) ;"><a class="nav-link" href="{{ route('main.pr') }}">Privacy policy</a></li>
                        @if(Auth::id())
                        <li style="background: rgba(245, 245, 245, 0.3) ;">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                        <li style="background: rgba(245, 245, 245, 0.3) ;">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        @else
                        <li style="background: rgba(245, 245, 245, 0.3) ;">
                            <a class="nav-link" href="/client/login">Sign In</a>
                        </li>
                        <li style="background: rgba(245, 245, 245, 0.3) ;">
                            <a class="nav-link" href="{{ route('user.sign_up') }}">Sign Up</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @if(Auth::id())
                <div class="col-4">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}" class="badge bg-white text-bg-light">
                                <button type="button" class="btn bg-transparent">
                                    <img src="{{ asset('icon/astronaut.png') }}" class="img-fluid rounded-circle me-2"
                                        width="33.5" alt="user_comment">
                                    <u style="font-size: 15px;" class="ms-1">{{Auth::user()->username}}</u>
                                </button>
                            </a>
                        </li>
                        @if(Auth::user()->user_type == 'Pembeli')
                        <li class="nav-item inti">
                            <a class="m-5" href="{{ route('main.produk') }}">
                                <i class="bi bi-person-heart" style="font-size: 30px; color: aliceblue; margin-right: 0;"></i>
                                <span class="badge bg-white text-dark ms-1">{{$hitung}}</span>
                            </a>                            
                        </li>
                       @endif
                    </ul>
                </div>
                @else
                <div class="col-4 ml-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/client/login" class="badge bg-white text-bg-light">
                                <button type="button" class="btn bg-transparent">
                                    Sign In
                                </button>
                            </a>
                        </li>
                        <div style="width: 10px;"></div>
                        <li class="nav-item">
                            <a href="{{ route('user.sign_up') }}" class="badge bg-white text-bg-light">
                                <button type="button" class="btn bg-transparent">
                                    Sign Up
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </nav>
    </div>

    <!-- Core theme JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        // Mendaftarkan event click pada elemen open-overlay
        document.querySelector('.open-overlay').addEventListener('click', function () {
            var overlay_navigation = document.querySelector('.overlay-navigation');
            var navbarCollapse = document.querySelector('.navbar-collapse');
            var navItems = document.querySelectorAll('nav ul li');

            if (!overlay_navigation.classList.contains('overlay-active')) {
                overlay_navigation.classList.add('overlay-active');
                overlay_navigation.classList.remove('overlay-slide-up');
                overlay_navigation.classList.add('overlay-slide-down');
                navbarCollapse.classList.remove('show');

                navItems.forEach(function (item, index) {
                    item.style.animation = `fadeIn 0.5s forwards ${index * 100}ms`;
                    item.addEventListener('click', closeOverlay);
                });

                document.addEventListener('click', outsideClick);
            } else {
                closeOverlay();
            }

            function closeOverlay() {
                overlay_navigation.classList.remove('overlay-active');
                overlay_navigation.classList.remove('overlay-slide-down');
                overlay_navigation.classList.add('overlay-slide-up');

                navItems.forEach(function (item, index) {
                    item.style.animation = `fadeOut 0.5s forwards ${index * 100}ms`;
                    item.removeEventListener('click', closeOverlay);
                });

                document.removeEventListener('click', outsideClick);
            }

            function outsideClick(e) {
                var openOverlay = document.querySelector('.open-overlay');
                // Mengambil elemen yang diklik di luar overlay-navigation dan open-overlay
                if (
                    !overlay_navigation.contains(e.target) &&
                    !openOverlay.contains(e.target)
                ) {
                    closeOverlay();
                }
            }
        });

    </script>


</body>

</html>
