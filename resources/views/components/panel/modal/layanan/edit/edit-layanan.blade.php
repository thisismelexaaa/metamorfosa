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
