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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">Detail Konsultasi</h3>
                    <div>
                        <div>Kode Konsultasi:
                            <span class="text-primary fw-bold fs-6">{{ $konsultasi->kode_konsultasi }}</span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th class="w-25">{{ __('Nama / No daftar') }}</th>
                                <td>{{ $konsultasi->customer->name . ' / ' . $konsultasi->customer->no_daftar }}</td>
                                <th>{{ __('Support Teacher') }}</th>
                                <td>{{ $konsultasi->supportTeacher->name }}</td>
                            </tr>
                            <tr>
                                <th class="w-25">{{ __('Layanan') }}</th>
                                <td>{{ $konsultasi->layanan->layanan }}</td>
                                <th>{{ __('Sub-Layanan') }}</th>
                                <td>{{ $konsultasi->subLayanan->sub_layanan }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Tanggal Masuk') }}</th>
                                <td>{{ \Carbon\Carbon::parse($konsultasi->tgl_masuk)->format('d M Y') }}</td>
                                <th>{{ __('Tanggal Selesai') }}</th>
                                <td>{{ $konsultasi->tgl_selesai ? \Carbon\Carbon::parse($konsultasi->tgl_selesai)->format('d M Y') : '-' }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Status Pembayaran') }}</th>
                                <td>
                                    <span class="badge {{ $konsultasi->status_bayar == 1 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $konsultasi->status_bayar == 1 ? 'Lunas' : 'Belum Lunas' }}
                                    </span>
                                </td>
                                <th>{{ __('Total Harga') }}</th>
                                <td>{{ 'Rp ' . number_format($konsultasi->total_harga, 0, ',', '.') }}</td>
                            </tr>
                            @if ($konsultasi->status_bayar == 2)
                                <tr>
                                    <th>{{ __('Dibayar') }}</th>
                                    <td>{{ 'Rp ' . number_format($konsultasi->dibayar, 0, ',', '.') }}</td>
                                    <th>{{ __('Sisa Bayar') }}</th>
                                    <td>{{ 'Rp ' . number_format($konsultasi->sisa_bayar, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>{{ __('Keluhan') }}</th>
                                <td colspan="3">{{ $konsultasi->keluhan }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Hasil Konsultasi') }}</th>
                                <td colspan="3">{{ $konsultasi->hasil_konsultasi ?? 'Belum Ada / Belum Konsultasi' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
