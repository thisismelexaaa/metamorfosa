@extends('panel.layouts.app')

@section('title')
    Keuangan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Keuangan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active titleDocs">Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between gap-2">
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
                    <form action="{{ route('finance.index') }}" method="get">
                        @csrf <!-- Ensure you include CSRF token if using Laravel -->
                        <div class="d-flex gap-2">
                            <div class="d-flex gap-2">
                                <select name="tahun" id="tahun" class="form-select select2" aria-label="Select Year">
                                </select>
                                <select name="bulan" id="bulan" class="form-select select2" aria-label="Select Month">
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Rubah Periode</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle w-100" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Kode Pelanggan</th>
                                <th>Kode konsultasi</th>
                                <th>Layanan</th>
                                <th>Sub Layanan</th>
                                <th>Status Bayar</th>
                                <th>Tangal Bayar</th>
                                <th>Total Harga</th>
                                <th>Di Bayar</th>
                                <th>Sisa Bayar</th>
                                <th class="bg-white text-dark">Uang Masuk</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($konsultasi as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->customer->name }}</td>
                                    <td><a
                                            href="{{ route('konsultasi.show', encrypt($item->id)) }}">{{ $item->customer->no_daftar }}</a>
                                    </td>
                                    <td><a target="_blank" rel="noopener noreferrer"
                                            href="{{ route('konsultasi.show', encrypt($item->id)) }}">{{ $item->kode_konsultasi }}</a>
                                    </td>
                                    <td>{{ $item->layanan->layanan }}</td>
                                    <td>{{ $item->subLayanan->sub_layanan }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('finance.update', encrypt($item->id)) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="button"
                                                class="btn btn-sm badge bg-{{ $item->status_bayar == 1 ? 'success' : 'danger' }} text-white w-100 btn-lunas"
                                                onclick="updateStatus(this)">
                                                {{ $item->status_bayar == 1 ? 'Lunas' : 'Belum Lunas' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->updated_at, 'Asia/Jakarta')->locale('id')->isoFormat('DD MMMM YYYY') }}
                                    </td>
                                    <td class="currency" data-value="{{ $item->total_harga }}">
                                        {{ $item->total_harga }}</td>
                                    <td class="currency" data-value="{{ $item->dibayar }}">
                                        {{ $item->dibayar }}</td>
                                    <td class="currency" data-value="{{ $item->sisa_bayar }}">
                                        {{ $item->sisa_bayar }}</td>
                                    <td class="currency bg-white text-dark" data-value="{{ $item->dibayar }}">
                                        {{ $item->dibayar }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>Total</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="currency bg-white text-dark" data-value="{{ $total }}">{{ $total }}
                            </th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/finance/index.js') }}"></script>
@endsection
