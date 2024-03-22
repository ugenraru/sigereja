<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    case 'home':
      include "load/home.php";
      break;
    case 'tentang':
      include "load/tentang.php";
      break;
    case 'berita':
      include "load/berita.php";
      break;
    case 'berita_detail':
      include "load/berita_detail.php";
      break;
    case 'kalender':
      include "load/kalender_detail.php";
      break;
    case 'kegiatan':
      include "load/kegiatan.php";
      break;
    case 'kegiatan_detail':
      include "load/kegiatan.php";
      break;
    case 'kontak':
      include "load/kontak.php";
      break;
    case 'renungan':
      include "load/renungan.php";
      break;
    case 'renungan_detail':
      include "load/renungan_detail.php";
      break;
    default:
      include "load/404.php";
      break;
  }
} else {
  include "load/home.php";
}
