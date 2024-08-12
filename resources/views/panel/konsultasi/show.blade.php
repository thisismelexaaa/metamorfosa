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
                            <a class="home-item" href="{{ route('panel.konsultasi.index') }}">
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
                    <span>Kode Konsultasi: <span class="text-primary fw-bold fs-6">{{ $konsultasi->id }}</span></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Customer') }}</th>
                                <td>{{ $konsultasi->customer->name }}</td>
                                <th>{{ __('Layanan') }}</th>
                                <td>{{ $konsultasi->layanan->nama }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Sub-Layanan') }}</th>
                                <td>{{ $konsultasi->subLayanan->nama }}</td>
                                <th>{{ __('Profesional') }}</th>
                                <td>{{ $konsultasi->profesional }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Keluhan') }}</th>
                                <td colspan="3">{{ $konsultasi->keluhan }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Hasil Konsultasi') }}</th>
                                <td colspan="3">{{ $konsultasi->hasil_konsultasi }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Tanggal Masuk') }}</th>
                                <td>{{ $konsultasi->tgl_masuk }}</td>
                                <th>{{ __('Tanggal Selesai') }}</th>
                                <td>{{ $konsultasi->tgl_selesai }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Status Bayar') }}</th>
                                <td>{{ $konsultasi->status_bayar == 1 ? 'Lunas' : 'Belum Lunas' }}</td>
                                <th>{{ __('Total Harga') }}</th>
                                <td>{{ 'Rp ' . number_format($konsultasi->total_harga, 0, ',', '.') }}</td>
                            </tr>
                            @if ($konsultasi->status_bayar == 2)
                                <tr>
                                    <th>{{ __('Jumlah Dibayar') }}</th>
                                    <td>{{ 'Rp ' . number_format($konsultasi->dibayar, 0, ',', '.') }}</td>
                                    <th>{{ __('Sisa Bayar') }}</th>
                                    <td>{{ 'Rp ' . number_format($konsultasi->sisa_bayar, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>{{ __('Status') }}</th>
                                <td colspan="3">{{ ucfirst($konsultasi->status) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
