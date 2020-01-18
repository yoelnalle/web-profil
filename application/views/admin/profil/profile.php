<?php $this->load->view('admin/header') ?>
<div class="container fluid">
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body bg-warning">
              <h1 class="text-center text-white" style="font-size:17px" >PROFIL BPTD</h1>
            </div>
            <div class="card-footer text-center font-weight-bold">
            <a href="<?php echo base_url('index.php')?>/admin/all_profil">KELOLA</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body bg-info">
              <h1 class="text-center text-white" style="font-size:17px" >PROFIL UPPKB</h1>
            </div>
            <div class="card-footer text-center font-weight-bold">
           <a href="<?php echo base_url('index.php')?>/admin/uppkb"> KELOLA </a> 
            </div>
        </div>
    </div>
    <div class="col-md-3">
         <div class="card">
            <div class="card-body bg-success">
              <h1 class="text-center text-white" style="font-size:17px" > PROFIL SATPEL</h1>
            </div>
            <div class="card-footer text-center font-weight-bold">
            <a href="<?php echo base_url('index.php')?>/admin/port">KELOLA</a>
            </div>
        </div>
    </div>    
</div>
</div>


<?php $this->load->view('admin/footer') ?>