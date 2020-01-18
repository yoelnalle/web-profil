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
                    <input type="text" name="judul" placeholder="Judul" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                            <label>menu</label>
                            <select name="id_menu" class="form-control " id="menu"> 
                                <option value="">--pilih menu--</option>
                                <?php foreach ($menu->result() as $row ):?>
                                    <option value="<?= $row->id_menu; ?>">
                                        <?= $row->menu; ?>
                                    </option>       
                                <?php endforeach; ?>        
                            </select>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                            <label>sub menu</label>
                                <select name="id_submenu" class="form-control" id="submenu">
                                <option value="">-pilih-</option>
                                </select>      
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>foto</label>
                       <input type="file" name="foto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" id="ckeditor" ></textarea>
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
  <script type="text/javascript">
        $(document).ready(function(){
 
            $('#menu').change(function(){ 
                $("#submenu").hide();
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('admin/get_sub_menu');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_submenu+'>'+data[i].submenu+'</option>';
                        }
                        $('#submenu').html(html).show();
                    }
                });
                return false;
            }); 
             
        });
    </script>
<?php $this->load->view('admin/footer') ?>
