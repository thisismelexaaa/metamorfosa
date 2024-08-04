@extends('panel.layouts.app')

@section('title')
    Detail Data Pelanggan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Detail Data Pelanggan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('dashboard.index') }}">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="home-item" href="{{ route('customers.index') }}">
                                Pelanggan
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Detail Data Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="mb-4">Data Diri</h3>
                    <span>No Daftar : <b style="font-size: 20px">{{ $data->no_daftar }}</b></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Nama') }}</th>
                                <td>{{ $data->name }}</td>
                                <th>{{ __('Nomor Telepon') }}</th>
                                <td>{{ $data->no_tlp }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Tanggal Lahir') }}</th>
                                <td>{{ $data->tgl_lahir }}</td>
                                <th>{{ __('Jenis Kelamin') }}</th>
                                <td>{{ $data->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Nama Ayah') }}</th>
                                <td>{{ $data->nama_ayah }}</td>
                                <th>{{ __('Nama Ibu') }}</th>
                                <td>{{ $data->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Pekerjaan Ayah') }}</th>
                                <td>{{ $data->pekerjaan_ayah }}</td>
                                <th>{{ __('Pekerjaan Ibu') }}</th>
                                <td>{{ $data->pekerjaan_ibu }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Alamat') }}</th>
                                <td colspan="3">{{ $data->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                <h3 class="mb-4">Layanan</h3>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <th>{{ __('Layanan') }}</th>
                                <td>
                                    @if ($data->getLayanan)
                                        {{ $data->getLayanan->layanan }}
                                    @endif
                                </td>
                                <th>{{ __('Sub Layanan') }}</th>
                                <td>
                                    @if ($data->getLayanan)
                                        {{ $data->getSubLayanan->sub_layanan }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Support Teacher') }}</th>
                                <td>{{ $data->support_teacher }}</td>
                                <th>{{ __('Status Pembayaran') }}</th>
                                <td>
                                    @if ($data->status == 1)
                                        <span
                                            style="background-color: green; color: white; font-weight: bold; padding: 5px 10px; border-radius: 4px;">Lunas</span>
                                    @elseif ($data->status == 2)
                                        <span
                                            style="background-color: red; color: white; font-weight: bold; padding: 5px 10px; border-radius: 4px;">Belum
                                            Lunas</span>
                                    @else
                                        {{ __('Tidak Diketahui') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>{{ __('Tanggal Masuk') }}</th>
                                <td>{{ $data->tgl_masuk }}</td>
                                <th>{{ __('Tanggal Selesai') }}</th>
                                <td>{{ $data->tgl_selesai }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Keluhan') }}</th>
                                <td colspan="3">{{ $data->keluhan }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Hasil Konsultasi') }}</th>
                                <td colspan="3">{{ $data->hasil_konsul }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('Total Biaya :') }}</th>
                                <td colspan="3" style="text-align: right">
                                    Rp
                                    <b style="font-size: 20px;">{{ number_format($data->total_biaya, 0, ',', '.') }}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
