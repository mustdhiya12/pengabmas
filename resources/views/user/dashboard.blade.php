<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/pem.css') }}">

  <title>{{Auth::user()->user_type}}</title>
</head>

<body>
  <div>
    @include('main/navbar')
  </div>

  <div style="margin-top:150px;" class="container m-5 p-5"></div>
  <div class="ltn__utilize-overlay"></div>

  <!-- BREADCRUMB AREA START -->
  <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-80 bg-image" data-bg="{{ asset('icon/bg.png') }}">
    <div class="container">
      <div class="row">
        <div class="col-lg-16">
          <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
            <div class="section-title-area ltn__section-title-2">
              <div class="media-left">
                <a href="#">
                  @foreach (explode('|', Auth::user()->profile) as $key => $fruit)
                  @if ($key === 0)
                  <img src="{{ asset('picture/'.$fruit) }}" class="media-object " style="aspect-ratio: 1 / 1" alt="Profile yang akan di masukkan" />
                  <hr>
                  @endif
                  @endforeach
                </a>
              </div>
              <h6 class="section-subtitle ltn__secondary-color">// Welcome to </h6>
              <h1 class="section-title white-color">My Account - {{Auth::user()->username}}</h1>
              <h3 class="white-color mt-10" style="
                              text-decoration: underline; 
                              text-decoration-color: rgba(255, 255, 255, 0.8);">
                {{Auth::user()->name}}
              </h3>
              <b style="color: aliceblue;">Status: </b>
              <p style="color:seashell;">{{ Auth::user()->status }}</p>
            </div>
            <div class="ltn__breadcrumb-list pip">
              <ul>
                <li><a class="pip" href="{{ route('main.home') }}">Home</a></li>
                <li>My Account</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMB AREA END -->
  <div class="liton__wishlist-area pb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- PRODUCT TAB AREA START -->
          <div class="ltn__product-tab-area">
            <div class="container">
              <div class="row">
                <div class="col-lg-4">
                  <div class="ltn__tab-menu-list mb-50">
                    <div class="nav">
                      <a class="active show" data-toggle="tab" href="#liton_tab_1_1">MyAccount <i class="fas fa-home"></i></a>
                      @if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual' || Auth::user()->user_type == 'Admin')
                      <a data-toggle="tab" href="#liton_tab_1_2">Product <i class="fas fa-file-alt"></i></a>
                      <a data-toggle="tab" href="#liton_tab_1_3">Product detail <i class="fas fa-plus"></i></a>
                      @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                      <a data-toggle="tab" href="#liton_tab_1_4">Wishlist<i class="fas fa-heart"></i></a>
                      @endif
                      @if(!empty(Auth::user()) && Auth::user()->user_type == 'Admin')
                      <a data-toggle="tab" href="#">User Management <i class="fas fa-user"></i></a>
                      @endif
                      <!-- <a data-toggle="tab" href="#liton_tab_1_6">Notice <i class="fas fa-bell"></i></a> -->
                      <a data-toggle="tab" href="#liton_tab_1_5">Account Details <i class="fas fa-user"></i></a>
                      <a href="{{ route('logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_1_1">
                      <div class="ltn__myaccount-tab-content-inner">
                        <p>Hello <strong>{{Auth::user()->username}}</strong> (not <strong>{{Auth::user()->username}}</strong>? <small><a href="login-register.html">Log out</a></small> )</p>
                        <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping billing addresses</span>, <span>edit your password and account details</span>.</p>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_1_2">
                      <div class="ltn__myaccount-tab-content-inner">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <div class="tab-block">
                                  <ul class="nav nav-tabs">
                                    <li class="active">
                                      <a href="#tab1" data-toggle="tab">Produk</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content p30" style="height: 500px;">
                                    <section>
                                      <div style="padding:10px;" class="d-flex justify-content-center">
                                        <div class="container">
                                          @if(session('success'))
                                          <div class="col">
                                            <p class="alert alert-success">{{ session('success') }}</p>
                                          </div>
                                          @endif
                                          <div class="row">
                                            @foreach($users as $product)
                                            @include('main.products_partial3', ['products' => $users])
                                            @endforeach
                                          </div>
                                        </div>
                                      </div>
                                    </section>
                                  </div>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_1_3">
                      <div class="ltn__myaccount-tab-content-inner">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <div class="tab-block">
                                  <ul class="nav nav-tabs">
                                    <li class="active">
                                      <a href="#tab1" data-toggle="tab">Produk</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content p30" style="height: 500px;">
                                    <section>
                                      <div style="padding:10px;" class="d-flex justify-content-center">
                                        <div class="container">
                                          @if(session('success'))
                                          <div class="col">
                                            <p class="alert alert-success">{{ session('success') }}</p>
                                          </div>
                                          @endif
                                          <div class="row">
                                            @foreach($users as $product)
                                            @php
                                            $produk_name = $product->produk_name;
                                            $max_length = 25;

                                            if (strlen($produk_name) > $max_length) {
                                            $produk_name = substr($produk_name, 0, $max_length) . '<span style="color: gray;">...</span>';
                                            }
                                            @endphp
                                            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                                              <div class="card w-100 my-2 shadow-2-strong">
                                                @foreach (explode('|',$product->gambar) as $key => $fruit)
                                                @if($key === 0)
                                                <img src="{{ asset('gambar/'.$fruit ) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                                                @endif
                                                @endforeach
                                                <div class="product-info">
                                                  <div class="card-body d-flex flex-column">
                                                    <div class="product-price">
                                                      <h5 class="card-title">{!! $produk_name !!}</h5>
                                                      <hr>
                                                      <p class="card-text" style="color: rgb(247, 161, 62);">Rp.{{$product->min_price}} <br> <s style="color: rgb(215, 40, 40); text-decoration: line-through; text-decoration-style: double;">Rp.{{$product->min_price * 2}}</s></p>
                                                    </div>
                                                    <hr style="color: rgb(247, 161, 62); height: 1.5px;">
                                                    <span>
                                                      <form method="POST" action="{{ route('admin.hapus', $product->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="d-flex flex-row">
                                                          <style>
                                                            .kin:hover {
                                                              background-color: var(--ltn__secondary-color-2);
                                                              transition: background-color 0.3s ease-in-out;
                                                              color: rgb(255, 255, 255);
                                                            }

                                                            .kin {
                                                              color: rgba(144, 144, 144, 0.534);
                                                              padding: 5px 23px;
                                                              display: inline-flex;
                                                              justify-content: center;
                                                              align-items: center;
                                                              white-space: nowrap;
                                                              text-align: center;
                                                              border: none;
                                                              border-radius: 5px;
                                                            }
                                                          </style>
                                                          <div class="p-1">
                                                            <a style="text-decoration: none;" href="{{route('user.view_edit') . '/' . $product->id }}">
                                                              <button type="button" class="kin">Ubah</button>
                                                            </a>
                                                          </div>
                                                          <div class="p-1">
                                                            <button onclick="return confirm('!Peringatan!\nApakah anda yakin ingin menghapus produk ini?\nnama produk : {{ $product->produk_name }} ');" type="submit" class="kin">Hapus</button>
                                                          </div>
                                                        </div>
                                                      </form>
                                                    </span>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            @endforeach
                                          </div>
                                        </div>
                                      </div>
                                    </section>
                                  </div>
                              </tr>
                            </thead>
                            <tbody>
                              <style>
                                .kap:hover {
                                  background-color: var(--ltn__secondary-color-2);
                                  transition: background-color 0.3s ease-in-out;
                                  color: rgb(255, 255, 255);
                                }

                                .kap {
                                  color: rgba(144, 144, 144, 0.534);
                                  padding: 5px 100px;
                                  text-indent: 5px;
                                  display: inline-flex;
                                  justify-content: center;
                                  align-items: center;
                                  white-space: nowrap;
                                  text-align: center;
                                  border: none;
                                  border-radius: 5px;
                                  width: 100%;
                                }
                              </style>
                              <td class="d-flex justify-content-center align-items-center">
                                <form action="{{ route('user.tambah') }}">
                                  <button type="submit" class="col-lg-10 kap">
                                    <i class="fa fa-plus"></i> Tambah Produk
                                  </button>
                                </form>
                              </td>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_1_4">
                      <div class="ltn__myaccount-tab-content-inner">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <div class="tab-block">
                                  <ul class="nav nav-tabs">
                                    <li class="active">
                                      <a href="#tab1" data-toggle="tab">Wishlist</a>
                                    </li>
                                  </ul>
                                  <div class="tab-content p30" style="height: 500px;">
                                    <section>
                                      <div style="padding:10px;" class="d-flex justify-content-center">
                                        <div class="container">
                                          @if(session('success'))
                                          <div class="col">
                                            <p class="alert alert-success">{{ session('success') }}</p>
                                          </div>
                                          @endif
                                          <!-- Untuk List Barang Yang di Wishlist taruh disini -->
                                        </div>
                                      </div>
                                    </section>
                                  </div>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_1_5">
                      <div class="ltn__myaccount-tab-content-inner">
                        <p>The following addresses will be used on the checkout page by default.</p>
                        <div class="ltn__form-box">
                          <form action="#">
                            <div class="row mb-50">
                              <div class="col-md-6">
                                <label>First name:</label>
                                <input type="text" name="ltn__name">
                              </div>
                              <div class="col-md-6">
                                <label>Last name:</label>
                                <input type="text" name="ltn__lastname">
                              </div>
                              <div class="col-md-6">
                                <label>Display Name:</label>
                                <input type="text" name="ltn__lastname" placeholder="Ethan">
                              </div>
                              <div class="col-md-6">
                                <label>Display Email:</label>
                                <input type="email" name="ltn__lastname" placeholder="example@example.com">
                              </div>
                            </div>
                            <fieldset>
                              <legend>Password change</legend>
                              <div class="row">
                                <div class="col-md-12">
                                  <label>Current password (leave blank to leave unchanged):</label>
                                  <input type="password" name="ltn__name">
                                  <label>New password (leave blank to leave unchanged):</label>
                                  <input type="password" name="ltn__lastname">
                                  <label>Confirm new password:</label>
                                  <input type="password" name="ltn__lastname">
                                </div>
                              </div>
                            </fieldset>
                            <div class="btn-wrapper">
                              <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PRODUCT TAB AREA END -->
        </div>
      </div>
    </div>
  </div>
</body>

</html>