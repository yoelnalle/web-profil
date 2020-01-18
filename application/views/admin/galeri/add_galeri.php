<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
              Tambah Foto Pelabuhan
                </div>
                <div class="card-body">
                <?= form_open_multipart('admin/simpan_galeri');?>
                    <div class="form-group">
                    <label>FOTO</label>
                    <input type="file" name="foto" class="form-control" required>
                    </div>
                      <p class="text-muted">silahkan upload file gambar(png,jpg,jpeg)! ukuran maksimal 10MB</p>

                    <div class="form-group">
                        <label>DESKRIPSI</label>
                        <textarea type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" ></textarea>
                    </div>
             
                    <div class="form-group">
                        <label>PELABUHAN</label>
                        <select name="album" class="form-control">
                        <option value="">--Pilih--</option>
                        <?php foreach ($album as $key){ 
                        echo '<option value="'.$key->id_album.'">'.$key->nama_album.'</option>';
                        }
                        ?>
                        </select>
                    </div>
                     <input type="submit" name="save" class="btn btn-primary" value="Simpan">
                     
                <?= form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>