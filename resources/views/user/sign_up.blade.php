@if(Auth::id())

@else
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
    @include('main/navbar')
<section style="padding-left:5px;padding-right:5px;padding-top:125px;padding-bottom:50px;">
        <div class="d-flex justify-content-center">
      <div class="col-lg-6 col-md-8">
        <!-- Register Form -->
        <div class="form-container">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <div class="d-flex justify-content-center">
        <div class="col">
        <p class="alert alert-danger">{{ $err }}</p>
        </div>
        </div>
        @endforeach
        @endif



          <h2>Register</h2>
          <form method="POST" action="{{ route('sign_up.action') }}">
          @csrf
            <div class="mb-3">
    <div class="form-group">
        <label for="name">Name</label>
        

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="mb-3">
            <label for="email">Email</label>
        

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
              <label for="registerEmail" class="form-label">Email address</label>
              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
            <label for="password">Password</label>
        

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
              <label for="registerPassword" class="form-label">Password</label>
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            </div>

            <div class="mb-3">
              <label for="registerPassword" class="form-label">Confirm Password</label>
              <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="registerPassword" class="form-label">User Type</label>
              <select id="user_type" name="user_type" class="form-select" required>
  <option disabled selected>Pilih Tipe User</option>
  <option value="Penjual">Penjual</option>
  <option value="Pembeli">Pembeli</option>
  <option value="Kurir">Kurir</option>
    </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
@endif