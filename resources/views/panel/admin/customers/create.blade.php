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
                            <a class="home-item" href="{{ route('customers.index') }}">
                                Customers
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Add Data Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card overflow-hidden p-5">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <h3>Data Diri Customer</h3>
                    <div class="row mb-3">
                        <div class="col-md">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control" name="nama"
                                placeholder="Masukkan Nama Lengkap Pelanggan">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="nik">NIK</label>
                            <input id="nik" type="text" class="form-control" name="nik"
                                placeholder="Masukkan Nomor Induk Kependudukan">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                            <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir"
                                placeholder="Masukkan Tanggal Lahir">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md">
                            <label class="form-label" for="alamat">Alamat</label>
                            <input id="alamat" type="text" class="form-control" name="alamat"
                                placeholder="Masukkan Alamat">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="nama_bapak">Nama Bapak</label>
                            <input id="nama_bapak" type="text" class="form-control" name="nama_bapak"
                                placeholder="Masukkan Nama Bapak">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="nama_ibu">Nama Ibu</label>
                            <input id="nama_ibu" type="text" class="form-control" name="nama_ibu"
                                placeholder="Masukkan Nama Ibu">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h3>Data Layanan</h3>
                    <div class="row mb-3">
                        <div class="col-md">
                            <label class="form-label" for="layanan">Layanan</label>
                            <select class="form-select text-capitalize" id="layanan" name="layanan">
                                <option disabled selected>Pilih Jenis Layanan</option>
                                <option value="layanan 1">layanan 1</option>
                                <option value="layanan 2">layanan 2</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input id="tgl_masuk" type="date" class="form-control" name="tgl_masuk"
                                placeholder="Masukkan Tanggal Masuk">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="durasi_selesai">Durasi Konsultas</label>
                            <input id="durasi_konsultasi" type="date" class="form-control" name="durasi_konsultasi"
                                placeholder="Masukkan Durasi Konsultasi">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md">
                            <label class="form-label" for="profesional">Profesional</label>
                            <select class="form-select text-capitalize" id="profesional" name="profesional">
                                <option disabled selected>Pilih Profesional</option>
                                <option value="profesional 1">profesional 1</option>
                                <option value="profesional 2">profesional 2</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="hasil_konsul">Hasil Konsul</label>
                            <input id="hasil_konsul" type="text" class="form-control" name="hasil_konsul"
                                placeholder="Masukkan Hasil Konsul">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="biaya">Biaya</label>
                            <input id="biaya" type="text" class="form-control" name="biaya"
                                placeholder="Masukkan Biaya">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
