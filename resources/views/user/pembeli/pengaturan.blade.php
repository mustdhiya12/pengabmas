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
          @if(session('success'))

          <p class="alert alert-success">{{ session('success') }}</p>

          @endif

          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah/Ubah Alamat</h5><br>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <form method="POST" action="{{route('c32325235235')}}">
                  @csrf
                  <textarea required name="alamat" class="form-control" placeholder="Alamat" aria-label="Recipient's username" aria-describedby="basic-addon2">{{Auth::user()->alamat}}</textarea><br>
                  <input value="{{Auth::user()->no_hp}}" type="number" required name="no_hp" class="form-control" placeholder="No hp" aria-label="Recipient's username" aria-describedby="basic-addon2"><br>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>

  </section>

</body>

</html>