<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Unica - Belanja</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    <!-- Body main wrapper start -->
    <div>
        @include('main/navbar')
    </div>
    <div class="ltn__utilize-overlay"></div>
    <div class="wrapper">

        <!-- HEADER AREA START (header-5) -->


        <!-- BREADCRUMB AREA START -->
        <div class="ltn__breadcrumb-area ltn__breadcrumb-area-3 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image plr--9---" data-bg="{{ asset('icon/bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                            <div class="section-title-area ltn__section-title-2">
                                <h6 class="section-subtitle ltn__secondary-color">// Selamat Datang dihalaman</h6>
                                <h1 class="section-title white-color">Belanja</h1>
                            </div>
                            <div class="ltn__breadcrumb-list">
                                <ul>
                                    <li><a class="pip" href="{{ route('main.home')}}">Rumah</a></li>
                                    <li>Belanja</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB AREA END -->

        <!-- PRODUCT DETAILS AREA START -->
        <div class="ltn__product-area ltn__product-gutter mb-120">
            <div class="container">
                <div class="showing-product-number text-left">
                    <h1>Search Form</h1>
                    <form action="{{ route('products.search') }}" method="get" class="row row-cols-3">
                        <input type="text" name="query" placeholder="Query" value="<?php echo isset($query) ? $query : ''; ?>">
                        <input type="number" name="min_price" placeholder="Min Price" value="<?php echo isset($minPrice) ? $minPrice : ''; ?>">
                        <input type="number" name="max_price" placeholder="Max Price" value="<?php echo isset($maxPrice) ? $maxPrice : ''; ?>">
                        <button type="submit" class="theme-btn-1 ">Search</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__shop-options">
                            <ul>
                                <li>
                                    <div class="showing-product-number text-right">
                                        <span id="showing-product-count">Menampilkan {{ count($products) }} Hasil:</span>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <hr>
                        <div class="tab-content" id="product-list">
                            <div class="tab-pane fade active show" id="liton_product_grid">
                                <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                    <div class="row">
                                        <!-- ltn__product-item -->
                                        @foreach($products as $product)
                                        @php
                                        $produk_name = $product->produk_name;
                                        $produk_kuan = $product->kuantitas;
                                        $max_length = 23;

                                        if (strlen($produk_name) > $max_length) {
                                        $produk_name = substr($produk_name, 0, $max_length) . '<span style="color: gray;">...</span>';
                                        }
                                        @endphp
                                        <div class="col-xl-3 col-sm-5 col-5">
                                            @if ($produk_kuan >= 1)
                                            <div class="ltn__product-item ltn__product-item-3 text-center">
                                                <div class="product-img">
                                                    <a href="/produk/{{ $product->id }}" style="display: block;">
                                                        @foreach (explode('|', $product->gambar) as $key => $fruit)
                                                        @if ($key === 0)
                                                        <img src="{{ asset('gambar/'.$fruit) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                    <div class="product-badge">
                                                        <ul>
                                                            <li class="sale-badge" style="background-color: rgb(247, 161, 62);">-{{rand(1, 90)}}%</li>
                                                        </ul>
                                                    </div>
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
                            </div>
                        </div>
                        <div id="loadMoreBtnContainer" class="btn-wrapper animated text-center mt-4">
                            @if($products->hasMorePages())
                            <a id="loadMoreBtn" class="btn theme-btn-2 btn btn-effect-2 text-uppercase" style="background-color: rgb(247, 161, 62);" data-page="{{ $products->currentPage() + 1 }}">Muat lebih</a>
                            @else
                            <p>Tidak ada lagi produk yang akan dimuat</p>
                            @endif
                        </div>
                        <hr>
                    </div>

                </div>
            </div>
        </div>
        <!-- PRODUCT DETAILS AREA END -->

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

    </div>
    <!-- Body main wrapper end -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                url: "{{ route('load.more.products2') }}",
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
                            $("#loadMoreBtnContainer").html("<p>Tidak ada lagi produk yang akan dimuat</p>");
                        }

                        // Perbarui jumlah produk yang ditampilkan
                        $("#showing-product-count").text("Showing " + $("#product-list .ltn__product-item").length + " results");
                    } else {
                        $("#loadMoreBtnContainer").html("<p>Error loading products</p>");
                    }
                },

                complete: function() {
                    loading = false;
                    $("#loadMoreBtn").html("Muat lebih");
                }
            });
        }

        $(document).ready(function() {
            hideLoadMoreBtn();

            $("#loadMoreBtn").click(function() {
                loadMoreProducts();
            });
        });

        function hideLoadMoreBtn() {
            if ($("#product-list .ltn__product-item").length === 0) {
                $("#loadMoreBtnContainer").html("<p>Tidak ada lagi produk yang akan dimuat</p>");
            }
        }
    </script>
</body>

</html>