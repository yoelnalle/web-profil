<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card-deck">
				<?php foreach ($galeri as $key ): ?>
				<div class="col-md-3 mt-2">
					<div class="card text-white">
						<img src="<?= base_url('/assets/assets2/galeri/'.$key->foto)?>" class="card-img img-fluid" alt="...">
						<div class="card-img-overlay">
							<h5 class="card-title"> <?= $key->deskripsi ?></h5>
						</div>
					</div>
				  	<!-- <div class="card">
				    	<img class="img-fluid" src="<?= base_url('/assets/assets2/galeri/'.$key->foto)?>" class="card-img-top" alt="...">
						<div class="card-body">
							<p class="card-text"><small class="text-muted"><?= $key->deskripsi ?></small></p>
						</div>
				  	</div> -->
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<hr>
