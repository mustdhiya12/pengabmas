@php
use App\Models\likes_com;
use App\Models\likes_pro;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>UNICA - {{$mainpolopot->produk_name}}</title>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=649a41241b502e0012c3f3b9&product=inline-share-buttons' async='async'></script>


</head>

<body>
    <!-- Navigation-->
    @include('main/navbar')
    <!-- Product section-->

    <section class="m-4 p-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach (explode('|',$mainpolopot->gambar) as $key => $fruit)
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" @if($key==0) class="active" @endif aria-current="true"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach (explode('|',$mainpolopot->gambar) as $key => $fruit)
                            <div class="carousel-item @if ($key == 0) active @endif">
                                <img src="{{ asset('gambar/'.$fruit) }}" class="d-block w-100">
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 rdr2"><br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="small mb-1">PRODUCT ID: {{$mainpolopot->produk_id}}</div>
                    <hr>
                    <h1 class="display-5 fw-bolder">{{$mainpolopot->produk_name}}</h1>
                    <div class="fs-5 mb-5 product-price">
                        <span>Rp.{{$mainpolopot->min_price}} - Rp.{{$mainpolopot->max_price}}</span>
                    </div>
                    <div class="fs-5 mb-5">
                        <i class="far fa-user"></i>
                        <span>Penjual: {{$mainpolopot->produk_owner_nama}}</span>
                    </div>
                    <hr>
                    <?php
                    $produk_deskripsi = $mainpolopot->produk_deskripsi;
                    $max_length = 200; // Jumlah karakter maksimal sebelum dipotong
                    $short_description = substr($produk_deskripsi, 0, $max_length);
                    $remaining_description = substr($produk_deskripsi, $max_length);
                    ?>

                    <div class="description-container">
                        <p class="lead"><?= $short_description ?></p>

                        <?php if (strlen($produk_deskripsi) > $max_length): ?>
                            <div id="expand-description" style="display: none;">
                                <p class="lead"><?= $produk_deskripsi ?></p>
                            </div>
                            <a id="expand-link" style="color: var(--border-color-4); cursor: pointer;">Baca Selanjutnya....</a>
                        <?php endif; ?>
                    </div>

                    <script>
                        const expandLink = document.getElementById("expand-link");
                        const expandDescription = document.getElementById("expand-description");

                        expandLink.addEventListener("click", function () {
                            expandLink.style.display = "none";
                            expandDescription.style.display = "block";
                        });
                    </script>

                    <br>
                    <div class="container">
                        <div class="row-cols-3">
                            @php
                            $links = explode('|', $mainpolopot->link);
                            @endphp

                            @foreach ($links as $link)
                            @if ($link == null)
                            <p class="text-danger"><b>Announcement: </b>Link tidak tersedia</p>
                            @else
                            @if (strpos($link, 'bhinneka') !== false)
                            <a href="{{ $link }}" class="btn btn-bhineka mt-4 col-sm-5" style="color: white; background-color: #092c52;">
                                <img src="{{ asset('icon/bhi.png') }}" alt="Shopee" style="width: 23px; height: 23px;"> Bhinneka
                            </a>
                            @elseif (strpos($link, 'tokopedia') !== false)
                            <a href="{{ $link }}" class="btn btn-tokopedia mt-4 col-sm-5" style="color: white; background-color: #03ac0e;">
                                <img src="{{ asset('icon/tokped.png') }}" alt="Shopee" style="width: 23px; height: 23px;"> Tokopedia
                            </a>
                            @elseif (strpos($link, 'shopee') !== false)
                            <a href="{{ $link }}" class="btn btn-shopee mt-4 col-sm-5" style="color: white; background-color: #f7452e;">
                                <img src="{{ asset('icon/sho.png') }}" alt="Shopee" style="width: 23px; height: 23px; filter: brightness(10.5) saturate(0%);"> Shopee
                            </a>
                            @elseif (strpos($link, 'bukalapak') !== false)
                            <a href="{{ $link }}" class="btn btn-bukalapak mt-4 col-sm-5" style="color: white; background-color: #e31e52;">
                                <img src="{{ asset('icon/buka.png') }}" alt="Shopee" style="width: 23px; height: 23px; filter: brightness(10.5) saturate(0%);"> Bukalapak
                            </a>
                            @elseif (strpos($link, 'lazada') !== false)
                            <a href="{{ $link }}" class="btn btn-lazada mt-4 col-sm-5" style="color: white; background-color: #11146e;">
                                <img src="{{ asset('icon/laz.png') }}" alt="Shopee" style="width: 23px; height: 23px;"> Lazada
                            </a>
                            @elseif (strpos($link, 'blibli') !== false)
                            <a href="{{ $link }}" class="btn btn-blibli mt-4 col-sm-5" style="color: white; background-color: #0095da;">
                                <img src="{{ asset('icon/blibli.png') }}" alt="Shopee" style="width: 23px; height: 23px; background-color: white; border-radius: 10px;"> Blibli.com
                            </a>
                            @elseif (strpos($link, 'me') !== false)
                            <a href="{{ $link }}" class="btn btn-whatsapp mt-4 col-sm-5" style="color: white; background-color: #0cc243;">
                                <i class="bi bi-whatsapp me-1"></i> Whatsapp
                            </a>
                            @elseif (strpos($link, 'instagram') !== false)
                            <a href="{{ $link }}" class="btn btn-whatsapp mt-4 col-sm-5" style="color: white; background-color: #ff2e42;">
                                <i class="bi bi-instagram"></i> instagram
                            </a>
                            @elseif (strpos($link, 'facebook') !== false)
                            <a href="{{ $link }}" class="btn btn-whatsapp mt-4 col-sm-5" style="color: white; background-color: #0d8cf1;">
                                <i class="bi bi-facebook"></i> facebook
                            </a>
                            @else
                            @php
                            $linkParts = explode('/', $link);
                            $domain = $linkParts[2];
                            $domainName = explode('.', $domain)[1];
                            $domainName = preg_replace('/^www\.|^ww\./', '', $domainName);
                            @endphp
                            <a href="{{ $link }}" class="btn btn-otherlink mt-4 col-sm-5" style="color: white; background-color: #8c7e00;">
                                <i class="bi bi-cart3 me-1"></i>{{ $domainName }}
                            </a>
                            @endif
                            @endif
                            @endforeach
                        </div>
                    </div>



                    <hr>
                    <div class="d-flex align-items-end flex-column">
                        <div class="p-md-3">
                            <h6 class="pr">Like : </h6>
                            @if (empty(Auth::user()->id))
                            @php
                            $produkLike = likes_pro::where('produk_id', $mainpolopot->id)->first();
                            $likesCountPro = $produkLike ? likes_pro::where('produk_id', $mainpolopot->id)->count() : 0;
                            @endphp
                            <button class="btn btn-outline-pr btn-sm">
                                <i class="bi bi-heart-fill me-1"></i>({{ $likesCountPro }})
                            </button>
                            @else
                            @php
                            $produkLike = likes_pro::where('produk_id', $mainpolopot->id)->where('users_id', Auth::user()->id)->first();
                            $isLikedPro = $produkLike ? true : false;
                            $likesCountPro = likes_pro::where('produk_id', $mainpolopot->id)->count();
                            @endphp

                            @if ($isLikedPro)
                            <form action="{{ route('produk.likepro', $mainpolopot->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-pr btn-sm" type="submit">
                                    <i class="bi bi-heart-fill me-1" style="color: red;"></i>({{ $likesCountPro }})
                                </button>
                            </form>
                            @else
                            <form action="{{ route('produk.likepro', $mainpolopot->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-pr btn-sm" type="submit">
                                    <i class="bi bi-heart-fill me-1"></i>({{ $likesCountPro }})
                                </button>
                            </form>
                            @endif
                            @endif

                        </div>
                    </div>

                    @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')

                    @if(is_null(Auth::user()->alamat) && is_null(Auth::user()->no_hp))
                    <div class="alert alert-warning" role="alert">
                        Tolong Tambahkan Alamat & No. Hp anda di <a href="{{route('settings')}}">pengaturan</a> sebelum
                        melakukan komunikasi
                    </div>
                    @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                        Stok Habis
                </div>

                @elseif($mainpolopot->kuantitas >= 1)
                <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                @endif
                <div class="d-flex">


                    <input disabled name="kuantitas" style="width:90px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                    <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                        + Wishlist
                    </button>

                    @elseif(isset(Auth::user()->alamat) && isset(Auth::user()->no_hp))



                    @if(isset($not_in_chart_7))
                    <form method="POST" action="keranjang.aksi">
                        @csrf
                        @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                            Stok Habis
                </div>
                @elseif($mainpolopot->kuantitas >= 1)
                <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                @endif
                <div class="d-flex justify-content-between">


                    @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                        Stok Habis
                </div>

                <input disabled required name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                <button disabled class="btn btn-primary" type="button">
                    + Wishlist
                </button>

                @elseif($mainpolopot->kuantitas >= 1)



                <input required name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                <button class="btn btn-primary" type="submit">
                    + Wishlist
                </button>


                <input type="hidden" value="{{$mainpolopot->produk_name}}" name="produk_yang_ingin_di_pesan">
                <input type="hidden" value="{{$mainpolopot->min_price}}" name="min_price">
                <input type="hidden" value="{{$mainpolopot->max_price}}" name="max_price">
                <input type="hidden" value="{{$mainpolopot->produk_id}}" name="produk_id">
                <input type="hidden" value="{{$mainpolopot->produk_owner_id}}" name="produk_owner_id">
                <input type="hidden" value="{{$mainpolopot->produk_owner_nama}}" name="produk_owner_name">
                <input type="hidden" value="{{Auth::user()->id}}" name="produk_buyer_id">
                <input type="hidden" value="{{Auth::user()->username}}" name="produk_buyer_name">
                @php
                $randomWord1 = Str::random(10);
                @endphp
                <input type="hidden" value="{{$randomWord1.random_int(1, 10000)}}" name="id_pesanan">
                <input type="hidden" value="di_keranjang" name="status_pesanan">
                <input type="hidden" value="{{Auth::user()->alamat}}" name="alamat">
                <input type="hidden" value="{{Auth::user()->no_hp}}" name="no_hp">

                @endif
            </div>
            </form>

            @elseif(isset($not_in_chart_9 ))
            <div class="alert alert-warning" role="alert">
                Pesanan Mu Masih Di Proses
            </div>
            @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                Stok Habis
        </div>
        @elseif($mainpolopot->kuantitas >= 1)
        <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>

        @endif



        <div class="d-flex">


            <input name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                + Wishlist
            </button>

            @elseif(isset($not_in_chart_10 ))
            <div class="alert alert-warning" role="alert">
                Pesanan Mu Masih Di Proses
            </div>
            @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                Stok Habis
        </div>
        @elseif($mainpolopot->kuantitas >= 1)
        <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
        @endif

        <div class="d-flex">


            <input name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                + Wishlist
            </button>

            @elseif(isset($not_in_chart_8) )
            <div class="alert alert-warning" role="alert">
                Pesanan Mu Masih Di Proses
            </div>
            @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                Stok Habis
        </div>
        @elseif($mainpolopot->kuantitas >= 1)
        <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
        @endif

        <div class="d-flex">


            <input name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                + Wishlist
            </button>


            @else
            <form method="POST" action="Keranjang.aksi">
                @csrf
                @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                    Stok Habis
        </div>
        @elseif($mainpolopot->kuantitas >= 1)
        <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
        @endif
        <div class="d-flex justify-content-between">
            @if($mainpolopot->kuantitas
            < 1) <input disabled name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
            <button disabled class="btn btn-primary" type="button">
                + Wishlist
            </button>
            @elseif($mainpolopot->kuantitas >= 1)


            <input required name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
            <button class="btn btn-primary" type="submit">
                + Wishlist
            </button>
            <input type="hidden" value="{{$mainpolopot->produk_name}}" name="produk_yang_ingin_di_pesan">
            <input type="hidden" value="{{$mainpolopot->min_price}}" name="min_price">
            <input type="hidden" value="{{$mainpolopot->max_price}}" name="max_price">
            <input type="hidden" value="{{$mainpolopot->produk_id}}" name="produk_id">
            <input type="hidden" value="{{$mainpolopot->produk_owner_id}}" name="produk_owner_id">
            <input type="hidden" value="{{$mainpolopot->produk_owner_nama}}" name="produk_owner_name">
            <input type="hidden" value="{{Auth::user()->id}}" name="produk_buyer_id">
            <input type="hidden" value="{{Auth::user()->username}}" name="produk_buyer_name">
            @php
            $randomWord1 = Str::random(10);
            @endphp
            <input type="hidden" value="{{$randomWord1.random_int(1, 10000) }}" name="id_pesanan">
            <input type="hidden" value="di_keranjang" name="status_pesanan">
            <input type="hidden" value="{{Auth::user()->alamat}}" name="alamat">
            <input type="hidden" value="{{Auth::user()->no_hp}}" name="no_hp">
            @endif
        </div>
        </form>

        @endif
        @endif
        @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
        @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
            Stok Habis
            </div>
            @elseif($mainpolopot->kuantitas >= 1)
            <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
            @endif
            </label>
            <div class="d-flex">
            </div>
            @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Kurir')
            @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                Stok Habis
                </div>
                @elseif($mainpolopot->kuantitas >= 1)
                <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                @endif
                <div class="d-flex">
                </div>
                @if(empty(Auth::user()->id ) )
                <div class="alert alert-warning m-3" role="alert">
                    Anda Harus <a href="/client/login">Login</a>
                </div>
                @endif

                @if($mainpolopot->kuantitas < 1) <div class="alert alert-danger" role="alert">
                    Stok Habis
                    </div>
                    @elseif($mainpolopot->kuantitas >= 1)
                    <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                    @endif
                    <div class="d-flex">
                        <input disabled name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                        <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                            + Wishlist
                        </button>
                    </div>

                    @endif
                    <br>
                    </div>

                    <div class="d-flex justify-content-center align-items-center">
                        <div class="mt-3 card" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">Share :</h5>
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                        </div>
                    </div>

                    </div>
                    <hr class="mt-md-4">

                    <div class="rdr"><br>
                        <h3 class="m-4">Comment ({{ $commentsCount }}) :</h3>

                        <div class="rdr m-2">
                            <br>
                            <!-- Form untuk menambahkan komentar baru -->
                            @auth
                            <form method="POST" action="{{ route('produk.comment', $mainpolopot->id) }}" class="m-4">
                                @csrf
                                <div class="form-group mb-3">
                                    <textarea class="form-control" name="body" rows="3" placeholder="Tulis komentar"></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                            @endauth
                            @guest
                            <div class="alert alert-warning m-4 rounded-4" role="alert">
                                Jika ingin berkomentar Anda harus <a href="/client/login">Login</a> terlebih dahulu
                            </div>
                            @endguest

                            <hr>


                            @foreach($comments->sortByDesc('id') as $comment)
                            @if ($comment->comment_id === null)
                            <div class="mb-3">
                                <div class="d-flex align-items-start ms-3" id="comment-{{$comment->id}}">
                                    <img src="{{ asset('icon/astronaut.png') }}" class="img-fluid rounded-circle me-2" width="40" alt="user_comment">
                                    <div>
                                        <div>
                                            <u>
                                                <span>{{ $comment->user->username }}</span> ||
                                                <?php $formattedTime = \App\Helpers\TimeHelper::formatReplyTime($comment->created_at); ?>
                                                <span style="color: grey;">{{ \App\Helpers\TimeHelper::formatReplyTime($comment->created_at) }}</span>
                                            </u>
                                            <div class="mb-2">
                                                @if($comment->edited)
                                                <p class="text-secondary text-opacity-50">(edited)</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-secondary">
                                            <p>{{ $comment->body }}</p>
                                        </div>
                                        @php
                                        $commentLike = likes_com::where('comment_id', $comment->id)->first();
                                        $likesCountcom = $commentLike ? likes_com::where('comment_id', $comment->id)->count() : 0;
                                        @endphp

                                        @if (empty(Auth::user()->id))
                                        <button class="btn btn-outline btn-sm" type="submit">
                                            <i class="bi bi-heart-fill"></i> ({{ $likesCountcom }})
                                        </button>
                                        @endif

                                        @auth
                                        <div class="d-flex flex-row">
                                            <div class="m-2">
                                            @php
                                                $userLike = likes_com::where('comment_id', $comment->id)->where('users_id', Auth::user()->id)->first();
                                                $isLiked = $userLike ? true : false;
                                            @endphp
                                                <form action="{{ route('produk.comment.like', $comment->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm {{ $isLiked ? 'btn-danger' : 'btn-outline' }}" type="submit">
                                                        <i class="bi bi-heart-fill"></i> ({{$likesCountcom}})
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="m-2">
                                                <button class="btn btn-outline btn-primary btn-sm" onclick="toggleReplyForm('{{ $comment->id }}')">Balas</button>
                                            </div>
                                            @if((Auth::id() == $comment->user->id) || (Auth::user()->user_type == 'Admin'))
                                            <div class="m-2">
                                                <button class="btn btn-outline btn-warning btn-sm" onclick="toggleEditForm('{{ $comment->id }}')">Edit</button>
                                            </div>
                                            <div class="m-2">
                                                <form action="{{ route('comment.delete', $comment->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- Form untuk input balasan komentar -->
                                        <div id="reply-form-{{ $comment->id }}" style="display: none;" class=" m-4">
                                            <form action="{{ route('comment.reply', $mainpolopot->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="comments_id" value="{{ $comment->id }}">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="bodyt" rows="3" placeholder="Tulis balasan komentar"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary m-2">Kirim</button>
                                            </form>
                                        </div>
                                        <div id="edit-form-{{ $comment->id }}" style="display: none;" class="m-4">
                                            <form action="{{ route('comment.edit', $comment->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <textarea class="form-control" name="bodyt" rows="3" placeholder="Tulis balasan komentar">{{ $comment->body }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-warning m-2">Update</button>
                                            </form>
                                        </div>
                                        @endauth
                                        <hr>
                                        @if ($comment->replies)
                                        @foreach($comment->replies->sortByDesc('id') as $reply)
                                        <div class="vl d-flex align-items-start ms-md-5">
                                            <img src="{{ asset('icon/astronaut.png') }}" class="img-fluid rounded-circle me-2" width="40" alt="user_comment">
                                            <div>
                                                <div>
                                                    <u>
                                                        <span>{{ $reply->user->username }}</span> ||
                                                        <?php $formattedTime = \App\Helpers\TimeHelper::formatReplyTime($reply->created_at); ?>
                                                        <span style="color: grey;">{{ \App\Helpers\TimeHelper::formatReplyTime($reply->created_at) }}</span>
                                                    </u>
                                                    <div class="mb-2">
                                                        @if($reply->edited)
                                                        <p class="text-secondary text-opacity-50">(edited)</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="text-secondary">
                                                    <p>{{ $reply->body }}</p>
                                                </div>

                                                @php
                                                $replyLike = likes_com::where('comment_id', $reply->id)->first();
                                                $likesCountreply = $replyLike ? likes_com::where('comment_id', $reply->id)->count() : 0;
                                                @endphp
                                                @if (empty(Auth::user()->id))
                                                    <button class="btn btn-outline btn-sm" type="submit">
                                                        <i class="bi bi-heart-fill"></i> <span class="ml-2"> ({{$likesCountreply}})</span>
                                                    </button>
                                                @endif
                                                @auth
                                                <div class="d-flex flex-row">
                                                    <div class="m-2">
                                                        @php
                                                        $userLike = likes_com::where('comment_id', $reply->id)->where('users_id', Auth::user()->id)->first();
                                                        $isLiked = $userLike ? true : false;
                                                        @endphp
                                                        <form action="{{ route('produk.comment.like', $reply->id) }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-sm {{ $isLiked ? 'btn-danger' : 'btn-outline' }} mb-2 mt-0">
                                                                <i class="bi bi-heart-fill"></i> <span class="ml-2"> ({{$likesCountreply}})</span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <br>
                                                    <div class="m-2">
                                                        <button class="btn btn-outline btn-primary btn-sm" onclick="toggleReplyForm('{{ $reply->id }}')">Balas</button>
                                                    </div>

                                                    @if((Auth::id() == $reply->user->id) || (Auth::user()->user_type == 'Admin'))
                                                    <div class="m-2">
                                                        <button class="btn btn-outline btn-warning btn-sm" onclick="toggleEditForm('{{ $reply->id }}')">Edit</button>
                                                    </div>
                                                    <div class="m-2">
                                                        <form action="{{ route('comment.delete', $reply->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </div>
                                                    @endif
                                                </div>
                                                <!-- Form untuk input balasan komentar -->
                                                <div id="reply-form-{{ $reply->id }}" style="display: none;" class=" m-4">
                                                    <form action="{{ route('comment.reply', $mainpolopot->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="comments_id" value="{{ $reply->comments_id }}">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="bodyt" rows="3" placeholder="Tulis balasan komentar">{{ $reply->name }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary m-2">Kirim</button>
                                                    </form>
                                                </div>
                                                <div id="edit-form-{{ $reply->id }}" style="display: none;" class="m-4">
                                                    <form action="{{ route('comment.edit', $reply->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="bodyt" rows="3" placeholder="Tulis balasan komentar">{{ $reply->body }}</textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-warning m-2">Update</button>
                                                    </form>
                                                </div>
                                                @endauth
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    @endif
                                </div>
                                <hr>
                            </div>

                            @endforeach

                            <script>
                                function toggleReplyForm(commentId) {
                                    const replyForm = document.getElementById(`reply-form-${commentId}`);
                                    replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';

                                    const allReplyForms = document.querySelectorAll('[id^=reply-form-]');
                                    allReplyForms.forEach((form) => {
                                        if (form.id !== `reply-form-${commentId}`) {
                                            form.style.display = 'none';
                                        }
                                    });

                                    const allEditForms = document.querySelectorAll('[id^=edit-form-]');
                                    allEditForms.forEach((form) => {
                                        form.style.display = 'none';
                                    });
                                }

                                function toggleEditForm(commentId) {
                                    const editForm = document.getElementById(`edit-form-${commentId}`);
                                    editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';

                                    const allReplyForms = document.querySelectorAll('[id^=reply-form-]');
                                    allReplyForms.forEach((form) => {
                                        form.style.display = 'none';
                                    });

                                    const allEditForms = document.querySelectorAll('[id^=edit-form-]');
                                    allEditForms.forEach((form) => {
                                        if (form.id !== `edit-form-${commentId}`) {
                                            form.style.display = 'none';
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


    </section>

</body>

</html>