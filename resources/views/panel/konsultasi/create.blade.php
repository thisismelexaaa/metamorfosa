@extends('panel.layouts.app')

@section('title')
    Tambah Data Konsultasi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Tambah Data Konsultasi') }}</h3>
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
                        <li class="breadcrumb-item active">Tambah Data Konsultasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card overflow-hidden p-5">
            <form action="{{ route('konsultasi.store') }}" method="POST">
                @csrf
                @method('POST')
                {{-- Data Konsultasi --}}
                <div class="row mb-2">
                    <h3>Data Konsultasi</h3>
                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="id_customer">Customer</label>
                            <select required id="id_customer" name="id_customer" class="form-select select2"
                                data-placeholder="Pilih Customer">
                                <option></option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="id_layanan">Layanan</label>
                            <select required id="id_layanan" name="id_layanan" class="form-select select2"
                                data-placeholder="Pilih Layanan">
                                <option></option>
                                @foreach ($layanan as $layanan)
                                    <option value="{{ $layanan->id }}">{{ $layanan->layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md d-none" id="col_sub_layanan">
                            <label class="form-label" for="id_sub_layanan">Sub Layanan</label>
                            <select required id="id_sub_layanan" name="id_sub_layanan" class="form-select select2"
                                data-placeholder="Pilih Sub Layanan">
                                <option></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="id_support_teacher">Support Teacher</label>
                            <select required id="id_support_teacher" name="id_support_teacher" class="form-select select2"
                                data-placeholder="Pilih Support Teacher">
                                <option></option>
                                @foreach ($support_teacher as $support_teacher)
                                    <option value="{{ $support_teacher->id }}">{{ $support_teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input required id="tgl_masuk" type="date" class="form-control" name="tgl_masuk"
                                placeholder="Masukkan Tanggal Masuk">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_selesai">Tanggal Selesai</label>
                            <input id="tgl_selesai" type="date" class="form-control" name="tgl_selesai"
                                placeholder="Masukkan Tanggal Selesai">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="status_bayar">Status Pembayaran</label>
                            <select required id="status_bayar" name="status_bayar" class="form-select select2"
                                data-placeholder="Pilih Status Pembayaran">
                                <option></option>
                                <option value="1">Lunas</option>
                                <option value="2">Belum Lunas</option>
                            </select>
                        </div>
                        <div class="col-md d-none" id="col_dibayar">
                            <label class="form-label" for="dibayar">Dibayar</label>
                            <input id="dibayar" type="text" class="form-control" name="dibayar"
                                placeholder="Masukkan Jumlah Dibayar">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="total_harga">Total Harga</label>
                            <input required id="total_harga" type="text" class="form-control" name="total_harga"
                                placeholder="Total Harga" readonly>
                        </div>
                        <div class="col-md d-none" id="col_sisa_bayar">
                            <label class="form-label" for="sisa_bayar">Sisa Bayar</label>
                            <input id="sisa_bayar" type="text" class="form-control" name="sisa_bayar"
                                placeholder="Sisa Bayar" readonly>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="keluhan">Keluhan</label>
                            <textarea required id="keluhan" rows="4" class="form-control" name="keluhan"
                                placeholder="Masukkan Keluhan"></textarea>
                        </div>
                        {{-- <div class="col-md">
                            <label class="form-label" for="hasil_konsultasi">Hasil Konsultasi</label>
                            <textarea required id="hasil_konsultasi" rows="4" class="form-control" name="hasil_konsultasi"
                                placeholder="Masukkan Hasil Konsultasi"></textarea>
                        </div> --}}
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Initialize select2 elements with common options
            ['#id_layanan', '#id_customer', '#id_support_teacher', '#status_bayar'].forEach(initializeSelect2);

            function initializeSelect2(selector) {
                // Define common options
                const options = {
                    theme: "bootstrap-5"
                };

                // Conditionally add minimumResultsForSearch option
                if (selector !== '#id_support_teacher') {
                    options.minimumResultsForSearch = Infinity;
                }

                // Apply select2 with the options
                $(selector).select2(options);
            }

            // Handle the change event for 'id_layanan'
            $('#id_layanan').on('change', function() {
                const idLayanan = $(this).val();
                const $subLayanan = $('#id_sub_layanan');
                const $colSubLayanan = $('#col_sub_layanan');

                if (idLayanan) {
                    $.getJSON(`{{ route('getSubLayanan') }}`, {
                        id_layanan: idLayanan
                    }, function(data) {
                        $subLayanan.empty().append('<option value="">Pilih Sub Layanan</option>');
                        if (data.length) {
                            $colSubLayanan.removeClass('d-none');
                            data.forEach(item => {
                                $subLayanan.append(
                                    `<option value="${item.id}" data-harga="${item.harga}">${item.sub_layanan}</option>`
                                );
                            });
                            initializeSelect2('#id_sub_layanan');
                        } else {
                            $colSubLayanan.addClass('d-none');
                        }
                    });
                } else {
                    $colSubLayanan.addClass('d-none');
                    $subLayanan.empty().append('<option value="">Pilih Sub Layanan</option>');
                }
            });

            // Handle currency formatting on input
            $('#total_harga').on('input', function() {
                const value = this.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
                this.value = value ? formatCurrency(value) : '';
            });

            // Update total price and remaining payment on sub-layanan change
            $('#id_sub_layanan').on('change', function() {
                const harga = $(this).find('option:selected').data('harga');
                $('#total_harga').val(harga ? formatCurrency(harga) : '');
                calculateSisaBayar();
            });

            // Handle the change event for payment status
            $('#status_bayar').on('change', function() {
                const isBelumLunas = $(this).val() === '2';
                $('#col_dibayar, #col_sisa_bayar').toggleClass('d-none', !isBelumLunas);
                if (!isBelumLunas) {
                    $('#sisa_bayar').val(0);
                    $('#dibayar').val('');
                }
            });

            // Recalculate remaining payment on dibayar input
            $('#dibayar').on('input', function() {
                const value = this.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
                this.value = value ? formatCurrency(value) : '';
                calculateSisaBayar();
            });

            // Calculate the remaining payment
            function calculateSisaBayar() {
                const totalHarga = parseFloat($('#total_harga').val().replace(/[^\d]/g, '')) || 0;
                const dibayar = parseFloat($('#dibayar').val().replace(/[^\d]/g, '')) || 0;
                $('#sisa_bayar').val(formatCurrency(totalHarga - dibayar));
            }

            // Example formatCurrency function
            function formatCurrency(value) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(value);
            }
        });
    </script>
@endsection
