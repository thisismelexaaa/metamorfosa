<div class="modal fade" id="editModalSublayanan{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Edit Sub Layanan
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('layanan.update', encrypt($item['id'])) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="id_sublayanan" id="id_sublayanan" value="{{ encrypt($item['id']) }}" hidden>
                <input type="text" name="layanan" value="{{ $data['layanan'] }}" hidden>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="layanan" class="form-label">Sub
                                Layanan</label>
                            <input type="text" class="form-control" id="sublayananEdit" name="sub_layanan"
                                placeholder="Masukkan Nama Sub Layanan" value="{{ $item['sub_layanan'] }}" />
                        </div>
                        <div class="col-md-12">
                            <label for="layanan" class="form-label">Harga</label>
                            <input type="text" class="form-control hargaEdit" id="hargaEdit" name="harga"
                                placeholder="Masukkan Nama Sub Layanan" value="{{ $item['harga'] }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
