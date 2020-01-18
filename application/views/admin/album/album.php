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
					<a href="<?php echo base_url('index.php/admin/add_album')?>" class="btn btn-primary">Tambah
						Pelabuhan</a>
					<br><br>
					<div class="table-responsive">
						<table class="table table-bordered datatable">
							<thead>
								<tr class="text-center">
									<th width="5%">No</th>
									<th width="20%">FOTO</th>
									<th>PELABUHAN</th>
									<th width="15%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($album as $key ) { $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td>
                                    <img class="img-fluid" src="<?= base_url('/assets/assets2/galeri/'.$key->foto_album)?>"
                                        alt="">
									</td>
									<td><?=  $key->nama_album?></td>
									<td>
										<a onclick='return confirm("Yakin ingin menghapus data ini?")'
											class="btn btn-danger btn-sm"
											href="<?php echo base_url('index.php/admin/del_album/'.$key->id_album)?>">Hapus</a>
										<a class="btn btn-warning btn-sm"
											href="<?php echo base_url('index.php/admin/edit_album/'.$key->id_album)?>">edit</a>
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

