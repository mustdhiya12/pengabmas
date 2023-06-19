<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pembeli</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
    <title></title>
</head>
<body>
@include('main/navbar')


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <section style="margin-top:150px;">
    <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
    @if(session('success'))
        <div class="col">
        <p class="alert alert-primary">{{ session('success') }}</p>
        </div>
    @endif
  <div class="row">
  <select hidden id="item-select" multiple>
    <option value="1">Item 1 - $10</option>
  <option value="2">Item 2 - $20</option>
  <option value="3">Item 3 - $30</option>
  <option value="4">Item 4 - $40</option>
  <option value="5">Item 5 - $50</option>
  </select>
    <ul id="item-checklist">
      
    <form method="POST" action="{{route('34534534534534')}}">
    @csrf
    @method('POST')
@forelse ($produk as $index => $item)

<div style="margin-top: 10px;" class="col">
      <div class="card">
  <div class="card-body">
  
    @foreach ($produk_checker_helper as $item_checker)
    @if($item_checker->produk_id == $item->produk_id && $item_checker->kuantitas >= 1)

<input id="tdlr" class="selectall{{$item->id_pesanan}}" type="checkbox" name="selected_items[]" value="{{ $item->harga_produk * $item->kuantitas}}">
<input hidden class="325223_1{{$item->id_pesanan}}" type="checkbox" name="namer[]" value="belum_ditinjau">
    
    <input hidden class="325223_2{{$item->id_pesanan}}" type="checkbox" name="id_pesanan_handler[]" value="{{$item->id_pesanan}}">

    <input hidden class="325223_3{{$item->id_pesanan}}" type="checkbox" name="usr_id[]" value="{{Auth::user()->id}}">

    <input hidden class="325223_4{{$item->id_pesanan}}" type="checkbox" name="itm_owner[]" value="{{$item->produk_owner_id}}">
    
    <input hidden class="325223_5{{$item->id_pesanan}}" type="checkbox" name="kuantitas[]" value="{{$item->kuantitas}}">

    <input hidden class="325223_6{{$item->id_pesanan}}" type="checkbox" name="produk_id[]" value="{{$item->produk_id}}">
    
  <input type="submit" id="submit-form" hidden />
  @elseif($item_checker->produk_id == $item->produk_id && $item_checker->kuantitas < 1)
  <div style="margin-top:10px;" class="alert alert-danger" role="alert">
                     Stok Habis
                     </div>
    
  @endif  
@endforeach

    <h5 class="card-title">{{ $item->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $item->harga_produk }} x {{ $item->kuantitas }} pesanan </h6>
    <input class="btn btn_danger" type="submit" id="submit-form" hidden />

    <label for="submit-form235235235{{$item->id_pesanan}}" tabindex="0" class="btn btn-danger"><i class="fas fa-trash"></i></label>


  </div>
</div>

    </div>

    <script type="text/javascript">
        $('.selectall{{$item->id_pesanan}}').click(function() {
    if ($(this).is(':checked')) {
        $('.325223_1{{$item->id_pesanan}}:checkbox').attr('checked', true);
        $('.325223_2{{$item->id_pesanan}}:checkbox').attr('checked', true);
        $('.325223_3{{$item->id_pesanan}}:checkbox').attr('checked', true);
        $('.325223_4{{$item->id_pesanan}}:checkbox').attr('checked', true);
        $('.325223_5{{$item->id_pesanan}}:checkbox').attr('checked', true);
        $('.325223_6{{$item->id_pesanan}}:checkbox').attr('checked', true);
    } else {
        $('.325223_1{{$item->id_pesanan}}:checkbox').attr('checked', false);
        $('.325223_2{{$item->id_pesanan}}:checkbox').attr('checked', false);
        $('.325223_3{{$item->id_pesanan}}:checkbox').attr('checked', false);
        $('.325223_4{{$item->id_pesanan}}:checkbox').attr('checked', false);
        $('.325223_5{{$item->id_pesanan}}:checkbox').attr('checked', false);
        $('.325223_6{{$item->id_pesanan}}:checkbox').attr('checked', false);
    }
});
    </script>
@empty
<div style="margin-top: 10px;" class="col">
      <div class="card">
<div class="card-body">
    <h5 class="card-title">Tidak ada apa apa di keranjang mu</h5>

<span><a href="{{ route('main.home') }}"><button type="button" class="btn btn-primary">Beli Produk</button></a></span>

  </div>
</div>
@endforelse
</form>
@foreach ($produk_deleter_helper as $item)
<form method="POST" action="{{route('user.hapus.pesanan', $item->id_pesanan)}}">
    @csrf
    @method('PUT')
