<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
              <strong>KELOLA PROFIL BPTD</strong>   
                </div>
                <div class="card-body">
                    <?php if ($this->session->flashdata('pesan') !== null): ?>
						<div class="alert alert-info alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<?= $this->session->flashdata('pesan') ?>
						</div> 
					<?php endif; ?>
                <a href="<?php echo base_url('index.php/admin/add_all')?>" class="btn btn-primary">Tambah Profil</a>
                <br><br>
                    <div class="table-responsive">
                        <table class=" table table-bordered datatable">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="30%">Judul</th>
                                <th width="30%">Deskripsi</th>
                                <th>menu</th>
                                <th width="13%">submenu</th>
                                <th width="13%">Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                         <?php
                          $no = 0;
                          foreach ($profil->result() as $key):
	      				$no++;
	      			    ?>
                            <tr>
                            <td><?php echo $no ?></td>
                            <td>
                            <div class="row"> 
                                <div class="col-md-5">
                                <img class="img-fluid" src="<?php echo base_url('/assets/assets2/img/'.$key->foto)?>" alt="">
                                </div>
                                <div class="col-md-7" >
                                <?php  echo word_limiter($key->judul,5) ?>
                                </div>
                            </div>    
                            </td>
                            <td class="img-fluid"><?php echo word_limiter($key->deskripsi,7) ?></td>
                            <td><?php echo $key->menu ?></td>
                            <td><?php echo $key->submenu ?></td>
                            <td>
                            <a onclick='return confirm("Yakin ingin menghapus artikel ini?")' 
                            class="btn btn-danger btn-sm" href="<?php echo base_url('index.php/admin/del_profil/'.$key->id_profil)?>">Hapus</a>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('index.php/admin/get_edit/'.$key->id_profil)?>">edit</a>
                            </td>
                            </tr>                
                            <?php endforeach;?>
                    </tbody>
                </table>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            
<?php $this->load->view('admin/footer') ?>