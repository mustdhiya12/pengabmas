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
	
	<div class="row">
		<div class="d-flex justify-content-center">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Saldo Rp20.000,00</h5>
        <p class="card-text">dipakai untuk membeli produk yang di jual</p>
        <form method="POST" action="{{route('poin.action')}}">
        	@csrf
        	<input type="hidden" name="id_buyer" value="{{Auth::user()->id}}">
        	<input type="hidden" name="name_buyer" value="{{Auth::user()->name}}">
        	@php
                        $randomWord1 = Str::random(10);
                        @endphp
        	<input type="hidden" name="order_id" value="{{$randomWord1.random_int(1, 10000)}}">
        	<input type="hidden" name="price" value="20000">
        <button type="submit" class="btn btn-primary">Beli Otomatis</button>
        <br><span>atau</span><br>
        <a href="{{route('poin.manual')}}"><button type="button" class="btn btn-primary">Beli Manual</button></a>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</body>
</html>