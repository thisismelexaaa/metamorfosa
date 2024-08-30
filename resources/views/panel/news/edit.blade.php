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
                                    placeholder="Judul">
                                <button type="button" class="btn btn-primary btn-sm w-25" data-bs-toggle="modal"
                                    data-bs-target="#showModal">Lihat</button>
                            </div>
                        </div>
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
    </script>
@endsection
