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
                                <th>Biaya</th>
                                <th>Status Bayar</th>
                                <th>Sub Layanan</th>
                                <th>Profesional</th>
                                <th class="bg-white text-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($data['customer'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_daftar }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->no_tlp }}</td>
                                    <td>Rp{{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span
                                                style="background-color: green; color: white; font-weight: bold; padding: 5px 10px; border-radius: 4px;">Lunas</span>
                                        @elseif ($item->status == 2)
                                            <span
                                                style="background-color: red; color: white; font-weight: bold; padding: 5px 10px; border-radius: 4px;">Belum
                                                Lunas</span>
                                        @else
                                            {{ __('Tidak Diketahui') }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->getSubLayanan ? $item->getSubLayanan->sub_layanan : '-' }}
                                    </td>

                                    <td>{{ $item->support_teacher }}</td>
                                    <td class="bg-white text-dark">
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('customers.show', $item->id) }}"
                                                class="btn btn-primary btn-sm" title="Lihat Detail">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                            <a href="{{ route('customers.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('customers.destroy', $item->id) }}"
                                                class="btn btn-outline-danger btn-sm" data-confirm-delete="true"
                                                title="Hapus">
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
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/customers/index.js') }}"></script>
@endsection
