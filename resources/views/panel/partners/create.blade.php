@extends('panel.layouts.app')

@section('title')
    Tambah Kerja sama
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Tambah Kerja sama') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Kerja Sama</li>
                        <li class="breadcrumb-item active">Tambah Kerja Sama</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- Name -->
                    <div class="row">
                        <div class="col-6">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Kerja Sama" required>
                            </div>
                            <!-- Tipe -->
                            <div class="mb-3 col">
                                <label for="tipe" class="form-label">Tipe Kerja Sama</label>
                                <select class="form-select select2" id="tipe" name="tipe" required>
                                    <option selected disabled>Pilih Tipe Kerja Sama</option>
                                    <option value="1">Sekolah</option>
                                    <option value="2">Komunitas & Organisasi</option>
                                    <option value="3">Instansi / Perusahaan</option>
                                    <option value="4">Brand</option>
                                    <option value="5">Yang lain</option>
                                </select>
                            </div>
                            <!-- Image -->
                            <div class="mb-3 col">
                                <label for="image" class="form-label">Logo/Gambar</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- URL -->
                            <div class="col mb-3">
                                <label for="url" class="form-label d-flex justify-content-between">URL
                                    <small
                                        class="text-muted"><i>*Opsional</i></small>
                                    </label>
                                <input type="url" class="form-control" id="url" name="url" placeholder="https://example.com">
                            </div>
                            <!-- Description -->
                            <div class="mb-3 col">
                                <label for="description" class="form-label d-flex justify-content-between">Description  <small
                                    class="text-muted"><i>*Opsional</i></small>
                                </label></label>
                                <textarea class="form-control" id="description" name="description" rows="1" placeholder="Masukkan Deskripsi Kerja Sama"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/partners/index.js') }}"></script>
    <script src="{{ asset('function_js/deleteRestoreData/index.js') }}"></script>
@endsection
