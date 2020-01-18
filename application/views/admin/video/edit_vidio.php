<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
              Edit Video  
                </div>
               
                <div class="card-body">
               <?= form_open('admin/update_vid/'.$vidio->id_vidio); ?>
               <input type="hidden" name="id_vidio" value="<?php echo $vidio->id_vidio ?>">
                    <div class="form-group">
                    	<label>JUDUL :</label>
                    	<input type="text" name="judul" placeholder="judul video" required class="form-control" value="<?= $vidio->judul ?>">
                    </div>
                    <div class="form-group">
                    	<label>LINK :</label>
                    	<input type="text" name="link" placeholder="Link Youtube" required class="form-control" value="<?= $vidio->link ?>">
                    </div>
                        <p><small>Cara tambah Link:</small></p>
                        <p><small>1. Buka Youtube di browser anda</small></p>
                        <p><small>2. Buka video yang anda ingin bagikan</small></p>
                        <p><small>3. Pilih Share/Bagikan</small></p>
                        <p><small>4. Lalu pilih Embed/sematkan</small></p>
                        <p><small>5. Perhatikan link src. Contohnya: <em> src="https://www.youtube.com/embed/9YffrCViTVk"</em></small></p>
                        <p><small>6. Copy/salin link di dalam src(tanpa tanda petik). Contohnya:<em> https://www.youtube.com/embed/9YffrCViTVk</em></small></p>
                        <p><small>7. Lalu paste pada kolom link di atas.</small></p>

                    <hr>
                 <input type="submit" name="update" id="update" class="btn btn-primary" value="update">
                 <a href="<?php echo base_url('index.php')?>/admin/video" class="btn btn-danger">Cancel</a>
                    <?= form_close();?>
                </div>
               
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer') ?>