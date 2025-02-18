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

        .ql-editor img {
            max-width: 100%;
            height: auto;
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
                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row mb-2">
                        <div class="col form-group">
                            <label for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Judul"
                                required>
                        </div>
                        <div class="col form-group">
                            <label for="kategori">kategori</label>
                            <select name="kategori" id="kategori" class="form-select select2">
                                <option selected>Pilih Kategori</option>
                                <option value="1">Berita</option>
                                <option value="2">Acara Mendatang</option>
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="image">Poster</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Judul"
                                required>
                        </div>
                    </div>
                    {{-- <div id="imageInputsContainer" class="form-group mt-3">
                        <div class="mb-3 mt-4">
                            <button type="button" class="btn btn-primary" id="addImageButton"><i class="fas fa-plus"></i>
                                Tambah Gambar</button>
                        </div>
                        <div class="image-box mb-3">
                            <img id="imagePreview" src="{{ asset('assets/panel/profile_images/image-icon.jpg') }}"
                                alt="" class="img-fluid mb-1">
                            <input type="file" class="form-control image-input" name="images[]" required id="imageInput"
                                accept="image/*">
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <div id="editor" class="form-control"></div>
                        <textarea hidden name="konten" id="konten"></textarea>
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
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
        // Daftarkan module image resize
        const ImageResize = window.ImageResize.default;
        Quill.register('modules/imageResize', ImageResize);

        // Inisialisasi editor Quill
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        [{
                            'header': [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['image', 'code-block'],
                        [{
                            'size': ['small', false, 'large', 'huge']
                        }],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'align': []
                        }]
                    ],
                    handlers: {
                        image: function() {
                            let input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');
                            input.click();

                            input.onchange = () => {
                                const file = input.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        const range = this.quill.getSelection();
                                        this.quill.insertEmbed(range.index, 'image', e.target.result);
                                    };
                                    reader.readAsDataURL(file);
                                }
                            };
                        }
                    }
                },
                imageResize: {} // Aktifkan fitur image resize
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("konten").value = quill.root.innerHTML;
        });

        // const imageInput = document.getElementById('imageInput');
        // const imagePreview = document.getElementById('imagePreview');

        // imageInput.addEventListener('change', function() {
        //     const file = this.files[0];
        //     if (file) {
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             imagePreview.src = e.target.result;
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // });

        // const addImageButton = document.getElementById('addImageButton');
        // const imageInputsContainer = document.getElementById('imageInputsContainer');

        // addImageButton.addEventListener('click', function() {
        //     // Membuat elemen baru untuk input gambar
        //     const newImageBox = document.createElement('div');
        //     newImageBox.classList.add('image-box', 'mb-3');

        //     const newImagePreview = document.createElement('img');
        //     newImagePreview.classList.add('img-fluid', 'mb-1');
        //     newImagePreview.src = '{{ asset('assets/panel/profile_images/image-icon.jpg') }}';

        //     const newImageInput = document.createElement('input');
        //     newImageInput.type = 'file';
        //     newImageInput.name = 'images[]';
        //     newImageInput.classList.add('form-control', 'image-input');
        //     newImageInput.required = true;
        //     newImageInput.accept = 'image/*';

        //     // Menambahkan preview image
        //     newImageInput.addEventListener('change', function() {
        //         const file = this.files[0];
        //         if (file) {
        //             const reader = new FileReader();
        //             reader.onload = function() {
        //                 newImagePreview.src = reader.result;
        //             };
        //             reader.readAsDataURL(file);
        //         }
        //     });

        //     // Menyusun elemen baru ke dalam container
        //     newImageBox.appendChild(newImagePreview);
        //     newImageBox.appendChild(newImageInput);
        //     imageInputsContainer.appendChild(newImageBox);
        // });
    </script>
@endsection
