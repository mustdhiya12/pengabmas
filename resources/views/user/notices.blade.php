<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>{{Auth::user()->user_type}}</title>
</head>

<body>
  @include('main/navbar')
  <div style="margin-top:150px;" class="container m-3 p-3"></div>

  <section style="margin-top:150px;">
    <div style="padding:10px;" class="d-flex justify-content-center">
      <div class="container">
        <div class="row">
          @forelse($notices as $dkr)
          @if(Auth::user()->user_type == 'Penjual')
          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                @if($dkr->img === NULL)
                <h4>Komplain</h4>

                @elseif($dkr->img <> NULL)
                  <h4>Pengembalian Barang</h4>


                  @endif
                  <h5 class="card-title">{{$dkr->send_by_name}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">message {{$dkr->message}}</h6>
                  to {{$dkr->send_to_name}}
                  <br>{{$dkr->created_at}}
                  <br>
                  @if($dkr->img === NULL)



                  @elseif($dkr->img <> NULL)
                    <h6 class="card-subtitle mb-2 text-muted">Lampiran :</h6>
                    @foreach (explode('|',$dkr->img) as $key => $fruit)
                    <img src="{{ asset('gambarrrrrr/'.$fruit) }}" class="d-block w-100">
                    <br>
                    @endforeach
                    @endif
              </div>
            </div>
          </div>
          @else

          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$dkr->send_by_name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">message {{$dkr->message}}</h6>
                to {{$dkr->send_to_name}}
                <br>{{$dkr->created_at}}
              </div>
            </div>
          </div>
          @endif
          @empty
          <div style="margin-top: 10px;" class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Semua Beres!</h5>

              </div>
            </div>
          </div>

          @endforelse
        </div>
      </div>


    </div>
    </div>
    </div>

  </section>

</body>

</html>