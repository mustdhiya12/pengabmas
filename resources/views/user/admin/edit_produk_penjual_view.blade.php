<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admin</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
  <title>{{Auth::user()->user_type}}</title>
</head>

<body>
  @include('main/navbar')


  <section style="margin-top:150px;">
    <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
        @if(session('success'))
        <div class="col">
          <p class="alert alert-success">{{ session('success') }}</p>
        </div>
        @endif


        <div class="row">
          @forelse ($users as $user)

          <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
            <div class="card w-100 my-2 shadow-2-strong">
              @foreach (explode('|',$user->gambar) as $key => $fruit)
              @if($key === 0)
              <img src="{{ asset('gambar/'.$fruit ) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
              @endif
              @endforeach
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{$user->produk_name}}</h5>
                <p class="card-text">Rp{{$user->produk_price}}</p>
                <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                  <span>
                    <form method="POST" action="{{ route('admin.hapus', $user->id) }}">
                      @csrf
                      @method('PUT')
                      <button onclick="return confirm('!Peringatan!\nApakah anda yakin ingin menghapus produk ini?\nnama produk : {{ $user->produk_name }} ');" type="submit" class="btn btn-danger">Hapus</button> <a style="text-decoration: none;" href="{{route('admin.view_edit') . '/' . $user->id }}"><button type="button" class="btn btn-primary">Ubah</button>
                      </a>
                    </form>
                  </span>
                </div>
              </div>
            </div>
          </div>
          @empty
          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Anda Belum Menambahkan Produk</h5>

                <span><a href="{{ route('user.tambah') }}"><button class="btn btn-primary">Buat Produk</button></a></span>

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