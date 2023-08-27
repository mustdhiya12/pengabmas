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
            margin-bottom: 20px;
        }

        .gambar-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .image-name {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .image-preview {
            display: none;
        }

        .preview-img {
            width: 568px;
            height: 568px;
            object-fit: contain;
        }

        .image-buttons {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .new-image-container {
            display: none;
            margin-top: 20px;
        }

        .image-preview-new {
            display: none;
        }

        .preview-img-new {
            width: 568px;
            height: 568px;
            object-fit: contain;
        }

        .view-image-button,
        .close-image-button {
            display: none;
        }

        .add-image {
            margin-top: 20px;
        }

        .image-buttons {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .link-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .link-input {
            flex: 1;
        }

        .remove-link {
            margin-left: auto;
        }
    </style>
</head>

<body>

    <body>
        @include('main/navbar')
        <div style="padding-top:150px;" class="container m-4 p-5">
        </div>
        <div style="padding-top:150px;" class="container m-4 p-5">
        </div>
        <div style="padding-top:150px;" class="container">
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
                                    <div class="gambar-container">
                                        @foreach ($polpot->gambarArray() as $index => $image)
                                        <div class="gambar-item">
                                            <div class="image-name">{{ $image }}</div>
                                            <div class="image-preview" style="display: none;">
                                                <img class="preview-img" src="{{ asset('gambar/' . $image) }}" alt="Gambar Produk">
                                            </div>
                                            <div class="image-buttons mt-2">
                                                <button type="button" class="btn btn-outline-secondary view-image" onclick="togglePreview(this)">View</button>
                                                <button type="button" class="btn btn-outline-secondary close-image" onclick="togglePreview(this)" style="display: none;">Close</button>
                                                <button type="button" class="btn btn-outline-danger remove-image-button" onclick="removeImage(this, '{{ $image }}')">Hapus Gambar</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="gambar-item new-image-container mt-2" style="display: none;">
                                        <div class="image-buttons">
                                            <button type="button" class="btn btn-outline-secondary view-image-button" onclick="togglePreviewNew(this)">View</button>
                                            <button type="button" class="btn btn-outline-secondary close-image-button" onclick="togglePreviewNew(this)">Close</button>
                                        </div>
                                        <div class="image-preview-new" style="display: none;">
                                            <img class="preview-img-new" alt="Gambar Produk">
                                        </div>
                                        <input type="file" class="form-control new-image" name="gambar[]" accept="image/*" onchange="updateImagePreviewNew(this)">
                                    </div>
                                    <button type="button" class="btn btn-outline-primary add-image" onclick="addImage()">Tambah Gambar</button>
                                </div>
                                <div class="form-group mb-3" id="links-container">
                                    <label for="add-link" class="form-label">Link Produk</label>
                                    @php
                                    $linkArray = explode('|', $polpot->link);
                                    @endphp
                                    @foreach ($linkArray as $link)
                                    <div class="link-container">
                                        <div class="input-group">
                                            <input type="text" name="link[]" placeholder="Enter link" required class="form-control link-input" value="{{ $link }}">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary add-link" onclick="addLink()">Add</button>
                                                <button type="button" class="btn btn-outline-danger remove-link" onclick="removeLink(this.parentElement.parentElement.parentElement)">Remove</button>
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
            function togglePreview(button) {
                var container = button.closest('.gambar-item');
                var preview = container.querySelector('.image-preview');
                var imageName = container.querySelector('.image-name');
                var viewButton = container.querySelector('.view-image');
                var closeButton = container.querySelector('.close-image');
                var removeButton = container.querySelector('.remove-image-button');

                if (preview.style.display === 'none') {
                    // Tampilkan preview dan tombol-tombol lain, sembunyikan tombol "View"
                    preview.style.display = 'block';
                    imageName.style.display = 'none'; // Tampilkan nama gambar
                    closeButton.style.display = 'block';
                    viewButton.style.display = 'none';
                    removeButton.style.display = 'block';
                } else {
                    // Sembunyikan preview dan tombol-tombol lain, tampilkan tombol "View"
                    preview.style.display = 'none';
                    imageName.style.display = 'block'; // Tampilkan nama gambar
                    closeButton.style.display = 'none';
                    viewButton.style.display = 'block';
                    removeButton.style.display = 'block';
                }
            }

            // Sembunyikan preview gambar yang sudah tersimpan saat halaman dimuat
            document.addEventListener('DOMContentLoaded', function() {
                var previewContainers = document.querySelectorAll('.image-preview');
                for (var i = 0; i < previewContainers.length; i++) {
                    previewContainers[i].style.display = 'none';
                }
            });




            function addImage() {
                var inputContainer = document.querySelector('.new-image-container');
                var container = document.querySelector('.gambar-container');
                var newIndex = container.children.length;

                // Sembunyikan terlebih dahulu semua gambar preview yang telah tersimpan
                var existingPreviewContainers = document.querySelectorAll('.gambar-item .image-preview');
                existingPreviewContainers.forEach(function(existingContainer) {
                    existingContainer.style.display = 'none';
                });

                var newContainer = document.createElement('div');
                newContainer.classList.add('gambar-item');
                container.appendChild(newContainer);

                var input = document.createElement('input');
                input.type = 'file';
                input.name = 'gambar[]';
                input.accept = 'image/*';
                input.classList.add('form-control');
                newContainer.appendChild(input);

                var previewContainer = document.createElement('div');
                previewContainer.classList.add('image-preview-new');
                previewContainer.style.display = 'none';
                newContainer.appendChild(previewContainer);

                var previewImage = document.createElement('img');
                previewImage.classList.add('preview-img-new');
                previewContainer.appendChild(previewImage);

                var imageButtons = document.createElement('div');
                imageButtons.classList.add('image-buttons', 'mt-2');
                newContainer.appendChild(imageButtons);

                var viewButton = document.createElement('button');
                viewButton.type = 'button';
                viewButton.classList.add('btn', 'btn-outline-secondary', 'view-image-button');
                viewButton.textContent = 'View';
                viewButton.onclick = function() {
                    // Sembunyikan terlebih dahulu semua gambar preview yang telah tersimpan
                    existingPreviewContainers.forEach(function(existingContainer) {
                        existingContainer.style.display = 'none';
                    });

                    previewImage.src = URL.createObjectURL(input.files[0]); // Tampilkan gambar pada preview
                    previewContainer.style.display = 'block'; // Tampilkan elemen preview
                    viewButton.style.display = 'none'; // Sembunyikan tombol "View"
                    closeViewButton.style.display = 'block'; // Tampilkan tombol "Close"
                };
                imageButtons.appendChild(viewButton);

                var closeViewButton = document.createElement('button');
                closeViewButton.type = 'button';
                closeViewButton.classList.add('btn', 'btn-outline-secondary', 'close-image-button');
                closeViewButton.textContent = 'Close';
                closeViewButton.style.display = 'none'; // Mulai dengan tombol "Close" disembunyikan
                closeViewButton.onclick = function() {
                    previewContainer.style.display = 'none'; // Sembunyikan elemen preview
                    viewButton.style.display = 'block'; // Tampilkan tombol "View"
                    closeViewButton.style.display = 'none'; // Sembunyikan tombol "Close"
                };
                imageButtons.appendChild(closeViewButton);

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-outline-danger', 'remove-image-button');
                removeButton.textContent = 'Hapus Gambar';
                removeButton.onclick = function() {
                    removeImage(this);
                    newContainer.remove();
                };
                imageButtons.appendChild(removeButton);
            }
            var closeViewButton = document.createElement('button');
            closeViewButton.type = 'button';
            closeViewButton.classList.add('btn', 'btn-outline-secondary', 'close-image-button');
            closeViewButton.textContent = 'Close';
            closeViewButton.style.display = 'none'; // Mulai dengan tombol "Close" disembunyikan
            closeViewButton.onclick = function() {
                previewContainer.style.display = 'none'; // Sembunyikan elemen preview
                viewButton.style.display = 'block'; // Tampilkan tombol "View"
                closeViewButton.style.display = 'none'; // Sembunyikan tombol "Close"
            };
            newContainer.appendChild(closeViewButton);

            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-outline-danger', 'remove-image-button');
            removeButton.textContent = 'Hapus Gambar';
            removeButton.onclick = function() {
                removeImage(this);
                newContainer.remove();
            };
            newContainer.appendChild(removeButton);




            function removeImage(button, imageName) {
                var container = button.parentElement;

                // Ubah teks tombol menjadi "Gambar Terhapus!"
                button.textContent = "Gambar Terhapus!";
                button.classList.add("btn-secondary"); // Ubah tampilan tombol menjadi abu-abu
                button.disabled = true; // Matikan tombol

                // Tambahkan informasi gambar ke input hidden
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'images_to_remove[]';
                hiddenInput.value = imageName;
                container.appendChild(hiddenInput);

                // Hapus elemen gambar dari DOM
                var imageElement = container.querySelector(".preview-img");
                if (imageElement) {
                    imageElement.remove();
                }
            }



            // Function to update the existing preview when changing an image
            function updateImagePreview(input, index) {
                var previewWrapper = input.parentElement.querySelector('.preview-wrapper');
                var previewImage = previewWrapper.querySelector('.preview-img');
                var file = input.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
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
                linkButtons.classList.add('input-group-append');

                var addButton = document.createElement('button');
                addButton.type = 'button';
                addButton.classList.add('btn', 'btn-outline-secondary', 'add-link');
                addButton.textContent = 'Add';
                addButton.addEventListener('click', function() {
                    addLink();
                });

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-outline-danger', 'remove-link');
                removeButton.textContent = 'Remove';
                removeButton.addEventListener('click', function() {
                    removeLink(linkContainer);
                });

                linkButtons.appendChild(addButton);
                if (linksContainer.children.length > 1) {
                    linkButtons.appendChild(removeButton);
                }

                linkContainer.appendChild(linkInput);
                linkContainer.appendChild(linkButtons);

                linksContainer.appendChild(linkContainer);
            }

            function removeLink(linkContainer) {
                linkContainer.remove();
            }




            // Function to update the preview image when a new image is selected
            function updateImagePreviewNew(input) {
                var preview = input.parentNode.querySelector('.image-preview-new');
                var image = preview.querySelector('.preview-img-new');
                var removeButton = input.parentNode.querySelector('.remove-image-button');
                var viewButton = preview.querySelector('.new-view-image');
                var closeButton = preview.querySelector('.close-image-button');

                var file = input.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        image.src = e.target.result;
                        preview.style.display = 'block';
                        removeButton.style.display = 'block';
                        viewButton.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    preview.style.display = 'none';
                    removeButton.style.display = 'none';
                    viewButton.style.display = 'none';
                }
            }


            var previewOpen = false;

            // Function to toggle the preview image
            function togglePreviewNew(button) {
                var previewWrapper = button.parentElement.parentElement;
                var previewImage = previewWrapper.querySelector('.preview-img-new');
                var viewButton = previewWrapper.querySelector('.view-image-button');
                var closeButton = previewWrapper.querySelector('.close-image-button');

                if (!previewOpen) {
                    previewImage.style.display = 'block';
                    viewButton.style.display = 'none';
                    closeButton.style.display = 'block';
                    previewOpen = true;
                } else {
                    previewImage.style.display = 'none';
                    viewButton.style.display = 'block';
                    closeButton.style.display = 'none';
                    previewOpen = false;
                }
            }
        </script>
    </body>

</html>



@endif
@endif