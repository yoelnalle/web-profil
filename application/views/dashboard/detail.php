<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body pl-2 pr-2 ">
                <img class="img-fluid img-thumbnail" src="<?= base_url('assets/assets2/thumbnail/'.$artikel->foto) ?>">
                 <hr>
                 <div class="pr-4 pl-4">
                 <div class="row">
                     <div class="col-md-4">
                     <p>
                        <i class="fa fa-list"></i>
                        Tag : <strong> <?= $artikel->tag ?></strong> 
                    </p>
                     </div>
                     <div class="col-md-4">
                     <p>
                        <i class="fa fa-calendar"></i>
                        Tanggal : <strong> <?php $date = date_create($artikel->tanggal);  ?></strong>
                        <?php echo date_format($date,'d F Y') ?> 
                    </p>
                     </div>
                     <div class="col-md-4">
                     <p>
                        <i class="fa fa-list"></i>
                        Kategori : <strong> <?= $artikel->nama ?></strong> 
                    </p>
                     </div>
                 </div>
                 <h3> <?= $artikel->judul ?></h3> 
                 </div>
                 <hr> 
                 <div class="pr-4 pl-4">
                 <?= $artikel->artikel?>
                 </div>  
                
                </div>
            </div>
        </div>
    </div>
</div>