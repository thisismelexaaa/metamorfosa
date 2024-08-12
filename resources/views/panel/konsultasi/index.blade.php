@extends('panel.layouts.app')

@section('title')
    Konsultasi
@endsection

<style>
    .bg-lunas {
        background-color: green;
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
        text-align: center;
    }

    .bg-belum-lunas {
        background-color: red;
        color: white;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 4px;
        text-align: center;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Konsultasi') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Konsultasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Daftar</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan/Sub Layanan</th>
                                <th>Profesional</th>
                                <th>Total Harga</th>
                                <th>Status Bayar</th>
                                <th>Sisa Bayar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>A123</td>
                                    <td>Joni</td>
                                    <td>Psikolog/Titari Program</td>
                                    <td>Support Teacher {{ $i }}</td>
                                    <td>Rp 100.000</td>
                                    <td>
                                        <button
                                            class="btn btn-sm {{ $i % 2 == 0 ? 'btn-success' : 'btn-danger' }} text-white w-100">
                                            {{ $i % 2 == 0 ? 'Lunas' : 'Belum Lunas' }}
                                        </button>
                                    </td>
                                    <td>Rp 50.000</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="" class="btn btn-sm btn-primary">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/konsultasi/index.js') }}"></script>
@endsection
