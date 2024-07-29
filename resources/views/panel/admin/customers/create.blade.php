@extends('panel.layouts.app')

@section('title')
    Tambah Data Pelanggan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Tambah Data Pelanggan') }}</h3>
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
                        <li class="breadcrumb-item active">Tambah Data Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card overflow-hidden p-5">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                {{-- data diri --}}
                <div class="row">
                    <h3>Data Diri Customer</h3>
                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input required id="nama" type="text" class="form-control" name="name"
                                placeholder="Masukkan Nama Lengkap Pelanggan">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="no_tlp">Nomor Telepon</label>
                            <input required id="no_tlp" type="text" class="form-control" name="no_tlp"
                                placeholder="Masukkan Nomor Telepon">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select required class="form-select select2" id="jenis_kelamin" name="jenis_kelamin"
                                data-placeholder="Pilih Jenis Kelamin">
                                <option></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                            <input required id="tgl_lahir" type="date" class="form-control" name="tgl_lahir"
                                placeholder="Masukkan Tanggal Lahir">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea required id="alamat" type="text" rows="4" class="form-control" name="alamat"
                                placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="col-md row">
                            <div class="col-md-6">
                                <label class="form-label" for="nama_ayah">Nama Ayah</label>
                                <input required id="nama_ayah" type="text" class="form-control" name="nama_ayah"
                                    placeholder="Masukkan Nama Bapak">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input required id="pekerjaan_ayah" type="text" class="form-control"
                                    name="pekerjaan_ayah" placeholder="Masukkan Nama Ibu">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nama_ibu">Nama Ibu</label>
                                <input required id="nama_ibu" type="text" class="form-control" name="nama_ibu"
                                    placeholder="Masukkan Nama Bapak">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pekerjaan_ibu">Pekerjan Ibu</label>
                                <input required id="pekerjaan_ibu" type="text" class="form-control" name="pekerjaan_ibu"
                                    placeholder="Masukkan Nama Ibu">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                {{-- layanan --}}
                <div class="row">
                    <h3>Data Layanan</h3>
                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="layanan">Layanan</label>
                            <select required class="form-select select2" id="layanan" name="layanan"
                                data-placeholder="Pilih Jenis Layanan">
                                <option></option>
                                @foreach ($layanan as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['layanan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md d-none" id="col_sub_layanan">
                            <label class="form-label" for="sub_layanan">Sub Layanan</label>
                            <select required class="form-select select2" id="sub_layanan" name="sub_layanan"
                                data-placeholder="Pilih Jenis Sub Layanan">
                                <option></option>
                                @foreach ($layanan as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['layanan'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="support_teacher">Support Teacher</label>
                            <select required class="form-select text-capitalize select2" id="support_teacher"
                                name="support_teacher" data-placeholder="Pilih Support Teacher">
                                <option></option>
                                <option value="support_teacher 1">Profesional 1</option>
                                <option value="support_teacher 2">Profesional 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                            <input required id="tgl_masuk" type="date" class="form-control" name="tgl_masuk"
                                placeholder="Masukkan Tanggal Masuk">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_selesai">Tanggal Selesai</label>
                            <input required id="tgl_selesai" type="date" class="form-control" name="tgl_selesai"
                                placeholder="Masukkan Tanggal Masuk">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="status">Status Pembayaran</label>
                            <select name="status" id="status" class="select2 form-select"
                                data-placeholder="Pilih Status Pembayaran">
                                <option></option>
                                <option value="1">Lunas</option>
                                <option value="2" id="belum_lunas">Belum Lunas</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6" id="col_uang_bayar">
                            <label class="form-label" for="uang_bayar">Uang Pembayaran</label>
                            <input id="uang_bayar" type="number" class="form-control" name="uang_bayar"
                                placeholder="Masukkan Uang Bayar">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="keluhan">Keluhan</label>
                            <textarea required id="keluhan" type="text" rows="4" class="form-control" name="keluhan"
                                placeholder="Masukkan Keluhan"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#col_uang_bayar').hide();

            // Select2 initialization
            const select2Ids = ['support_teacher', 'layanan', 'jenis_kelamin', 'status'];
            select2Ids.forEach(element => {
                const $element = $('#' + element);
                $element.select2({
                    placeholder: $element.data('placeholder') || `Pilih ${element}`,
                    theme: "bootstrap-5",
                    width: $element.data('width') || ($element.hasClass('w-100') ? '100%' :
                        'style'),
                    minimumResultsForSearch: (element !== 'support_teacher' && element !==
                        'layanan') ? Infinity : 0,
                });
            });

            // Handling the change event for the 'layanan' select element
            const $layanan = $('#layanan');

            $layanan.on('change', function() {
                const id = $(this).val();
                if (id) {
                    const url = `{{ route('customer.getLayananById', ':id') }}`.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                $('#col_sub_layanan').removeClass('d-none');
                                const subLayanan = $('#sub_layanan');
                                subLayanan.empty(); // Clear previous options

                                data.sub_layanan.forEach(element => {
                                    subLayanan.append(
                                        $('<option>', {
                                            value: element
                                                .id, // Assuming `id` is the value for options
                                            text: element.name
                                        })
                                    );
                                });

                                subLayanan.select2({
                                    theme: "bootstrap-5",
                                    width: subLayanan.data('width') || (subLayanan
                                        .hasClass('w-100') ? '100%' : 'style'),
                                    data: data.sub_layanan
                                });
                            } else {
                                $('#col_sub_layanan').addClass('d-none');
                                alert('Data Tidak Ada');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(`Error: ${status}, ${error}`, 'URL:', url,
                                'Response:', xhr.responseText);
                        }
                    });
                }
            });

            $('#status').on('change', function() {
                const status = $(this).val();
                if (status === 'Belum Lunas') {
                    $('#col_uang_bayar').show();
                } else {
                    $('#col_uang_bayar').hide();
                }
            })
        });
    </script>
@endsection
