<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>





<link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <!--<link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" /> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ route('main.home') }}">Raboot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('main.home') }}">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dashboard</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if(Auth::id())
                                <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                @else
                                <li><a class="dropdown-item" href="/client/login">Sign In</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.sign_up') }}">Sign Up</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    @if(Auth::id())
                    @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                    <div class="d-flex">
                        <a href="{{ route('main.produk') }}">
                        <button type="button" class="btn btn-primary">
                            
                            Keranjang
                            <span class="badge bg-white text-dark ms-1">{{$hitung}}</span>
                        </button>
                        </a>
                        <span><div style="width:10px;"></div></span>
                        <a href="{{ route('poin') }}">
                        <button type="button" class="btn btn-secondary">
                            
                            Saldo
                            <span class="badge bg-white text-dark ms-1">Rp{{Auth::user()->saldo}}</span>
                        </button>
                        </a>
                    </div>
                    @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
                    <div class="d-flex">
                        <a href="{{ route('poin') }}">
                        <button type="button" class="btn btn-secondary">
                            
                            Saldo
                            <span class="badge bg-white text-dark ms-1">Rp{{Auth::user()->saldo}}</span>
                        </button>
                        </a>
                    </div>
                    @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Kurir')
                    @endif
                    @else
                    @endif
                </div>
            </div>
        </nav>

        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!-- <script src="{{ asset('home/js/scripts.js') }}"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
