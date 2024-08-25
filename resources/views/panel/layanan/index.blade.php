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
        {{-- <div class="card">
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
            </div>
        </div> --}}

        <div class="card">
            <div class="card-body">
                <div class="d-flex gap-2 mb-4">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Tambah Layanan
                    </button>
                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        Edit Layanan
                    </button>
                </div>

                <div class="my-3">
                    <h4>Layanan Aktif</h4>
                    <div class="accordion accordion-flush mt-3 border-bottom" id="accordionFlushExample">
                        @foreach ($layanan as $data)
                            @if ($data->status == 1)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-capitalize" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $data['id'] }}"
                                            aria-expanded="false" aria-controls="flush-collapseOne{{ $data['id'] }}">
                                            {{ $data['layanan'] }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{ $data['id'] }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="d-flex gap-2 py-3">
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addModalSubLayanan{{ $data['id'] }}">
                                                Tambah Sub Layanan
                                            </button>
                                            <form action="{{ route('layanan.destroy', encrypt($data['id'])) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="layanan" value="{{ $data['layanan'] }}">
                                                <button type="submit" class="btn btn-sm btn-danger">Non Aktifkan
                                                    {{ $data['layanan'] }}</button>
                                            </form>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($data->getSubLayanan as $item)
                                                @if ($item->status == 1)
                                                    <li class="list-group-item">
                                                        <span class="d-flex justify-content-between">
                                                            <span class="text-capitalize">
                                                                <i class="bi bi-dot"></i> {{ $item->sub_layanan }} -
                                                                Rp.{{ number_format($item->harga) }}
                                                            </span>
                                                            <div class="d-flex gap-2">
                                                                <button type="button" class="btn btn-sm btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModalSublayanan{{ $item->id }}">
                                                                    Edit Sub Layanan
                                                                </button>
                                                            </div>
                                                        </span>
                                                    </li>
                                                    @include('components.panel.modal.layanan.edit.edit-sublayanan')
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @include('components.panel.modal.layanan.add.add-sublayanan')
                            @endif
                        @endforeach
                    </div>
                </div>
                <hrs>
                <div class="my-3">
                    <h4>Layanan Non Aktif</h4>
                    <div class="accordion accordion-flush mt-3 border-bottom" id="accordionFlushExample">
                        @foreach ($layanan as $data)
                            @if ($data->status == 2)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed text-capitalize" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{ $data['id'] }}" aria-expanded="false"
                                            aria-controls="flush-collapseOne{{ $data['id'] }}">
                                            {{ $data['layanan'] }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{ $data['id'] }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="d-flex gap-2 py-3">
                                            <form action="{{ route('layanan.destroy', encrypt($data['id'])) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="layanan" value="{{ $data['layanan'] }}">
                                                <button type="submit" class="btn btn-sm btn-success">Aktifkan
                                                    {{ $data['layanan'] }}</button>
                                            </form>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            @foreach ($data->getSubLayanan as $item)
                                                @if ($item->status == 2)
                                                    <li class="list-group-item">
                                                        <span class="d-flex justify-content-between">
                                                            <span class="text-capitalize">
                                                                <i class="bi bi-dot"></i> {{ $item->sub_layanan }} -
                                                                Rp.{{ number_format($item->harga) }}
                                                            </span>
                                                            <div class="d-flex gap-2">
                                                                <button type="button" class="btn btn-sm btn-warning"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#editModalSublayanan{{ $item->id }}">
                                                                    Edit Sub Layanan
                                                                </button>
                                                            </div>
                                                        </span>
                                                    </li>
                                                    @include('components.panel.modal.layanan.edit.edit-sublayanan')
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @include('components.panel.modal.layanan.add.add-sublayanan')
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.panel.modal.layanan.add.add-layanan')
    @include('components.panel.modal.layanan.edit.edit-layanan')
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
            const hargaEdit = $('.hargaEdit');

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

            // Format currency function
            function formatCurrency(value) {
                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                });
                return formatter.format(value);
            }

            // Apply formatting on input change
            document.querySelectorAll('.hargaEdit').forEach(input => {
                input.addEventListener('input', function() {
                    // Remove any non-numeric characters
                    let value = this.value.replace(/[^\d]/g, '');
                    if (value) {
                        this.value = formatCurrency(value);
                    }
                });

                // Initial formatting when the page loads
                let initialValue = input.value.replace(/[^\d]/g, '');
                if (initialValue) {
                    input.value = formatCurrency(initialValue);
                }
            });

        });
    </script>
@endsection
