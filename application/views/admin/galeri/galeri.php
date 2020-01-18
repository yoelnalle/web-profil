<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center bg-primary text-white">
					<strong>DAFTAR PELABUHAN</strong>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('pesan') !== null): ?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?= $this->session->flashdata('pesan') ?>
						</div> 
					<?php endif; ?>
					<a href="<?php echo base_url('index.php/admin/add_galeri')?>" class="btn btn-primary">Tambah Foto
						Pelabuhan</a>
					<br><br>
					<div class="table-responsive">
						<table class="table table-bordered datatable">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th width="40%">FOTO</th>
									<th>ALBUM</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($galeri as $key ) { $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<div class="row">
											<div class="col-md-5">
												<img class="img-fluid"
													src="<?= base_url('/assets/assets2/galeri/'.$key->foto)?>"
													alt="">
											</div>
											<div class="col-md-7">
												<?= word_limiter($key->deskripsi,5) ?>
											</div>
										</div>
									</td>
									
									<td><?=  $key->nama_album?></td>
									<td>
										<a onclick='return confirm("Yakin ingin menghapus data ini?")'
											class="btn btn-danger btn-sm"
											href="<?php echo base_url('index.php/admin/del_galeri/'.$key->id_galeri)?>">Hapus</a>
										<a class="btn btn-warning btn-sm"
											href="<?php echo base_url('index.php/admin/edit_galeri/'.$key->id_galeri)?>">edit</a>
										
									</td>
										
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

