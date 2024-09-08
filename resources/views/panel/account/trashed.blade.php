@extends('panel.layouts.app')

@section('title')
    Akun
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Akun') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active titleDocs">Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between gap-2 align-items-center">
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
                    <a href="{{ route('account.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                </div>
                <table class="table nowrap table-striped table-hover align-middle" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['username'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('account.edit', encrypt($user['id'])) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('account.restore', encrypt($user->id)) }}" method="POST">
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
@endsection

@section('scripts')
    <script src="{{ asset('function_js/account/index.js') }}"></script>
    <script src="{{ asset('function_js/deleteRestoreData/index.js') }}"></script>
    {{-- <script src="{{ asset('function_js/showDeleted/index.js') }}"></script> --}}
@overwrite
