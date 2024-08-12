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
                            <label class="form-label" for="profesional">Profesional</label>
                            <select required id="profesional" name="profesional" class="form-select select2"
                                data-placeholder="Pilih Profesional">
                                <option></option>
                                <option value="Profesional 1">Profesional 1</option>
                                <option value="Profesional 2">Profesional 2</option>
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
                                <option value="lunas">Lunas</option>
                                <option value="belum_lunas">Belum Lunas</option>
                            </select>
                        </div>
                        <div class="col-md d-none" id="col_dibayar">
                            <label class="form-label" for="dibayar">Dibayar</label>
                            <input id="dibayar" type="number" class="form-control" name="dibayar"
                                placeholder="Masukkan Jumlah Dibayar">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="total_harga">Total Harga</label>
                            <input required id="total_harga" type="number" class="form-control" name="total_harga"
                                placeholder="Masukkan Total Harga">
                        </div>
                        <div class="col-md d-none" id="col_sisa_bayar">
                            <label class="form-label" for="sisa_bayar">Sisa Bayar</label>
                            <input id="sisa_bayar" type="number" class="form-control" name="sisa_bayar"
                                placeholder="Masukkan Sisa Bayar">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="keluhan">Keluhan</label>
                            <textarea required id="keluhan" rows="4" class="form-control" name="keluhan"
                                placeholder="Masukkan Keluhan"></textarea>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="hasil_konsultasi">Hasil Konsultasi</label>
                            <textarea required id="hasil_konsultasi" rows="4" class="form-control" name="hasil_konsultasi"
                                placeholder="Masukkan Hasil Konsultasi"></textarea>
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
            $('#id_layanan').select2({
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });

            $('#id_customer').select2({
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });

            $('#profesional').select2({
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });

            $('#status_bayar').select2({
                theme: "bootstrap-5",
                minimumResultsForSearch: Infinity,
            });

            $('#id_layanan').on('change', function() {
                var idLayanan = $(this).val();
                if (idLayanan) {
                    var url = `{{ route('getSubLayanan') }}`;
                    $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            id_layanan: idLayanan
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.length > 0) {
                                $('#col_sub_layanan').removeClass('d-none');
                                var $subLayanan = $('#id_sub_layanan');
                                $subLayanan.empty();
                                $subLayanan.append($('<option>', {
                                    value: '',
                                    text: 'Pilih Sub Layanan'
                                }));
                                $.each(data, function(index, item) {
                                    $subLayanan.append($('<option>', {
                                        value: item.id,
                                        text: item.sub_layanan,
                                        'data-harga': item.harga
                                    }));
                                });
                                $subLayanan.select2({
                                    theme: "bootstrap-5",
                                    width: '100%'
                                });
                            } else {
                                $('#col_sub_layanan').addClass('d-none');
                                $('#id_sub_layanan').empty().append($('<option>', {
                                    value: '',
                                    text: 'Pilih Sub Layanan'
                                }));
                            }
                        }
                    });
                } else {
                    $('#col_sub_layanan').addClass('d-none');
                    $('#id_sub_layanan').empty().append($('<option>', {
                        value: '',
                        text: 'Pilih Sub Layanan'
                    }));
                }
            });

            $('#id_sub_layanan').on('change', function() {
                var harga = $('#id_sub_layanan option:selected').data('harga');
                $('#total_harga').val(harga);
                calculateSisaBayar();
            });

            $('#status_bayar').on('change', function() {
                var statusBayar = $(this).val();
                if (statusBayar === 'belum_lunas') {
                    $('#col_dibayar').removeClass('d-none');
                    $('#col_sisa_bayar').removeClass('d-none');
                } else {
                    $('#col_dibayar').addClass('d-none');
                    $('#col_sisa_bayar').addClass('d-none');
                    $('#sisa_bayar').val(0);
                }
            });

            $('#dibayar').on('input', function() {
                calculateSisaBayar();
            });

            function calculateSisaBayar() {
                var totalHarga = parseFloat($('#total_harga').val()) || 0;
                var dibayar = parseFloat($('#dibayar').val()) || 0;
                var sisaBayar = totalHarga - dibayar;
                $('#sisa_bayar').val(sisaBayar);
            }
        });
    </script>
@endsection
