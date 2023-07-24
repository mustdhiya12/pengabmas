@if(Auth::id())
@if(!empty(Auth::user()) && Auth::user()->user_type == 'Admin')
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
  <title>{{Auth::user()->user_type}}</title>
</head>

<body>

  @include('main/navbar')
  <div style="margin-top:150px;" class="container">

    @if(session('success'))
    <div class="row justify-content-center">
      <div class="col-8">
        <p class="alert alert-success">{{ session('success') }}</p>
      </div>
    </div>
    @endif


    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Edit Pengguna') }}</div>
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{route('kelola.adm.run', $polpot->id)}}">
              @csrf

              <span>nama</span>

              <input name="id_user" required type="hidden" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$polpot->id}}">

              <div class="input-group mb-3">
                <input name="nama" required type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$polpot->name}}">
              </div>
              <span>email</span>
              <div class="input-group mb-3">
                <input required name="email" type="email" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$polpot->email}}">
              </div>
              <span>password</span>
              <div class="input-group mb-3">
                <input name="password" type="password" class="form-control" placeholder="ubah password" aria-label="Recipient's username" aria-describedby="basic-addon2" value="">
              </div>
              <span>tipe user</span>
              <div class="input-group mb-3">
                <select required name="tipe_user" class="form-select" aria-label="Default select example">
                  @if($polpot->user_type == 'Admin')
                  <option selected>{{$polpot->user_type}}</option>
                  <option>Penjual</option>
                  <option>Pembeli</option>
                  <option>Kurir</option>
                  @elseif($polpot->user_type == 'Pembeli')
                  <option selected>{{$polpot->user_type}}</option>
                  <option>Admin</option>
                  <option>Penjual</option>
                  <option>Kurir</option>
                  @elseif($polpot->user_type == 'Penjual')
                  <option selected>{{$polpot->user_type}}</option>
                  <option>Admin</option>
                  <option>Pembeli</option>
                  <option>Kurir</option>
                  @elseif($polpot->user_type == 'Kurir')
                  <option selected>{{$polpot->user_type}}</option>
                  <option>Admin</option>
                  <option>Penjual</option>
                  <option>Pembeli</option>
                  @endif
                </select>
              </div>
              <span>alamat</span>
              <div class="input-group mb-3">
                <input name="alamat" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$polpot->alamat}}">
              </div>
              <span>ho hp</span>
              <div class="input-group mb-3">
                <input name="no_hp" type="number" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{$polpot->no_hp}}">
              </div>

              <!-- add more fields here -->

              <div class="form-group mb-0">
                <br>
                <button type="submit" class="btn btn-primary">
                  {{ __('Ubah') }}
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>
@endif
@endif