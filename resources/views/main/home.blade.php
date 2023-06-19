<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
    </head>
    <body>
        @include('main/navbar')
        
        
        <!--Main Navigation-->
<header>
  <div class="bg-primary text-white py-5">
    <div class="container py-5">
      <h1>
        Raboot E-commerce
      </h1>
      <p>
        Trendy Products, Factory Prices, Excellent Service
      </p>
      <button type="button" class="btn btn-outline-light">
        Learn more
      </button>
      <a href="">
      <button type="button" class="btn btn-light shadow-0 text-primary pt-2 border border-white">
        <span class="pt-1">Purchase now</span>
      </button></a>
    </div>
  </div>
  <!-- Jumbotron -->
</header>
<!-- Products -->
<section>
  <div class="container my-5">
    <header class="mb-4">
      <h3>cari produk</h3>
    </header>
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
    <header class="mb-4">
      <h3>products</h3>
    </header>

    <div class="row">
    @forelse ($mainpolopot as $mainpolopot1)
      <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
        @foreach (explode('|',$mainpolopot1->gambar) as $key => $fruit)
        @if($key === 0)
    <img src="{{ asset('gambar/'.$fruit ) }}" class="card-img-top" style="aspect-ratio: 1 / 1" />
    @endif
    @endforeach
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{$mainpolopot1->produk_name}}</h5>
            <p class="card-text">Rp{{$mainpolopot1->produk_price}}</p>
            <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
              <a href="/produk/{{$mainpolopot1->id}}" class="btn btn-primary shadow-0 me-1">Lihat Produk</a>
            </div>
          </div>
        </div>
</div>
        @empty
<div style="margin-top: 10px;" class="col">
      <div class="card">
<div class="card-body">
    <h5 class="card-title">Belum ada produk yang ditambahkan oleh penjual</h5>

  </div>
</div>
    </div>

@endforelse
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="text-center text-lg-start text-muted mt-3" style="background-color: #f5f5f5;">
  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start pt-4 pb-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-12 col-lg-3 col-sm-12 mb-2">
          <!-- Content -->
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Store
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">About us</a></li>
            <li><a class="text-muted" href="#">Find store</a></li>
            <li><a class="text-muted" href="#">Categories</a></li>
            <li><a class="text-muted" href="#">Blogs</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Information
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">Help center</a></li>
            <li><a class="text-muted" href="#">Money refund</a></li>
            <li><a class="text-muted" href="#">Shipping info</a></li>
            <li><a class="text-muted" href="#">Refunds</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-6 col-sm-4 col-lg-2">
          <!-- Links -->
          <h6 class="text-uppercase text-dark fw-bold mb-2">
            Support
          </h6>
          <ul class="list-unstyled mb-4">
            <li><a class="text-muted" href="#">Help center</a></li>
            <li><a class="text-muted" href="#">Documents</a></li>
            <li><a class="text-muted" href="#">Account restore</a></li>
            <li><a class="text-muted" href="#">My orders</a></li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
</footer>
<!-- Footer -->



    </body>
</html>


