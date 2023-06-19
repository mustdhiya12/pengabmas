<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
    </head>
    <body>
        @include('main/navbar')
    <section style="margin-top:150px;">
<div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
  <div class="row">
  <h4>Daftar transaksi Pembelian Saldo User</h4>
@forelse($daftar_manual_adm as $dkr)
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