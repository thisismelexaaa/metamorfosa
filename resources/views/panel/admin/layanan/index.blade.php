@extends('panel.layouts.app')

@section('title')
    Layanan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>{{ __('Layanan') }}</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="home-item" href="index.html">
                                <i class="bi bi-house-door-fill"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Layanan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Data
                    </button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                        Edit Data
                    </button>
                </div>
                <div class="accordion accordion-flush mt-3 border-bottom" id="accordionFlushExample">
                    @foreach ($layanan as $data)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne{{ $data['id'] }}" aria-expanded="false"
                                    aria-controls="flush-collapseOne{{ $data['id'] }}">
                                    {{ $data['layanan'] }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{ $data['id'] }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <ul class="list-group list-group-flush">
                                    @foreach ($data['sub_layanan'] as $item)
                                        <li class="list-group-item">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Tambah Data Layanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('layanan.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row gy-2">
                            <div class="col-md-12">
                                <label for="layanan" class="form-label">Layanan</label>
                                <input type="text" class="form-control" id="layanan" name="layanan"
                                    placeholder="Masukkan Nama Layanan" />
                            </div>
                            <div class="col-md-12">
                                <label for="sub_layanan" class="form-label">Sub Layanan</label>
                                <textarea type="text" class="form-control" id="sub_layanan" name="sub_layanan" placeholder="Masukkan Sub Layanan"></textarea>
                            </div>
                            <p>Pisahkan dengan koma untuk menambahkan lebih dari satu sub layanan, contoh: sub layanan 1,
                                sub layanan 2</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Edit Data Layanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row gy-2">
                            <div class="col-md-12">
                                <label for="layanan" class="form-label">Layanan Yang Ingin Di Ubah</label>
                                <Select id="getLayanan" class="form-select select2"
                                    data-placeholder="Pilih Layanan Yang Ingin Di Ubah">
                                    <option></option>
                                    @foreach ($layanan as $data)
                                        <option value="{{ $data['id'] }}">{{ $data['layanan'] }}</option>
                                    @endforeach
                                </Select>
                            </div>
                        </div>

                        <div class="row gy-2 my-2 d-none" id="rowEdit">
                            <div class="col-md-12">
                                <label for="layanan" class="form-label">Layanan</label>
                                <input type="text" class="form-control" id="layananEdit" name="layanan"
                                    placeholder="Masukkan Nama Layanan" />
                            </div>
                            <div class="col-md-12">
                                <label for="sub_layanan" class="form-label">Sub Layanan</label>
                                <textarea type="text" class="form-control" id="sub_layananEdit" name="sub_layanan"
                                    placeholder="Masukkan Sub Layanan"></textarea>
                            </div>
                            <p>Pisahkan dengan koma untuk menambahkan lebih dari satu sub layanan, contoh: sub layanan 1,
                                sub layanan 2</p>
                        </div>
                    </div>
                    <div class="modal-footer d-none">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const $select2Elements = $('.select2');
            const $editModal = $('#editModal');
            const $getLayanan = $('#getLayanan');
            const $rowEdit = $('#rowEdit');
            const $layanan = $('#layananEdit');
            const $subLayanan = $('#sub_layananEdit');
            const $form = $editModal.find('form');
            const $modalFooter = $editModal.find('.modal-footer');

            $select2Elements.select2({
                dropdownParent: $editModal
            });

            $getLayanan.on('change', function() {
                const id = $(this).val();
                const url = `{{ url('panel/admin/layanan/${id}/edit') }}`;
                const update = `{{ route('layanan.update', ':id') }}`.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $rowEdit.removeClass('d-none');
                            $layanan.val(data.layanan);
                            $subLayanan.val(data.sub_layanan);
                            $modalFooter.removeClass('d-none');
                            $form.attr('action', update);
                            $form.attr('method', 'POST');

                            // jika klik di luar modal
                            $editModal.on('hidden.bs.modal', function() {
                                $rowEdit.addClass('d-none');
                                $modalFooter.addClass('d-none');
                                $form.attr('action', '');
                                $form.attr('method', '');
                            });
                        } else {
                            alert('Data Tidak Ada');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(`Error: ${status}, ${error}`, url, xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
