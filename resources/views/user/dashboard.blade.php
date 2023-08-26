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
              <div class="profile-picture-container">
                <a href="#">
                  @foreach (explode('|', Auth::user()->profile) as $key => $fruit)
                  @if ($key === 0)
                  <img src="{{ asset('picture/'.$fruit) }}" class="profile-picture " alt="Profile yang akan di masukkan" />
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
          <div class="container">
                @if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
                <div class="row row-cols-6">
                  @php
                  $links = explode('|', Auth::user()->link);
                  @endphp

                  @foreach ($links as $link)
                  @if ($link == null)
                  <p class="text-danger"><b>Announcement: </b>Link tidak tersedia</p>
                  @else
                  @if (strpos($link, 'bhinneka') !== false)
                  <a href="{{ $link }}" class="btn btn-bhineka mt-2 col-sm-3" style="color: white; background-color: #092c52;">
                    <img src="{{ asset('icon/bhi.png') }}" alt="Shopee" style="width: 23px; height: 23px;"> Bhinneka
                  </a>
                  @elseif (strpos($link, 'tokopedia') !== false)
                  <a href="{{ $link }}" class="btn btn-tokopedia mt-2 col-sm-3" style="color: white; background-color: #03ac0e;">
                    <img src="{{ asset('icon/tokped.png') }}" alt="Shopee" style="width: 23px; height: 23px;"> Tokopedia
                  </a>
                  @elseif (strpos($link, 'shopee') !== false)
                  <a href="{{ $link }}" class="btn btn-shopee mt-2 col-sm-3" style="color: white; background-color: #f7452e;">
                    <img src="{{ asset('icon/sho.png') }}" alt="Shopee" style="width: 23px; height: 23px; filter: brightness(10.5) saturate(0%);"> Shopee
                  </a>
                  @elseif (strpos($link, 'bukalapak') !== false)
                  <a href="{{ $link }}" class="btn btn-bukalapak mt-2 col-sm-3" style="color: white; background-color: #e31e52;">
                    <img src="{{ asset('icon/buka.png') }}" alt="Shopee" style="width: 23px; height: 23px; filter: brightness(10.5) saturate(0%);"> Bukalapak
                  </a>
                  @elseif (strpos($link, 'lazada') !== false)
                  <a href="{{ $link }}" class="btn btn-lazada mt-2 col-sm-3" style="color: white; background-color: #11146e;">
                    <img src="{{ asset('icon/laz.png') }}" alt="Shopee" style="width: 23px; height: 23px;"> Lazada
                  </a>
                  @elseif (strpos($link, 'blibli') !== false)
                  <a href="{{ $link }}" class="btn btn-blibli mt-2 col-sm-3" style="color: white; background-color: #0095da;">
                    <img src="{{ asset('icon/blibli.png') }}" alt="Shopee" style="width: 23px; height: 23px; background-color: white; border-radius: 10px;"> Blibli.com
                  </a>
                  @elseif (strpos($link, 'me') !== false)
                  <a href="{{ $link }}" class="btn btn-whatsapp mt-2 col-sm-3" style="color: white; background-color: #0cc243;">
                    <i class="bi bi-whatsapp me-1"></i> Whatsapp
                  </a>
                  @elseif (strpos($link, 'instagram') !== false)
                  <a href="{{ $link }}" class="btn btn-whatsapp mt-2 col-sm-3" style="color: white; background-color: #ff2e42;">
                    <i class="bi bi-instagram"></i> instagram
                  </a>
                  @elseif (strpos($link, 'facebook') !== false)
                  <a href="{{ $link }}" class="btn btn-whatsapp mt-2 col-sm-3" style="color: white; background-color: #0d8cf1;">
                    <i class="bi bi-facebook"></i> facebook
                  </a>
                  @else
                  @php
                  $linkParts = explode('/', $link);
                  $domain = $linkParts[2];
                  $domainName = explode('.', $domain)[1];
                  $domainName = preg_replace('/^www\.|^ww\./', '', $domainName);
                  @endphp
                  <a href="{{ $link }}" class="btn btn-otherlink mt-4 col-sm-3" style="color: white; background-color: #8c7e00;">
                    <i class="bi bi-cart3 me-1"></i>{{ $domainName }}
                  </a>
                  @endif
                  @endif
                  @endforeach
                </div>
                @endif
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
                      <!-- <a data-toggle="tab" href="#">Notice <i class="fas fa-bell"></i></a> -->
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
                                                      <h5 class="card-title">{{$product->produk_name}}</h5>
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
                                                              padding: 5px 13px;
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

                                .profile-picture {
                                  width: 128px;
                                  height: 128px;
                                  border-radius: 50%;
                                  object-fit: cover;
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
                        <p>Welcome, {{ Auth::user()->name }} <small> - Profile</small></p>
                        <div class="ltn__form-box">
                          <form action="{{ route('edit_account') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-50">
                              <div class="col-md-6">
                                <label>Username:</label>
                                <input type="text" name="username" value="{{ isset($user->username) ? $user->username : Auth::user()->username }}">
                              </div>
                              <div class="col-md-6">
                                <label>Name:</label>
                                <input type="text" name="name" value="{{ isset($user->name) ? $user->name : Auth::user()->name }}">
                              </div>
                              <div class="col-md-6">
                                <label>Email:</label>
                                <input type="email" name="email" value="{{ isset($user->email) ? $user->email : Auth::user()->email }}">
                              </div>
                              <div class="col-md-6">
                                <label>Profile Picture:</label>
                                <input type="file" name="profile_picture" id="profilePicture">
                                @isset($user)
                                @if ($user->profile)
                                <img id="profile-picture" src="{{ asset($user->profile) }}" alt="Profile Picture" style="max-width: 200px; margin-top: 10px;">
                                @else
                                <img id="profile-picture" src="{{ asset('picture/astronaut.png') }}" alt="Default Profile Picture" style="max-width: 200px; margin-top: 10px;">
                                @endif
                                @endisset
                              </div>
                            </div>
                            <div class="row mb-50">
                              <div class="col-md-40">
                                <label>Status:</label>
                                <textarea name="status" rows="4">{{ isset($user->status) ? $user->status : Auth::user()->status }}</textarea>
                              </div>
                            </div>
                        </div>
                        <div class="row mb-50">
                        <div class="col-md-6">
                            <label>Edit Links:</label>
                            <div id="linkContainer">
                                @php
                                if(isset($user)) {
                                    $linkArray = explode('|', $user->link);
                                }
                                @endphp

                                <ul id="linkList">
                                    @if(isset($linkArray) && count($linkArray) > 0)
                                        @foreach ($linkArray as $link)
                                            <li>
                                                <div class="input-group">
                                                    <input type="text" class="form-control link-input" value="{{ $link }}" disabled>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-outline-danger remove-link" onclick="removeLink(this)">Remove</button>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <button type="button" class="btn theme-btn-2 btn-effect-2 text-uppercase" onclick="enableEdit()">Edit Links</button>
                        </div>
                    </div>

                    <div class="row mb-50">
                        <div class="col-md-6">
                            <label>Add Link:</label>
                            <input type="url" id="newLink" placeholder="Enter Link URL">
                            <button type="button" class="btn theme-btn-2 btn-effect-2 text-uppercase" onclick="addNewLink()">Add Link</button>
                        </div>
                    </div>

                        <fieldset>
                          <legend>Password change</legend>
                          <div class="row">
                            <div class="col-md-12">
                              <label>Current password (leave blank to leave unchanged):</label>
                              <input type="password" name="current_password">
                              <label>New password (leave blank to leave unchanged):</label>
                              <input type="password" name="new_password">
                              <label>Confirm new password:</label>
                              <input type="password" name="new_password_confirmation">
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

                  <script>
                   function enableEdit() {
                    const linkInputs = document.querySelectorAll('.link-input');
                    linkInputs.forEach(input => {
                        input.removeAttribute('disabled');
                    });
                }

                function addNewLink() {
                    const newLinkInput = document.getElementById('newLink');
                    const linkList = document.getElementById('linkList');

                    if (newLinkInput.value.trim() !== '') {
                        const li = document.createElement('li');
                        const inputGroup = document.createElement('div');
                        inputGroup.className = 'input-group';

                        const input = document.createElement('input');
                        input.type = 'text';
                        input.className = 'form-control link-input';
                        input.value = newLinkInput.value;
                        input.name = 'link[]';

                        const buttonGroup = document.createElement('div');
                        buttonGroup.className = 'input-group-append';

                        const removeButton = document.createElement('button');
                        removeButton.type = 'button';
                        removeButton.className = 'btn btn-outline-danger remove-link';
                        removeButton.textContent = 'Remove';
                        removeButton.onclick = function() {
                            linkList.removeChild(li);
                        };

                        buttonGroup.appendChild(removeButton);
                        inputGroup.appendChild(input);
                        inputGroup.appendChild(buttonGroup);
                        li.appendChild(inputGroup);
                        linkList.appendChild(li);

                        newLinkInput.value = '';
                    }
                }

                function removeLink(button) {
                    const li = button.closest('li');
                    li.remove();
                }
                              </script>
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
  <!-- WISHLIST AREA START -->




</body>

</html>