<?php

$cari = (isset($_GET['q'])) ? $_GET['q'] : '';

$total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `tbl_renungan` WHERE `judul` LIKE '%$cari%' OR `isi` LIKE '%$cari%'"));
$dataperhalaman = 3;
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$start = $dataperhalaman * ($halaman - 1);
$jumlah_hal = ceil($total_data / $dataperhalaman);

$sql = mysqli_query($koneksi, "SELECT * FROM `tbl_renungan` WHERE `judul` LIKE '%$cari%' OR `isi` LIKE '%$cari%' LIMIT $start, $dataperhalaman");

?>

<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1>Renungan</h1>
        <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa praesentium cum, aperiam repellendus maiores soluta.</h2>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="home/assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section>

<main id="main">

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <?php if (!empty($cari)) { ?>
          <div class="col-12" data-aos="zoom-in" data-aos-delay="50">
            <h4>Hasil Pencarian dari "<b><?= $cari; ?></b>"</h4>
          </div>
        <?php } ?>
        <div class="col-8 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <?php while ($q = mysqli_fetch_assoc($sql)) {
            $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tbl_admin` WHERE `member_id` = " . $q['id_user'])); ?>
            <div class="card card-body w-100 shadow-sm mb-4">
              <div class="row">
                <div class="col-4">
                  <img src="home/load/renungan/<?= $q['id']; ?>.png?d=<?= time(); ?>" class="w-100 rounded" alt="...">
                </div>
                <div class="col-8">
                  <h5 class="card-title"><a href="index.php?page=renungan_detail&id=<?= $q['id']; ?>"><?= $q['judul']; ?></a></h5>
                  <i class="bi bi-person"></i> <?= $user['nama_lengkap']; ?>&nbsp;&nbsp;-&nbsp;&nbsp;<i class="bi bi-calendar"></i> <?= date('Y-m-d H.i.s', $q['tanggal']); ?>
                  <br />
                  <br />
                  <p class="card-text"><?= mb_strimwidth($q['isi'], 0, 125, '...'); ?></p>
                  <a href="index.php?page=renungan_detail&id=<?= $q['id']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php $base_url_pagination = 'index.php?page=renungan&q=' . $cari; ?>
          <div class="pagination">
            <?php
            echo '<ul class="pagination">';
            if ($total_data <= $dataperhalaman) {
            } else {
              if ($jumlah_hal <= $dataperhalaman) {
                for ($x = 1; $x < $jumlah_hal + 1; $x++) {
                  if ($halaman == $x) {
                    echo '<li class="page-item active">';
                    echo '<span class="page-link">' . $halaman . '</span>';
                  } else {
                    echo '<li class="page-item"><a class="page-link" title="Halaman ' . $x . '" href="' . $base_url_pagination . '&halaman=' . $x . '"> ' . $x . ' </a></li>';
                  }
                }
              } else {
                if ($halaman == 1) {
                  echo '<li class="page-item disabled">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</li>';
                  echo '<li class="page-item disabled">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman + 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '"> ' . ($halaman + 1) . ' </a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . $jumlah_hal . '" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '"> ' . $jumlah_hal . ' </a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Selanjutnya" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Terakhir" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</a></li>';
                } elseif ($halaman == 2) {
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Pertama" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Sebelumnya" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman 1" href="' . $base_url_pagination . '">1</a></li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman + 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '"> ' . ($halaman + 1) . ' </a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . $jumlah_hal . '" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '"> ' . $jumlah_hal . ' </a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Selanjutnya" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Terakhir" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</a></li>';
                } elseif ($halaman == 3) {
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Pertama" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Sebelumnya" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman 1" href="' . $base_url_pagination . '">1</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman - 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '"> ' . ($halaman - 1) . ' </a></li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman + 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '"> ' . ($halaman + 1) . ' </a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . $jumlah_hal . '" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '"> ' . $jumlah_hal . ' </a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Selanjutnya" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Terakhir" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</a></li>';
                } elseif ($halaman == $jumlah_hal) {
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Pertama" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Sebelumnya" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman 1" href="' . $base_url_pagination . '"> 1 </a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman - 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '"> ' . ($halaman - 1) . ' </a></li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item disabled">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</li>';
                  echo '<li class="page-item disabled">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</li>';
                } elseif ($halaman == ($jumlah_hal - 1)) {
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Pertama" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Sebelumnya" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman 1" href="' . $base_url_pagination . '">1</a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman - 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">' . ($halaman - 1) . '</a></li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman + 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '"> ' . ($halaman + 1) . ' </a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Selanjutnya" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Terakhir" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</a></li>';
                } elseif ($halaman == ($jumlah_hal - 2)) {
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Pertama" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Sebelumnya" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman 1" href="' . $base_url_pagination . '">1</a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman - 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">' . ($halaman - 1) . '</a></li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman + 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '"> ' . ($halaman + 1) . ' </a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . $jumlah_hal . '" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '"> ' . $jumlah_hal . ' </a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Selanjutnya" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Terakhir" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</a></li>';
                } else {
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Pertama" href="' . $base_url_pagination . '">';
                  echo '<span class="page-link">&laquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Sebelumnya" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '">';
                  echo '<span class="page-link">&lsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman 1" href="' . $base_url_pagination . '">1</a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman - 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman - 1) . '"> ' . ($halaman - 1) . ' </a></li>';
                  echo '<li class="page-item active">';
                  echo '<span class="page-link">' . $halaman . '</span>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . ($halaman + 1) . '" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '"> ' . ($halaman + 1) . ' </a></li>';
                  echo '<li class="page-item"><span class="page-link">...</span></li>';
                  echo '<li class="page-item"><a class="page-link" title="Halaman ' . $jumlah_hal . '" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '"> ' . $jumlah_hal . ' </a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Selanjutnya" href="' . $base_url_pagination . '&halaman=' . ($halaman + 1) . '">';
                  echo '<span class="page-link">&rsaquo;</span>';
                  echo '</a></li>';
                  echo '<li class="page-item">';
                  echo '<a title="Halaman Terakhir" href="' . $base_url_pagination . '&halaman=' . $jumlah_hal . '">';
                  echo '<span class="page-link">&raquo;</span>';
                  echo '</a></li>';
                }
              }
            } ?>
          </div>
        </div>
        <div class="col-4 align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
          <form class="input-group mb-3">
            <input name="q" type="search" class="form-control" placeholder="Cari Renungan..." aria-label="Cari Renungan..." aria-describedby="button-addon2">
            <input type="hidden" value="renungan" name="page">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>