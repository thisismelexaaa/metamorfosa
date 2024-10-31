@extends('panel.layouts.app')

@section('title')
    Tambah Akun
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Tambah Akun') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('account.index') }}">
                                Akun
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Akun</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="card">
            <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <h4>Data Diri</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="nama">Nama Lengkap</label>
                                <input required id="nama" type="text" class="form-control" name="name"
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input required id="username" type="text" class="form-control" name="username"
                                    placeholder="Masukkan Username">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="no_hp">Nomor Telepon/Handphone</label>
                                <input required id="no_hp" type="text" class="form-control" name="no_hp"
                                    placeholder="Masukkan Nomor Telepon/Handphone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input required id="email" type="email" class="form-control" name="email"
                                    placeholder="Masukkan Email">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="alamat">Alamat Lengkap</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    placeholder="Masukkan Alamat">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select select2"
                                    data-placeholder="Pilih Jenis Kelamin">
                                    <option></option>
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="form-select select2"
                                    data-placeholder="Pilih Status">
                                    <option></option>
                                    <option value="1">Sudah Menikah</option>
                                    <option value="2">Belum Menikah</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <h4>Upload Profile Image</h4>
                            <label class="form-label" for="gambar">Profile Image (PNG, JPG)</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                accept=".jpg,.jpeg,.png">
                            <img id="preview" src="#" alt="Image Preview" class="border mt-2"
                                style="display: none; width: 100px; height: auto;">
                        </div>

                        <div class="col-6">
                            <h4>Account Setting</h4>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <label class="form-label" for="role">Role</label>
                                    <select name="role" id="role" class="form-select select2"
                                        data-placeholder="Pilih Role">
                                        <option></option>
                                        @foreach (['2' => 'Support Teacher', '3' => 'Staff', '4' => 'Receptionist', '5' => 'Official'] as $roleId => $roleName)
                                            <option value="{{ $roleId }}">{{ $roleName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between" {{ !$isFounder && !$isCoFounder ? 'hidden' : '' }}>
                                <div class="d-flex gap-2">
                                    <div class="form-check" {{ $isFounder ? 'hidden' : '' }}>
                                        <input class="form-check-input" type="checkbox" name="isFounder" id="isFounder">
                                        <label class="form-check-label" for="isFounder">
                                            Founder
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="isCoFounder"
                                            id="isCoFounder">
                                        <label class="form-check-label" for="isCoFounder">
                                            Co-Founder
                                        </label>
                                    </div>
                                </div>
                                <p class="text-danger">Notes: *Password awal adalah "metamorfosa"</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Submit Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#role, #jenis_kelamin, #status').select2({
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });

            $('#isFounder').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#isCoFounder').prop('disabled', true);
                }else {
                    $('#isCoFounder').prop('disabled', false);
                }
            });

            $('#isCoFounder').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#isFounder').prop('disabled', true);
                }else {
                    $('#isFounder').prop('disabled', false);
                }
            });

            // Review image
            $('#gambar').on('change', function() {
                const gambar = $(this)[0].files[0];
                if (gambar) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview').attr('src', e.target.result).show();
                    }
                    reader.readAsDataURL(gambar);
                } else {
                    $('#preview').hide();
                }
            });
        });
    </script>
@endsection
