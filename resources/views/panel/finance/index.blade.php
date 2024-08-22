@extends('panel.layouts.app')

@section('title')
    Keuangan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Keuangan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered align-middle w-100" id="datatable">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kode Pelanggan</th>
                            <th>Kode konsultasi</th>
                            <th>Layanan</th>
                            <th>Sub Layanan</th>
                            <th>Status Bayar</th>
                            <th>Total Harga</th>
                            <th>Di Bayar</th>
                            <th>Sisa Bayar</th>
                            <th>Uang Masuk</th>

                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsultasi as $key => $item)
                            <tr>
                                <td>{{ $item->customer->name }}</td>
                                <td><a
                                        href="{{ route('konsultasi.show', encrypt($item->id)) }}">{{ $item->customer->no_daftar }}</a>
                                </td>
                                <td><a target="_blank" rel="noopener noreferrer"
                                        href="{{ route('konsultasi.show', encrypt($item->id)) }}">{{ $item->kode_konsultasi }}</a>
                                </td>
                                <td>{{ $item->layanan->layanan }}</td>
                                <td>{{ $item->subLayanan->sub_layanan }}</td>
                                <td class="text-center">
                                    <form action="{{ route('finance.update', encrypt($item->id)) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="button"
                                            class="btn btn-sm badge bg-{{ $item->status_bayar == 1 ? 'success' : 'danger' }} text-white w-100"
                                            onclick="updateStatus(this)">
                                            {{ $item->status_bayar == 1 ? 'Lunas' : 'Belum Lunas' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="currency" data-value="{{ $item->total_harga }}">
                                    {{ $item->total_harga }}</td>
                                <td class="currency" data-value="{{ $item->dibayar }}">
                                    {{ $item->dibayar }}</td>
                                <td class="currency" data-value="{{ $item->sisa_bayar }}">
                                    {{ $item->sisa_bayar }}</td>
                                <td class="currency" data-value="{{ $item->dibayar }}">{{ $item->dibayar }}</td>
                                {{-- <td>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </div>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th id="label-total">Total</th>
                            <th class="currency" data-value="{{ $total }}">{{ $total }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('function_js/finance/index.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.currency').each(function() {
                $(this).text(formatCurrency($(this).data('value')));
            });

            let totalColumns = document.querySelectorAll('thead tr th').length - 1;
            const labelTotal = document.getElementById('label-total');

            if (labelTotal) {
                labelTotal.setAttribute('colspan', totalColumns);
            }

            function formatCurrency(value) {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
                return formatter.format(value);
            }

        });

        function updateStatus(id) {
            // form prevent default
            event.preventDefault();
            const form = id.closest('form');
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan mengubah status bayar konsultasi ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah Status!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
@endsection
