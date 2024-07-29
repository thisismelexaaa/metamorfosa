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
