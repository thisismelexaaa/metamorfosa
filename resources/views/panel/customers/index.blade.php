@extends('panel.layouts.app')

@section('title')
    Pelanggan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Pelanggan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive overflow-auto">
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
                            @foreach ($data['customer'] as $item)
                                @if (Auth::user()->role == 'admin' || $item->status == 1)
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
                                                <form id="deleteForm"
                                                    action="{{ route('customers.destroy', encrypt($item->id)) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @if (Auth::user()->role == 'admin')
                                                        @if ($item->status == 1)
                                                            <button onclick="deleteData(this)"
                                                                class="btn btn-outline-danger btn-sm" title="Hapus">
                                                                <i class="bi bi-trash3-fill"></i>
                                                            </button>
                                                        @else
                                                            <button onclick="restoreData(this)"
                                                                class="btn btn-success btn-sm" title="Restore">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </button>
                                                        @endif
                                                    @else
                                                        <button onclick="deleteData(this)"
                                                            class="btn btn-outline-danger btn-sm" title="Hapus">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
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
