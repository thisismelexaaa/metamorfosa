@extends('panel.layouts.app')

@section('title')
    Detail Data Klien
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Detail Data Klien') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('customers.index') }}">
                                Klien
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Detail Data Klien</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="mb-4">Data Diri</h3>
                    <span>No Daftar : <span class="text-primary fw-bold fs-6">{{ $data->no_daftar }}</span></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Nama') }}</th>
                                <td>{{ $data->name }}</td>
                                <th>{{ __('Nomor Telepon') }}</th>
                                <td>{{ $data->no_tlp }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Tanggal Lahir') }}</th>
                                <td>{{ $data->tgl_lahir }}</td>
                                <th>{{ __('Jenis Kelamin') }}</th>
                                <td>{{ $data->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Nama Ayah') }}</th>
                                <td>{{ $data->nama_ayah }}</td>
                                <th>{{ __('Nama Ibu') }}</th>
                                <td>{{ $data->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Pekerjaan Ayah') }}</th>
                                <td>{{ $data->pekerjaan_ayah }}</td>
                                <th>{{ __('Pekerjaan Ibu') }}</th>
                                <td>{{ $data->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Alamat') }}</th>
                                <td colspan="3">{{ $data->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
