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
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Layanan
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        Edit Layanan
                    </button>
                </div>
                <div class="accordion accordion-flush mt-3 border-bottom" id="accordionFlushExample">
                    @foreach ($layanan as $data)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-bold text-capitalize" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $data['id'] }}"
                                    aria-expanded="false" aria-controls="flush-collapseOne{{ $data['id'] }}">
                                    {{ $data['layanan'] }}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{ $data['id'] }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="d-flex gap-2 py-3 justify-items-end">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addModalSubLayanan{{ $data['id'] }}">
                                        Tambah Sub Layanan
                                    </button>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach ($data->getSubLayanan as $item)
                                        <li class="list-group-item">
                                            <span class="d-flex justify-content-between">
                                                <span>
                                                    <i class="bi bi-dot"></i> {{ $item->sub_layanan }}
                                                </span>
                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editModalSublayanan{{ $item->id }}">
                                                    Edit Sub Layanan
                                                </button>
                                            </span>
                                        </li>

                                        <div class="modal fade" id="editModalSublayanan{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="addModalLabel">Edit Sub Layanan
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('layanan.update', $item['id']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="id_sublayanan" id="id_sublayanan"
                                                            value="{{ $item['id'] }}" hidden>
                                                        <input type="text" name="layanan" value="{{ $data['layanan'] }}" hidden>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="layanan" class="form-label">Sub
                                                                        Layanan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="sublayananEdit" name="sub_layanan"
                                                                        placeholder="Masukkan Nama Sub Layanan"
                                                                        value="{{ $item['sub_layanan'] }}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="modal fade" id="addModalSubLayanan{{ $data['id'] }}" tabindex="-1"
                            aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="addModalLabel">Tambah Sub Layanan
                                            {{ $data['layanan'] }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('layanan.store') }}" method="post">
                                        @csrf
                                        <input type="text" name="id_layanan" value="{{ $data['id'] }}" hidden>
                                        <input type="text" name="layanan" value="{{ $data['layanan'] }}" hidden>
                                        <div class="modal-body">
                                            <div class="row gy-2">
                                                <div class="col-md-12">
                                                    <label for="layanan" class="form-label">Sub Layanan</label>
                                                    <input type="text" class="form-control" id="layanan"
                                                        name="sub_layanan" placeholder="Masukkan Nama Sub Layanan" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
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
