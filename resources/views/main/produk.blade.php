<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{$mainpolopot->produk_name}}</title>
    </head>
    <body>
        <!-- Navigation-->
        @include('main/navbar')
        <!-- Product section-->
        <section class="py-5">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach (explode('|',$mainpolopot->gambar) as $key => $fruit)
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$key}}" @if ($key == 0) class="active" @endif aria-current="true"></button>
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
                    <div class="col-md-6">
                        <div class="small mb-1">PRODUCT ID: {{$mainpolopot->produk_id}}</div>
                        <h1 class="display-5 fw-bolder">{{$mainpolopot->produk_name}}</h1>
                        <div class="fs-5 mb-5">
                            <span>Rp{{$mainpolopot->produk_price}}</span>
                        </div>
                        <div class="fs-5 mb-5">
                            <span>Penjual: {{$mainpolopot->produk_owner_nama}}</span>
                        </div>
                        <p class="lead">{{$mainpolopot->produk_deskripsi}}</p>
                        <br><br>
                        @if(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
                        @if(is_null(Auth::user()->alamat) && is_null(Auth::user()->no_hp))
                        <div class="alert alert-warning" role="alert">
                     Tolong Tambahkan Alamat & No. Hp anda di <a href="{{route('settings')}}">pengaturan</a> sebelum melakukan pemesanan
                     </div>
                        @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                        <div class="d-flex">
                        
                            
                            <input disabled name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                                + keranjang
                            </button>
                  </div>
                  @elseif(isset(Auth::user()->alamat) && isset(Auth::user()->no_hp))
                  

                    
                    @if(isset($not_in_chart_7))
                     <form method="POST" action="keranjang.aksi">
                            @csrf
                            @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                        <div class="d-flex justify-content-between">
                        
                            
                     @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>

                     <input disabled required name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-primary" type="button">
                                + keranjang
                            </button>
                     @elseif($mainpolopot->kuantitas >= 1)
                     


                            <input required name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button class="btn btn-primary" type="submit">
                                + keranjang
                            </button>


                        <input type="hidden" value="{{$mainpolopot->produk_name}}" name="produk_yang_ingin_di_pesan">
                        <input type="hidden" value="{{$mainpolopot->produk_price}}" name="produk_price">
                        <input type="hidden" value="{{$mainpolopot->produk_id}}" name="produk_id">
                        <input type="hidden" value="{{$mainpolopot->produk_owner_id}}" name="produk_owner_id">
                        <input type="hidden" value="{{$mainpolopot->produk_owner_nama}}" name="produk_owner_name">
                        <input type="hidden" value="{{Auth::user()->id}}" name="produk_buyer_id">
                        <input type="hidden" value="{{Auth::user()->name}}" name="produk_buyer_name">
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
                     @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                                 
                        <div class="d-flex">
                        
                            
                            <input name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                                + keranjang
                            </button>
                  </div> 
                  @elseif(isset($not_in_chart_10 ))
                     <div class="alert alert-warning" role="alert">
                     Pesanan Mu Masih Di Proses
                     </div>
                     @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                                 
                        <div class="d-flex">
                        
                            
                            <input name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                                + keranjang
                            </button>
                  </div> 

                  @elseif(isset($not_in_chart_8) )
                     <div class="alert alert-warning" role="alert">
                     Pesanan Mu Masih Di Proses
                     </div>
                     @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                                 
                        <div class="d-flex">
                        
                            
                            <input name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                                + keranjang
                            </button>
                  </div> 
                    
                     
                    @else
                    <form method="POST" action="keranjang.aksi">
                            @csrf
                            @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                        <div class="d-flex justify-content-between">
                    @if($mainpolopot->kuantitas < 1)
                     <input disabled name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-primary" type="button">
                                + keranjang
                            </button>
                    @elseif($mainpolopot->kuantitas >= 1)
                     
                            
                            <input required name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button class="btn btn-primary" type="submit">
                                + keranjang
                            </button>
                        <input type="hidden" value="{{$mainpolopot->produk_name}}" name="produk_yang_ingin_di_pesan">
                        <input type="hidden" value="{{$mainpolopot->produk_price}}" name="produk_price">
                        <input type="hidden" value="{{$mainpolopot->produk_id}}" name="produk_id">
                        <input type="hidden" value="{{$mainpolopot->produk_owner_id}}" name="produk_owner_id">
                        <input type="hidden" value="{{$mainpolopot->produk_owner_nama}}" name="produk_owner_name">
                        <input type="hidden" value="{{Auth::user()->id}}" name="produk_buyer_id">
                        <input type="hidden" value="{{Auth::user()->name}}" name="produk_buyer_name">
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
                     @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                    </label>
                        <div class="d-flex">            
                  </div>
                     @elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Kurir')
                    @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                        <div class="d-flex">
                  </div>
                     @elseif(empty(Auth::user()->id ) )
                     <div class="alert alert-warning" role="alert">
  Anda Harus Login
</div>
                                 @if($mainpolopot->kuantitas < 1)
                     <div class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
                     @elseif($mainpolopot->kuantitas >= 1)
                     <label for="inputQuantity">Stok Produk: {{$mainpolopot->kuantitas}}</label>
                     @endif
                        <div class="d-flex">
                        
                            
                            <input disabled name="kuantitas" style="width:100px;" class="form-control text-center me-4" id="inputQuantity" min="1" max="{{$mainpolopot->kuantitas}}" type="number" value="1" style="max-width: 3rem" />
                            <button disabled class="btn btn-outline-dark flex-shrink-0" type="submit">
                                + keranjang
                            </button>
                  </div>

                     @endif
                        </div>
                </div>
            </div>
        </section>
    </body>
</html>
