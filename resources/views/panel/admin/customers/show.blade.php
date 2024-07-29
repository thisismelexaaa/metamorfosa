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
                                Customers
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Detail Data Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h3>Data Diri</h3>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>{{ __('No Daftar') }}</th>
                        <td>:</td>
                        <td>{{ $data->no_daftar }}</td>

                        <th>{{ __('Name') }}</th>
                        <td>:</td>
                        <td>{{ $data->name }}</td>

                        <th>{{ __('Nomor Telepon') }}</th>
                        <td>:</td>
                        <td>{{ $data->no_tlp }}</td>

                        <th>{{ __('Alamat') }}</th>
                        <td>:</td>
                        <td>{{ $data->alamat }}</td>

                        <th>{{ __('Tanggal Lahir') }}</th>
                        <td>:</td>
                        <td>{{ $data->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>Nama Ayah</th>
                        <td>:</td>
                        <td>{{ $data->nama_ayah }}</td>

                        <th>Nama Ibu</th>
                        <td>:</td>
                        <td>{{ $data->nama_ibu }}</td>

                        <th>Pekerjaan Ayah</th>
                        <td>:</td>
                        <td>{{ $data->pekerjaan_ayah }}</td>

                        <th>Pekerjaan Ibu</th>
                        <td>:</td>
                        <td>{{ $data->pekerjaan_ibu }}</td>

                        <th>Layanan</th>
                        <td>:</td>
                        <td>{{ $data->alamat }}</td>


                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
