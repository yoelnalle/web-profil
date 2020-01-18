<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center bg-primary text-white">
					<strong>DAFTAR VIDEO</strong>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('pesan') !== null): ?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?= $this->session->flashdata('pesan') ?>
						</div> 
					<?php endif; ?>
					<a href="<?php echo base_url('index.php/admin/add_vid')?>" class="btn btn-primary">Tambah
						Video</a>
					<br><br>
					<div class="table-responsive">
						<table class="table table-bordered datatable">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Video</th>
									<th>Aksi</th>

								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($video as $key ) { $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<div class="row">
											<div class="col-md-4">
												<iframe src="<?= $key->link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
											<div class="col-md-8">
												<?= word_limiter($key->judul) ?>
											</div>
										</div>
									</td>
									
									<td>
										<a onclick='return confirm("Yakin ingin menghapus video ini?")'
											class="btn btn-danger btn-sm"
											href="<?php echo base_url('index.php/admin/hapus_vid/'.$key->id_vidio)?>">Hapus</a>
										<a class="btn btn-warning btn-sm"
											href="<?php echo base_url('index.php/admin/edit_vid/'.$key->id_vidio)?>">edit</a>
										
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

<?php $this->load->view('admin/footer') ?>