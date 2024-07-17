@extends('panel.layouts.app')

@section('title')
    Tambah Data Pelanggan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Tambah Data Pelanggan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('pelanggan.index') }}">
                                Pelanggan
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Data Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card overflow-hidden p-5">
            <form action="" method="POST">
                @csrf
                @method('POST')
                <h1>Data Diri Pelanggan</h1>
                <div class="row mb-3">
                    <div class="col-md">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Pelanggan">
                    </div>
                    <div class="col-md">
                        <label for="name">NIK</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nomer Induk Kependudukan">
                    </div>
                    <div class="col-md">
                        <label for="name">Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir">
                    </div>
                    <div class="col-md">
                        <label for="name">Jenis Kelamin</label>
                        <select class="form-select" id="select2">
                            <option disabled selected>Pilih Jenis Kelamin</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md">
                        <label for="name">Nama Ayah</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Ayah">
                    </div>
                    <div class="col-md">
                        <label for="name">Nama Ibu</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Ibu">
                    </div>
                </div>
                <div class="row">

                </div>
                <hr>
                <h1>Pelayanan</h1>
                <div class="row mb-3">
                    <div class="col-md">
                        <label for="name">Tipe Pelayanan</label>
                        <select class="form-select" id="select2">
                            <option disabled selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="name">Tanggal Masuk</label>
                        <input type="date" class="form-control" placeholder="Nama Pelanggan">
                    </div>
                    <div class="col-md">
                        <label for="name">Profesional yang menangani</label>
                        <select class="form-select" id="select2">
                            <option disabled selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="name">Durasi Pelayanan</label>
                        <input type="number" class="form-control" placeholder="Masukkan Durasi Pelayanan">
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex">
                        <button class="btn btn-primary mt-3" type="submit">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
