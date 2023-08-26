@if(Auth::id())
@else
<!doctype html>
<html lang="en" style="height: 100%;">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unica - Masuk</title>
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
  <div style="margin-top:150px;" class="container m-5 p-5"></div>
  <div class="ltn__utilize-overlay"></div>
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
          <div class="col-md-8 col-lg-7 col-xl-6" style="position: sticky; top: 0; ">
              <img src="{{ asset('icon/mon.gif') }}" class="img-fluid rounded-3 slide-title animated" alt="Phone image" style="height: 100%; object-fit: cover;">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 account-login-inner" style="box-shadow: var(--ltn__box-shadow-4);">
            <h2>Masuk Akun</h2>
              <form method="POST" action="{{ route('sign_in.action') }}" class="ltn__form-box contact-form-box">
                @csrf
                <!-- Username/Email input -->
                <div class="form-outline mb-4">
                    <input type="text" name="identifier" placeholder="Username/Email*" required value="{{ old('identifier') }}" id="floatingInput" class="form-control form-control-lg" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input placeholder="Password" required class="form-control form-control-lg" type="password" name="password" id="floatingPassword" />
                </div>

                <div class="d-flex justify-content-around align-items-center mb-4">
                    <!-- Checkbox -->
                    <div class="form-check mt-20">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3"> Ingat akun saya </label>
                    </div>
                    <div class="go-to-btn mt-20">
                        <a href="#"><small>Lupa sandi?...</small></a>
                    </div>
                </div>
                <div class="btn-wrapper mt-0 mb-0">
                    <button class="btn btn-lg btn-block btn-transparent btn-effect-4 text-uppercase" type="submit"
                        style="color: #000; background-color: #fff;" 
                        onmouseover="this.style.color='#fff'; this.style.backgroundColor='#000';" 
                        onmouseout="this.style.color='#000'; this.style.backgroundColor='#fff';">
                        Submit
                    </button>
                </div>
            </form>
            <!-- Submit button -->
            <div class="btn-wrapper mt-0">
              <a href="{{ route('sign_up.action') }}">
                <button class="btn btn-lg btn-block btn-transparent btn-effect-3 text-uppercase" 
                style="color: #000; background-color: #fff; width: 80%;" 
                onmouseover="this.style.color='#fff'; this.style.backgroundColor='#000';" 
                onmouseout="this.style.color='#000'; this.style.backgroundColor='#fff';">
                  Daftar Akun
                </button>
              </a>
            </div>
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">Atau:</p>
            </div>

            <button class="btn btn-lg btn-block btn-primary mb-3" style="background-color: rgb(221, 75, 57);" type="submit">
              <i class="fab fa-google me-2"></i> Masuk melalui Google
            </button>

            <button class="btn btn-primary btn-lg btn-block mb-3" style="background-color: #3b5998" href="#!" role="button">
              <i class="fab fa-facebook-f me-2"></i> Masuk melalui Facebook
            </button>

            <button class="btn btn-primary btn-lg btn-block mb-3" style="background-color: #55acee" href="#!" role="button">
              <i class="fab fa-twitter me-2"></i> Masuk melalui Twitter
            </button>
          </div>
        </div>
      </div>
    </section>

  </div>
</body>

</html>
@endif