<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    @include('main/navbar')
    <section style="width:98%;margin-left:1%;padding-top:100px;">
        <form action="{{ route('products.search') }}" method="GET">
    <div class="row">
        <div class="col-md-4 mb-3">
            <input required type="text" name="query" class="form-control" placeholder="Search...">
        </div>
        <div class="col-md-4 mb-3">
            <input type="number" name="min_price" class="form-control" placeholder="Min Price">
        </div>
        <div class="col-md-4 mb-3">
            <input type="number" name="max_price" class="form-control" placeholder="Max Price">
        </div>
    </div>
    <button style="width:100%;" type="submit" class="btn btn-primary">Search</button>
</form>
<div class="row">
    @if (isset($message))
    <div style="margin-top:10px;width:98%;margin-left:1%;" class="alert alert-info">{{ $message }}</div>
@else
    @foreach ($products as $product)
    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
        @foreach (explode('|',$product->gambar) as $key => $fruit)
        @if($key === 0)
    <img src="{{ asset('gambar/'.$fruit ) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
    @endif
    @endforeach
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{$product->produk_name}}</h5>
            <p class="card-text">Rp{{$product->produk_price}}</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="/produk/{{$product->id}}" class="btn btn-primary shadow-0 me-1">Lihat Produk</a>
            </div>
          </div>
        </div>
</div>
@endforeach
@endif
</div>
    </section>
</body>
</html>