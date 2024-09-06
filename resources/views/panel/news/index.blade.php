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
                                    <a style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#showModal{{ $item->id }}">Lihat Poster</a>
                                </td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->category['category'] }}</td>
                                <td>{{ $item->status['status'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i') }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        {{-- <a href="{{ route('news.show', encrypt($item->id)) }}"
                                        class="btn btn-primary btn-sm" title="Lihat Detail">
                                        <i class="bi bi-info-circle-fill"></i>
                                    </a> --}}
                                        <a href="{{ route('news.edit', encrypt($item->id)) }}"
                                            class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('news.destroy', encrypt($item->id)) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @if (Auth::user()->role == 'admin' && $item->status['id'] != 1)
                                                <button type="button" onclick="restoreData(this)"
                                                    class="btn btn-success btn-sm" title="Restore">
                                                    <i class="bi bi-eye-fill"></i>
                                                </button>
                                            @else
                                                <button type="button" onclick="deleteData(this)"
                                                    class="btn btn-outline-danger btn-sm" title="Hapus">
                                                    <i class="bi bi-trash3-fill"></i>
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
