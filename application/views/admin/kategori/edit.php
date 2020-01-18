<form action="<?php echo base_url()?>index.php/admin/edit" method="post">
	<input type="hidden" name="id_kategori" value="<?php echo $id ?>">
	<div class="form-group"> 
		<label> nama jabatan</label><br>
		<input type="text" name="nama_jabatan" class="form-control" placeholder="nama jabatan" required value="<?php echo $nama ?>">
	</div>
	<div class="form-group"> 
		<input type="submit" name="update" id="update" class="btn btn-primary" value="update">
	</div>
</form>