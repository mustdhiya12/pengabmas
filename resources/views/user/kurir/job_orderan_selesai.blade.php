<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kurir</title>
    </head>
    <body>
        @include('main/navbar')
    <section style="margin-top:150px;">
        <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
  <div class="row">
    <h4>Job Di selesaikan</h4>
    @forelse($order_jobs_selesai as $dkr)
    <div style="margin-top: 10px;" class="col">
        <br>
      <div class="card">
  <div class="card-body">
    <h5 class="card-title">{{$dkr->nama_produk_yang_dipesan}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Alamat: {{$dkr->alamat}}</h6>
    <h6 class="card-subtitle mb-2 text-muted">No. Hp: {{$dkr->no_hp}}</h6>
  </div>
</div>
    </div>
@empty
<div style="margin-top: 10px;" class="col">
    <br>
      <div class="card">
<div class="card-body">
    <h5 class="card-title">Belum Ada!</h5>
  </div>
</div>
    </div>

@endforelse
    </div>
  </div>
</div>
</div>

</section>

    </body>
</html>