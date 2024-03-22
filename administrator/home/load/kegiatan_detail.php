<?php $q = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_kegiatan` WHERE `id_kegiatan` = " . $_GET['id_kegiatan'])); ?>

<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">

       
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
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
          <?php $user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `tb_pengguna` WHERE `id_pengguna`")); ?>
          <div class="card w-100 shadow-sm mb-4">
            <img src="administrator/home/load/kegiatan/<?= $q['id_kegiatan']; ?>.png?d=<?= time(); ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="index.php?page=kegiatan_detail&id=<?= $q['id_kegiatan']; ?>"><?= $q['judul_kegiatan']; ?></a></h5>
              <i class="bi bi-person"></i> <?= $user['nama_pengguna']; ?>&nbsp;&nbsp;-&nbsp;&nbsp;<i class="bi bi-calendar"></i> <?= date('Y-m-d H.i.s')?>
              <br />
              <br />
              <p class="card-text"><?= nl2br($q['konten_kegiatan']); ?></p>
            </div>
          </div>
        </div>
        <div class="col-4 align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
          <form class="input-group mb-3">
            <input name="q" type="search" class="form-control" placeholder="Cari Kegiatan..." aria-label="Cari Kegiatan..." aria-describedby="button-addon2">
            <input type="hidden" value="kegiatan" name="page">
            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>