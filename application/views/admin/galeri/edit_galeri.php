<div class="container-fluid">
	<div class="row mt-5 justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header text-center">
					Edit galeri pelabuhan
				</div>
				<div class="card-body">
				<?= form_open_multipart('admin/update_galeri/'.$galeri->id_galeri);?>
					<div class="row mb-3">
						<div class="col-md-3">
							<h5>FOTO SEKARANG</h5>
							<input type="hidden" name="foto_now" value="<?= $galeri->foto?>">
							<img src="<?php echo base_url('/assets/assets2/galeri/'.$galeri->foto)?>"
								class="img-fluid">
						</div>
						<div class="col-md-9">
							<div class="alert alert-danger">
								<strong>Perhatian!</strong> jika gambar tidak ingin di ubah, jangan isi bagian ini
							</div>
							<div class="form-group">
								<label>Thumbnail</label>
								<input type="file" name="foto" class="form-control" value="<?= $galeri->foto?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Deskripsi</label>
						<input type="text" name="deskripsi" placeholder="deskripsi" class="form-control"
							value="<?= $galeri->deskripsi?>">
					</div>
					<div class="form-group">
						<label>PELABUHAN</label>
						<select name="album" class="form-control">
							<option value="">-pilih-</option>
							<?php foreach ($album as $key):?>
							<?php 
	                                    if($key->id_album===$galeri->id_album):
	                                        $select='selected';
	                                    else:
	                                        $select='';
	                                    endif;
	                                ?>
							<option <?= $select ?> value="<?= $key->id_album ?>"><?= $key->nama_album ?></option>
							<?php endforeach; ?>

						</select>
					</div>
					<button class="btn btn-info">UPDATE</button>
					<a href="<?php echo base_url('index.php')?>/admin/artikel" class="btn btn-danger">KEMBALI</a>
				</div>
					<?php form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>