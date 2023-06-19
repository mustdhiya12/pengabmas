<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pembeli</title>
    </head>
    <body>
        @include('main/navbar')
    <section style="margin-top:150px;">
        <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
  <div class="row">
  <h4>Daftar transaksi Pembelian Produk</h4>
    @forelse($daftar as $dkr)
    <div style="margin-top: 10px;" class="col">
        <br>
      <div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$dkr->nama_produk_yang_dipesan}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Alamat: {{$dkr->alamat}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">No. Hp: {{$dkr->no_hp}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Status: Sudah Dikirim</h6>
  </div>
</div>
    </div>
@empty
<div style="margin-top: 10px;" class="col">
    <br>
      <div class="card">
<div class="card-body">
    <h5 class="card-title">tidak ada transaksi</h5>

  </div>
</div>
    </div>

@endforelse
    </div>
  </div>
</div>
</div>

<div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
  <div class="row">
  <h4>Daftar transaksi Pembelian Saldo</h4>
  <p><b>cara transaksi manual</b><br>
  pertama tama kamu harus menyalin <b>Order ID</b> yang sudah disediakan di transaksi card yang masih dalam session_status
  <b>di_query</b>. setelah itu chat 


  </p>
@forelse($daftar_manual as $dkr)
    <div style="margin-top: 10px;" class="col">
        <br>
      <div class="card">
  <div class="card-body">
    <h5 class="card-title">nama akun : {{$dkr->name_acc}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Nama: {{$dkr->name_real}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">No. Hp: {{$dkr->no_hp}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Order ID: {{$dkr->order_id}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Status: {{$dkr->status}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Req: Rp{{$dkr->request_saldo}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">Tanggal Request: {{$dkr->created_at}}</h6>
    @if($dkr->status == 'di_query')
    <a href="https://api.whatsapp.com/send?phone=628989340169&text=nama_akun: {{$dkr->name_acc}} order_id: {{$dkr->order_id}} Req: Rp{{$dkr->request_saldo}}" target="_blank"><button type="button" class="btn btn-primary">hubungi admin</button></a>
    @elseif($dkr->status == 'selesai')
    @endif
  </div>
</div>
    </div>
@empty
<div style="margin-top: 10px;" class="col">
    <br>
      <div class="card">
<div class="card-body">
    <h5 class="card-title">tidak ada transaksi</h5>

  </div>
</div>
    </div>

@endforelse
</div>
</div>
</div>

</section>

    </body>
</html>