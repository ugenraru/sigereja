<?php

?>

<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">

      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="administrator/home/assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section>

<main id="main">

  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
       
      </div>
      <div class="row">
        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Alamat:</h4>
              <p><?= nl2br($p['alamat_gereja']); ?></p>
            </div>
            <div class="email_gereja">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p><?= $p['email_gereja']; ?></p>
            </div>
            <div class="no_hp">
              <i class="bi bi-phone"></i>
              <h4>Ponsel:</h4>
              <p><?= $p['no_hp']; ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form action="administrator/home/load/kontak_aksi.php" method="post" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="nama_lengkap" placeholder="Nama" class="form-control" required>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="No.hp" name="subjek" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="isi_pesan" placeholder="Pesan" rows="10" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.7679329857706!2d123.60603071479572!3d-10.199491892714565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c569b3716681aef%3A0x8c36d160a06ff38f!2sParoki%20Sta.%20Familia%20Sikumana!5e0!3m2!1sid!2sid!4v1675689975767!5m2!1sid!2sid" frameborder="0" style="border:0; width: 120%; height: 290px;" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

</main>