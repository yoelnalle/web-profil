<div class="container">
	<div class="row justify-content-center mt-4">
		<div class="col-md-9">
			<div class="card">
				<div class="card-body pl-2 pr-2 ">
                 <?php foreach ($profil as $key):  ?>
                    <h5> <?= $key->judul ?></h5>
                    <hr>
					<img class="img-fluid img-thumbnail" src="<?= base_url('assets/assets2/img/'.$key->foto)?>">
					<hr>
					<div class="pr-4 pl-4">
						<?= $key->deskripsi?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>