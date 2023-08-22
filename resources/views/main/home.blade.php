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
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <div class="slide-video mb-50 d-none">
                                            <a class="ltn__video-icon-2 ltn__video-icon-2-border"
                                                href="https://www.youtube.com/embed/u0Fok3DzxWQ"
                                                data-rel="lightcase:myCollection">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                        <h6 class="slide-sub-title animated"><img
                                                src="{{ asset('icon/Icon_unican.png') }}" style="width: 35px;" alt="#">
                                            100% genuine Products</h6>
                                        <h1 class="slide-title animated ">Linking Excellence, <br> Unleashing
                                            Possibilities</h1>
                                        <div class="slide-brief animated d-none">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore.</p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="#pro" class="theme-btn-1 btn btn-effect-1 text-uppercase">Explore
                                                Products</a>
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
                                        <h6 class="slide-sub-title animated"><img
                                                src="{{ asset('icon/Icon_unican.png') }}" style="width: 35px;" alt="#">
                                            100% genuine Products</h6>
                                        <h1 class="slide-title animated ">Linking Excellence, <br> Unleashing
                                            Possibilities</h1>
                                        <div class="slide-brief animated">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore.</p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="#pro" class="theme-btn-1 btn btn-effect-1 text-uppercase">Explore
                                                Products</a>
                                            <a href="{{ route('main.pr') }}"
                                                class="btn btn-transparent btn-effect-3 text-uppercase">LEARN MORE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item-img slide-img-left ltn__slide-animation">
                                    <img class="rounded-3 slide-title animated" src="{{ asset('icon/1.gif') }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;
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
                        <h1 class="section-title">Featured Products</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach ($products as $product)
                @php
                $produk_name = $product->produk_name;
                $max_length = 30;

                if (strlen($produk_name) > $max_length) {
                $produk_name = substr($produk_name, 0, $max_length) . '<span style="color: gray;">...</span>';
                }
                @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="ltn__product-item ltn__product-item-3 text-left">
                        <div class="product-img">
                            <a href="/produk/{{ $product->id }}" style="display: block; text-decoration: none;">
                                @foreach (explode('|', $product->gambar) as $key => $fruit)
                                @if ($key === 0)
                                <img src="{{ asset('gambar/'.$fruit) }}" class="card-img-top"
                                    style="aspect-ratio: 1 / 1" />
                                @endif
                                @endforeach
                            </a>
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badge" style="background-color: rgb(247, 161, 62);">-{{rand(1,
                                        90)}}%</li>
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
                            <div class="product-ratting">
                                <ul>
                                    <!-- Tambahkan logika untuk menampilkan bintang sesuai peringkat produk jika ada -->
                                    @for ($i = 0; $i < $product->rating; $i++)
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $product->rating; $i++)
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                            @endfor
                                </ul>
                            </div>
                            <hr>
                            <h2 class="product-title"><a href="/produk/{{ $product->id }}">{!! $produk_name !!}</a></h2>
                            <div class="product-price">
                                <span style="color: rgb(247, 161, 62);">Rp.{{$product->min_price}}</span><br>
                                <s
                                    style="color: rgb(215, 40, 40); text-decoration: line-through; text-decoration-style: double;">Rp.{{$product->min_price
                                    * 2}}</s>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--  -->
            </div>
        </div>
        <div id="loadMoreBtnContainer" class="btn-wrapper animated text-center mt-4">
            @if($products->hasMorePages())
            <a id="loadMoreBtn" class="btn theme-btn-2 btn btn-effect-2 text-uppercase"
                style="background-color: rgb(247, 161, 62);" data-page="{{ $products->currentPage() + 1 }}">Load
                More</a>
            @else
            <p>No more products to load</p>
            @endif
        </div>
        <hr>
    </div>
    <!-- VIDEO AREA START -->
    <script src="https://apis.google.com/js/api.js"></script>
    <div class="ltn__video-popup-area ltn__video-popup-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="videoThumbnailDiv" style="border-radius: 5px;"
                        class="ltn__video-bg-img ltn__video-popup-height-600 bg-overlay-black-10-- bg-image">
                        <a class="ltn__video-icon-2 ltn__video-icon-2-border"
                            href="https://www.youtube.com/embed/1A7scJbKfvY" data-rel="lightcase:myCollection">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VIDEO AREA END -->

    <!-- TESTIMONIAL AREA START (testimonial-4) -->
    @php
    $testimonials = [
    [
    'image' => "icon/pru.png",
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua.',
    'name' => 'RUDIMAN, S.KOM., M.SC.',
    'title' => 'Concept Developer',
    ],
    [
    'image' => "icon/pru.png",
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua.',
    'name' => 'ROFILDE HASUDUNGAN, S.Kom., M.Sc',
    'title' => 'DevOps Engineer',
    ],
    [
    'image' => "icon/pro.png",
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua.',
    'name' => 'Muhammad Fauzan Nur Ilham',
    'title' => 'Software Developer/Programmer',
    ],
    [
    'image' => "icon/pri.png",
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua.',
    'name' => 'Muhammad Haikal Mahardika',
    'title' => 'Software Developer/Programmer',
    ],
    [
    'image' => "icon/pri.png",
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
    dolore magna aliqua.',
    'name' => 'Pandu Wirayuda',
    'title' => 'Software Developer/Programmer',
    ],
    // Add more testimonials here
    ];
    @endphp
    <div class="ltn__testimonial-area section-bg-1 pt-290 pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">// Testimonials</h6>
                        <h1 class="section-title">Clients Feedbacks<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
                @foreach($testimonials as $testimonial)
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img ">
                            <img src="{{ $testimonial['image'] }}" class="rounded-5" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>{{ $testimonial['content'] }}</p>
                            <h4>{{ $testimonial['name'] }}</h4>
                            <h6>{{ $testimonial['title'] }}</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- BLOG AREA START (blog-3) -->
    @php
    // Contoh inisialisasi array blog (ganti ini dengan data yang sesuai dari database atau sumber lainnya)
    $blogs = [
    [
    'image' => 'img/blog/1.jpg',
    'author' => 'Admin',
    'category' => 'Services',
    'title' => 'Profile Muhammad Fauzan Nur Ilham',
    'date' => 'Agt 21, 2024',
    ],
    [
    'image' => 'img/blog/1.jpg',
    'author' => 'Admin',
    'category' => 'Services',
    'title' => 'Profile Pandu Wirayuda',
    'date' => 'Agt 21, 2024',
    ],
    [
    'image' => 'img/blog/1.jpg',
    'author' => 'Admin',
    'category' => 'Services',
    'title' => 'Profile Muhammad Haikal Mahardika',
    'date' => 'Agt 21, 2024',
    ],
    ];
    @endphp
    <div class="ltn__blog-area pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color---">Latest Blog</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                @foreach($blogs as $blog)
                <!-- Blog Item -->
                <div class="col-lg-12">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="blog-details.html"><img src="{{ $blog['image'] }}" alt="#"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: {{ $blog['author'] }}</a>
                                    </li>
                                    <li class="ltn__blog-tags">
                                        <a href="#"><i class="fas fa-tags"></i>{{ $blog['category'] }}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="blog-details.html">{{ $blog['title'] }}</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ $blog['date']
                                            }}</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="blog-details.html">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--  -->
            </div>
        </div>
    </div>

    <!-- BLOG AREA END -->

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
                        'title' => 'Curated Products',
                        'description' => 'Curated products carefully selected to offer the best quality and variety',
                        ],
                        [
                        'icon' => 'img/icons/icon-img/12.png',
                        'title' => 'Handmade',
                        'description' => 'Unique handmade creations crafted with skill and passion.',
                        ],
                        [
                        'icon' => 'img/icons/icon-img/13.png',
                        'title' => 'High Quality',
                        'description' => 'Exceptional products distinguished by their superior quality.',
                        ],
                        [
                        'icon' => 'img/icons/icon-img/14.png',
                        'title' => 'Daily Shopping Inspiration',
                        'description' => 'Daily dose of shopping inspiration to elevate your retail experience.',
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
                                            <img src="{{ asset('icon/Icon_unican.png') }}"
                                                style="width: 32px; height: 32px; filter: grayscale(100%);">
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
                            <h4 class="footer-title">Company</h4>
                            <div class="footer-menu">
                                <ul>
                                    <li><a href="{{route('main.pr')}}">FAQ</a></li>
                                    <li><a href="{{route('main.pr')}}">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-sm-12 col-12 ">
                        <div class="footer-widget footer-newsletter-widget">
                            <h4 class="footer-title">Contact we</h4>
                            <p>contact us if there is a problem.</p>
                            <div class="footer-newsletter">
                                <form action="#">
                                    <input type="email" name="email" placeholder="Email*">
                                    <div class="btn-wrapper">
                                        <button class="theme-btn-1 btn" type="submit"><i
                                                class="fas fa-location-arrow"></i></button>
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
                            <p>All Rights Reserved @UNICA by Muhammad Fauzan Nur Ilham <span>2023</span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-right">
                            <ul>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Claim</a></li>
                                <li><a href="{{ route('main.pr') }}">Privacy & Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->

    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/4.png" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h3>Vegetables Juices</h3>
                                            <div class="product-price">
                                                <span>$149.00</span>
                                                <del>$165.00</del>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <strong>Categories:</strong>
                                                        <span>
                                                            <a href="#">Parts</a>
                                                            <a href="#">Car</a>
                                                            <a href="#">Seat</a>
                                                            <a href="#">Cover</a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton"
                                                                class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1"
                                                            title="Add to Cart" data-toggle="modal"
                                                            data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-toggle="modal"
                                                            data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-toggle="modal"
                                                            data-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                                    </li>
                                                    <li><a href="#" title="Instagram"><i
                                                                class="fab fa-instagram"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/1.png" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><a href="product-details.html">Vegetables Juices</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added
                                                to your Cart</p>
                                            <div class="btn-wrapper">
                                                <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                <a href="checkout.html"
                                                    class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none---">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br> Use
                                                (LoveBroccoli) discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/7.png" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><a href="product-details.html">Vegetables Juices</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added
                                                to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View
                                                    Wishlist</a>
                                            </div>
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br> Use
                                                discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Replace 'YOUR_YOUTUBE_API_KEY' with your actual YouTube Data API key
        var apiKey = 'AIzaSyCTwzcu-TPGQQlFMXWSby9xpAA7YpKvod8';
        var videoId = '1A7scJbKfvY'; // Replace with the YouTube video ID

        function fetchVideoDetailsAndSetThumbnail() {
            // URL endpoint API
            var apiUrl = 'https://www.googleapis.com/youtube/v3/videos';

            // Parameter permintaan
            var params = {
                part: 'snippet',
                id: videoId,
                key: apiKey
            };

            // Permintaan GET ke YouTube Data API v3 menggunakan fetch()
            fetch(apiUrl + '?' + $.param(params))
                .then(response => response.json())
                .then(data => {
                    if (data.items.length > 0) {
                        var videoDetails = data.items[0].snippet;
                        var thumbnailUrl = videoDetails.thumbnails.high.url;

                        var videoThumbnailDiv = document.getElementById('videoThumbnailDiv');
                        videoThumbnailDiv.style.backgroundImage = 'url(' + thumbnailUrl + ')';
                    }
                })
                .catch(error => {
                    console.error('Error fetching video details:', error);
                });
        }

        fetchVideoDetailsAndSetThumbnail();
    </script>


    <script>
        var page = 2; // Mulai dari halaman 2, mengasumsikan halaman 1 sudah dimuat
        var loading = false;
        var hasMorePages = {{ $products -> hasMorePages() ? 'true' : 'false' }};

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
                beforeSend: function () {
                    $("#loadMoreBtn").html("Loading...");
                },
                success: function (response) {
                    var html = response.html;
                    hasMorePages = response.hasMore;

                    if (html) {
                        $("#product-list").append(html);
                        page++;

                        if (!hasMorePages) {
                            $("#loadMoreBtnContainer").html("<button class='btn theme-btn-2 btn btn-effect-2 text-uppercase'><a href='{{ route('main.shop') }}'><p>Click Here for many interesting product</p><a></button>");
                        }
                    } else {
                        $("#loadMoreBtnContainer").html("<p>Error loading products</p>");
                    }
                },
                complete: function () {
                    loading = false;
                    $("#loadMoreBtn").html("Load More");
                }
            });
        }

        $(document).ready(function () {
            // Panggil fungsi ini saat halaman dimuat untuk menyembunyikan tombol jika diperlukan
            hideLoadMoreBtn();

            $("#loadMoreBtn").click(function () {
                loadMoreProducts();
            });
        });

        function hideLoadMoreBtn() {
            // Sembunyikan tombol "Load More" jika tidak ada produk yang tersisa saat halaman dimuat
            if (!hasMorePages) {
                $("#loadMoreBtnContainer").html("<button href='{{ route('main.shop') }}'><p>Click Here for many interesting product</p></button>");
            }
        }
    </script>

    </div>
    </section>





</body>

</html>