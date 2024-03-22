<?php

$cari = (isset($_GET['q'])) ? $_GET['q'] : '';

$total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM `tb_kegiatan` WHERE `judul_kegiatan` LIKE '%$cari%' OR `konten_kegiatan` LIKE '%$cari%'"));
$dataperhalaman = 3;
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$start = $dataperhalaman * ($halaman - 1);
$jumlah_hal = ceil($total_data / $dataperhalaman);

$sql = mysqli_query($koneksi, "SELECT * FROM `tb_kegiatan` WHERE `judul_kegiatan` LIKE '%$cari%' OR `konten_kegiatan` LIKE '%$cari%' LIMIT $start, $dataperhalaman");

?>

<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
   
      </div>
    
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
            $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_pengguna` WHERE `id_pengguna` ")) ?>
            <div class="card w-100 shadow-sm mb-4">
              <img src="administrator/home/load/berita/<?= $q['id_kegiatan']; ?>.png?d=<?= time(); ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><a href="index.php?page=kegiatan_detail&id=<?= $q['id']; ?>"><?= $q['judul_kegiatan']; ?></a></h5>
                <i class="bi bi-person"></i> <?= $user['nama_pengguna']; ?>&nbsp;&nbsp;-&nbsp;&nbsp;<i class="bi bi-calendar"></i> <?= date('Y-m-d H.i.s'); ?>
                <br />
                <br />
                <p class="card-text"><?= mb_strimwidth($q['konten_kegiatan'], 0, 250, '...'); ?></p>
                <a href="index.php?page=kegiatan_detail&id_kegiatan=<?= $q['id_kegiatan']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
              </div>
            </div>
          <?php } ?>
          <?php $base_url_pagination = 'index.php?page=kegiatan&q=' . $cari; ?>
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
            <input name="q" type="search" class="form-control" placeholder="Cari Kegiatan.." aria-label="Cari Kegiatan..." aria-describedby="button-addon2">
            <input type="hidden" value="kegiatan" name="page">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>