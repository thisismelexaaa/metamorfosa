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
                        <li class="breadcrumb-item active titleDocs">Berita</li>
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
                        <div class="d-flex gap-2 opacity-0">
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
                        <a href="{{ route('news.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                @endif
                <table class="table nowrap table-striped table-hover align-middle" id="datatable">
                    <thead>
                        <tr>
                            <th>{{ __('Poster') }}</th>
                            <th>{{ __('Judul') }}</th>
                            <th>{{ __('Penulis') }}</th>
                            <th>{{ __('Kategori') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Dibuat') }}</th>
                            <th>{{ __('Aksi') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    <a style="cursor: pointer" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $item->id }}">Lihat Poster</a>
                                </td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->category['category'] }}</td>
                                <td>{{ $item->status['status'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('news.edit', encrypt($item->id)) }}"
                                            class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('news.restore', encrypt($item->id)) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            @if (Auth::user()->role == 'admin')
                                                <button type="button" onclick="restoreData(this)"
                                                    class="btn btn-outline-success btn-sm" title="Restore">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal" tabindex="-1" id="showModal{{ $item->id }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Poster {{ $item->judul }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <image class="w-100" src="{{ asset('assets/image/news/' . $item->image) }}"
                                                alt="" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/news/index.js') }}"></script>
    <script src="{{ asset('function_js/deleteRestoreData/index.js') }}"></script>
@endsection
