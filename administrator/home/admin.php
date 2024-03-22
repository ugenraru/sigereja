<?php

//Manampilkan jumlah data misalnya tabel mautasi umat, lingkungan, stasi, dan lain -lain
$sql = $koneksi->query("SELECT COUNT(nik) as nik  FROM tb_mutasi_masuk");
  while ($data= $sql->fetch_assoc()) {
    $mutasi_masuk=$data['nik'];
  }


  $sql = $koneksi->query("SELECT COUNT(id_umat) as umat  from tb_umat where status_umat='Ada'");
  while ($data= $sql->fetch_assoc()) {
    $pend=$data['umat'];
  }

//   $sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
//   while ($data= $sql->fetch_assoc()) {
//     $kartu=$data['kartu'];
//   }

  $sql = $koneksi->query("SELECT COUNT(id_umat) as laki  from tb_umat where jenis_kelamin='LK'");
  while ($data= $sql->fetch_assoc()) {
    $laki=$data['laki'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_umat) as prem  from tb_umat where jenis_kelamin='PR'");
  while ($data= $sql->fetch_assoc()) {
    $prem=$data['prem'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_umat) as babt  from tb_umat where status_babtis='sudah babtis'");
  while ($data= $sql->fetch_assoc()) {
    $babt=$data['babt'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_stasi) as stasi from tb_stasi");
  while ($data= $sql->fetch_assoc()) {
    $stasi=$data['stasi'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_lingkungan) as lingkungan  from tb_lingkungan");
  while ($data= $sql->fetch_assoc()) {
    $lingkungan=$data['lingkungan'];
  }

  $sql = $koneksi->query("SELECT COUNT(id_kub) as kub  from tb_kub");
  while ($data= $sql->fetch_assoc()) {
    $kub=$data['kub'];
  }
  $sql = $koneksi->query("SELECT COUNT(id_pindah) as pindah  from tb_pindah");
  while ($data= $sql->fetch_assoc()) {
    $pindah=$data['pindah'];
  }
  $sql = $koneksi->query("SELECT COUNT(id_mutasi_keluar) as mutasi_keluar  from tb_mutasi_keluar");
  while ($data= $sql->fetch_assoc()) {
    $mutasi_keluar=$data['mutasi_keluar'];
  }
  $sql = $koneksi->query("SELECT COUNT(id_kategorial) as kelompok_kategorial  from tb_kategorial");
  while ($data= $sql->fetch_assoc()) {
    $kategorial=$data['kelompok_kategorial'];
  }
  $sql = $koneksi->query("SELECT COUNT(id_pengurus) as pengurus  from tb_pengurus");
  while ($data= $sql->fetch_assoc()) {
    $pengurus=$data['pengurus'];
  }
  $sql = $koneksi->query("SELECT COUNT(id_kematian) as kematian  from tb_kematian");
  while ($data= $sql->fetch_assoc()) {
    $kematian=$data['kematian'];
  }




  // $sql = $koneksi->query("SELECT COUNT(id_pindah) as pindah  from tb_pindah");
  // while ($data= $sql->fetch_assoc()) {
  //   $pindah=$data['pindah'];
  // }

?>
<div class="row">
	
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $mutasi_masuk;  ?>
				</h3>

				<p>MUTASI MASUK</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="index.php?page=data-mutasi-masuk" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
					<?php echo $pend;  ?>
				</h3>

				<p>UMAT</p>
			</div>
			<div class="icon">
				<i class="ion ion-person"></i>
			</div>
			<a href="index.php?page=data-umat" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-orange">
			<div class="inner">
				<h3>
					<?php echo $laki;  ?>
				</h3>

				<p>LAKI-LAKI</p>
			</div>
			<div class="icon">
				<i class="ion ion-male"></i>
			</div>
			<a href="index.php?page=data-umat-laki" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
					<?php echo $prem;  ?>
				</h3>

				<p>PEREMPUAN</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=data-umat-perempuan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
		<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
					<?php echo $pengurus;  ?>
				</h3>

				<p>PENGURUS</p>
			</div>
			<div class="icon">
				<i class="ion ion-female"></i>
			</div>
			<a href="index.php?page=data-pengurus" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $kategorial;  ?>
				</h3>

				<p>KELOMPOK KATEGORIAL</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="index.php?page=data-kategorial" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $stasi;  ?>
				</h3>

				<p>STASI</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-happy"></i>
			</div>
			<a href="index.php?page=data-stasi" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $lingkungan;  ?>
				</h3>

				<p>LINGKUNGAN</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-sad"></i>
			</div>
			<a href="index.php?page=data-lingkungan" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3>
					<?php echo $kub;  ?>
				</h3>

				<p>KUB</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-download"></i>
			</div>
			<a href="index.php?page=data-kub" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-blue">
			<div class="inner">
				<h3>
					<?php echo $pindah;  ?>
				</h3>

				<p>PINDAH</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-download"></i>
			</div>
			<a href="index.php?page=data-pindah" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
		<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-orange">
			<div class="inner">
				<h3>
					<?php echo $mutasi_keluar;  ?>
				</h3>

				<p>MUTASI KELUAR</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-exit"></i>
			</div>
			<a href="index.php?page=data-mutasi-keluar" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
		<!-- ./col -->
		<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					<?php echo $kematian;  ?>
				</h3>

				<p>KEMATIAN</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-people"></i>
			</div>
			<a href="index.php?page=data-kematian" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<!-- <div class="col-lg-3 col-6"> -->
		<!-- small box -->
		<!-- <div class="small-box bg-warning">
			<div class="inner">
				<h3>
					<?php echo $pindah;  ?>
				</h3>

				<p>Pindah</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-upload"></i>
			</div>
			<a href="index.php?page=log-izin" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div> -->

</div>