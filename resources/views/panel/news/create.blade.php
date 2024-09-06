@extends('panel.layouts.app')

@section('title')
    Tambah Berita
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
                                <option value="3"></option>
                            </select>
                        </div>
                        <div class="col form-group">
                            <label for="image">Poster</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Judul"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <div id="editor"></div>
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
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("konten").value = quill.root.innerHTML;
        });
    </script>
@endsection
