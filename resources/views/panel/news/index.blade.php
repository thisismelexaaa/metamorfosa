@extends('panel.layouts.app')

@section('title')
    Berita
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Berita') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Berita</li>
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
                            <th>{{ __('Judul') }}</th>
                            <th>{{ __('Penulis') }}</th>
                            <th>{{ __('Kategori') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Dibuat') }}</th>
                            <th>{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/news/index.js') }}"></script>
@endsection
