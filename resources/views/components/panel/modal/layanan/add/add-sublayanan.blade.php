<div class="modal fade" id="addModalSubLayanan{{ $data['id'] }}" tabindex="-1" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Tambah Sub Layanan
                    {{ $data['layanan'] }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('layanan.store') }}" method="post">
                @csrf
                <input type="text" name="id_layanan" value="{{ $data['id'] }}" hidden>
                <input type="text" name="layanan" value="{{ $data['layanan'] }}" hidden>
                <div class="modal-body">
                    <div class="row gy-2">
                        <div class="col-md-12">
                            <label for="layanan" class="form-label">Sub Layanan</label>
                            <input type="text" class="form-control" id="layanan" name="sub_layanan"
                                placeholder="Masukkan Nama Sub Layanan" />
                        </div>
                        <div class="col-md-12">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" inputmode="numeric" class="form-control hargaEdit" id="harga" name="harga"
                                placeholder="Masukkan Harga" />
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
