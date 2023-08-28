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