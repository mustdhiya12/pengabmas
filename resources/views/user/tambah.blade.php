@if(Auth::id())
@if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
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
	<title></title>
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Produk') }}</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('tambah.sedikit_aksi') }}">
                        @csrf

                        <div class="form-group">
                            <label for="field1">{{ __('Judul Produk') }}</label>
                            <input id="field1" type="text" class="form-control @error('field1') is-invalid @enderror" name="judul" value="{{ old('field1') }}" required autocomplete="field1" autofocus>

                            @error('field1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="field2">{{ __('Deskripsi Produk') }}</label>
                            <textarea id="field2" type="text" class="form-control @error('field2') is-invalid @enderror" name="deskripsi" value="{{ old('field2') }}" required autocomplete="field2"></textarea>

                            @error('field2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
<br>

                        <div class="form-group">
                            <style type="text/css">
                                .form-control[type="file"]{
                                        width: 100px;
                                        height: 100px;
                                        margin-left: none;
                                }
                            </style>
        <label>Pilih Gambar Produk</label>
         <div class="row">
  <div class="col-md-2">
    <div class="form-group">
      <input required type="file" class="form-control" id="image1" name="gambar[]" accept="image/*">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <input type="file" class="form-control" id="image2" name="gambar[]" accept="image/*">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <input type="file" class="form-control" id="image2" name="gambar[]" accept="image/*">
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <input type="file" class="form-control" id="image2" name="gambar[]" accept="image/*">
    </div>
  </div>
</div>
            


    </div>

    <br>



                        <div class="form-group">
                            <label for="harga">{{ __('Harga Produk') }}</label>
                            <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga">

                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kantitas">{{ __('Kuantitas Produk') }}</label>
                            <input id="kantitas" type="number" class="form-control @error('kantitas') is-invalid @enderror" name="kantitas" value="{{ old('kantitas') }}" required autocomplete="kantitas">

                            @error('kantitas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <input type="hidden" class="form-control" name="produk_owner_id" value="{{ Auth::user()->id }}" required>

                        <input type="hidden" class="form-control" name="produk_owner_nama" value="{{ Auth::user()->name }}" required>
                        @php
                        $randomWord1 = Str::random(10);
                        @endphp
                    <input type="hidden" class="form-control" name="produk_id" value="{{$randomWord1.random_int(1, 10000) }}" required>

                        <!-- add more fields here -->

                        <div class="form-group mb-0">
                        	<br>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Tambah') }}
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