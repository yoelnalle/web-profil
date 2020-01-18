<div class="container-fluid mt-4">
	<div class="row">
		<div class="col-md-6 pl-5">
			<!-- artikel kategori -->
			<div class="bd-example">
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
						<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<?php $no=0; foreach ($art_kat as $key):?>
						<?php
                        if ($no===0):
                        $active='active';
                        else:
                            $active='';
                        endif;
                        $no++;    
                        ?>
						<div class="carousel-item <?= $active ?>">
							<a href="<?= base_url('index.php/administrator/detail/'.$key->slug)?>">
								<img src="<?= base_url('assets/assets2/thumbnail/'.$key->foto)?>" class="img-fluid img-thumbnail d-block">
								<div class="carousel-caption d-none d-md-block" style="background: #2d2d2da6">
									<h4 style="text-shadow:0px 4px 10px #000;font-weight:bold"><?= $key->judul ?></h4>
									<p style="text-shadow:0px 4px 10px #000;"><?= $key->tag ?></p>
								</div>
						</div>
						</a>
						<?php endforeach;?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<hr>
			<!-- artikel terbaru -->
			<div class="card">
				<div class="card-body">
					<h3><i class="fa fa-newspaper-o"></i> Berita Terbaru</h3>
					<?php foreach ($artikel as $key ): ?>
					<div class="row">
						<div class="col-md-6">
							<img class="img-fluid img-thumbnail" src="<?= base_url('assets/assets2/thumbnail/'.$key->foto)?>" alt="">
						</div>
						<div class="col-md-6">
							<h5>
								<a class="text-dark text-decoration-none"
									href="<?= base_url('index.php/administrator/detail/'.$key->slug)?>">
									<?= $key->judul ?></a>
							</h5>
							<small>
								<div class="row">
									<div class="col-md-7">
										<?php $date = date_create($key->tgl_publikasi);  ?>
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<?php echo date_format($date,'d F Y') ?>
									</div>
									<div class="col-md-5">
										<i class="fa fa-th-large"></i>
										<?= $key->nama ?>
									</div>
								</div>
							</small>
							<?= word_limiter($key->artikel,10) ?>
							<br>
							<a class="btn btn-primary btn-sm"
								href="<?= base_url('index.php/administrator/detail/'.$key->slug)?>">Baca
								selengkapnya..</a>
						</div>
					</div>
					<hr>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="col-md-2">
		
		</div>
		<div class="col-md-4">
			<?php foreach ($art_pub as $key): ?>
			<div class="card mt-1" style="width: 20rem;">
				<div class="card-header">
					<p class="card-text text-center"><strong> <?=  word_limiter($key->judul,3) ?></strong> </p>
				</div>
				<div class="card-body">
					<img src="<?= base_url('assets/assets2/thumbnail/'.$key->foto)?>" class="card-img-top img-fluid">
					<p class="card-text"><?= word_limiter($key->artikel,5) ?></p>
				</div>
			</div>
			<?php endforeach ?>
			<?php foreach ($vidio as $key): ?>
			<div class="card mt-1" style="width: 20rem;">
				<div class="card-body">
					<iframe class="img-fluid" src="<?= $key->link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<p class="card-title"><?= $key->judul ?></p>
				</div>
			</div>	
			<?php endforeach ?>
		</div>
	</div>
</div>
<hr>