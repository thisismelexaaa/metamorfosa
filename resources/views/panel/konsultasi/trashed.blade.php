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
                        <li class="breadcrumb-item active titleDocs">Konsultasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 4)
                    <div class="d-flex justify-content-between gap-2 align-items-center">
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary text-white" type="button" data-bs-toggle="dropdown">
                                    Export Data
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" onclick="CopyToClipboard()">Copy</a></li>
                                    <li><a class="dropdown-item" onclick="ExportToCSV()">CSV</a></li>
                                    <li><a class="dropdown-item" onclick="ExportToPDF()">PDF</a></li>
                                    <li><a class="dropdown-item" onclick="ExportToXLSX()">XLSX</a></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('konsultasi.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                @endif
                <div class="table-responsive overflow-auto">
                    <table class="table nowrap table-striped table-hover align-middle" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-start">No Daftar Pelanggan</th>
                                <th>Kode Konsultasi</th>
                                <th>Nama Pelanggan</th>
                                <th>Layanan</th>
                                <th>Sub Layanan</th>
                                <th>Support Teacher</th>
                                <th class="bg-white text-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsultasi as $item)
                                <tr>
                                    <td class="text-start">{{ $item->customer->no_daftar }}</td>
                                    <td>{{ $item->kode_konsultasi }}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td>{{ $item->layanan->layanan }}</td>
                                    <td>{{ $item->subLayanan->sub_layanan }}</td>
                                    <td>{{ $item->supportTeacher->name }}</td>
                                    <td class="bg-white text-dark">
                                        <div class="d-flex gap-1">
                                            <form action="{{ route('konsultasi.restore', encrypt($item->id)) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('konsultasi.show', encrypt($item->id)) }}"
                                                    class="btn btn-primary btn-sm" title="Lihat Detail">
                                                    <i class="bi bi-info-circle-fill"></i>
                                                </a>
                                                <a href="{{ route('konsultasi.edit', encrypt($item->id)) }}"
                                                    class="btn btn-warning btn-sm" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                @if (Auth::user()->role == 'admin')
                                                    <button type="button" onclick="restoreData(this)"
                                                        class="btn btn-outline-success btn-sm" title="Restore">
                                                        <i class="bi bi-trash3-fill"></i>
                                                    </button>
                                                @endif
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
    <script src="{{ asset('function_js/showDeleted/index.js') }}"></script>
@endsection
