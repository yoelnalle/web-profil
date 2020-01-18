<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
               Edit Artikel  
                </div>
                <div class="card-body">
                  <?= form_open_multipart('admin/update_port/'.$port->id_pel);?>
                        <div class="form-group">
                                    <label>Judul:</label>
                                    <input type="text" name="nama_port" placeholder="Masukan Judul" required class="form-control" value="<?= $port->nama_pel?>">
                                    </div>
                                   

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5>Foto Sekarang</h5>
                                            <input type="hidden" name="foto_now" value="<?= $port->foto?>">
                                        <img src="<?php echo base_url('/assets/assets2/img/'.$port->foto)?>" class="img-fluid">
                                        </div>
                                        <div class="col-md-9">
                                        <div class="alert alert-danger">
                                        <strong>Perhatian!</strong> jika gambar tidak ingin di ubah, jangan isi bagian ini
                                        </div>
                                            <div class="form-group">
                                            <label>Foto</label>
                                             <input type="file" name="foto" class="form-control" value="<?= $port->foto?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi:</label>
                                        <textarea name="deskripsi" id="ckeditor" ><?= $port->deskripsi?></textarea>
                                    </div>

                                    <hr>
                                    <div class="card-footer">
                                        <button type="reset" class="btn btn-danger  btn-lg">Reset</button>
                                        <button class="btn btn-warning  btn-lg" >Update</button>
                                    </div>
                    <?php form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>
                
<?php $this->load->view('admin/footer') ?>