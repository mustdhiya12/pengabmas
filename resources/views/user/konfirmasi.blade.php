<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>{{Auth::user()->user_type}}</title>
</head>

<body>
  @include('main/navbar')
  <div style="margin-top:150px;" class="container m-3 p-3"></div>

  <section style="margin-top:150px;">
    <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
        <div class="row">

          <div style="margin-top: 30px;">
            <h4>Konfirmasi Produk Pembeli</h4>
          </div>
          <form method="POST" action="{{route('user.peninjauan.aksi')}}">
            @csrf
            @forelse($peninjauan as $dkr)
            <input type="hidden" name="status" value="di_konfirmasi">
            <input type="hidden" name="id_pesanan" value="{{$dkr->id_pesanan}}">
            <input type="hidden" name="id_pembeli" value="{{$dkr->produk_buyer_id}}">
            <input type="hidden" name="id_produk" value="{{$dkr->produk_id}}">
            <input type="hidden" name="item_quantity" value="{{$dkr->kuantitas}}">
            <div style="margin-top: 10px;" class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$dkr->nama_produk_yang_dipesan}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">id pesanan #{{$dkr->id_pesanan}}</h6>
                  {{$dkr->produk_buyer_name}}
                  <br>id produk #{{$dkr->produk_id}}
                  <br><br><button type="submit" class="btn btn-success">konfirmasi</button>
                </div>
              </div>
            </div>
            @empty
            <div style="margin-top: 10px;" class="col">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Semua Beres!</h5>

                </div>
              </div>
            </div>

            @endforelse
          </form>




          <div style="margin-top: 30px;">
            <h4>Konfirmasi Request Pengembalian barang</h4>
          </div>
          @forelse($pengembalian_belum_ditinjau as $dkr)
          <form method="POST" action="{{route('user.pengembalian.aksi')}}">
            @csrf
            <input type="hidden" name="status" value="pengembalian_di_approve_penjual">
            <input type="hidden" name="id_pesanan" value="{{$dkr->id_pesanan}}">
            <input type="hidden" name="id_pembeli" value="{{$dkr->produk_buyer_id}}">
            <input type="hidden" name="id_produk" value="{{$dkr->produk_id}}">
            <input type="hidden" name="item_quantity" value="{{$dkr->kuantitas}}">
            <input type="hidden" name="price" value="{{$dkr->harga_produk}}">

            <button hidden id="terima{{$dkr->id_pesanan}}" type="submit" class="btn btn-success">konfirmasi</button>
          </form>
          <form method="POST" action="{{route('user.pengembalian.aksi')}}">
            @csrf
            <input type="hidden" name="status" value="pengembalian_di_tolak_penjual">
            <input type="hidden" name="id_pesanan" value="{{$dkr->id_pesanan}}">
            <input type="hidden" name="id_pembeli" value="{{$dkr->produk_buyer_id}}">
            <input type="hidden" name="id_produk" value="{{$dkr->produk_id}}">
            <input type="hidden" name="item_quantity" value="{{$dkr->kuantitas}}">
            <input type="hidden" name="price" value="{{$dkr->harga_produk}}">
            <button hidden id="tolak{{$dkr->id_pesanan}}" type="submit" class="btn btn-danger">Tolak</button>
          </form>
          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$dkr->nama_produk_yang_dipesan}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">id pesanan #{{$dkr->id_pesanan}}</h6>
                {{$dkr->produk_buyer_name}}
                <br>id produk #{{$dkr->produk_id}}
                <br><br><label for="terima{{$dkr->id_pesanan}}" class="btn btn-success">konfirmasi</label> <span><label for="tolak{{$dkr->id_pesanan}}" class="btn btn-danger">Tolak</label></span>
                <br>


                @foreach($pengembalian_belum_ditinjau_view as $dtl)


                @foreach (explode('|',$dtl->info_helper) as $key => $fruit)


                @if($key === 0)
                @if($fruit === $dkr->id_pesanan)
                @foreach (explode('|',$dtl->img) as $index => $kayu)
                <br>
                <img src="{{ asset('gambarrrrrr/'.$kayu) }}" class="d-block w-50">

                <br>
                @endforeach
                @endif
                @endif
                @if($fruit === $dkr->id_pesanan)
                <h4>Info Pengembalian Barang</h4>
                {{$dtl->message}}
                @endif

                @endforeach






                @endforeach



              </div>
            </div>
          </div>
          @empty
          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Semua Beres!</h5>

              </div>
            </div>
          </div>

          @endforelse

        </div>
      </div>
    </div>
    </div>
    </div>

  </section>

</body>

</html>