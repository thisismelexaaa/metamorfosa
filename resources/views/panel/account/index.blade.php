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
                        <li class="breadcrumb-item active">Akun</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
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
                                        <a href="{{ route('account.destroy', encrypt($user['id'])) }}"
                                            class="btn btn-sm btn-danger" data-confirm-delete="true">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
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
    <script src="{{ asset('function_js/staff/index.js') }}"></script>
@overwrite
