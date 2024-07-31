@extends('panel.layouts.app')

@section('title')
    Edit Account
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Account') }}</h3>
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
                                Account
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Edit Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('account.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3>Data Diri</h3>
                    <div class="row mb-2">
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input required id="nama" type="text" class="form-control" name="name"
                                placeholder="Masukkan Nama Lengkap" value="{{ $data->name }}">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="username">Username</label>
                            <input required id="username" type="text" class="form-control" name="username"
                                placeholder="Masukkan Username">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="email">Email</label>
                            <input required id="email" type="email" class="form-control" name="email"
                                placeholder="Masukkan Email" value="{{ $data->email }}">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="alamat">Alamat Lengkap</label>
                            <input type="text" name="alamat" id="alamat" class="form-control"
                                placeholder="Masukkan Alamat" value="{{ $data->alamat }}">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select select2"
                                data-placeholder="Pilih Jenis Kelamin">
                                <option selected value="{{ $data->jenis_kelamin }}"> {{ $data->jenis_kelamin }}
                                </option>
                                <option value="1">Laki Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" id="status" class="form-select select2"
                                data-placeholder="Pilih Status">
                                <option selected value="{{ $data->status }}"> {{ $data->status }}</option>
                                <option value="1">Sudah Menikah</option>
                                <option value="2">Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                    <h3>Account Setting</h3>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label class="form-label" for="role">Role</label>
                            <select name="role" id="role" class="form-select select2" data-placeholder="Pilih Role">
                                <option selected value="{{ $data->role }}"> {{ $data->role }}</option>
                                <option value="2">Support Teacher</option>
                                <option value="3">Staff</option>
                                <option value="4">Receptionist</option>
                                <option value="5">Official</option>
                            </select>
                        </div>
                    </div>
                    <p class="text-danger">Notes: *Password awal adalah username</p>
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
