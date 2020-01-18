<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
               Tambah Artikel  
                </div>
               
                <div class="card-body">
                <?= form_open_multipart('admin/simpan_port');?>
                    <div class="form-group">
                    <label>NAMA SATPEL:</label>
                    <input type="text" name="nama_port" placeholder="Judul" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                       <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="ckeditor" required></textarea>
                    </div>
                    <hr>
                        <button type="reset" class="btn btn-danger  btn-lg">Reset</button>
                        <button name="simpan" class="btn btn-success  btn-lg" >Simpan</button>
                    </div>
                    <?= form_close();?>
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer') ?>