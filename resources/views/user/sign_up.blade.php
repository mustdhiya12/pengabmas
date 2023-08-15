@if(Auth::id())

@else
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign up</title>

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

    .link-container {
    display: flex;
    align-items: center;
  }

  .link-container input[type="text"] {
    flex: 1;
    margin-right: 10px;
  }

  .link-container button {
    flex-shrink: 0;
  }

  .form-check-input[type="checkbox"] {
    width: 20px;
    height: 20px;
  }

  .form-check-label {
    margin-left: 10px;
    font-size: 16px;
  }
  /* CSS untuk tombol grup */
.btn-group-toggle .btn.active {
  border-color: green !important;
}



  </style>
</head>

<body>
  @include('main/navbar')
  
  <section style="padding-left:5px;padding-right:5px;padding-top:125px;padding-bottom:50px;">
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{ asset('icon/mons.gif') }}" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
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
                <label for="username">Username</label>
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required autofocus>
            </div>
            <div class="mb-3">
              <div class="form-group">
                <label for="name">Name</label>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="mb-3">
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
            <div class="mb-3 d-flex justify-content-between" id="user-type-and-links-container">
  <!-- ... kode sebelumnya ... -->

            <!-- ... (previous code) ... -->

            <div class="form-group">
            <label for="user_type" class="form-label">User Type</label>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-warning">
                <input type="radio" name="user_type" value="Penjual" required> Penjual
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="user_type" value="Pembeli" required> Pembeli
              </label>
            </div>
          </div>
          </div>
          <div class="form-group" id="links-container">
          <label for="add-link" class="form-label">Add Link</label>
          <div class="link-container">
            <input type="text" name="link[]" placeholder="Enter link" required class="form-control mb-2">
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addLink()">Add</button>
          </div>
        </div>
        </div>
          </div>
            <div class="text-center mb-4">
              <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
            </div>
          </form>
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>
          <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: rgb(221, 75, 57);" type="submit">
            <i class="fab fa-google me-2"></i> Sign in with Google
          </button>
          <button class="btn btn-primary btn-lg btn-block mb-2" style="background-color: #3b5998" href="#!" role="button">
            <i class="fab fa-facebook-f me-2"></i> Continue with Facebook
          </button>
          <button class="btn btn-primary btn-lg btn-block mb-2" style="background-color: #55acee" href="#!" role="button">
            <i class="fab fa-twitter me-2"></i> Continue with Twitter
          </button>
          <script>
            function addLink() {
              var linksContainer = document.getElementById('links-container');
              var linkContainer = document.createElement('div');
              linkContainer.classList.add('link-container');

              var linkInput = document.createElement('input');
              linkInput.type = 'text';
              linkInput.name = 'link[]';
              linkInput.placeholder = 'Enter link';
              linkInput.required = true;

              var linkButtons = document.createElement('div');
              linkButtons.classList.add('link-buttons');

              var removeButton = document.createElement('a');
              removeButton.textContent = 'Remove';
              removeButton.href = '#';
              removeButton.classList.add('btn', 'btn-outline-danger', 'remove-link');
              removeButton.addEventListener('click', function(event) {
                event.preventDefault();
                removeLink(linkContainer);
              });

              linkButtons.appendChild(removeButton);

              linkContainer.appendChild(linkInput);
              linkContainer.appendChild(linkButtons);
              linksContainer.appendChild(linkContainer);

              // Menampilkan tombol "Remove" untuk semua kontainer link
              var allLinkContainers = linksContainer.querySelectorAll('.link-container');
              allLinkContainers.forEach(function(container) {
                var removeBtn = container.querySelector('.remove-link');
                removeBtn.style.display = 'inline-block';
              });
            }

            function removeLink(linkContainer) {
              var linksContainer = document.getElementById('links-container');

              // Hapus linkContainer dari linksContainer
              linkContainer.remove();

              // Menampilkan tombol "Remove" untuk semua kontainer link
              var allLinkContainers = linksContainer.querySelectorAll('.link-container');
              allLinkContainers.forEach(function(container) {
                var removeBtn = container.querySelector('.remove-link');
                removeBtn.style.display = 'inline-block';
              });
            }

          </script>
        </div>        
      </div>
    </div>
  </section>
</body>

</html>
@endif