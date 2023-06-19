@if(Auth::id())
@else
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
    }
  </style>
  </head>
  <body class="text-center">
  @include('main/navbar')

<div style="padding-top:150px;" class="container">
<div class="d-flex justify-content-center">
@if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <!-- Login Form -->
        <div class="form-container">
          <h2>Login</h2>
          <form method="POST" action="{{ route('sign_in.action') }}">
          @csrf
            <div class="mb-3">
              <input placeholder="username" required class="form-control" type="username" name="username" value="{{ old('username') }}" id="floatingInput">
            </div>
            <div class="mb-3">
              <input placeholder="password" required class="form-control" type="password" name="password" id="floatingPassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>

    
  </body>
</html>
@endif