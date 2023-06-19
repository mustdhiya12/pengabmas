@if(Auth::id())
@if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Seller</title>
    </head>
    <body>
        @include('main/navbar')
    <section style="margin-top:150px;">
        <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
        <h3>Selamat Datang, {{Auth::user()->name}}</h3>
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

    </body>
</html>




@elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Pembeli')
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
      <h3>Selamat Datang, {{Auth::user()->name}}</h3>
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
</div>

</section>

    </body>
</html>
@elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Kurir')
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
      <h3>Selamat Datang, {{Auth::user()->name}}</h3>
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

    </body>
</html>
@elseif(!empty(Auth::user()) && Auth::user()->user_type == 'Admin')
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Seller</title>
    </head>
    <body>
        @include('main/navbar')
    <section style="margin-top:85px;">
        <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
      <h3>Selamat Datang, {{Auth::user()->name}}</h3>
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

    </body>
</html>
@endif
@elseif(!Auth::id())

@endif