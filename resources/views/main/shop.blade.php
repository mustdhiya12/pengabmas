<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Broccoli - Organic Food HTML Template</title>
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
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">Shop</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a class="pip" href="{{ route('main.home')}}">Home</a></li>
                                <li>Shop</li>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-options">
                        <ul>
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li>
                               <div class="showing-product-number text-right">
                                    <span>Showing 1–12 of 18 results</span>
                                </div> 
                            </li>
                            <li>
                               <div class="short-by text-center">
                                    <select class="nice-select">
                                        <option>Default Sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="product-list">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    @foreach($products as $product)
                                    @php
                                    $produk_name = $product->produk_name;
                                    $max_length = 30;

                                    if (strlen($produk_name) > $max_length) {
                                    $produk_name = substr($produk_name, 0, $max_length) . '<span style="color: gray;">...</span>';
                                    }
                                    @endphp
                                    <div class="col-xl-3 col-sm-5 col-5">
                                        <div class="ltn__product-item ltn__product-item-3 text-center">
                                            <div class="product-img">
                                                <a href="/produk/{{ $product->id }}">
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
                                                        <li>
                                                            <a href="/produk/{{ $product->id }}" >
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/produk/{{ $product->id }}">
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                        </li>
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
                                                </div><hr>
                                                    <h2 class="product-title"><a href="/produk/{{ $product->id }}">{!! $produk_name !!}</a></h2>
                                                <div class="product-price">
                                                    <span style="color: rgb(247, 161, 62);">Rp.{{$product->min_price}}</span><br>
                                                        <s style="color: rgb(215, 40, 40); text-decoration: line-through; text-decoration-style: double;">Rp.{{$product->min_price * 2}}</s>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="loadMoreBtnContainer" class="btn-wrapper animated text-center mt-4">
                        @if($products->hasMorePages())
                        <a id="loadMoreBtn" class="btn theme-btn-2 btn btn-effect-2 text-uppercase" style="background-color: rgb(247, 161, 62);" data-page="{{ $products->currentPage() + 1 }}">Load More</a>
                        @else
                        <p>No more products to load</p>
                        @endif
                    </div>
                    <hr>
                </div>
                
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
        <!-- Data fitur dalam bentuk array -->
        @php
            $features = [
                [
                    'icon' => 'img/icons/icon-img/11.png',
                    'title' => 'Curated Products',
                    'description' => 'Provide Curated Products for all product over $100',
                ],
                [
                    'icon' => 'img/icons/icon-img/12.png',
                    'title' => 'Handmade',
                    'description' => 'We ensure the product quality that is our main goal',
                ],
                [
                    'icon' => 'img/icons/icon-img/13.png',
                    'title' => 'Natural Food',
                    'description' => 'Return product within 3 days for any product you buy',
                ],
                [
                    'icon' => 'img/icons/icon-img/14.png',
                    'title' => 'Free home delivery',
                    'description' => 'We ensure the product quality that you can trust easily',
                ],
            ];
        @endphp

        <!-- Perulangan untuk menampilkan data fitur -->
        <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
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
                                                <p>Jl. Ir. H. Juanda No.15, Sidodadi, Kec. Samarinda Ulu, Kota Samarinda, Kalimantan Timur 75124</p>
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
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                                <i class="fas fa-shopping-cart"></i>
                                                                <span>ADD TO CART</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="ltn__product-details-menu-3">
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                                <i class="far fa-heart"></i>
                                                                <span>Add to Wishlist</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="" title="Compare" data-toggle="modal" data-target="#quick_view_modal">
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
                                                        <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                        <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

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
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Cart</p>
                                                <div class="btn-wrapper">
                                                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                                    <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none---">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br> Use (LoveBroccoli) discount code at checkout</p>
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
                                                <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to your Wishlist</p>
                                                <div class="btn-wrapper">
                                                    <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                                </div>
                                            </div>
                                            <!-- additional-info -->
                                            <div class="additional-info d-none">
                                                <p>We want to give you <b>10% discount</b> for your first order, <br> Use discount code at checkout</p>
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

</div>
<!-- Body main wrapper end -->  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
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
        var hasMorePages = {{ $products->hasMorePages() ? 'true' : 'false' }};

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
                    $("#loadMoreBtn").html("Loading...");
                },
                success: function(response) {
                    var html = response.html;
                    hasMorePages = response.hasMore;

                    if (html) {
                        $("#product-list").append(html);
                        page++;

                        if (!hasMorePages) {
                            $("#loadMoreBtnContainer").html("<p>No more products to load</p>");
                        }
                    } else {
                        $("#loadMoreBtnContainer").html("<p>Error loading products</p>");
                    }
                },
                complete: function() {
                    loading = false;
                    $("#loadMoreBtn").html("Load More");
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
            // Sembunyikan tombol "Load More" jika tidak ada produk yang tersisa saat halaman dimuat
            if (!hasMorePages) {
                $("#loadMoreBtnContainer").html("<p>No more products to load</p>");
            }
        }
    </script>
</body>
</html>

