<?php
 $sql_cek = "SELECT * FROM tb_pengaturan WHERE id_pengaturan=1";
 $query_cek = mysqli_query($koneksi, $sql_cek);
 $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
  if ($data_cek['gambar_gereja']) {
$gambar = "administrator/website/gambar/" . $data_cek['gambar_gereja'];
} else {
$gambar = "administrator/website/gambar/noimage.png";
}

?>

<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
      <h1>SELAMAT DATANG </H1>
      </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="home/assets/img/hero-img.jpg" class="img-fluid animated" alt="">
      </div>
    </div>
    <?php 
      $query = mysqli_query($koneksi, "SELECT * FROM tb_sliderumat");
      if (mysqli_num_rows($query) > 0)
      
        $i = 1;
        while ($data = mysqli_fetch_array($query))
         ?>
          <div class="carousel-item <?= $i == 1 ? "active" : ""  ?>">
          <?php $i++; ?>
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown"><?= $data['judul']  ?></h2>
              <p class="animate__animated animate__fadeInUp"><?= $data['isi']  ?></b></p>
            </div>
          </div>
       
  </div>
</section>

<main id="main">

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Jadwal Misa</h2>
      </div>
      <div class="row">
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-calendar"></i></div>
            <h4><a href="#services">Misa Mingguan</a></h4>
            <h5 class="bg-primary text-center text-light mb-0 mt-2">Sabtu</h5>
            <b>16.30 - 18.00 WITA</b>
            <h5 class="bg-primary text-center text-light mb-0 mt-2">Minggu</h5>
            <b>06.00 - 07.30 WITA<br />07.30 - 09.00 WITA</b>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-calendar"></i></div>
            <h4><a href="#services">Misa Harian</a></h4>
            <h5 class="bg-primary text-center text-light mb-0 mt-2">Senin-Jumat</h5>
            <b>06.00 - 07.30 WITA<br />16.30 - 18.00 WITA</b>
            <h5 class="bg-primary text-center text-light mb-0 mt-2">Sabtu</h5>
            <b>06.00 - 07.30 WITA</b>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-calendar"></i></div>
            <h4><a href="#services">Jumat Pertama</a></h4>
            <b>06.00 - 07.30 WITA<br />16.30 - 18.00 WITA<br />16.30 - 18.00 WITA</b>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-calendar"></i></div>
            <h4><a href="#services">Hari Raya Katolik</a></h4>
            <b>Coming Soon</b>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Profil Gereja</h2>
      </div>
      <div class="row content"> 
        <div class="col-lg-4">
        <img src="<?php echo $gambar; ?>" alt="" class="img-fluid">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0">
          <p><?= mb_strimwidth($p['tentang_gereja'], 0, 250, '...'); ?></p>
          <a href="index.php?page=tentang" class="btn-learn-more">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
  </section>

  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Pelayanan</h2>
      </div>
      <div class="row content">
        <div class="col-lg-4">
          <img src="administrator/home/assets/pelayanan.jpg" class="w-100">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0">
          <h4 class="fw-bold text-primary">Jadwal Pelayanan Sekretariat Paroki</h4>
          <b>Senin-Sabtu: 08.00 - 20.00 WITA<br />Minggu: 08.00 - 15.00 WITA</b>
          <h5 class="fw-bold text-danger mt-2">Libur Nasional Tutup</h5>
          <p>*Harap datang tepat waktu dan sesuai dengan jam kerja.</p>
        </div>
      </div>
      

</main>