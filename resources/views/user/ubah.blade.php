@if(Auth::id())
@if(!empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('home/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('home/css/styles.css') }}" rel="stylesheet" />
    <title>{{ Auth::user()->user_type }}</title>

    <style>
                                     .gambar-container {
                                        margin-bottom: 50px;
                                        min-height: 100px;
                                    }
                                    .gambar-container input[type="file"] {
                                        flex: 1;
                                        margin-right: 10px;
                                    }
                                    .gambar-container .preview-img {
                                        width: 468px;
                                        height: 468px;
                                        object-fit: contain;
                                    }
                                    .gambar-container .link-buttons {
                                        display: flex;
                                    }
                                    .gambar-container .link-buttons a {
                                        margin-left: 5px;
                                    }
    </style>
</head>
<body>
    @include('main/navbar')
    <div style="margin-top: 150px;" class="container m-4 p-5"></div>
    <div style="margin-top: 150px;" class="container">
        @if(Auth::id() && !empty(Auth::user()) && Auth::user()->user_type == 'Penjual')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ubah Produk') }}</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('user.rus', $polpot->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="field1">{{ __('Judul Produk') }}</label>
                                <input id="field1" type="text" class="form-control @error('field1') is-invalid @enderror" name="judul" value="{{ $polpot->produk_name }}" required autocomplete="field1" autofocus>
                                @error('field1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="field2">{{ __('Deskripsi Produk') }}</label>
                                <textarea id="field2" type="text" class="form-control @error('field2') is-invalid @enderror" name="deskripsi" required autocomplete="field2">{{ $polpot->produk_deskripsi }}</textarea>
                                @error('field2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group">
                                    <div id="gambar-container">
                                    <div class="gambar-container mb-3">
    <label for="gambar0">Pilih Gambar</label>
    <input type="file" id="gambar0" class="form-control" name="gambar[]" accept="image/*" onchange="updateImagePreview(this, 0)">
    <div class="mt-2 preview-wrapper" style="display: none;">
        <img id="preview-img-0" class="preview-img" src="{{ $polpot->gambar[0] ? asset('storage/' . $polpot->gambar[0]) : '' }}">
    </div>
    <div class="mt-2">
        <button type="button" class="btn btn-outline-danger remove-image" onclick="removeImage(this)">Hapus</button>
        <button type="button" class="btn btn-outline-secondary view-image" onclick="togglePreview(this, '0')">View</button>
    </div>
</div>

@php
    $gambar = json_decode($polpot->gambar); // Ubah string JSON menjadi array
@endphp

@foreach ($gambar as $index => $image)
<div class="gambar-container mb-3">
    <label for="gambar{{ $index + 1 }}">Pilih Gambar</label>
    <input type="file" id="gambar{{ $index + 1 }}" class="form-control" name="gambar[]" accept="image/*" onchange="updateImagePreview(this, {{ $index + 1 }})">
    <div class="mt-2 preview-wrapper">
        <img id="preview-img-{{ $index + 1 }}" class="preview-img" src="{{ $image ? asset('storage/' . $image) : '' }}">
    </div>
    <div class="mt-2">
        <button type="button" class="btn btn-outline-danger remove-image" onclick="removeImage(this)">Hapus</button>
        <button type="button" class="btn btn-outline-secondary view-image" onclick="togglePreview(this, '{{ $index + 1 }}')">View</button>
    </div>
</div>
@endforeach

<div class="mt-2">
    <button type="button" class="btn btn-outline-primary add-image" onclick="addImage()">Tambah Gambar</button>
</div>

                                </div>
                                
                            <div class="form-group mb-3" id="links-container">
                                <label for="add-link" class="form-label">Link Produk</label>
                                @php
                                    $linkArray = explode('|', $polpot->link);
                                @endphp
                                @foreach ($linkArray as $index => $link)
                                    <div class="link-container">
                                        <div class="input-group">
                                            <input type="text" name="link[]" placeholder="Enter link" required class="form-control link-input" value="{{ $link }}">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary add-link" onclick="addLink()">Add</button>
                                                @if ($index > 0)
                                                    <button type="button" class="btn btn-outline-danger remove-link" onclick="removeLink(this)">Remove</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="harga">{{ __('Harga minimal:') }}</label>
                                <input id="min_harga" placeholder="minimal price" type="number" class="form-control @error('min_harga') is-invalid @enderror" name="min_harga" value="{{ $polpot->min_price }}" required autocomplete="min_harga">
                                <label for="harga">{{ __('Harga maximal:') }}</label>
                                <input id="max_harga" placeholder="maximal price" type="number" class="form-control @error('max_harga') is-invalid @enderror" name="max_harga" value="{{ $polpot->max_price }}" required autocomplete="max_harga">
                                @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kantitas">{{ __('Kuantitas Produk') }}</label>
                                <input id="kantitas" type="number" class="form-control @error('kantitas') is-invalid @enderror" name="kantitas" value="{{ $polpot->kuantitas }}" required autocomplete="kantitas">
                                @error('kantitas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!-- add more fields here -->
                            <div class="form-group mb-0">
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Product') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <script>
      function togglePreview(button, index) {
        var container = button.parentElement.parentElement;
        var input = container.querySelector('input[type="file"]');
        var file = input.files[0];
        var reader = new FileReader();

        var previewWrapper = container.querySelector('.preview-wrapper');
        var previewImage = previewWrapper.querySelector('.preview-img');

        if (button.classList.contains('close-preview')) {
            // Close the preview
            previewImage.src = '';
            previewWrapper.style.display = 'none';
            button.innerText = 'View';
            button.classList.remove('close-preview');
        } else {
            // Show the preview
            reader.onload = function (e) {
                var imgSrc = e.target.result;
                previewImage.src = imgSrc;
            };

            if (file) {
                reader.readAsDataURL(file);
                previewWrapper.style.display = 'block';
                button.innerText = 'Close';
                button.classList.add('close-preview');
            } else {
                alert("Tidak ada gambar yang dipilih.");
            }
        }
    }

    function addImage() {
        var container = document.getElementById('gambar-container');
        var newIndex = container.childElementCount;
        var newContainer = document.createElement('div');
        newContainer.classList.add('gambar-container', 'mb-3');
        newContainer.innerHTML = `
            <label for="gambar${newIndex}">Pilih Gambar</label>
            <input type="file" id="gambar${newIndex}" class="form-control" name="gambar[]" accept="image/*">
            <div class="mt-2 preview-wrapper" style="display: none;">
                <img id="preview-img-${newIndex}" class="preview-img" src="">
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-outline-danger remove-image" onclick="removeImage(this)">Hapus</button>
                <button type="button" class="btn btn-outline-secondary view-image" onclick="togglePreview(this, '${newIndex}')">View</button>
            </div>
        `;
        container.appendChild(newContainer);
    }

    function removeImage(button) {
        var container = button.parentElement.parentElement;
        container.remove();
    }
    
    // Function to update the existing preview when changing an image
    function updateImagePreview(input, index) {
        var previewWrapper = input.parentElement.querySelector('.preview-wrapper');
        var previewImage = previewWrapper.querySelector('.preview-img');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            var imgSrc = e.target.result;
            previewImage.src = imgSrc;
        };

        if (file) {
            reader.readAsDataURL(file);
            previewWrapper.style.display = 'block';
        } else {
            previewImage.src = '';
            previewWrapper.style.display = 'none';
        }
    }
        // Function to add a new link container
        function addLink() {
            var linksContainer = document.getElementById('links-container');
            
            var linkContainer = document.createElement('div');
            linkContainer.classList.add('link-container');
            
            var linkInput = document.createElement('input');
            linkInput.type = 'text';
            linkInput.classList.add('form-control', 'link-input');
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
            
            linksContainer.parentNode.insertBefore(linkContainer, linksContainer.nextSibling);
        }
        
        function removeLink(linkContainer) {
            linkContainer.remove();
        }
    </script>
</body>
</html>


@endif
@endif
