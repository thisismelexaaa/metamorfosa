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
                <div class="d-flex justify-content-between">
                    <h3 class="mb-4">Detail Konsultasi</h3>
                    <span>
                        Kode Konsultasi:
                        <span class="text-primary fw-bold fs-6">
                            {{ $konsultasi->kode_konsultasi }}
                        </span>
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Nama / No daftar') }}</th>
                                <td>{{ $konsultasi->customer->name . ' / ' . $konsultasi->customer->no_daftar }}</td>
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
                                <td>{{ \Carbon\Carbon::parse($konsultasi->tgl_masuk)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Hasil Konsultasi Terakhir') }}</th>
                                <td>{{ $konsultasi->hasil_konsultasi ?? 'Belum Ada / Belum Konsultasi' }}</td>
                                <th>{{ __('Tanggal Selesai') }}</th>
                                <td>{{ \Carbon\Carbon::parse($konsultasi->tgl_selesai)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="mb-4">Riwayat Konsultasi</h3>
                <div class="table-responsive" style="width: 100%; height: 250px; overflow-y: auto">
                    <table class="table table-bordered">
                        <tbody>
                            @foreach ($hasil_konsultasi as $item)
                                <tr>
                                    <th>
                                        {{ __('Hasil Konsultasi') }}
                                    </th>
                                    <td>:</td>
                                    <td style="width: 85%">
                                        {{ \Carbon\Carbon::parse($item->created_at)->addDays($item->hari - 1)->locale('id')->isoFormat('DD MMMM YYYY') }}
                                        <br>
                                        <div style="text-align: justify">
                                            {{ $item->hasil }}
                                        </div>
                                        <div>
                                            {{-- show image label --}}
                                            @if ($item->foto_notes)
                                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#fotoModal">
                                                    Lihat Foto
                                                </a>
                                            @endif

                                            <!-- Modal -->
                                            <div class="modal fade" id="fotoModal" tabindex="-1"
                                                aria-labelledby="fotoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="fotoModalLabel">Foto Catatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ asset('assets/absen-konsultasi/' . str_replace(' ', '_', strtolower($item->supportTeacher->name)) . '/' . $item->foto_notes) }}"
                                                                alt="Foto Catatan" class="img-fluid">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
