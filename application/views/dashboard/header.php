<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BPTD NTT </title>
	<link rel="icon" type="image/png" href="<?= base_url('assets/assets2/thumbnail/logo.png') ?>">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="<?= base_url('assets/assets2/vendor/bootstrap/css/bootstrap.min.css')?> ">
	<!-- datatables -->
	<!-- jquery -->
	<script src="<?= base_url('assets/assets2/js/jquery.min.js') ?> "></script>
</head>

<body>
  	<img src="<?= base_url('assets/assets2/img/bg.png')?>" class="card-img-top" >
	<nav class="navbar navbar-light navbar-expand-sm" style="background: #70d1ffa6">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-8"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-center" id="navbar-list-8">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url()?>index.php/administrator">
						<i class="fa fa-home"></i> HOME<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="<?= base_url('index.php/administrator/visi_misi')?>" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						PROFIL BPTD
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('index.php/administrator/visi_misi')?>">PROFIL BPTD</a>
                        <a class="dropdown-item" href="<?php echo base_url('index.php/administrator/profil_so')?>">STRUKTUR ORGANISASI</a>
                        <a class="dropdown-item" href="<?php echo base_url('index.php/administrator/profil_pa')?>">PETA ADMINISTRASI</a>
                        <a class="dropdown-item" href="<?php echo base_url('index.php/administrator/profil_pj')?>">PERLENGKAPAN JALAN</a>
                        <a class="dropdown-item" href="<?php echo base_url('index.php/administrator/pelabuhan')?>">PELABUHAN</a>
					</div>
					
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						SATPEL
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url('index.php/administrator/satpel_bolok')?>">BOLOK</a>
						<a class="dropdown-item" href="<?php echo base_url('index.php/administrator/satpel_lbj')?>">LABUAN BAJO</a>
						<a class="dropdown-item" href="<?php echo base_url('index.php/administrator/satpel_alor')?>">ALOR</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/administrator/profil_uppkb')?>">PROFIL UPPKB</a>
				</li>
				
				
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					PUBLIKASI
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach ($kategori as $key):?>
						<a class="dropdown-item" href="<?php echo base_url('index.php/administrator/List_kat/'.$key->id_kategori)?>"><?= $key->nama ?> </a>
						<?php endforeach; ?>
					</div>
				</li>
			</ul>

			<form class="form-inline my-2 my-lg-0" action="<?= base_url('index.php/administrator/pencarian/') ?> "method="GET">
			<input class="form-control ml-2 mr-sm-2" type="search" placeholder="Cari Sesuatu" aria-label="Search" name="cari">
			 <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
			</form>
			

			<div class="ml-auto p-2 d-flex">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#"  data-toggle="modal" data-target="#login">
							<i class="fa fa-sign-in"></i>
							login
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> LOGIN </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form class="form-horizontal" action="<?php echo base_url() ?>index.php/auth/login_action" method="post">
					<div class="form-group">
						<label>Username</label>
						<input name="username" type="username" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input name="password" type="password"  placeholder="Password" class="form-control">	
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">login</button>
				</div>
				</form>
				</div>
				
				</div>
			</div>
		</div>
	</nav>