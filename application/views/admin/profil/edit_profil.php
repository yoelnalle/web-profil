<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
               Edit Artikel  
                </div>
                <div class="card-body">
                <form action="<?php echo site_url('admin/update_profil/'.$all->id_profil);?>" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul:</label>
                        <input type="text" class="form-control" name="judul" placeholder="Masukan Judul" required>
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <div class="form-group">
                            <label>menu</label>
                            <select  class="form-control menu" name="menu" id="menu"> 
                                <option value="">--pilih menu--</option>
                                <?php foreach($menu as $row):?>
                                <option value="<?php echo $row->id_menu;?>"><?php echo $row->menu;?></option>
                                <?php endforeach;?>        
                            </select>
                            </div>
                        </div>
                        <div class="col md-6">
                            <div class="form-group">
                            <label>sub menu</label>
                                <select  class="form-control submenu" name="submenu" id="submenu">
                                <option value="">-pilih-</option>
                                </select>      
                            </div>
                        </div>
                    </div>    

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <h5>Foto Sekarang</h5>
                            <input type="hidden" name="foto_now" >
                        <img src="<?php echo base_url('/assets/assets2/img/'.$all->foto)?>" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                        <div class="alert alert-danger">
                        <strong>Perhatian!</strong> jika gambar tidak ingin di ubah, jangan isi bagian ini
                        </div>
                            <div class="form-group">
                            <label>Foto</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="ckeditor"><?= $all->deskripsi?></textarea>
                        </div>

                        <hr>
                        <input type="hidden" name="id_profil" value="<?php echo $id_profil?>" required>
                        <div class="row">
                            <div class="col md-4">
                            <button type="reset" class="btn btn-danger btn-lg">Reset</button>
                            <button class="btn btn-warning btn-lg" >Update</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/assets2/js/jquery.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
		$(document).ready(function(){
			//call function get data edit
			get_data_edit();

			$('.menu').change(function(){ 
                var id=$(this).val();
                var id_submenu = "<?php echo $sub_menu_id;?>";
                $.ajax({
                    url : "<?php echo site_url('admin/get_sub_menu');?>",
                    method : "POST",
                    data : {id:id},
                    async : true,
                    dataType : 'json',
                    success: function(data){

                        $('select[name="submenu"]').empty();

                        $.each(data, function(key, value) {
                            if(id_submenu==value.id_submenu){
                                $('select[name="submenu"]').append('<option value="'+ value.id_submenu +'" selected>'+ value.submenu +'</option>').trigger('change');
                            }else{
                                $('select[name="submenu"]').append('<option value="'+ value.id_submenu +'">'+ value.submenu +'</option>');
                            }
                        });

                    }
                });
                return false;
            }); 

			//load data for edit
            function get_data_edit(){
            	var id_profil = $('[name="id_profil"]').val();
            	$.ajax({
            		url : "<?php echo site_url('admin/get_data_edit');?>",
                    method : "POST",
                    data :{id_profil :id_profil},
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        $.each(data, function(i, item){
                            $('[name="judul"]').val(data[i].judul);
                            $('[name="menu"]').val(data[i].menu_id).trigger('change');
                            $('[name="submenu"]').val(data[i].submenu_id).trigger('change');
                        });
                    }

            	});
            }
            
		});
	</script>
<?php $this->load->view('admin/footer') ?>