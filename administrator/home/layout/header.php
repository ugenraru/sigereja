<?php $p = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_pengaturan`")); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Gereja paroki st. familia sikumana</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="administrator/home/assets/img/favicon.png" rel="icon">
  <link href="administrator/home/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="administrator/home/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="administrator/home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="administrator/home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="administrator/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="administrator/home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="administrator/home/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="administrator/home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="administrator/home/assets/css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <a href="index.php" class="logo me-2"><img src="administrator/home/assets/img/logo.jpg" alt="" class="img-fluid"></a>
      <h1 class="logo me-auto"><a href="index.php"><?= $p['nama_web']; ?></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">BERANDA</a></li>
          <li><a class="nav-link scrollto" href="index.php?page=tentang">TENTANG</a></li>
          <li class="dropdown"><a href="#"><span>INFORMASI</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              
            <li><a  href="index.php?page=kegiatan">KEGIATAN GEREJA</a></li>
            <li><a href="index.php?page=berita">BERITA GEREJA</a></li>
  
            </ul>
          <li><a class="nav-link scrollto" href="index.php?page=kontak">HUBUNGI GEREJA</a></li>
         
         
      

          <!-- <li><a class="nav-link scrollto" href="index.php?page=kalender">Kalender</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>