<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
               Tambah Artikel  
                </div>
               
                <div class="card-body">
                <?= form_open_multipart('admin/simpan_art');?>
                    <div class="form-group">
                    <label>judul artikel:</label>
                    <input type="text" name="judul" placeholder="judul artikel" required class="form-control">
                    </div>
                    <!-- <div class="alert alert-success">
								<strong>Perhatian!</strong> slug tidak bloeh diakhiri
					</div> -->
                    <div class="form-group">
                        <label>slug:</label>
                        <input type="text" name="slug" placeholder="slug" required class="form-control">
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                            <label>kategori</label>
                            <select name="id_kategori" class="form-control">
                            <option value="">-pilih-</option>
                            <?php foreach ($kategori as $key){ 
                            echo '<option value="'.$key->id_kategori.'">'.$key->nama.'</option>';
                            }
                            ?>
                            
                            </select>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                            <label> Tag</label>
                            <input type="text" name="tag" required placeholder="tag" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                       <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>artikel</label>
                        <textarea name="artikel" id="ckeditor"></textarea>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col md-4">
                        <button type="reset" class="btn btn-danger btn-block btn-lg">Reset</button>
                        </div>
                        <div class="col md-4">
                        <button name="0" class="btn btn-warning btn-block btn-lg" >Draft</button>
                        </div>
                        <div class="col md-4">
                        <button name="1" class="btn btn-success btn-block btn-lg" >Publish</button>
                        </div>
                    </div>
                    <?= form_close();?>
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer') ?>