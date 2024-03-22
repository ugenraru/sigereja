  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 footer-contact">
            <h3>Kontak</h3>
            <p>
              <?= nl2br($p['alamat_gereja']); ?>
            </p>
            <p>
              <?= nl2br($p['kecamatan_gereja']); ?>
              </p>
              <p>
              <?= nl2br($p['kelurahan_gereja']); ?>
              </p>
              <p>
              <?= nl2br($p['kabupaten_gereja']); ?>
              </p>
              <p>
              <?= nl2br($p['provinsi_gereja']); ?>
              <br /><br />
              <strong>Phone:</strong> <?= $p['no_hp']; ?>
              <br />
              <strong>Email:</strong> <?= $p['email_gereja']; ?>
            </p>
          </div>
          <div class="col-lg-8 col-md-8 footer-links">
            <h3>Tentang <?= $p['nama_web']; ?></h3>
            <p><?= nl2br($p['isi_judul']); ?></p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span><?= $p['nama_web']; ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="index.php"><?= $p['nama_web']; ?></a>
      </div>
    </div>
  </footer>
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="administrator/home/assets/vendor/aos/aos.js"></script>
  <script src="administrator/home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="administrator/home/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="administrator/home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="administrator/home/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="administrator/home/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <!-- <script src="home/assets/vendor/php-email-form/validate.js"></script> -->
  <script src="administrator/home/assets/js/main.js"></script>

</body>

</html>