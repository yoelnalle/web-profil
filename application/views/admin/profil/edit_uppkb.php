<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
               Edit Artikel  
                </div>
                <div class="card-body">
                  <?= form_open_multipart('admin/update_uppkb/'.$profil->id_profil);?>
                        <div class="form-group">
                                    <label>Judul:</label>
                                    <input type="text" name="judul" placeholder="Masukan Judul" required class="form-control" value="<?=$deskripsi?>">
                                    </div>
                                   

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5>Foto Sekarang</h5>
                                            <input type="hidden" name="foto_now" value="<?= $profil->foto?>">
                                        <img src="<?php echo base_url('/assets/assets2/img/'.$profil->foto)?>" class="img-fluid">
                                        </div>
                                        <div class="col-md-9">
                                        <div class="alert alert-danger">
                                        <strong>Perhatian!</strong> jika gambar tidak ingin di ubah, jangan isi bagian ini
                                        </div>
                                            <div class="form-group">
                                            <label>Foto</label>
                                             <input type="file" name="foto" class="form-control" value="<?= $profil->foto?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi:</label>
                                        <textarea name="deskripsi" id="ckeditor" ><?= $profil->deskripsi?></textarea>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col md-4">
                                        <button type="reset" class="btn btn-danger  btn-lg">Reset</button>
                                        </div>
            
                                        <div class="col md-4">
                                        <button class="btn btn-warning  btn-lg" >Update</button>
                                        </div>
                                    </div>
                    <?php form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
                
<?php $this->load->view('admin/footer') ?>