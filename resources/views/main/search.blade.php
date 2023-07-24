<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search</title>
</head>
<body>
    @include('main/navbar')
    <div class="container my-5">
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
        <button style="width:90%;" type="submit" class="container-fluid btn btn-primary">Search</button>
    </div><hr>
</form>
<div class="row">
    <h3>Hasil Pencarian :</h3>
    @if (isset($message))
    <div style="margin-top:10px;width:98%;margin-left:1%;" class="alert alert-info">{{ $message }}</div>
@else
    <div class="row" id="product-list">
        @include('main.products_partial', ['product' => $products])
    </div>
@endif
</div>
    </section>
</div>
</body>
</html>