<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center bg-info text-white">
					DAFTAR AKUN 
				</div>
				<div class="card-body">
				<?php if ($this->session->flashdata('pesan') !== null): ?>
					<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<?= $this->session->flashdata('pesan') ?>
					</div> 
				<?php endif; ?>
					<div class="table-responsive">
						<table class="table table-bordered datatable">
							<thead>
								<tr>
									<th>Nomor</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Password(dienkripsi)</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=0; foreach ($user as $key ) { $no++; ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $key->nama ?></td>
									<td><?= $key->username ?></td>
									<td><?= $key->password ?></td>
									<td>
										<a onclick='return confirm("Yakin ingin menghapus akun ini?")' class="btn btn-danger"
											href="<?php echo base_url('index.php/admin/hapus_user/'.$key->id_user)?>">Hapus</a>
										<a class="btn btn-warning" href="javascript:void(0)" data-toggle="modal"
											data-target="#edit<?= $key->id_user ?>">Edit</a>
									</td>
								</tr>
								<div class="modal fade" id="edit<?= $key->id_user?>" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">UBAH AKUN</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<?= form_open('admin/edit_user/'.$key->id_user) ?>
											<div class="modal-body">
												<div class="form-group">
													<label>Nama:</label>
													<input type="text" name="nama" placeholder="Nama" required
														class="form-control" value="<?= $key->nama ?>">
												</div>
											
                                                <div class="form-group">
                                                    <label>username:</label>
                                                    <input type="text" name="username" placeholder="username" required
                                                        class="form-control" value="<?= $key->username ?>">
                                                </div>
                                            
                                                <div class="form-group">

                                                    <label>password:</label>
                                                    <input type="password" name="password" placeholder="password" required
                                                        class="form-control" value="<?= $key->password ?>">
                                                </div>
									        </div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary"><i
												class="fa fa-pencil"></i>simpan</button>
									</div>
									<?= form_close(); ?>
								</div>
					</div>

					<?php }?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header text-center bg-info text-white">
				Tambah Akun
			</div>
			<div class="card-body">
				<?= form_open('admin/tambah_user'); ?>
				<div class="form-group">
					<label>Nama:</label>
					<input type="text" name="nama" placeholder="Nama" required class="form-control">
				</div>
				<div class="form-group">
					<label>username:</label>
					<input type="text" name="username" placeholder="username " required class="form-control">
				</div>
				<div class="form-group">

					<label>password:</label>
					<input type="password" name="password" placeholder="password" required class="form-control">
					<hr>
					
				</div>
				<button class="btn btn-info btn-block"><i class="fa fa-plus"></i> Tambah Akun</button>

				<?= form_close(); ?>
			</div>

		</div>
	</div>
</div>
</div>
