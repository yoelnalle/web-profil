<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
              Tambah Pelabuhan
                </div>
                <div class="card-body">
                <?= form_open_multipart('admin/simpan_album');?>
                    <div class="form-group">
                    <label>Tambah Pelabuhan</label>
                    <input type="file" name="foto" class="form-control" required>
                    </div>
                      <p class="text-muted">silahkan upload file gambar(png,jpg,jpeg)! ukuran maksimal 10MB</p>

                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="text" name="nama" placeholder="Nama album" required class="form-control">
                    </div>
                     <input type="submit" name="save" class="btn btn-primary" value="Simpan">
                     
                <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>