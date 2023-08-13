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
                                    <a href="/produk/{{ $product->id }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/produk/{{ $product->id }}">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </li>
                                @if(!empty(Auth::user()) && (Auth::user()->user_type == 'Pembeli'))                                <li>
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