<button hidden id="submit-form235235235{{$item->id_pesanan}}" class="btn btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
</form>
@endforeach
</ul>

    <div style="margin-top: 10px;" class="col">
<div class="card">
  <div class="card-body">
   <h5 style="font-weight: 600;">Total Harga: Rp<span id="total">0</span></h5>
  </div>
  <label for="submit-form" tabindex="0" style="border-start-start-radius: 0px;border-start-end-radius: 0px;" class="btn btn-primary">Beli</label>
</div>
</div>


<div style="margin-top: 30px;">
<h4>Belum Di Konfirmasi</h4>
</div>

@forelse ($produk_belum_ditinjau as $produk_belum_ditinjau_top)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_belum_ditinjau_top->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_belum_ditinjau_top->harga_produk }} x {{ $produk_belum_ditinjau_top->kuantitas }} pesanan </h6>



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
@endforelse



<div style="margin-top: 30px;">
<h4>Di Proses</h4>
</div>

@forelse ($produk_sudah_ditinjau as $produk_sudah_ditinjau_top)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_sudah_ditinjau_top->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_sudah_ditinjau_top->harga_produk }} x {{ $produk_sudah_ditinjau_top->kuantitas }} pesanan </h6>



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
@endforelse


<div style="margin-top: 30px;">
<h4>Sedang Di Kirim</h4>
</div>

@forelse ($produk_sedang_di_kirim as $produk_sudah_ditinjau_top)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_sudah_ditinjau_top->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_sudah_ditinjau_top->harga_produk }} x {{ $produk_sudah_ditinjau_top->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $produk_sudah_ditinjau_top->kurir }}</h6>



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
@endforelse


<div style="margin-top: 30px;">
<h4>Sudah Dikirim</h4>
</div>

@forelse ($produk_sudah_di_kirim as $produk_sudah_ditinjau_top)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_sudah_ditinjau_top->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_sudah_ditinjau_top->harga_produk }} x {{ $produk_sudah_ditinjau_top->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $produk_sudah_ditinjau_top->kurir }}</h6>
    <h6 class="card-title">Id Pesanan #{{ $produk_sudah_ditinjau_top->id_pesanan }}</h6>
    <h6 class="card-title">Id Produk #{{ $produk_sudah_ditinjau_top->produk_id }}</h6>
    <h6 class="card-title">diterima pembeli</h6>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#a325235235{{ $produk_sudah_ditinjau_top->id_pesanan }}">
  Komplain
</button>

<!-- Modal -->
<div class="modal fade" id="a325235235{{ $produk_sudah_ditinjau_top->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Komplain</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('komplain.pembeli')}}">
            @csrf
  <textarea required class="form-control" name="komplain" placeholder="komplain" aria-label="Username" aria-describedby="basic-addon1"></textarea><br>
  <input type="hidden" value="{{ Auth::user()->name }}" name="name">
  <input type="hidden" value="{{ Auth::user()->id }}" name="u_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->id_pesanan }}" name="order_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_id }}" name="produk_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->kurir }}" name="kurir_pengirim">

  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_owner_id }}" name="owner_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_owner_name }}" name="owner_name">
  <button class="btn btn-primary" type="submit" >kirim</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<div style="margin-top:10px;"></div>
<span>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $produk_sudah_ditinjau_top->id_pesanan }}">
  Kirim Request Pengembalian
</button></span>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $produk_sudah_ditinjau_top->id_pesanan }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kirim Request Pengembalian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" method="POST" action="{{route('pengembalian.pembeli')}}">
            @csrf
  <input required type="file" class="form-control" name="gambarrrrrr[]" accept="image/*"><br>
  <input type="file" class="form-control" name="gambarrrrrr[]" accept="image/*"><br>
  <input type="file" class="form-control" name="gambarrrrrr[]" accept="image/*"><br>
  <textarea required class="form-control" name="penjelasan" placeholder="penjelasan" aria-label="Username" aria-describedby="basic-addon1"></textarea><br>
  <input type="hidden" value="{{ Auth::user()->name }}" name="name">
  <input type="hidden" value="{{ Auth::user()->id }}" name="u_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->id_pesanan }}" name="order_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_id }}" name="produk_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->kurir }}" name="kurir_pengirim">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_owner_id }}" name="owner_id">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_owner_name }}" name="owner_name">

  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->id_pesanan }}" name="info_helper[]">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_id }}" name="info_helper[]">
  <input type="hidden" value="{{ $produk_sudah_ditinjau_top->produk_owner_id }}" name="info_helper[]">
  <input type="hidden" value="{{ Auth::user()->id }}" name="info_helper[]">

  <button class="btn btn-primary" type="submit" >kirim</button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>



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
@endforelse

