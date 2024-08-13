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
                                <th>No Daftar Pelanggan</th>
                                <th>Kode Konsultasi</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Sub Layanan</th>
                                <th>Support Teacher</th>
                                <th>Total Harga</th>
                                <th>Status Bayar</th>
                                <th>Sisa Bayar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsultasi as $konsultasi)
                                <tr>
                                    <td>{{ $konsultasi->customer->no_daftar }}</td>
                                    <td>{{ $konsultasi->kode_konsultasi }}</td>
                                    <td>{{ $konsultasi->customer->name }}</td>
                                    <td>{{ $konsultasi->layanan->layanan }}</td>
                                    <td>{{ $konsultasi->subLayanan->sub_layanan }}</td>
                                    <td>{{ $konsultasi->supportTeacher->name }}</td>
                                    <td class="currency" data-value="{{ $konsultasi->total_harga }}">
                                        {{ $konsultasi->total_harga }}</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $konsultasi->status_bayar == 1 ? 'success' : 'danger' }} text-white w-100">
                                            {{ $konsultasi->status_bayar == 1 ? 'Lunas' : 'Belum Lunas' }}
                                        </span>
                                    </td>
                                    <td class="currency" data-value="{{ $konsultasi->sisa_bayar }}">
                                        {{ $konsultasi->sisa_bayar }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="" class="btn btn-sm btn-primary">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form id="deleteForm"
                                                action="{{ route('konsultasi.destroy', encrypt($konsultasi->id)) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="deleteData(this)">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/konsultasi/index.js') }}"></script>
    <script src="{{ asset('function_js/deleteRestoreData/index.js') }}"></script>
@endsection
