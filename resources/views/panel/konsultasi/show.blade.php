@extends('panel.layouts.app')

@section('title')
    Detail Data Konsultasi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Detail Data Konsultasi') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('konsultasi.index') }}">
                                Konsultasi
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Detail Data Konsultasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="mb-4">Detail Konsultasi</h3>
                    <div class="">
                        <div>
                            Kode Konsultasi:
                            <span class="text-primary fw-bold fs-6">
                                {{ $konsultasi->kode_konsultasi }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Nama / No daftar') }}</th>
                                <td>{{ $konsultasi->customer->name .' / '. $konsultasi->customer->no_daftar }}</td>
                                <th>{{ __('Layanan') }}</th>
                                <td>{{ $konsultasi->layanan->layanan }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Sub-Layanan') }}</th>
                                <td>{{ $konsultasi->subLayanan->sub_layanan }}</td>
                                <th>{{ __('Support Teacher') }}</th>
                                <td>{{ $konsultasi->supportTeacher->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Keluhan') }}</th>
                                <td>{{ $konsultasi->keluhan }}</td>
                                <th>{{ __('Tanggal Masuk') }}</th>
                                <td>{{ $konsultasi->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Hasil Konsultasi') }}</th>
                                <td>{{ $konsultasi->hasil_konsultasi ?? 'Belum Ada / Belum Konsultasi' }}</td>
                                <th>{{ __('Tanggal Selesai') }}</th>
                                <td>{{ $konsultasi->tgl_selesai }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
