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
            <style>
              @keyframes zoomIn {
                from {
                  transform: scale(1);
                }

                to {
                  transform: scale(1.05);
                }
              }

              /* Terapkan animasi pada elemen saat di-hover */
              .zoom-in {
                transition: transform 0.3s ease-in-out;
              }

              .zoom-in:hover {
                animation: zoomIn 0.3s ease-in-out;
                transform: scale(1.05);
              }
              @media screen and (max-width: 550px) {
                .hil-text {
                  font-size: 0;
                  line-height: 0;
                  color: transparent;
                }

                .hil-text::after {
                  content: '';
                  position: absolute;
                  top: 0;
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-size: cover;
                  z-index: -1;
                }
              }
            </style>

            @if(!empty(Auth::user()) && in_array(Auth::user()->user_type, ['Penjual', 'Pembeli']))
              @php
                $links = explode('|', Auth::user()->link);
              @endphp

              @foreach ($links as $link)
                @if ($link == null)
                  <p class="text-danger"><b>Announcement: </b>Link tidak tersedia</p> <br>
                @else
                  @php
                    $domainName = getDomainName($link);
                  @endphp
                  <div class="hil-text">
                    <a href="{{ $link }}" class="btn btn-{{ getButtonClass($link) }} mt-4 col-sm-3" style="color: white; background-color: {{ getButtonColor($link) }};">
                      {!! getButtonIcon($link) !!} <span>{{ $domainName }}</span>
                    </a>
                  </div>
                @endif
              @endforeach
            @endif


            @php
            function getDomainName($link) {
              $linkParts = explode('/', $link);
              $domain = $linkParts[2];
              $domainName = explode('.', $domain)[1];
              return preg_replace('/^www\.|^ww\./', '', $domainName);
            }

            function getButtonClass($link) {
              $class = 'otherlink';
              $platforms = ['bhinneka', 'tokopedia', 'shopee', 'bukalapak', 'lazada', 'blibli', 'me', 'instagram', 'facebook'];
              foreach ($platforms as $platform) {
                if (strpos($link, $platform) !== false) {
                  $class = strtolower($platform);
                  break;
                }
              }
              return $class;
            }

            function getButtonColor($link) {
              $colors = [
                'bhinneka' => '#092c52',
                'tokopedia' => '#03ac0e',
                'shopee' => '#f7452e',
                'bukalapak' => '#e31e52',
                'lazada' => '#11146e',
                'blibli' => '#0095da',
                'me' => '#0cc243',
                'instagram' => '#ff2e42',
                'facebook' => '#0d8cf1',
              ];

              foreach ($colors as $platform => $color) {
                if (strpos($link, $platform) !== false) {
                  return $color;
                }
              }

              return '#8c7e00'; // Default color for other links
            }

            function getButtonIcon($link) {
              $icons = [
                'me' => '<i class="bi bi-whatsapp me-1"></i>',
                'instagram' => '<i class="fab fa-instagram"></i>',
                'facebook' => '<i class="fab fa-facebook-f"></i>',
              ];

              foreach ($icons as $platform => $icon) {
                if (strpos($link, $platform) !== false) {
                  return $icon;
                  }
                }

                return ''; // No icon for other links
              }
              @endphp

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
                      @if(!empty(Auth::user()) && (Auth::user()->user_type == 'Penjual' || Auth::user()->user_type == 'Admin'))
                      <a data-toggle="tab" href="#liton_tab_1_2">Product <i class="fas fa-file-alt"></i></a>
                      <a data-toggle="tab" href="#liton_tab_1_3">Product detail <i class="fas fa-plus"></i></a>
                      @endif
                      <!-- @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                      <a data-toggle="tab" href="#liton_tab_1_4">Wishlist<i class="fas fa-heart"></i></a>
                      @endif -->
                      @if(!empty(Auth::user()) && Auth::user()->user_type == 'Admin')
                      <a data-toggle="tab" href="#liton_tab_1_6">User Management <i class="fas fa-user"></i></a>
                      @endif
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
                                            @include('main.products_partial3', ['products' => $users])
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
                              <style>
                                .kap:hover {
                                  background-color: #bb7320;
                                  transition: background-color 0.3s ease-in-out;
                                  color: rgb(255, 255, 255);
                                }

                                .kap {
                                  color: rgba(255, 255, 255);
                                  background-color: var(--ltn__secondary-color-2);
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
                              <tr class="d-flex justify-content-center align-items-center">
                                <form action="{{ route('user.tambah') }}">
                                  <button type="submit" class="col-lg-3 kap">
                                    <i class="fa fa-plus"></i> Tambah Produk
                                  </button>
                                </form>
                              </tr>
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
                                          <div class="tab-pane fade active show" id="liton_product_grid">
                                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                              <div class="row">
                                                @foreach($users as $product)
                                                @php
                                                $produk_name = $product->produk_name;
                                                $max_length = 20;

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

                                                                @media (max-width: 1391px) {
                                                                    .kin {
                                                                        padding: 4px 5px;
                                                                    }
                                                                }

                                                                @media (max-width: 768px) {
                                                                    .kin {
                                                                        padding: 3px 5%;
                                                                    }
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
                                          <div class="row">
                                            @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                                            @foreach($users as $user)
                                            @include('main.wishlist_partial', ['products' => $user->wishlist])
                                            @endforeach
                                            @endif
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
                    <div class="tab-pane fade" id="liton_tab_1_5">
                      <style>
                        .containerss {
                          max-width: 960px;
                          margin: 30px auto;
                          padding: 20px;
                        }

                        .btn.theme-btn-1 {
                              background-color: yellow; /* Ganti dengan warna yang Anda inginkan */
                              color: blue; /* Ganti dengan warna yang Anda inginkan */
                          }

                        .avatar-upload {
                          position: relative;
                          max-width: 100px;
                          margin: 10px auto;
                        }

                        .avatar-edit {
                          position: absolute;
                          right: 5px;
                          z-index: 1;
                          top: 10px;
                        }

                        .avatar-edit input {
                          display: none;
                        }

                        .avatar-edit label {
                          display: inline-block;
                          width: 30px;
                          height: 30px;
                          margin-bottom: 0;
                          border-radius: 100%;
                          background: #FFFFFF;
                          border: 1px solid transparent;
                          box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                          cursor: pointer;
                          font-weight: normal;
                          transition: all .2s ease-in-out;
                        }

                        .avatar-edit label:hover {
                          background: #f1f1f1;
                          border-color: #d6d6d6;
                        }

                        .avatar-edit label:after {
                          content: "\f040";
                          font-family: 'FontAwesome';
                          color: #757575;
                          position: absolute;
                          top: 5px;
                          left: 0;
                          right: 0;
                          text-align: center;
                          margin: auto;
                        }

                        .avatar-preview {
                              right: 50px;
                              width: 150px;
                              height: 150px;
                              position: relative;
                              border-radius: 100%;
                              border: 6px solid #F8F8F8;
                              box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
                              > div {
                                  width: 100%;
                                  height: 100%;
                                  border-radius: 100%;
                                  background-size: cover;
                                  background-repeat: no-repeat;
                                  background-position: center;
                              }
                            }
                            .white-box {
                            background-color: white;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                        }
                      </style>
                      <div class="white-box">
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
                                      <div class="container">
                                          <div class="avatar-upload">
                                              <div class="avatar-edit">
                                                  <input id="imageUpload" type="file" name="profile_picture" accept=".png, .jpg, .jpeg">
                                                  <label for="imageUpload"></label>
                                              </div>
                                              <div class="avatar-preview">
                                              <div id="imagePreview" style="background-image: url('{{ asset('picture/' . (Auth::user()->profile ? Auth::user()->profile : 'astronaut.png')) }}');"></div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                                </div>                        
                            <div class="row mb-50">
                              <div class="col-md-40">
                                <label>Status:</label>
                                <textarea name="status" rows="4">{{ isset($user->status) ? $user->status : Auth::user()->status }}</textarea>
                              </div>
                            </div>
                        <div class="row mb-50">
                        <div class="input-group">
                            <input id="newLink" type="text" class="form-control" placeholder="New Link">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary" onclick="addNewLink()">Tambahkan Link</button>
                            </div>
                        </div>

                        </div>
                            <div class="row mb-50">
                            <div class="col-md-50">
                            <div id="linkContainer">
                                <ul id="linkList">
                                    @php
                                    $linkArray = explode('|', Auth::user()->link);
                                    @endphp
                                    @foreach ($linkArray as $link)
                                        <li>
                                            <div class="input-group">
                                                <input type="text" class="form-control link-input" name="link[]" value="{{ $link }}">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-danger remove-link" onclick="removeLink(this)">Remove</button>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="new_link" id="newLinkHidden">
                        <fieldset style="padding-top: 50px;">
                            <legend>Ubah Kata Sandi</legend><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Kata Sandi (Silahkan Kosongkan Jika Tidak Ingin Mengubah):</label>
                                    <input type="password" name="current_password">
                                    <label>Kata Sandi Baru (Silahkan Kosongkan Jika Tidak Ingin Mengubah):</label>
                                    <input type="password" name="new_password" id="new_password">
                                    <label>Ulang Kata Sandi Baru (Silahkan Kosongkan Jika Tidak Ingin Mengubah):</label>
                                    <input type="password" name="new_password_confirmation">
                                </div>
                            </div>
                        </fieldset>
                        <div class="btn-wrapper">
                          <button type="submit" class="btn theme-btn-1 text-uppercase" style="background-color: #e08926; color: white; ">Simpan</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div> 
                  </div>                 
                  </div>
                  </div>
                  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                  <script>
                  $(document).ready(function() {
                          $('#new_password').on('input', function() {
                              validatePasswordMatch();
                          });

                          function validatePasswordMatch() {
                              var newPassword = $('#new_password').val();
                              var confirmPassword = $('input[name=new_password_confirmation]').val();
                              var validationMessage = newPassword === confirmPassword ? '' : 'Passwords do not match';
                              $('#password-match-message').text(validationMessage);
                          }
                      });
                   function addNewLink() {
                    const newLinkInput = document.getElementById('newLink');
                    const newLinkHidden = document.getElementById('newLinkHidden');
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
                        removeButton.onclick = function () {
                            linkList.removeChild(li);
                        };

                        buttonGroup.appendChild(removeButton);
                        inputGroup.appendChild(input);
                        inputGroup.appendChild(buttonGroup);
                        li.appendChild(inputGroup);
                        linkList.appendChild(li);

                        newLinkHidden.value = newLinkInput.value; // Set the value of the hidden input
                        newLinkInput.value = ''; // Clear the input field value after adding a link

                        alert('Link sudah tertambah.');
                    }
                }

                    function removeLink(button) {
                        const li = button.closest('li');
                        li.remove();
                    }
                    function readURL(input) {
                      if (input.files && input.files[0]) {
                          var reader = new FileReader();
                          reader.onload = function(e) {
                              var previewDiv = document.getElementById('imagePreview');
                              previewDiv.style.backgroundImage = 'url(' + e.target.result + ')';
                              previewDiv.style.display = 'block'; // Show the preview div
                          }
                          reader.readAsDataURL(input.files[0]);
                      }
                  }

                  $("#imageUpload").change(function() {
                      readURL(this);
                  });
                    

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