@extends('panel.layouts.app')

@section('title')
    Edit Data Pelanggan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Edit Data Pelanggan') }}</h3>
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
                        <li class="breadcrumb-item active">Edit Data Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card overflow-hidden p-5">
            <form action="{{ route('customers.update', encrypt($data->id)) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- data diri --}}
                <div class="row">
                    <h3>Data Diri Customer</h3>
                    <div class="row mb-2">
                        <div class="col-md">
                            <label class="form-label" for="nama">Nama Lengkap</label>
                            <input required id="nama" type="text" class="form-control" name="name"
                                placeholder="Masukkan Nama Lengkap Pelanggan" value="{{ old('name', $data->name) }}">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="no_tlp">Nomor Telepon</label>
                            <input required id="no_tlp" type="number" class="form-control" name="no_tlp"
                                placeholder="Masukkan Nomor Telepon" value="{{ old('no_tlp', $data->no_tlp) }}">
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select required class="form-select select2" id="jenis_kelamin" name="jenis_kelamin"
                                data-placeholder="Pilih Jenis Kelamin">
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md">
                            <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                            <input required id="tgl_lahir" type="date" class="form-control" name="tgl_lahir"
                                placeholder="Masukkan Tanggal Lahir" value="{{ old('tgl_lahir', $data->tgl_lahir) }}">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea required id="alamat" rows="4" class="form-control" name="alamat" placeholder="Masukkan Alamat">{{ old('alamat', $data->alamat) }}</textarea>
                        </div>
                        <div class="col-md row">
                            <div class="col-md-6">
                                <label class="form-label" for="nama_ayah">Nama Ayah</label>
                                <input required id="nama_ayah" type="text" class="form-control" name="nama_ayah"
                                    placeholder="Masukkan Nama Ayah" value="{{ old('nama_ayah', $data->nama_ayah) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input required id="pekerjaan_ayah" type="text" class="form-control"
                                    name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah"
                                    value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="nama_ibu">Nama Ibu</label>
                                <input required id="nama_ibu" type="text" class="form-control" name="nama_ibu"
                                    placeholder="Masukkan Nama Ibu" value="{{ old('nama_ibu', $data->nama_ibu) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input required id="pekerjaan_ibu" type="text" class="form-control" name="pekerjaan_ibu"
                                    placeholder="Masukkan Pekerjaan Ibu"
                                    value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu) }}">
                            </div>
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
            const $subLayanan = $('#sub_layanan');

            $layanan.on('change', function() {
                const id = $(this).val();
                if (id) {
                    const url = `{{ route('customer.getLayananById', ':id') }}`.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data.sub_layanan.length > 0) {
                                $('#col_sub_layanan').removeClass('d-none');
                                $subLayanan.empty(); // Clear previous options

                                // Add placeholder option
                                $subLayanan.append(
                                    $('<option>', {
                                        value: '',
                                        text: 'Pilih Sub Layanan'
                                    })
                                );

                                data.sub_layanan.forEach(element => {
                                    $subLayanan.append(
                                        $('<option>', {
                                            value: element
                                                .id, // Assuming `id` is the value for options
                                            text: element
                                                .sub_layanan // Assuming `sub_layanan` is the display text
                                        })
                                    );
                                });

                                $subLayanan.select2({
                                    placeholder: 'Pilih Sub Layanan',
                                    theme: "bootstrap-5",
                                    width: '100%'
                                });
                            } else {
                                $('#col_sub_layanan').addClass('d-none');
                                alert('Tidak ada sub layanan yang tersedia untuk layanan ini.');
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
                if (status === '2') {
                    $('#col_uang_bayar').show();
                } else {
                    $('#col_uang_bayar').hide();
                }
            });
        });
    </script>
@endsection
