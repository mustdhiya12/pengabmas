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
        /* Your styles here */

        /* Lightbox2 Overlay */
        .lightboxOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }
        .lightboxOverlay.hidden {
            display: none;
        }
        .lightboxImage {
            display: block;
            margin: 50px auto;
            max-width: 100%;
            max-height: calc(100vh - 100px);
            border: 3px solid #fff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
            cursor: pointer;
        }
        .lightboxClose {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
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
                                <div class="gambar-container" id="gambar-container">
                                    @php
                                        $gambarArray = explode('|', $polpot->gambar);
                                    @endphp
                                    @foreach ($gambarArray as $index => $gambar)
                                        <div class="gambar1-container mb-3">
                                            <label for="gambar{{ $index }}">Pilih Gambar</label>
                                            <input type="file" id="gambar{{ $index }}" class="form-control" name="gambar[]" accept="image/*">
                                            <div class="mt-2">
                                                <img id="preview-img-{{ $index }}" class="preview-img" src="{{ asset('gambar/' . $gambar) }}">
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" class="btn btn-outline-danger remove-image" onclick="removeImage(this)">Hapus</button>
                                                <button type="button" class="btn btn-outline-secondary view-image" onclick="togglePreview(this, '{{ $index }}')">View</button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
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
        // Function to toggle image preview
        function togglePreview(button, index) {
            var container = button.parentElement.parentElement;
            var input = container.querySelector('input[type="file"]');
            var file = input.files[0];
            var reader = new FileReader();

            if (button.classList.contains('close-preview')) {
                // Close the preview
                var previewImage = container.querySelector('.preview-img');
                previewImage.src = '';
                container.classList.remove('show-preview');
                button.innerText = 'View';
                button.classList.remove('close-preview');
            } else {
                // Show the preview
                reader.onload = function (e) {
                    var imgSrc = e.target.result;
                    var previewImage = container.querySelector('.preview-img');
                    previewImage.src = imgSrc;
                };

                if (file) {
                    reader.readAsDataURL(file);
                    container.classList.add('show-preview');
                    button.innerText = 'Close';
                    button.classList.add('close-preview');
                } else {
                    alert("Tidak ada gambar yang dipilih.");
                }
            }
        }

        // Function to remove the image container
        function removeImage(button) {
            var container = button.parentElement.parentElement;
            var gallery = container.parentElement;
            gallery.removeChild(container);
        }

        // Function to add a new image container
        function addImage() {
            var gallery = document.getElementById('gambar-container');
            var index = gallery.querySelectorAll('.gambar1-container').length;

            var newImageContainer = document.createElement('div');
            newImageContainer.classList.add('gambar1-container', 'mb-3');
            newImageContainer.innerHTML = `
                <label for="gambar${index}">Pilih Gambar</label>
                <input type="file" id="gambar${index}" class="form-control" name="gambar[]" accept="image/*">
                <div class="mt-2">
                    <img id="preview-img-${index}" class="preview-img" src="">
                </div>
                <div class="mt-2">
                    <button type="button" class="btn btn-outline-danger remove-image" onclick="removeImage(this)">Hapus</button>
                    <button type="button" class="btn btn-outline-secondary view-image" onclick="togglePreview(this, '${index}')">View</button>
                </div>
            `;

            gallery.appendChild(newImageContainer);
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
