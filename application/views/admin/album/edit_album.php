<div class="container-fluid">
	<div class="row mt-5 justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header text-center">
					Edit Pelabuhan
				</div>
				<div class="card-body">
				<?= form_open_multipart('admin/update_album/'.$album->id_album);?>
					<div class="row mb-3">
						<div class="col-md-3">
							<h5>FOTO SEKARANG</h5>
							<input type="hidden" name="foto_now" value="<?= $album->foto_album?>">
							<img src="<?php echo base_url('/assets/assets2/galeri/'.$album->foto_album)?>"
								class="img-fluid">
						</div>
						<div class="col-md-9">
							<div class="alert alert-danger">
								<strong>Perhatian!</strong> jika gambar tidak ingin di ubah, jangan isi bagian ini
							</div>
							<div class="form-group">
								<label>Thumbnail</label>
								<input type="file" name="foto" class="form-control" value="<?= $album->foto_album?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label> Nama Pelabuhan</label>
						<input type="text" name="nama" required placeholder="Nama Pelabuhan" class="form-control"
							value="<?= $album->nama_album?>">
					</div>
					
					<button class="btn btn-info">UPDATE</button>
					<a href="<?php echo base_url('index.php')?>/admin/album" class="btn btn-danger">KEMBALI</a>
				</div>
					<?php form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>