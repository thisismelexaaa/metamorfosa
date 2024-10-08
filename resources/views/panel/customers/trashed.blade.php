@extends('panel.layouts.app')

@section('title')
    Klien - Data yang dihapus
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Klien - Data yang dihapus') }}</h3>
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
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Data yang dihapus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive overflow-auto">
                    <div class="d-flex justify-content-between gap-2 align-items-center">
                        <div class="d-flex gap-2">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary text-white" type="button" data-bs-toggle="dropdown">
                                    Export Data
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Copy</a></li>
                                    <li><a class="dropdown-item" href="#">CSV</a></li>
                                    <li><a class="dropdown-item" href="#">PDF</a></li>
                                    <li><a class="dropdown-item" href="#">XLSX</a></li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{ route('customers.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>

                    <table class="table nowrap table-striped table-hover align-middle" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Daftar</th>
                                <th>Nama Lengkap</th>
                                <th>No Telepon</th>
                                <th {{ Auth::user()->role == 'admin' ? '' : 'class="hidden"' }}>Status
                                </th>
                                <th class="bg-white text-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($customer as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_daftar }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->no_tlp }}</td>
                                    <td {{ Auth::user()->role == 'admin' ? '' : 'class="hidden"' }}>
                                        {{ $item->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                    </td>
                                    <td class="bg-white text-dark">
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('customers.show', encrypt($item->id)) }}"
                                                class="btn btn-primary btn-sm" title="Lihat Detail">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                            <a href="{{ route('customers.edit', encrypt($item->id)) }}"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('customers.restore', encrypt($item->id)) }}"
                                                method="POST">
                                                @csrf
                                                @method('GET')
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
    <script src="{{ asset('function_js/customers/index.js') }}"></script>
    <script src="{{ asset('function_js/deleteRestoreData/index.js') }}"></script>
@endsection
