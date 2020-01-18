<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
              <strong>KELOLA PROFIL SATPEL</strong>   
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('pesan') !== null): ?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?= $this->session->flashdata('pesan') ?>
						</div> 
					<?php endif; ?>
                <a href="<?php echo base_url('index.php/admin/add_port')?>" class="btn btn-primary">Tambah Profil SATPEL</a>
                <br><br>
                    <div class="table-responsive">
                        <table class=" table table-bordered datatable">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="40%">Nama Satpel</th>
                                <th>Deskripsi</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                         <?php $no=0; foreach ($port->result_array() as $key ) { $no++; ?>
                            <tr>
                            <td><?php echo $no ?></td>
                            <td>
                            <div class="row"> 
                                <div class="col-md-5">
                                <img class="img-fluid" src="<?php echo base_url('/assets/assets2/img/'.$key['foto'])?>" alt="">
                                </div>
                                <div class="col-md-7" >
                                <?php  echo word_limiter($key['nama_pel'],5) ?>
                                </div>
                            </div>    
                            </td>
                            <td><?php echo word_limiter($key['deskripsi'],7) ?></td>
                           
                            <td>
                            <a onclick='return confirm("Yakin ingin menghapus artikel ini?")' 
                            class="btn btn-danger btn-sm" href="<?php echo base_url('index.php/admin/del_port/'.$key['id_pel'])?>">Hapus</a>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('index.php/admin/edit_port/'.$key['id_pel'])?>">edit</a>
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