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
                        <div class="col-md">
                            <label class="form-label" for="jam_mulai">Mulai Sesi</label>
                            <div class="d-flex gap-3">
                                <input required id="jam_mulai" type="time" class="form-control" name="jam_mulai"
                                    placeholder="Masukkan Tanggal Masuk">
                                <span class="my-auto">s/d</span>
                                <input required id="jam_selesai" type="time" class="form-control" name="jam_selesai"
                                    placeholder="Masukkan Tanggal Masuk">
                            </div>
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
            // Constants for selectors and classes
            const SELECTORS = {
                layanan: '#id_layanan',
                subLayanan: '#id_sub_layanan',
                colSubLayanan: '#col_sub_layanan',
                customer: '#id_customer',
                supportTeacher: '#id_support_teacher',
                statusBayar: '#status_bayar',
                totalHarga: '#total_harga',
                dibayar: '#dibayar',
                sisaBayar: '#sisa_bayar',
                colDibayar: '#col_dibayar',
                colSisaBayar: '#col_sisa_bayar',
                rubahKeluhan: '#rubahKeluhan',
            };

            const CLASSES = {
                dNone: 'd-none',
                bootstrapTheme: 'bootstrap-5'
            };

            // Initialize select2 elements with common options
            [SELECTORS.layanan, SELECTORS.customer, SELECTORS.supportTeacher, SELECTORS.statusBayar].forEach(
                initializeSelect2);

            function initializeSelect2(selector) {
                const options = {
                    theme: CLASSES.bootstrapTheme
                };
                if (selector !== SELECTORS.supportTeacher) {
                    options.minimumResultsForSearch = Infinity;
                }
                $(selector).select2(options);
            }

            // Handle the change event for 'id_layanan'
            $(SELECTORS.layanan).on('change', function() {
                const idLayanan = $(this).val();
                const $subLayanan = $(SELECTORS.subLayanan);
                const $colSubLayanan = $(SELECTORS.colSubLayanan);

                if (idLayanan) {
                    $colSubLayanan.removeClass(CLASSES.dNone);
                    swal.fire({
                        icon: 'success',
                        title: 'Sub Layanan Ditemukan',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        timer: 1500,
                    }).then(() => {
                        $.getJSON(`{{ route('getSubLayanan') }}`, {
                            id_layanan: idLayanan
                        }, function(data) {
                            $subLayanan.empty().append(
                                '<option value="">Pilih Sub Layanan</option>');
                            if (data.length) {
                                data.forEach(item => {
                                    $subLayanan.append(
                                        `<option value="${item.id}" data-harga="${item.harga}">${item.sub_layanan}</option>`
                                    );
                                });
                                initializeSelect2(SELECTORS.subLayanan);
                            }
                        });
                    })
                } else {
                    $colSubLayanan.addClass(CLASSES.dNone);
                    $subLayanan.empty().append('<option value="">Pilih Sub Layanan</option>');
                }
            });

            // Handle currency formatting on input
            $(SELECTORS.totalHarga).on('input', handleCurrencyInput);
            $(SELECTORS.dibayar).on('input', handleCurrencyInput);

            function handleCurrencyInput() {
                const value = this.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
                this.value = value ? formatCurrency(value) : '';
                calculateSisaBayar();
            }

            // Update total price and remaining payment on sub-layanan change
            $(SELECTORS.subLayanan).on('change', function() {
                const harga = $(this).find('option:selected').data('harga');
                $(SELECTORS.totalHarga).val(harga ? formatCurrency(harga) : '');
                calculateSisaBayar();
            });

            // Handle the change event for payment status
            $(SELECTORS.statusBayar).on('change', togglePaymentFields);

            function togglePaymentFields() {
                const isBelumLunas = $(this).val() === '2';
                $(SELECTORS.colDibayar + ', ' + SELECTORS.colSisaBayar).toggleClass(CLASSES.dNone, !isBelumLunas);
                if (!isBelumLunas) {
                    $(SELECTORS.sisaBayar).val(0);
                    $(SELECTORS.dibayar).val('');
                }
            }

            // Initial toggle based on status
            if ($(SELECTORS.statusBayar).val() === '1') {
                togglePaymentFields();
            }

            // Calculate the remaining payment
            function calculateSisaBayar() {
                const totalHarga = parseFloat($(SELECTORS.totalHarga).val().replace(/[^\d]/g, '')) || 0;
                const dibayar = parseFloat($(SELECTORS.dibayar).val().replace(/[^\d]/g, '')) || 0;
                $(SELECTORS.sisaBayar).val(formatCurrency(totalHarga - dibayar));
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
