<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-md-12">
			<div class="card-deck">
				<?php foreach ($album as $key ): ?>
				<div class="col-md-3 mt-2">
				<!-- <a href="<?= base_url('index.php/administrator/galeri_pel/'.$key->id_album)?>">
					<div class="card text-white">
							<img src="<?= base_url('/assets/assets2/galeri/'.$key->foto_album)?>"
								class="card-img img-fluid img-thumbnail">
							<div class="card-img-overlay">
							<b><a class="card-title text-white text-decoration-none" style="background: #2d2d2da6"
									href="<?php echo base_url('index.php/administrator/galeri_pel/'.$key->id_album)?>"><?= $key->nama_album ?></a></b>
							</div>
					</div>
					</a> -->
					<div class="card">
					  <a href="<?= base_url('index.php/administrator/galeri_pel/'.$key->id_album)?>">
				    	<img class="img-fluid img-thumbnail" src="<?= base_url('/assets/assets2/galeri/'.$key->foto_album)?>" class="card-img-top" alt="...">
						<div class="card-body">
						<a class="text-dark text-decoration-none" href="<?php echo base_url('index.php/administrator/galeri_pel/'.$key->id_album)?>"><?= $key->nama_album ?></a>
						</div>
						</a>
				  	</div>
				</div>

				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<hr>