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
                            <th>Uang Masuk</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($konsultasi as $key => $item)
                            <tr>
                                <td>{{ $item->customer->name }}</td>
                                <td>{{ $item->customer->no_daftar }}</td>
                                <td>{{ $item->kode_konsultasi }}</td>
                                <td>{{ $item->layanan->layanan }}</td>
                                <td>{{ $item->subLayanan->sub_layanan }}</td>
                                <td class="currency" data-value="{{ $item->total_harga }}">{{ $item->total_harga }}</td>
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
                            <th id="label-total" colspan="5">Total</th>
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

            // Count columns
            // let totalColumns = document.querySelectorAll('thead tr th').length - 1;
            // // Get the label-total element
            // const labelTotal = document.getElementById('label-total');

            // console.log(totalColumns);

            // // Set the colspan attribute if the element exists
            // if (labelTotal) {
            //     labelTotal.setAttribute('colspan', totalColumns);
            // }

            function formatCurrency(value) {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
                return formatter.format(value);
            }
        });
    </script>
@endsection
