<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center bg-info text-white">
                Kategori    
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('pesan') !== null): ?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?= $this->session->flashdata('pesan') ?>
						</div> 
					<?php endif; ?>
                <div class="table-responsive">
                <table class=" table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                         <?php $no=0; foreach ($kategori->result_array() as $key ) { $no++; ?>
                            <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key['nama'] ?></td>
                            <td>
                            <a class="btn btn-danger" href="<?php echo base_url('index.php/admin/hapus_kat/'.$key['id_kategori'])?>">Hapus</a>
                            <a class="btn btn-warning" href="javascript:void(0)"  data-toggle="modal" data-target="#edit<?php echo $key['id_kategori']?>">Edit</a>
                            </td>
                            </tr>
                            <div class="modal fade" id="edit<?php echo $key['id_kategori']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ubah kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <?= form_open('admin/edit/'.$key['id_kategori'])?>
                                            <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama:</label>
                                                <input type="text" name="nama" placeholder="Nama Kategori" required class="form-control" value="<?php echo $key['nama']?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i>simpan</button>
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
                Tambah Kategori
                </div>
                <div class="card-body">
                <?= form_open('admin/tambah_kat'); ?>
                    <div class="form-group">
                    <label>Nama:</label>
                    <input type="text" name="nama" placeholder="Nama Kategori" required class="form-control">
                    </div>
                    <button class="btn btn-info btn-block" ><i class="fa fa-plus"></i> Tambah Kategori</button>

                <?= form_close(); ?>
                </div>
                
            </div>
        </div>       
    </div>
</div>
                            
<?php $this->load->view('admin/footer') ?>