@extends('panel.layouts.app')

@section('title')
    Kerja sama
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Kerja sama') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Kerja Sama</li>
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
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Url</th>
                            <th>Tipe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $key => $partner)
                            <tr>
                                <td>
                                    <button class="text-dark btn btn-link" style="cursor: pointer" data-bs-toggle="modal"
                                        data-bs-target="#partner{{ $key }}">Lihat
                                        Logo</button>
                                </td>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->description }}</td>
                                <td>{{ $partner->url }}</td>
                                <td>{{ $partner->tipe }}</td>
                                <td>
                                    <a href="{{ route('partners.edit', $partner->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ route('partners.destroy', $partner->id) }}"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($partners as $key => $partner)
        <div class="modal fade" id="partner{{ $key }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $partner->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mx-auto d-flex justify-content-center">
                            <img src="{{ asset('assets/panel/partners/' . $partner->image) }}" alt=""
                                class="w-50">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script src="{{ asset('function_js/partners/index.js') }}"></script>
    <script src="{{ asset('function_js/deleteRestoreData/index.js') }}"></script>
@endsection
