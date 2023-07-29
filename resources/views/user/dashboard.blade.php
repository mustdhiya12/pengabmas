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

<section id="content" class="container p-5">
        <!-- Begin .page-heading -->
        <div class="page-heading rounded-3 rdr2">
            <div class="media clearfix">
              <div class="media-left pr30">
                <a href="#">
                @foreach (explode('|', Auth::user()->profile) as $key => $fruit)
                  @if ($key === 0)
                      <img src="{{ asset('picture/'.$fruit) }}" class="media-object mw150" style="aspect-ratio: 1 / 1" alt="Profile yang akan di masukkan" />
                      <hr>
                  @endif
                @endforeach
                </a>
              </div>  
              <div class="media-body va-m">
                <h2 class="media-heading">{{Auth::user()->name}}
                  <small> - Profile</small>
                </h2>
                <p class="lead">Status yang akan di masukkan nanti nya</p>
                <div class="media-links">
                <div class="container">
                      @if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
                        <div class=" row-cols-5">
                            @php
                            $links = explode('|', Auth::user()->link);
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
                        @endif
                    </div>
                </div>
              </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-4">
            <div class="panel">
                <div class="panel-heading">
                  <span class="panel-icon">
                    <i class="bi bi-person-fill-dash"></i>
                  </span>
                  <span class="panel-title"> My Toko</span>
                </div>
                <div class="panel-body pb5">
                @if(Auth::id())
                @if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')

                  <section >
                    <div style="padding:10px;" class="d-flex justify-content-center">
                      <div class="container">
                        <h3>Selamat Datang, {{Auth::user()->username}}</h3>
                        <br>
                        <div class="row">
                          <a style="text-decoration: none;" href="{{{ route('user.tambah') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Tambah Produk</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">tambahkan produk mu</h6>
                                </div>
                              </div>
                            </div>
                          </a>
                          <a style="text-decoration: none;" href="{{{ route('user.view_edit') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Produk</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Ubah dan Edit</h6>
                                </div>
                              </div>
                          </a>
                        </div>
                        <a style="text-decoration: none;" href="{{route('user.peninjauan')}}">
                          <div style="margin-top: 10px;" class="col">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Menunggu Konfirmasi</h5>
                                <h6 class="card-subtitle mb-2 text-muted">lihat produk yang belum di konfirmasi</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                        <a style="text-decoration: none;" href="{{route('dashboard.notices')}}">
                          <div style="margin-top: 10px;" class="col">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Notices</h5>
                                <h6 class="card-subtitle mb-2 text-muted">lihat produk yang belum di konfirmasi</h6>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    </div>

                  </section>






                @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                  <section >
                    <div style="padding:10px;" class="d-flex justify-content-center">
                      <div class="container">
                        <h3>Selamat Datang, {{Auth::user()->username}}</h3>
                        <br>
                        <div class="row">
                          <a style="text-decoration: none;" href="./dashboard/view/produk">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Produk Yang Di Pesan</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Semua produk yang dipesan dan status pesanan</h6>
                                </div>
                              </div>
                            </div>
                          </a>
                          <a style="text-decoration: none;" href="./dashboard/settings">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Pengaturan</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Pengaturan Alamant Dan No. Hp</h6>
                                </div>
                              </div>
                          </a>
                        </div>
                      </div>
                      <a style="text-decoration: none;" href="{{route('daftar.transaksi')}}">
                        <div style="margin-top: 10px;" class="col">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Daftar Transaksi</h5>
                              <h6 class="card-subtitle mb-2 text-muted">Daftar transaksi</h6>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a style="text-decoration: none;" href="{{route('dashboard.notices')}}">
                        <div style="margin-top: 10px;" class="col">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Notices</h5>
                              <h6 class="card-subtitle mb-2 text-muted">Halaman Pemberitahuan</h6>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    </div>

                  </section>


                @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Kurir')

                  <section >
                    <div style="padding:10px;" class="d-flex justify-content-center">
                      <div class="container">
                        <h3>Selamat Datang, {{Auth::user()->username}}</h3>
                        <br>
                        <div class="row">
                          <a style="text-decoration: none;" href="{{{ route('job') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Lihat Orderan</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Orderan User</h6>
                                </div>
                              </div>
                            </div>
                          </a>
                          <a style="text-decoration: none;" href="{{{ route('job.aktif') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Lihat Job Orderan Aktif</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Orderan Aktif</h6>
                                </div>
                              </div>
                            </div>
                          </a>
                          <a style="text-decoration: none;" href="{{{ route('job.selesai') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Lihat Job Orderan Yang Selesai</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Orderan Selesai</h6>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                    </div>

                  </section>


                @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Admin')

                  <section >
                    <div style="padding:10px;" class="d-flex justify-content-center">
                      <div class="container ">
                        <h3>Selamat Datang, {{Auth::user()->username}}</h3>
                        <br>
                        <div class="row">
                          <a style="text-decoration: none;" href="{{{ route('admin.view_edit') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Produk</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Ubah dan Edit</h6>
                                </div>
                              </div>
                          </a>
                          <a style="text-decoration: none;" href="{{{ route('admin.kelola') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Users</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Kelola Users</h6>
                                </div>
                              </div>
                          </a>
                          <a style="text-decoration: none;" href="{{{ route('admin.transaksi') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Transaksi</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Transaksi</h6>
                                </div>
                              </div>
                          </a>
                          <a style="text-decoration: none;" href="{{{ route('admin.kirim.saldo') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">kirim saldo</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">saldo</h6>
                                </div>
                              </div>
                            </div>
                          </a>

                          <a style="text-decoration: none;" href="{{{ route('dashboard.notices') }}}">
                            <div style="margin-top: 10px;" class="col">
                              <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">notices</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">tempat notifikasi</h6>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>

                  </section>


                @endif
                @elseif(!Auth::id())

                @endif
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading">
                  <span class="panel-icon">
                    <i class="fa fa-star"></i>
                  </span>
                  <span class="panel-title"> User Popularity</span>
                </div>
                <div class="panel-body pn">
                  <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                    <thead>
                      <tr class="hidden">
                        <th class="mw30">#</th>
                        <th>First Name</th>
                        <th>Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="fa fa-desktop text-warning"></span>
                        </td>
                        <td>Television</td>
                        <td>
                          <i class="fa fa-caret-up text-info pr10"></i>$855,913</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-microphone text-primary"></span>
                        </td>
                        <td>Radio</td>
                        <td>
                          <i class="fa fa-caret-down text-danger pr10"></i>$349,712</td>
                      </tr>
                      <tr>
                        <td>
                          <span class="fa fa-newspaper-o text-info"></span>
                        </td>
                        <td>Newspaper</td>
                        <td>
                          <i class="fa fa-caret-up text-info pr10"></i>$1,259,742</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="panel">
                <div class="panel-heading">
                  <span class="panel-icon">
                    <i class="bi bi-shop-window"></i>
                  </span>
                  <span class="panel-title"> My Toko</span>
                </div>
                <div class="panel-body pb5">
                  <div class="row-cols-3">
                  <p class="label label-warning mr5 mb10 ib lh15">Penilaian : </p>
                  <p class="label label-primary mr5 mb10 ib lh15">Produk : </p>
                  <p class="label label-info mr5 mb10 ib lh15">Pengikut : </p>
                  <p class="label label-success mr5 mb10 ib lh15">Info : {{Auth::User()->alamat}}</p>
                  <p class="label label-success mr5 mb10 ib lh15">Bergabung : </p>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
    
              <div class="tab-block">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#tab1" data-toggle="tab">Activity</a>
                  </li>
                  <li>
                    <a href="#tab1" data-toggle="tab">Social</a>
                  </li>
                  <li>
                    <a href="#tab1" data-toggle="tab">Media</a>
                  </li>
                </ul>
                <div class="tab-content p30" style="height: 730px;">
                <section>
                  <div style="padding:10px;" class="d-flex justify-content-center">
                    <div class="container">
                      @if(session('success'))
                      <div class="col">
                        <p class="alert alert-success">{{ session('success') }}</p>
                      </div>
                      @endif
                      <div class="row" >
                      @foreach($users as $product)
                            @include('main.products_partial2', ['products' => $users])
                      @endforeach
                      </div>
                    </div>
                  </div>
                </section>

                
                  <div id="tab1" class="tab-pane active">
                    <div class="media">
                      <a class="pull-left" href="#"> <img class="media-object mn thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                      <div class="media-body">
                        <h5 class="media-heading mb20">Simon Rivers Posted
                          <small> - 3 hours ago</small>
                        </h5>
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="mw140 mr25 mb20">
                        <img src="https://bootdey.com/img/Content/avatar/avatar8.png" class="mw140 mr25 mb20"> 
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="mw140 mb20">
                        <div class="media-links">
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-share text-primary mr5"></span> Share </span>
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                        </div>
                      </div>
                    </div>
                    <div class="media mt25">
                      <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..."> </a>
                      <div class="media-body mb5">
                        <h5 class="media-heading mbn">Simon Rivers Posted
                          <small> - 3 hours ago</small>
                        </h5>
                        <p> Omg so freaking sweet dude.</p>
                        <div class="media pb10">
                          <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="..."> </a>
                          <div class="media-body mb5">
                            <h5 class="media-heading mbn">Jessica Wong
                              <small> - 3 hours ago</small>
                            </h5>
                            <p>Omgosh I'm in love</p>
                          </div>
                        </div>
                        <div class="media mtn">
                          <a class="pull-left" href="#"> <img class="media-object mn thumbnail thumbnail-sm rounded mw40" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                          <div class="media-body mb5">
                            <h5 class="media-heading mbn">Jessica Wong
                              <small> - 3 hours ago</small>
                            </h5>
                            <p>Omgosh I'm in love</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="media mt25">
                      <a class="pull-left" href="#"> <img class="media-object thumbnail mw50" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="..."> </a>
                      <div class="media-body">
                        <h5 class="media-heading mb20">Simon Rivers Posted
                          <small> - 3 hours ago</small>
                        </h5>
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="mw140 mr25 mb20">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="mw140 mr25 mb20"> 
                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="mw140 mb20">
                        <div class="media-links">
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-thumbs-o-up text-primary mr5"></span> Like </span>
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-share text-primary mr5"></span> Share </span>
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-floppy-o text-primary mr5"></span> Save </span>
                          <span class="text-light fs12 mr10">
                            <span class="fa fa-comment text-primary mr5"></span> Comment </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="tab2" class="tab-pane"></div>
                  <div id="tab3" class="tab-pane"></div>
                  <div id="tab4" class="tab-pane"></div>
                </div>
              </div>
            </div>
          </div>
      </section>
</body>

</html>