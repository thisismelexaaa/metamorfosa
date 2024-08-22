@extends('panel.layouts.app')

@section('title')
    Edit Data Konsultasi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Edit Data Konsultasi') }}</h3>
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
                        <li class="breadcrumb-item active">Edit Data Konsultasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card overflow-hidden p-5 shadow-sm">

            {{-- @dd($konsultasi->id) --}}
            <form method="POST" action="{{ route('konsultasi.update', encrypt($id)) }}">
                @csrf
                @method('PUT')
                {{-- Data Konsultasi --}}
                <div class="row mb-2">
                    <h3>Data Konsultasi</h3>
                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="id_customer">Customer</label>
                            <select required id="id_customer" name="id_customer" class="form-select select2"
                                data-placeholder="Pilih Customer">
                                @php
                                    $selectedCustomerId = $konsultasi->id_customer;
                                @endphp

                                @foreach ($customers as $customer)
                                    @if ($customer->id != $selectedCustomerId)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @else
                                        <option selected value="{{ $selectedCustomerId }}">
                                            {{ $konsultasi->customer->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="id_layanan">Layanan</label>
                            <select required id="id_layanan" name="id_layanan" class="form-select select2"
                                data-placeholder="Pilih Layanan">
                                @php
                                    $selectedLayananId = $konsultasi->id_layanan;
                                @endphp
                                @foreach ($layanan as $item)
                                    @if ($item->id != $selectedLayananId)
                                        <option value="{{ $item->id }}">{{ $item->layanan }}</option>
                                    @else
                                        <option selected value="{{ $selectedLayananId }}">
                                            {{ $konsultasi->layanan->layanan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md" id="col_sub_layanan">
                            <label class="form-label" for="id_sub_layanan">Sub Layanan</label>
                            <select required id="id_sub_layanan" name="id_sub_layanan" class="form-select select2"
                                data-placeholder="Pilih Sub Layanan">
                                @php
                                    $selectedSubLayananId = $konsultasi->id_sub_layanan;
                                @endphp
                                @foreach ($konsultasi->subLayanan->getLayanan->getSubLayanan as $item)
                                    @if ($item->id != $selectedSubLayananId)
                                        <option value="{{ $item->id }}">{{ $item->sub_layanan }}</option>
                                    @else
                                        <option selected value="{{ $selectedSubLayananId }}">
                                            {{ $konsultasi->subLayanan->sub_layanan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="id_support_teacher">Support Teacher</label>
                            <select required id="id_support_teacher" name="id_support_teacher" class="form-select select2"
                                data-placeholder="Pilih Support Teacher">
                                @php
                                    $selectedSupportTeacherId = $konsultasi->supportTeacher->id;
                                @endphp

                                @foreach ($support_teacher as $teacher)
                                    @if ($teacher->id != $selectedSupportTeacherId)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @else
                                        <option selected value="{{ $selectedSupportTeacherId }}">
                                            {{ $konsultasi->supportTeacher->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input required id="tgl_masuk" type="date" class="form-control" name="tgl_masuk"
                                placeholder="Masukkan Tanggal Masuk" value="{{ $konsultasi->tgl_masuk }}">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_selesai">Tanggal Selesai</label>
                            <input id="tgl_selesai" type="date" class="form-control" name="tgl_selesai"
                                placeholder="Masukkan Tanggal Selesai" value="{{ $konsultasi->tgl_selesai }}">
                        </div>
                    </div>

                    {{-- <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="status_bayar">Status Pembayaran</label>
                            <select required id="status_bayar" name="status_bayar" class="form-select select2"
                                data-placeholder="Pilih Status Pembayaran">
                                @php
                                    $options = [
                                        1 => 'Lunas',
                                        2 => 'Belum Lunas',
                                    ];
                                @endphp

                                @foreach ($options as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ $konsultasi->status_bayar == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md d-none" id="col_dibayar">
                            <label class="form-label" for="dibayar">Dibayar</label>
                            <input id="dibayar" type="text" class="form-control currency" name="dibayar"
                                placeholder="Masukkan Jumlah Dibayar" value="{{ $konsultasi->dibayar }}">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="total_harga">Total Harga</label>
                            <input required id="total_harga" type="text" class="form-control currency"
                                name="total_harga" placeholder="Total Harga" readonly
                                value="{{ $konsultasi->total_harga }}">
                        </div>
                        <div class="col-md d-none" id="col_sisa_bayar">
                            <label class="form-label" for="sisa_bayar">Sisa Bayar</label>
                            <input id="sisa_bayar" type="text" class="form-control currency" name="sisa_bayar"
                                placeholder="Sisa Bayar" readonly value="{{ $konsultasi->sisa_bayar }}">
                        </div>
                    </div> --}}

                    <div class="row mb-2">
                        <div class="col-md">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="keluhan">Keluhan</label>
                                <div class="d-flex gap-2">
                                    <label class="form-check-label" for="rubahKeluhan">
                                        Rubah Keluhan
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="rubahKeluhan">
                                </div>
                            </div>
                            <textarea required id="keluhan" rows="4" class="form-control" name="keluhan" placeholder="Masukkan Keluhan"
                                readonly> {{ $konsultasi->keluhan }}</textarea>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="hasil_konsultasi">Hasil Konsultasi</label>
                            <textarea required id="hasil_konsultasi" rows="4" class="form-control" name="hasil_konsultasi"
                                placeholder="Masukkan Hasil Konsultasi">{{ $konsultasi->hasil_konsultasi }}</textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
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
                rubahKeluhan: '#rubahKeluhan',
                keluhan: '#keluhan',
            };

            const CLASSES = {
                dNone: 'd-none',
                bootstrapTheme: 'bootstrap-5'
            };

            // Initialize select2 elements with common options
            [SELECTORS.layanan, SELECTORS.customer, SELECTORS.supportTeacher, SELECTORS
                .subLayanan
            ].forEach(
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

            $(SELECTORS.rubahKeluhan).on('change', function() {
                if ($(this).is(':checked')) {
                    $(SELECTORS.keluhan).removeAttr('readonly');
                } else {
                    $(SELECTORS.keluhan).attr('readonly', 'readonly');
                }
            })
        });
    </script>
@endsection
