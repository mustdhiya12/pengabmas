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
    <title>{{Auth::user()->user_type}}</title>
</head>

<body>

    @include('main/navbar')
    <div style="margin-top:150px;" class="container m-4 p-5">
    </div>
    <div style="margin-top:150px;" class="container">

        @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-8">
                <p class="alert alert-success">{{ session('success') }}</p>
            </div>
        </div>
        @endif


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
                            @php
                            $gambarArray = explode('|', $polpot->gambar);
                            $linkArray = explode('|', $polpot->link);
                            @endphp
                            <div class="form-group">
                                <div class="gambar-container">
                                    @foreach ($gambarArray as $index => $gambar)
                                    <div class="gambar1-container">
                                        <label for="gambar{{ $index }}">Pilih Gambar</label>
                                        <input type="file" id="gambar{{ $index }}" class="form-control"
                                            name="gambar[]" accept="image/*"{{ $index === 0 ? ' required' : '' }}>
                                        <img id="preview-img-{{ $index }}" class="preview-img" src="{{ asset('gambar/' . $gambar) }}">
                                        <script>
                                            document.querySelectorAll('input[name="gambar[]"]')[{{ $index }}].addEventListener('change', function (event) {
                                                var reader = new FileReader();
                                                var previewImg = document.getElementById('preview-img-{{ $index }}');
                                                var file = event.target.files[0];
                                                
                                                if (file) {
                                                    reader.onload = function (e) {
                                                        previewImg.src = e.target.result;
                                                    }
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    // Set gambar default atau tampilan khusus saat tidak ada gambar terpilih
                                                    // Misalnya, Anda dapat mengganti src dengan gambar default seperti berikut:
                                                    // previewImg.src = '{{ asset('path/to/default-image.jpg') }}';
                                                    // Atau Anda dapat menampilkan pesan khusus:
                                                    // previewImg.src = '{{ asset('path/to/no-image-selected.jpg') }}';
                                                }
                                            });
                                        </script>
                                        <div class="link-buttons">
                                            <a href="#" class="btn btn-outline-secondary" onclick="addgambar()">Add</a>
                                            @if ($index > 0)
                                            <a href="#" class="btn btn-outline-danger remove-link" onclick="removegambar(this)">Remove</a>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group mb-3" id="links-container">
                                <label for="add-link" class="form-label">Link Produk</label>
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
                            <style>
                                .gambar-container {
                                    display: flex;
                                    flex-wrap: wrap;
                                    gap: 10px;
                                    margin-bottom: 10px;
                                }
                                .gambar1-container {
                                    display: flex;
                                    align-items: center;
                                    gap: 10px;
                                }
                                .gambar1-container .form-control {
                                    flex: 1;
                                    margin-right: 10px;
                                }
                                .gambar1-container .preview-img {
                                    width: 100px;
                                    height: 100px;
                                    object-fit: cover;
                                }
                                .link-container {
                                    display: flex;
                                    align-items: center;
                                    margin-bottom: 10px;
                                }
                                .link-container .link-input {
                                    flex: 1;
                                    margin-right: 10px;
                                }
                                .link-container .link-buttons {
                                    display: flex;
                                }
                                .link-container .link-buttons a {
                                    margin-left: 5px;
                                }
                            </style>


                            <br>

                            <script>
                                function addgambar() {
                                    var linksContainer = document.querySelector('.gambar-container');
                                    
                                    var linkContainer = document.createElement('div');
                                    linkContainer.classList.add('gambar1-container');
                                    
                                    var linkInput = document.createElement('input');
                                    linkInput.type = 'file';
                                    linkInput.classList.add('form-control');
                                    linkInput.name = 'gambar[]';
                                    linkInput.accept = 'image/*';
                                    
                                    var previewImg = document.createElement('img');
                                    previewImg.classList.add('preview-img');
                                    
                                    var linkButtons = document.createElement('div');
                                    linkButtons.classList.add('link-buttons');
                                    
                                    var removeButton = document.createElement('a');
                                    removeButton.textContent = 'Remove';
                                    removeButton.href = '#';
                                    removeButton.classList.add('btn', 'btn-outline-danger', 'remove-link');
                                    removeButton.addEventListener('click', function(event) {
                                        event.preventDefault();
                                        removegambar(linkContainer);
                                    });
                                    
                                    linkButtons.appendChild(removeButton);
                                    
                                    linkContainer.appendChild(linkInput);
                                    linkContainer.appendChild(previewImg);
                                    linkContainer.appendChild(linkButtons);
                                    
                                    linksContainer.appendChild(linkContainer);
                                    
                                    linkInput.addEventListener('change', function(event) {
                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                            previewImg.src = e.target.result;
                                        }
                                        reader.readAsDataURL(event.target.files[0]);
                                    });
                                }
                                
                                function removegambar(linkContainer) {
                                    linkContainer.remove();
                                }

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
                                    
                                    linksContainer.appendChild(linkContainer);
                                }
                                
                                function removeLink(linkContainer) {
                                    linkContainer.remove();
                                }
                            </script>
                            
                            <div class="form-group">
                                <label for="harga">{{ __('Harga minimal:') }}</label>
                                <input id="min_harga" placeholder="minimal price" type="number" class="form-control @error('min_harga') is-invalid @enderror" name="min_harga" value="{{ old('min_harga') }}" required autocomplete="min_harga">
                                <label for="harga">{{ __('Harga maximal:') }}</label>
                                <input id="max_harga" placeholder="maximal price" type="number" class="form-control @error('max_harga') is-invalid @enderror" name="max_harga" value="{{ old('max_harga') }}" required autocomplete="max_harga">

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
                                    {{ __('Tambah') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
@endif
@endif
