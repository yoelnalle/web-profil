<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
               tambah profil 
                </div>
               
                <div class="card-body">
                <?= form_open_multipart('admin/save_all');?>
                    <div class="form-group">
                    <label>judul artikel:</label>
                    <input type="text" name="judul" placeholder="Judul" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>foto</label>
                       <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="ckeditor" ></textarea>
                    </div>
                    <div class="form-group">
                    <label>menu</label>
                    <select name="id_submenu" class="form-control" id="menu"> 
                        <option value="">-pilih-</option>
                        <?php foreach ($data->result() as $row ):?>
                            <option value="<?= $row->id_menu; ?>">
                                <?= $row->menu; ?>
                            </option>       
                        <?php endforeach; ?>       
                    </select>
                    </div>
                    <div class="form-group">
                    <label>sub menu</label> 
                        <select name="id_submenu" class="form-control" id="submenu">
                        <option value="0">-pilih-</option>
                        </select>      
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
<script src="<?php echo base_url('assets/assets2/js/jquery.min.js') ?>" type="text/javascript"></script>
  
  <script>
  $(document).ready(function(){ 

    $("#menu").change(function(){ 
      $("#submenu").hide();   
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("index.php/admin/submenu"); ?>",
        data: {id : $("#menu").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
       
          $("#submenu").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>
<?php $this->load->view('admin/footer') ?>
