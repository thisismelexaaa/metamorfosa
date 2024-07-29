@extends('panel.layouts.app')

@section('title')
    Customers
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
                        <li class="breadcrumb-item active">Customers</li>
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
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Nama Ayah</th>
                                <th>Pekerjaan Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Pekerjaan Ibu</th>
                                <th>Layanan</th>
                                <th>Sub Layanan</th>
                                <th>Tanggal Masuk</th>
                                <th>Tanggal Selesai</th>
                                <th>Durasi</th>
                                <th>Profesional</th>
                                <th>Hasil Konsul</th>
                                <th>Biaya</th>
                                <th class="bg-white text-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($data['customer'] as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->no_daftar }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->no_tlp }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tgl_lahir }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->nama_ayah }}</td>
                                    <td>{{ $item->pekerjaan_ayah }}</td>
                                    <td>{{ $item->nama_ibu }}</td>
                                    <td>{{ $item->pekerjaan_ibu }}</td>
                                    <td>{{ $item->getLayanan->layanan }}</td>
                                    <td>{{ $item->sub_layanan }}</td>
                                    <td>{{ $item->tgl_masuk }}</td>
                                    <td>{{ $item->tgl_selesai }}</td>
                                    <td>Durasi</td>
                                    <td>{{ $item->support_teacher }}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="bg-white text-dark">
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('customers.show', $item->id) }}" class="btn btn-primary">
                                                <i class="bi bi-info-circle-fill"></i>
                                            </a>
                                            <a href="{{ route('customers.edit', $item->id) }}" class="btn  btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="{{ route('customers.destroy', $item->id) }}" class="btn  btn-outline-danger"
                                                data-confirm-delete="true">
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
@overwrite
