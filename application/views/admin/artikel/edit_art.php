<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
	<div class="row mt-5 justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header text-center">
					Edit Artikel
				</div>
				<div class="card-body">
					<?= form_open_multipart('admin/update_art/'.$artikel->id_art);?>
					<input type="hidden" name='status' value="<?= $artikel->status?>">
					<div class="form-group">
						<label>Judul artikel:</label>
						<input type="text" name="judul" placeholder="judul artikel" required class="form-control"
							value="<?= $artikel->judul?>">
                    </div>
                    <div class="form-group">
						<label>Slug artikel:</label>
						<input type="text" name="slug" placeholder="judul slug" required class="form-control"
							value="<?= $artikel->slug?>">
							<p class="text-muted">
							Perhatian! Hindari penggunaan tanda baca seperti {} () [] & $ @ ; * % # " ' <></p>
					</div>
					<div class="row">
						<div class="col md-6">
							<div class="form-group">
								<label>kategori</label>
								<select name="id_kategori" class="form-control">
									<option value="">-pilih-</option>
									<?php foreach ($kategori as $key):?>
									<?php 
											if($key->id_kategori===$artikel->id_kategori):
												$select='selected';
											else:
												$select='';
											endif;
										?>
									<option <?= $select ?> value="<?= $key->id_kategori ?>"><?= $key->nama ?></option>
									<?php endforeach; ?>

								</select>
							</div>
						</div>
						<div class="col md-6">
							<div class="form-group">
								<label> Tag</label>
								<input type="text" name="tag" required placeholder="tag" class="form-control"
									value="<?= $artikel->tag?>">
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-3">
							<h5>Thumbnail sekarang</h5>
							<input type="hidden" name="foto_now" value="<?= $artikel->foto?>">
							<img src="<?php echo base_url('/assets/assets2/thumbnail/'.$artikel->foto)?>"
								class="img-fluid">
						</div>
						<div class="col-md-9">
							<div class="alert alert-danger">
								<strong>Perhatian!</strong> jika gambar tidak ingin di ubah, jangan isi bagian ini
							</div>
							<div class="form-group">
								<label>Thumbnail</label>
								<input type="file" name="foto" class="form-control" value="<?= $artikel->foto?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>ISI:</label>
						<textarea name="artikel" id="ckeditor"><?= $artikel->artikel?></textarea>
					</div>

					<hr>
					<div class="row">
						<div class="col md-4">
							<button type="reset" class="btn btn-danger btn-block btn-lg">Reset</button>
						</div>
						<?php if ($artikel->status==='0'):?>
						<div class="col md-4">
							<button name="1" class="btn btn-success btn-block btn-lg">Publish</button>
						</div>
						<?php else: ?>
						<div class="col md-4">
							<button name="0" class="btn btn-warning btn-block btn-lg">Draft</button>
						</div>
						<?php endif;?>
						<div class="col md-4">
							<button class="btn btn-info btn-block btn-lg">Update</button>
						</div>
						<div class="col md-4">
							<!-- <button class="btn btn-info btn-block btn-lg">Update</button> -->
							<a href="<?php echo base_url('index.php')?>/admin/artikel" class="btn btn-primary btn-block btn-lg">Cancel</a>
						</div>
					</div>
					<?php form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('admin/footer') ?>