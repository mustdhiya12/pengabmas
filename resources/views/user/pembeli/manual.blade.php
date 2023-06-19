<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
    <h5 class="card-title">Reuqest Pembelian Saldo</h5><br>
    <h6 class="card-subtitle mb-2 text-muted"></h6>
    <form method="POST" action="{{route('poin.manual.run')}}">
        @csrf
      <input required name="nama_real" class="form-control" placeholder="Nama Anda" aria-label="Recipient's username" aria-describedby="basic-addon2"><br>
      <input required value="" type="number" required name="no_hp" class="form-control" placeholder="Nomer WhatsaApp Anda" aria-label="Recipient's username" aria-describedby="basic-addon2"><br>
      <input required value="" type="number" required name="jumlah_saldo" class="form-control" placeholder="jumlah Saldo Yang ingin dibeli" aria-label="Recipient's username" aria-describedby="basic-addon2"><br>
      @php
                        $randomWord1 = Str::random(10);
                        @endphp
      <input value="{{$randomWord1.random_int(1, 10000) }}" required type="hidden" required name="order_id" class="form-control">
      <input value="{{ Auth::user()->id }}" required type="hidden" required name="user_id" class="form-control">
      <input value="{{ Auth::user()->name }}" required type="hidden" required name="user_nama_acc" class="form-control">
      <input value="di_query" required type="hidden" required name="status" class="form-control">
      <button type="submit" class="btn btn-primary">Kirim Request</button>
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