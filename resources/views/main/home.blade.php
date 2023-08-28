<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://apis.google.com/js/client.js?onload=fetchVideoDetailsAndSetThumbnail"></script>

    <style>
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            body {
                overflow-y: auto;
            }
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body>
    <div>
        @include('main/navbar')
    </div>

    <!-- Utilize Cart Menu Start -->


    <div class="ltn__utilize-overlay"></div>

    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3  section-bg-1" style="padding-top:150px;">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">

            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-3-normal">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-img ltn__slide-animation">
                                        <!-- VIDEO AREA START -->
                                        <script src="https://apis.google.com/js/api.js"></script>
                                        <div class="ltn__video-popup-area">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div id="videoThumbnailDiv1" style="border-radius: 5px; transform: scale(0.8);" class="ltn__video-bg-img ltn__video-popup-height-600 bg-overlay-black-10-- bg-image">
                                                            <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/Qrku0qImWyo?si=AV836sJsFFCsB7nR" data-rel="lightcase:myCollection">
                                                                <i class="fa fa-play" style="font-size: 24px;"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- VIDEO AREA END -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class=" col-lg-6 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">

                                        <h6 class="slide-sub-title animated"><img src="{{ asset('icon/Icon_unican.png') }}" style="width: 35px;" alt="#">
                                            100% Produk Berkualitas</h6>
                                        <h1 class="slide-title animated" style="font-size: xx-large;">Menghubungkan Keunggulan, <br> Membuka Peluang.</h1>
                                        <div class="slide-brief animated d-none">
                                            <p>Melalui platform kami, kami menghubungkan beragam keunggulan produk dengan pelanggan, membuka peluang baru dalam dunia belanja online.</p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="#pro" class="theme-btn-1 btn btn-effect-1 text-uppercase">Jelajahi Produk</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="slide-item-img ltn__slide-animation">
                                    <img src="{{ asset('icon/2.gif') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                                            -webkit-mask-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0.8) 80%, rgba(0, 0, 0, 0));
                                            mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 80%, rgba(0, 0, 0, 0));
                                            z-index: 2;">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3">
                <div class="ltn__slide-item-inner  text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <h6 class="slide-sub-title animated"><img src="{{ asset('icon/Icon_unican.png') }}" style="width: 35px;" alt="#">
                                            100% Produk Berkualitas</h6>
                                        <h1 class="slide-title animated" style="font-size: xx-large;">Menghubungkan Keunggulan, <br> Membuka Peluang.</h1>
                                        <div class="slide-brief animated">
                                            <p>Melalui platform kami, kami menghubungkan beragam keunggulan produk dengan pelanggan, membuka peluang baru dalam dunia belanja online.</p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="#pro" class="theme-btn-1 btn btn-effect-1 text-uppercase">Jelajahi Produk</a>
                                            <a href="{{ route('main.pr') }}" class="btn btn-transparent btn-effect-3 text-uppercase">PELAJARI LEBIH LANJUT</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item-img slide-img-left ltn__slide-animation">
                                    <img  src="{{ asset('icon/1.gif') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
                                        -webkit-mask-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 1) 80%, rgba(0, 0, 0, 0));
                                        mask-image: linear-gradient(to bottom, rgba(0, 0, 0, 1) 80%, rgba(0, 0, 0, 0));
                                        z-index: 2;" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- BANNER AREA START -->
    <!-- <div class="ltn__banner-area mt-120 mt--90 d-none">
        <div class="container">
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img src="{{ asset('icon/3.png') }}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="ltn__banner-area mt-120">
        <div class="container">
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="#"><img src="{{ asset('icon/3.png') }}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> -->
    <!-- BANNER AREA END -->
    <div class="ltn__product-area ltn__product-gutter pt-115 pb-70">
        <div class="container" id="product-list">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">Produk Pilihan</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach ($products as $product)
                @php
                $produk_name = $product->produk_name;
                $produk_kuan = $product->kuantitas;
                $max_length = 23;

                if (strlen($produk_name) > $max_length) {
                $produk_name = substr($produk_name, 0, $max_length) . '<span style="color: gray;">...</span>';
                }
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    @if ($produk_kuan >= 1)
                    <div class="ltn__product-item ltn__product-item-3 text-left">
                        <div class="product-img">
                            <a href="/produk/{{ $product->id }}" style="display: block; text-decoration: none;">
                                @foreach (explode('|', $product->gambar) as $key => $fruit)
                                @if ($key === 0)
                                <img src="{{ asset('gambar/'.$fruit) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                                @endif
                                @endforeach
                            </a>
                            <!-- <div class="product-badge">
                                <ul>
                                    <li class="sale-badge" style="background-color: rgb(247, 161, 62);">-{{rand(1,
                                        90)}}%</li>
                                </ul>
                            </div> -->
                            <div class="product-hover-action">
                                <ul>
                                    @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                                    <li>
                                        <a href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <!-- <div class="product-ratting">
                                <ul>
                                    @for ($i = 0; $i < $product->rating; $i++)
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $product->rating; $i++)
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                            @endfor
                                </ul>
                            </div> -->
                            <hr>
                            <h2 class="product-title"><a href="/produk/{{ $product->id }}">{!! $produk_name !!}</a></h2>
                            <div class="product-price">
                                <span style="color: rgb(247, 161, 62);"> Rp.{{ number_format($product->min_price, 0, ',', '.') }}</span><br>
                                <s style="color: rgb(215, 40, 40); text-decoration: line-through; text-decoration-style: double;"> Rp.{{ number_format($product->min_price * 2, 0, ',', '.') }}</s>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="ltn__product-item ltn__product-item-3 text-center">
                        <div class="product-img">
                            <a href="/produk/{{ $product->id }}" style="display: block;">
                                @foreach (explode('|', $product->gambar) as $key => $fruit)
                                @if ($key === 0)
                                <img src="{{ asset('gambar/'.$fruit) }}" class="card-img-top" style="aspect-ratio: 1 / 1; filter: brightness(50%);" />
                                @endif
                                @endforeach
                            </a>
                            <div class="product-hover-action">
                                <ul>
                                    @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                                    <li>
                                        <a href="#">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <hr>
                            <h2 class="product-title"><a href="/produk/{{ $product->id }}">{!! $produk_name !!}</a></h2>
                            <div class="product-price">
                                <span style="color: rgb(247, 62, 62);"> Stok Habis </span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
                <!--  -->
            </div>
        </div>
        <div id="loadMoreBtnContainer" class="btn-wrapper animated text-center mt-4">
            @if($products->hasMorePages())
            <a id="loadMoreBtn" class="btn theme-btn-2 btn btn-effect-2 text-uppercase" style="background-color: rgb(247, 161, 62);" data-page="{{ $products->currentPage() + 1 }}">Muat lebih</a>
            @else
            <p>Tidak ada lagi produk yang akan dimuat.</p>
            @endif
        </div>
        <hr>
    </div>


    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                        @php
                        // Inisialisasi array fitur
                        $features = [
                        [
                        'icon' => 'img/icons/icon-img/11.png',
                        'title' => 'Produk Terpilih',
                        'description' => 'Produk terpilih yang dipilih dengan cermat untuk menawarkan kualitas dan variasi terbaik.',
                        ],
                        [
                        'icon' => 'img/icons/icon-img/12.png',
                        'title' => 'Buatan Tangan',
                        'description' => 'Kreasi unik buatan tangan yang dibuat dengan keterampilan dan semangat.',
                        ],
                        [
                        'icon' => 'img/icons/icon-img/13.png',
                        'title' => 'Kualitas Tinggi',
                        'description' => 'Produk luar biasa yang dibedakan oleh kualitas unggulnya.',
                        ],
                        [
                        'icon' => 'img/icons/icon-img/14.png',
                        'title' => 'Inspirasi Harian',
                        'description' => 'Dosis harian inspirasi berbelanja untuk meningkatkan pengalaman belanja Anda.',
                        ],
                        ];
                        @endphp

                        <div class="row">
                            @foreach($features as $feature)
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-8">
                                    <div class="ltn__feature-icon">
                                        <img src="{{ $feature['icon'] }}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h4>{{ $feature['title'] }}</h4>
                                        <p>{{ $feature['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- FOOTER AREA START -->
    <footer class="ltn__footer-area  ">
        <div class="footer-top-area  section-bg-1 plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about-widget">
                            <div class="footer-logo">
                                <div class="site-logo">
                                    <h6 class="text-uppercase fw-bold mb-4">
                                        <a href="#">
                                            <img src="{{ asset('icon/Icon_unican.png') }}" style="width: 32px; height: 32px; filter: grayscale(100%);">
                                            <u style="color: grey; text-decoration: none;">
                                                _U N I C A_
                                            </u>
                                        </a>
                                    </h6>
                                </div>
                            </div>
                            <div class="footer-address">
                                <ul>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p>Jl. Ir. H. Juanda No.15, Sidodadi, Kec. Samarinda Ulu, Kota Samarinda,
                                                Kalimantan Timur 75124</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-call"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="tel:+6281254888102"> + 62 812 548 881 02</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="footer-address-icon">
                                            <i class="icon-mail"></i>
                                        </div>
                                        <div class="footer-address-info">
                                            <p><a href="mailto:mustfauzan0@gmail.com">mustfauzan0@gmail.com</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="ltn__social-media mt-20">
                                <ul>
                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-sm-6 col-12 offset-xl-4">
                        <div class="footer-widget footer-menu-widget clearfix">
                            <h4 class="footer-title">Pusat Perusahaan</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{route('main.pr')}}">FAQ</a></li>
                                    <li><a href="{{route('main.pr')}}">Hubungi kami</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-sm-12 col-12 ">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title">Hubungi kami</h4>
                            <p>Hubungi kami jika ada sebuah masalah.</p>
                            <div class="footer-newsletter">
                                <form action="#">
                                    <input type="email" name="email" placeholder="Email*">
                                    <div class="btn-wrapper">
                                        <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-2  ltn__border-top-2--- plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="ltn__copyright-design clearfix">
                            <p>Semua Hak Dilindungi Undang-Undang @UNICA oleh Muhammad Fauzan Nur Ilham <span>2023</span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-right">
                            <ul>
                                <li><a href="#">Syarat & Ketentuan</a></li>
                                <li><a href="#">Tuntutan</a></li>
                                <li><a href="{{ route('main.pr') }}">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Replace 'YOUR_YOUTUBE_API_KEY' with your actual YouTube Data API key
        var apiKey = 'AIzaSyCTwzcu-TPGQQlFMXWSby9xpAA7YpKvod8';
        var videoId = '1A7scJbKfvY'; // Replace with the YouTube video ID
        var vidId = 'Qrku0qImWyo';

        function fetchVideoDetailsAndSetThumbnails() {
            // URL endpoint API
            var apiUrl = 'https://www.googleapis.com/youtube/v3/videos';

            // Parameter permintaan
            var params = {
                part: 'snippet',
                key: apiKey
            };
            var videoIds = [videoId, vidId];

            // Permintaan GET ke YouTube Data API v3 menggunakan fetch() untuk setiap video ID
            videoIds.forEach(id => {
                fetch(apiUrl + '?' + new URLSearchParams({
                        ...params,
                        id: id
                    }))
                    .then(response => response.json())
                    .then(data => {
                        if (data.items.length > 0) {
                            var videoDetails = data.items[0].snippet;
                            var thumbnailUrl = videoDetails.thumbnails.high.url;

                            var videoThumbnailDiv = document.getElementById('videoThumbnailDiv');
                            var videoThumbnailDiv1 = document.getElementById('videoThumbnailDiv1');

                            if (id === videoId) {
                                videoThumbnailDiv.style.backgroundImage = 'url(' + thumbnailUrl + ')';
                            } else if (id === vidId) {
                                videoThumbnailDiv1.style.backgroundImage = 'url(' + thumbnailUrl + ')';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Kesalahan mengambil detail video:', error);
                    });
            });
        }

        fetchVideoDetailsAndSetThumbnails();
    </script>



    <script>
        var page = 2; // Mulai dari halaman 2, mengasumsikan halaman 1 sudah dimuat
        var loading = false;
        var hasMorePages = {
            {
                $products - > hasMorePages() ? 'true' : 'false'
            }
        };

        function loadMoreProducts() {
            if (loading || !hasMorePages) {
                return;
            }

            loading = true;

            $.ajax({
                url: "{{ route('load.more.products') }}",
                type: "GET",
                data: {
                    page: page
                },
                beforeSend: function() {
                    $("#loadMoreBtn").html("Sedang Memuat...");
                },
                success: function(response) {
                    var html = response.html;
                    hasMorePages = response.hasMore;

                    if (html) {
                        $("#product-list").append(html);
                        page++;

                        if (!hasMorePages) {
                            $("#loadMoreBtnContainer").html("<div class='btn-wrapper mt-0 mb-0'><a href=\"{{ route('main.shop') }}\" style='text-decoration: none;'><button class='btn btn-lg btn-block btn-transparent btn-effect-4 text-uppercase' style='color: #000; background-color: #fff;' onmouseover=\"this.style.color='#fff'; this.style.backgroundColor='#000';\" onmouseout=\"this.style.color='#000'; this.style.backgroundColor='#fff';\">Klik di sini untuk melihat banyak produk menarik</button></a></div>");
                        }
                    } else {
                        $("#loadMoreBtnContainer").html("<p>Kesalahan saat memuat produk, silahkan refresh halaman</p>");
                    }
                },
                complete: function() {
                    loading = false;
                    $("#loadMoreBtn").html("Tampilkan lebih banyak");
                }
            });
        }

        $(document).ready(function() {
            // Panggil fungsi ini saat halaman dimuat untuk menyembunyikan tombol jika diperlukan
            hideLoadMoreBtn();

            $("#loadMoreBtn").click(function() {
                loadMoreProducts();
            });
        });

        function hideLoadMoreBtn() {
            // Sembunyikan tombol "Muat lebih" jika tidak ada produk yang tersisa saat halaman dimuat
            if (!hasMorePages) {
                $("#loadMoreBtnContainer").html("<div class='btn-wrapper mt-0 mb-0'><a href=\"{{ route('main.shop') }}\" style='text-decoration: none; width:20px;'><button class='btn btn-lg btn-block btn-transparent btn-effect-4 text-uppercase' style='color: #000; background-color: #fff;' onmouseover=\"this.style.color='#fff'; this.style.backgroundColor='#000';\" onmouseout=\"this.style.color='#000'; this.style.backgroundColor='#fff';\">Klik di sini untuk melihat banyak produk menarik</button></a></div>");
            }
        }
    </script>

    </div>
    </section>





</body>

</html>