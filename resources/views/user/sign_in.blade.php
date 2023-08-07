@if(Auth::id())
@else
<!doctype html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
    }

    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
  </style>
</head>

<body class="text-center" style="height: 100%; flex-direction: column; align-items: center;">

  <style>
    @media (max-width: 768px) {
      body {
        overflow-y: auto;
      }
    }
  </style>

  @include('main/navbar')

  <div style="padding-top:180px;" class="container">
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

    <section style="overflow-y: auto;">
      <div class="container">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="{{ asset('icon/mon.gif') }}" class="img-fluid rounded-3 slide-title animated" alt="Phone image">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 account-login-inner">
            <h2>Login</h2>
            <form method="POST" action="{{ route('sign_in.action') }}" class="ltn__form-box contact-form-box">
              @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="username" placeholder="username/Email*" required type="username" name="username" value="{{ old('username') }}" id="floatingInput" class="form-control form-control-lg" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input placeholder="password" required class="form-control form-control-lg" type="password" name="password" id="floatingPassword" />
              </div>

              <div class="d-flex justify-content-around align-items-center mb-4">
                <!-- Checkbox -->
                <div class="form-check mt-20">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                  <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
                <div class="go-to-btn mt-20">
                  <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                </div>
              </div>

              <!-- Submit button -->
              <div class="btn-wrapper mt-0">
                <button class="btn btn-transparent btn-effect-4 text-uppercase" type="submit">LOG-IN</button>
                <a href="{{ route('sign_up.action') }}"><button class="btn btn-effect-3 text-uppercase">SIGN-UP</button></a>
              </div>
              

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
              </div>

              <button class="btn btn-lg btn-block btn-primary mb-3" style="background-color: rgb(221, 75, 57);" type="submit">
                <i class="fab fa-google me-2"></i> Sign in with Google
              </button>

              <button class="btn btn-primary btn-lg btn-block mb-3" style="background-color: #3b5998" href="#!" role="button">
                <i class="fab fa-facebook-f me-2"></i> Continue with Facebook
              </button>

              <button class="btn btn-primary btn-lg btn-block mb-3" style="background-color: #55acee" href="#!" role="button">
                <i class="fab fa-twitter me-2"></i> Continue with Twitter
              </button>


            </form>
          </div>
        </div>
      </div>
    </section>

  </div>
</body>

</html>
@endif