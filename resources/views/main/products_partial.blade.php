@foreach($products as $product)
@php
    $produk_name = $product->produk_name;
    $max_length = 13;

    if (strlen($produk_name) > $max_length) {
        $produk_name = substr($produk_name, 0, $max_length) . '<span style="color: gray;">...</span>';
    }
@endphp
<div class="col-lg-3 col-md-6 col-sm-6 d-flex">
    <a href="/produk/{{ $product->id }}" style="text-decoration: none; color: black;">
        <div class="card w-100 my-2 shadow-2-strong pbin">
            @foreach (explode('|', $product->gambar) as $key => $fruit)
                @if ($key === 0)
                    <img src="{{ asset('gambar/'.$fruit) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
                    <hr>
                @endif
            @endforeach
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{!! $produk_name !!}</h5>
                <p class="card-text" style="font-weight: 700;">Rp.{{$product->min_price}}</p>
            </div>
            <hr>
            <div class="p-3 float-right">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i> (9.0)
            </div>
        </div>
    </a>
</div>
@endforeach
