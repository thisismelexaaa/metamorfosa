@extends('panel.layouts.app')

@section('title')
    Tambah Berita
@endsection

@section('styles')
    <style>
        .image-box {
            display: inline-block;
            width: 150px;
            /* Adjust this based on your layout */
            text-align: center;
            margin-right: 10px;
            vertical-align: top;
        }

        .image-input {
            width: 100%;
        }

        #imageInputsContainer .image-box img {
            width: 100%;
            /* Ensure the image fills the container */
            height: 100px;
            /* Adjust the height as needed */
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Berita') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Berita</li>
                        <li class="breadcrumb-item active">Tambah Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('news.update', encrypt($news->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul"
                                value="{{ $news->judul }}" required>
                        </div>
                        <div class="col form-group">
                            <label for="kategori">kategori</label>
                            <select name="kategori" id="kategori" class="form-select select2">
                                <option selected value="{{ $news->category['id'] }}">{{ $news->category['category'] }}
                                </option>
                                @if ($news->category['id'] == 1)
                                    <option value="2">Acara Mendatang</option>
                                @else
                                    <option value="1">Berita</option>
                                @endif
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="image">Poster</label>
                            <div class="d-flex">
                                <input type="file" class="form-control w-75" id="image" name="image"
                                    placeholder="Judul" accept="image/*">
                                <button type="button" class="btn btn-primary btn-sm w-25" data-bs-toggle="modal"
                                    data-bs-target="#showModal">Lihat</button>
                            </div>
                        </div>
                    </div>
                    <div id="imageInputsContainer" class="form-group">
                        <div class="mb-3 mt-4">
                            <label for="imageInput" class="form-label d-block">Gambar</label>
                        </div>
                        {{-- <div class="image-box mb-3">
                            <img id="imagePreview" src="" alt="" class="img-fluid mb-1">
                            <input type="file" class="form-control image-input" name="images[]" required id="imageInput"
                                accept="image/*">
                        </div> --}}
                        {{-- @foreach ($news->images as $image)
                            <div class="image-box mb-3">
                                <img src="{{ asset('assets/image/news/' . $image->image) }}" alt=""
                                    class="img-fluid mb-1" id="imagePreview">
                                <input type="file" class="form-control image-input" name="images[]" accept="image/*"
                                    value="{{ $image->image }}" id="imageInput">
                                <input type="hidden" name="image_id[]" value="{{ $image->id }}">
                            </div>
                        @endforeach --}}
                        @foreach ($news->images as $image)
                            <div class="image-box mb-3">
                                <img src="{{ asset('assets/image/news/' . $image->image) }}" alt=""
                                    class="img-fluid mb-1 image-preview" data-index="{{ $loop->index }}">
                                <input type="file" class="form-control image-input" name="images[]" accept="image/*"
                                    data-index="{{ $loop->index }}" value="{{ $image->image }}">
                                <input type="hidden" name="image_id[]" value="{{ $image->id }}"
                                    data-index="{{ $loop->index }}" class="image-id">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" id="addImageButton"><i class="fas fa-plus"></i>
                            Tambah</button>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <div id="editor">{!! $news->content !!}</div>
                        <textarea hidden name="konten" id="konten">{!! $news->content !!}</textarea>
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="showModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Poster {{ $news->judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <image class="w-100" src="{{ asset('assets/image/news/' . $news->image) }}" alt="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // initialize select2
        $('#kategori').select2({
            theme: "bootstrap-5",
            placeholder: "Pilih Kategori",
            allowClear: true,
        });

        // quill editor
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("konten").value = quill.root.innerHTML;
        });

        // const imageInput = document.getElementById('imageInput');
        // const imagePreview = document.getElementById('imagePreview');
        const imageInputs = document.querySelectorAll('.image-input');

        imageInputs.forEach(imageInput => {
            imageInput.addEventListener('change', function() {
                const index = this.getAttribute('data-index');
                const imagePreview = document.querySelector(`.image-preview[data-index="${index}"]`);
                const imageIdInput = document.querySelector(`.image-id[data-index="${index}"]`);

                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (imagePreview) {
                            imagePreview.src = e.target.result;
                        }
                    };
                    reader.readAsDataURL(file);

                    // Update the image_id to "newImage"
                    if (imageIdInput) {
                        imageIdInput.value = "";
                    }
                }
            });
        });

        const addImageButton = document.getElementById('addImageButton');
        const imageInputsContainer = document.getElementById('imageInputsContainer');

        addImageButton.addEventListener('click', function() {
            // Membuat elemen baru untuk input gambar
            const newImageBox = document.createElement('div');
            newImageBox.classList.add('image-box', 'mb-3');

            const newImagePreview = document.createElement('img');
            newImagePreview.classList.add('img-fluid', 'mb-1');
            newImagePreview.src = '{{ asset('assets/panel/profile_images/image-icon.jpg') }}';

            const newImageInput = document.createElement('input');
            newImageInput.type = 'file';
            newImageInput.name = 'images[]';
            newImageInput.classList.add('form-control', 'image-input');
            newImageInput.required = true;
            newImageInput.accept = 'image/*';
           

            // Menambahkan preview image
            newImageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        newImagePreview.src = reader.result;
                    };
                    reader.readAsDataURL(file);
                }
                // add input hidden for image_id
                
            });

            // Menyusun elemen baru ke dalam container
            newImageBox.appendChild(newImagePreview);
            newImageBox.appendChild(newImageInput);
            imageInputsContainer.appendChild(newImageBox);
        });
    </script>
@endsection
