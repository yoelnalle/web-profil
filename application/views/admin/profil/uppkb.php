<?php $this->load->view('admin/header') ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
              <strong>KELOLA PROFIL UPPKB</strong>   
                </div>
                <div class="card-body">
                <a href="<?php echo base_url('index.php/admin/add_UPPKB')?>" class="btn btn-primary">Tambah Profil UPPKB</a>
                <br><br>
                    <div class="table-responsive">
                        <table class=" table table-bordered datatable">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">No</th>
                                <th width="40%">Judul</th>
                                <th>Deskripsi</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                         <?php $no=0; foreach ($uppkb->result_array() as $key ) { $no++; ?>
                            <tr>
                            <td><?php echo $no ?></td>
                            <td>
                            <div class="row"> 
                                <div class="col-md-5">
                                <img class="img-fluid" src="<?php echo base_url('/assets/assets2/img/'.$key['foto'])?>" alt="">
                                </div>
                                <div class="col-md-7" >
                                <?php  echo word_limiter($key['judul'],5) ?>
                                </div>
                            </div>    
                            </td>
                            <td><?php echo word_limiter($key['deskripsi'],7) ?></td>
                           
                            <td>
                            <a onclick='return confirm("Yakin ingin menghapus artikel ini?")' 
                            class="btn btn-danger btn-sm" href="<?php echo base_url('index.php/admin/del_uppkb/'.$key['id_profil'])?>">Hapus</a>
                            <a class="btn btn-warning btn-sm" href="<?php echo base_url('index.php/admin/edit_uppkb/'.$key['id_profil'])?>">edit</a>
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