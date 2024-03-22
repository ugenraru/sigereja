<?php

 $sql_cek = "SELECT * FROM tb_pengaturan WHERE id_pengaturan=1";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
         if ($data_cek['gambar_gereja']) {
      $gambar = "administrator/website/gambar/" . $data_cek['gambar_gereja'];
    } else {
      $gambar = "administrator/website/gambar/noimage.png";
    }


//mengambil data dan hitung dari tiap tabel seperti umat, kematian dll
$umat = mysqli_query($koneksi, "SELECT * FROM tb_umat");
$j_umat = mysqli_num_rows($umat);

$kematian = mysqli_query($koneksi, "SELECT * FROM tb_kematian");
$j_kematian = mysqli_num_rows($kematian);

$stasi = mysqli_query($koneksi, "SELECT * FROM tb_stasi");
$S_stasi = mysqli_num_rows($stasi);

$rukun = mysqli_query($koneksi, "SELECT * FROM tb_lingkungan");
$R_rukun = mysqli_num_rows($rukun);

$kub = mysqli_query($koneksi, "SELECT * FROM tb_kub");
$K_kub = mysqli_num_rows($kub);

$kategorial = mysqli_query($koneksi, "SELECT * FROM tb_kategorial");
$K_kategorial = mysqli_num_rows($kategorial);

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

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-xl-8 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="w-100">
            <div class="icon-box2 p-0">
            <img src="<?php echo $gambar; ?>"  alt="" class="img-fluid">
              <div class="px-4 py-3">
                <span class="text-dark fs-6"><?= nl2br($p['tentang_gereja']); ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="w-100">
            <div class="icon-box2 p-4">
              <h4>Ayat Kitab Suci</h4>
              <span class="text-dark fs-6"><?= nl2br($p['isi_judul']); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about" class="about" style="background-image: url('administrator/home/assets/bg.jpg') !important; background-repeat: none !important; background-size: 100% !important;">
    <div class="container" data-aos="fade-up">
      <div class="row content">
        <div class="col-2 text-center text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
        </svg>
          <h1><?= $j_umat; ?></h1>
          <h4>Umat</h4>
        </div>
        <div class="col-2 text-center text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
         <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z"/>
          </svg>
          <h1><?= $K_kategorial; ?></h1>
          <h4>kategorial</h4>
        </div>
    
        <div class="col-2 text-center text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-x-fill" viewBox="0 0 16 16">
         <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zM6.854 5.146a.5.5 0 1 0-.708.708L7.293 7 6.146 8.146a.5.5 0 1 0 .708.708L8 7.707l1.146 1.147a.5.5 0 1 0 .708-.708L8.707 7l1.147-1.146a.5.5 0 0 0-.708-.708L8 6.293 6.854 5.146z"/>
          </svg>
          <h1><?= $j_kematian; ?></h1>
          <h4>Kematian</h4>
        </div>
        <div class="col-2 text-center text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg>
          <h1><?= $R_rukun; ?></h1>
          <h4>Lingkungan</h4>
        </div>
        <div class="col-2 text-center text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
      </svg>
          <h1><?= $K_kub; ?></h1>
          <h4>KUB</h4>
        </div>
        <div class="col-2 text-center text-light">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
        <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z"/>
      </svg>
          <h1><?= $S_stasi; ?></h1>
          <h4>STASI</h4>
        </div>
      </div>
    </div>
  </section>

  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-xl-8 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="w-100">
            <div class="icon-box2 p-0">
              <img src="administrator/home/assets/pastor.jpg" class="w-100">
              <div class="px-4 py-3">
                <span class="text-dark fs-6"><?= nl2br($p['tentang_pastor']); ?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="w-100">
            <div class="icon-box2 p-4">
              <h4>Pastor Paroki</h4>
              <span><b>Nama:</b> <?= $p['pastor_paroki']; ?></span>
              <br />
              <span><b>No. Ponsel:</b> <?= $p['no_hp']; ?></span>
              <br />
              <span><b>Email:</b> <?= $p['email_gereja']; ?></span>
              <br />
         
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>