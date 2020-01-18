<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4><i class="fa fa-list"></i> DAFTAR ARTIKEL</h4>
					<?php foreach ($kat as $key ): ?>
					<div class="row">
						<div class="col-md-4">
							<img class="img-fluid img-thumbnail"
								src="<?= base_url('assets/assets2/thumbnail/'.$key->foto)?>" alt="">
						</div>
						<div class="col-md-8">
							<h5>
								<a class="text-dark text-decoration-none"
									href="<?= base_url('index.php/administrator/detail/'.$key->slug)?>">
									<?= $key->judul ?></a>
							</h5>
							<small>
								<div class="row">
									<div class="col-md-7">
										<?php $date = date_create($key->tanggal);  ?>
										<i class="fa fa-calendar" aria-hidden="true"></i>
										<?php echo date_format($date,'d F Y') ?>
									</div>
									<div class="col-md-5">
										<i class="fa fa-th-large"></i>
										<?= $key->nama ?>
									</div>
								</div>
							</small>
							<?= word_limiter($key->artikel,40) ?>
							<a class="btn btn-primary btn-sm mt-2"
								href="<?= base_url('index.php/administrator/detail/'.$key->slug)?>">baca
								selengkapnya..</a>
						</div>
					</div>
					<hr>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<?php foreach ($art_pub as $key): ?>
			<div class="card" style="width: 20rem;">
				<div class="card-header">
					<p class="card-text text-center"><strong> <?=  word_limiter($key->judul,3) ?></strong> </p>
				</div>
				<div class="card-body">
					<img src="<?= base_url('assets/assets2/thumbnail/'.$key->foto)?>" class="card-img-top img-fluid">
					<p class="card-text"><?= word_limiter($key->artikel,10) ?></p>
				</div>
			</div>
			<br>
			<?php endforeach ?>
		</div>
	</div>
</div>
<hr>