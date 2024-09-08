@extends('panel.layouts.app')

@section('title')
    Edit Akun
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Akun') }}</h3>
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
                        <li class="breadcrumb-item active">Edit Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('account.update', encrypt($data->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3>Data Diri</h3>
                    <div class="row mb-2">
                        <div class="col-md-3 mb-2">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input required id="nama" type="text" class="form-control" name="name"
                                placeholder="Masukkan Nama Lengkap" value="{{ old('name', $data->name) }}">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label" for="username">Username</label>
                            <input required id="username" type="text" class="form-control" name="username"
                                placeholder="Masukkan Username" value="{{ old('username', $data->username) }}">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label" for="no_hp">Nomor Telepon/Handphone</label>
                            <input required id="no_hp" type="no_hp" class="form-control" name="no_hp"
                                placeholder="Masukkan Nomer Telepon/Handphone" value="{{ old('no_hp', $data->no_hp) }}">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input required id="email" type="email" class="form-control" name="email"
                                placeholder="Masukkan Email" value="{{ old('email', $data->email) }}">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="alamat">Alamat Lengkap</label>
                            <input type="text" name="alamat" id="alamat" class="form-control"
                                placeholder="Masukkan Alamat" value="{{ old('alamat', $data->alamat) }}">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select select2"
                                data-placeholder="Pilih Jenis Kelamin">
                                <option value="1" {{ $data->jenis_kelamin == 'Laki Laki' ? 'selected' : '' }}>Laki Laki
                                </option>
                                <option value="2" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select select2"
                                data-placeholder="Pilih Status">
                                <option value="1" {{ $data->status == 'Sudah Menikah' ? 'selected' : '' }}>Sudah
                                    Menikah</option>
                                <option value="2" {{ $data->status == 'Belum Menikah' ? 'selected' : '' }}>Belum
                                    Menikah</option>
                            </select>
                        </div>

                        <!-- Image Upload Section -->
                        <div class="col-md mb-2">
                            <label class="form-label" for="gambar">Profile Image</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                accept="image/png, image/jpeg">
                            @if ($data->gambar)
                                <img src="{{ asset('assets/panel/profile_images/' . $data->gambar) }}" alt="Profile Image"
                                    class="mt-2" width="100">
                            @endif
                        </div>
                    </div>

                    <h3>Account Setting</h3>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="form-label" for="role">Role</label>
                            <select name="role" id="role" class="form-select select2"
                                data-placeholder="Pilih Role">
                                @foreach (['2' => 'Support Teacher', '3' => 'Staff', '4' => 'Receptionist', '5' => 'Official'] as $roleId => $roleName)
                                    <option value="{{ $roleId }}" {{ $data->role == $roleId ? 'selected' : '' }}>
                                        {{ $roleName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <p class="text-danger">Notes: *Password awal adalah "metamorfosa"</p>
                    <button class="btn btn-sm btn-primary" type="submit">Submit Data</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // select 2 inii
            $('#role, #jenis_kelamin, #status').select2({
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });
        });
    </script>
@endsection