<div style="margin-top: 30px;">
<h4>Dikomplain</h4>
</div>

@forelse ($produk_di_komplain as $produk_di_komplain_bottom)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_di_komplain_bottom->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_di_komplain_bottom->harga_produk }} x {{ $produk_di_komplain_bottom->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $produk_di_komplain_bottom->kurir }}</h6>
    <h6 class="card-title">Id Pesanan #{{ $produk_di_komplain_bottom->id_pesanan }}</h6>
    <h6 class="card-title">Id Produk #{{ $produk_di_komplain_bottom->produk_id }}</h6>
    <h6 class="card-title">diterima pembeli - dikomplain</h6>



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
@endforelse

<div style="margin-top: 30px;">
<h4>Request Pengembalian</h4>
</div>

@forelse ($produk_req_pengembelian_active as $produk_di_komplain_bottom)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_di_komplain_bottom->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_di_komplain_bottom->harga_produk }} x {{ $produk_di_komplain_bottom->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $produk_di_komplain_bottom->kurir }}</h6>
    <h6 class="card-title">Id Pesanan #{{ $produk_di_komplain_bottom->id_pesanan }}</h6>
    <h6 class="card-title">Id Produk #{{ $produk_di_komplain_bottom->produk_id }}</h6>
    <h6 class="card-title">request pengembalian barang belum ditinjau</h6>



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
@endforelse

<div style="margin-top: 30px;">
<h4>Request Pengembalian Diterima</h4>
</div>

@forelse ($pengembalian_di_approve_penjual as $produk_di_komplain_bottom)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_di_komplain_bottom->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_di_komplain_bottom->harga_produk }} x {{ $produk_di_komplain_bottom->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $produk_di_komplain_bottom->kurir }}</h6>
    <h6 class="card-title">Id Pesanan #{{ $produk_di_komplain_bottom->id_pesanan }}</h6>
    <h6 class="card-title">Id Produk #{{ $produk_di_komplain_bottom->produk_id }}</h6>
    <h6 class="card-title">request pengembalian barang diterima</h6>
    <h6 class="card-title">saldo dikembalikan Rp{{ $produk_di_komplain_bottom->harga_produk * $produk_di_komplain_bottom->kuantitas }}</h6>



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
@endforelse

<div style="margin-top: 30px;">
<h4>Request Pengembalian Ditolak</h4>
</div>

@forelse ($pengembalian_di_tolak_penjual as $produk_di_komplain_bottom)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $produk_di_komplain_bottom->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $produk_di_komplain_bottom->harga_produk }} x {{ $produk_di_komplain_bottom->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $produk_di_komplain_bottom->kurir }}</h6>
    <h6 class="card-title">Id Pesanan #{{ $produk_di_komplain_bottom->id_pesanan }}</h6>
    <h6 class="card-title">Id Produk #{{ $produk_di_komplain_bottom->produk_id }}</h6>
    <h6 class="card-title">request pengembalian barang ditolak</h6>



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
@endforelse


<div style="margin-top: 30px;">
<h4>Transaksi Gagal</h4>
</div>

@forelse ($transaksi_batal as $transaksi_batal_bottom)
<div style="margin-top: 30px;" class="col">
      <div class="card">
  <div class="card-body">


    

    <h5 class="card-title">{{ $transaksi_batal_bottom->nama_produk_yang_dipesan }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">harga per produk Rp{{ $transaksi_batal_bottom->harga_produk }} x {{ $transaksi_batal_bottom->kuantitas }} pesanan </h6>
    <h6 class="card-title">kirim oleh {{ $transaksi_batal_bottom->kurir }}</h6>
    <h6 class="card-title">Id Pesanan #{{ $transaksi_batal_bottom->id_pesanan }}</h6>
    <h6 class="card-title">Id Produk #{{ $transaksi_batal_bottom->produk_id }}</h6>
    <h6 class="card-title">Transaksi Gagal</h6>



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
@endforelse


<script>
  const select = document.getElementById('item-select');
  const checklist = document.getElementById('item-checklist');
  const total = document.getElementById('total');

  function calculateTotal() {
    let totalValue = 0;

    // For select element
    Array.from(select.selectedOptions).forEach((option) => {
      totalValue += parseInt(option.value);
    });

    // For checklist
    Array.from(checklist.querySelectorAll('#tdlr[type="checkbox"]:checked')).forEach((checkbox) => {
      totalValue += parseInt(checkbox.value);
    });

    total.textContent = totalValue;
  }

  calculateTotal();

  select.addEventListener('change', calculateTotal);
  checklist.addEventListener('change', calculateTotal);
</script>


  </div>

</div>
</div>
</section>

</body>
</html>
