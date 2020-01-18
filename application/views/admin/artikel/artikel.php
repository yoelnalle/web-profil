<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center bg-primary text-white">
					<strong>DAFTAR ARTIKEL</strong>
				</div>
				<div class="card-body">
					<?php if ($this->session->flashdata('pesan') !== null): ?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?= $this->session->flashdata('pesan') ?>
						</div> 
					<?php endif; ?>
					<a href="<?php echo base_url('index.php/admin/add_artikel')?>" class="btn btn-primary">Tambah
						Artikel</a>
					<br><br>
					<div class="table-responsive">
						<table class="table table-bordered table-striped datatable">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th width="20%">Judul</th>
									<th>Artikel</th>
									<th>slug</th>
									<th>Kategori</th>
									<th width="10%">Tag</th>
									<th width="11%">Tanggal</th>
									<th>Tanggal publikasi</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($artikel as $key ) { $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td>
										<div class="row">
											<div class="col-md-5">
												<img class="img-fluid"
													src="<?= base_url('/assets/assets2/thumbnail/'.$key->foto)?>"
													alt="">
											</div>
											<div class="col-md-7">
												<?= word_limiter($key->judul,5) ?>
											</div>
										</div>
									</td>
									<td><?= word_limiter($key->artikel ,5) ?></td>
									<td><?= $key->slug ?></td>
									<td><?=  $key->nama ?></td>
									<td><small>
											<?= $key->tag ?>
										</small>
									</td>
									<td><small> <?php $date=date_create($key->tanggal);
                            echo date_format($date,'d F Y'); ?></small>
									</td>

									<td><small> <?php $date=date_create($key->tgl_publikasi);
                            echo date_format($date,'d F Y'); ?></small></td>

									<?php if ( $key->status === '1'): $status='Publish'; else: $status='Draft';       
                             endif;?>
									<td><?= $status ?></td>
									<td>
										<a onclick='return confirm("Yakin ingin menghapus artikel ini?")'
											class="btn btn-danger btn-sm"
											href="<?php echo base_url('index.php/admin/del_foto/'.$key->id_art)?>">Hapus</a>
										<a class="btn btn-warning btn-sm"
											href="<?php echo base_url('index.php/admin/edit_artikel/'.$key->id_art)?>">edit</a>
										<?php if ($key->status=== '0'): ?>
										<a name="1" class="btn btn-success btn-sm"
											href="<?php echo base_url('index.php/admin/publish/'.$key->id_art)?>">
											Publikasikan</a>
										<?php else: ?>
										<a name="0" class="btn btn-success btn-sm"
											href="<?php echo base_url('index.php/admin/draft/'.$key->id_art)?>">
											Draft</a>
										<?php endif; ?>
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