<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BPTD NTT | Admin </title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <!-- bootstrap -->
     <link rel="stylesheet" href="<?= base_url('assets/assets2/vendor/bootstrap/css/bootstrap.min.css')?> ">
     <!-- datatables -->
     <link rel="stylesheet" href="<?= base_url('assets/assets2/vendor/datatables/datatables.min.css')?> ">
     <!-- jquery -->
  
     <script src="<?= base_url('assets/assets2/js/jquery.min.js') ?> "></script>
     <script src="<?= base_url('assets/assets2/vendor/ckeditor/ckeditor.js')?>"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.3.200/pdf_viewer.js"></script>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item ">
        <a class="nav-link" href="<?php echo base_url('index.php')?>/admin">
        <i class="fa fa-home"></i>
        DASHBOARD <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php')?>/admin/artikel">
        <i class="fa fa-newspaper-o"></i>
        ARTIKEL 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php')?>/admin/kategori">
        <i class="fa fa-list"></i>
        KATEGORI 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php')?>/admin/all_profil">
        <i class="fa fa-briefcase "></i>
       PROFIL BPTD 
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php')?>/admin/akun">
        <i class="fa fa-user"></i>
       KELOLA AKUN
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php')?>/admin/video">
        <i class="fa fa-play-circle"></i>
       VIDEO
        </a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?= base_url('index.php/administrator/visi_misi')?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-image"></i> PELABUHAN
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url('index.php')?>/admin/album">
              PELABUHAN
            </a>
            <a class="dropdown-item" href="<?php echo base_url('index.php')?>/admin/galeri">GALERI PELABUHAN</a>
            
          </div>
        </li>
    </ul>
    <span class="navbar-text">
     <a href="<?php echo base_url() ?>index.php/auth/logout_action" class="text-danger"><i class="fa fa-power-off"></i> Logout</a>
    </span>
  </div>
</nav>