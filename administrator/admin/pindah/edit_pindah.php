<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_pindah a join tb_umat b on a.id_umat=b.id_umat WHERE a.id_pindah='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Perpindahan
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="f_nik" name="f_nik" placeholder="NIK"
						value="<?php echo $data_cek['nik'] ?>" readonly>
				</div>

			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" value="<?php echo $data_cek['nama_umat'] ?>" id="nama_umat"
						name="nama_umat" placeholder="Nama Umat" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KUB Asal</label>
				<div class="col-sm-6">
					<?php
					// buat query untuk mengambil data dari tb_kub berdasarkan id_kub asal
					// $query = "SELECT * FROM tb_kub WHERE id_kub=?";
					$query = "SELECT * FROM tb_kub";
					// buat variabel statement/stmt yang berisi fungsi prepare dengan argumen query
					// prepare berfungsi untuk mempersiapkan statement,agar lebih aman dari serangan sql injection
					$stmt = $koneksi->prepare($query);
					// selanjutnya kita mengikat parameter id yang bertipe integer(i pada argumen pertama menandakan integer)
					// di parameter ke 2 kita mengambil id dari $data_cek['id_kub_asal'] yang nantinya dimasukkan ke dalam query where id=?
					// $stmt->bind_param('i',$data_cek['id_kub_asal']);
					// setelah melakukan binding,selanjutnya kita mengeksekusi statement yang sudah disiapkan menggunakan fungsi execute()
					// output dari eksekusi berupa boolean yang bernilai true jika query berhasil,dan false jika gagal
					$stmt->execute();
					// setelah eksekusi dilakukan selanjutnya kita mendapatkan data menggunakan dungsi get_result() dan menampungnya di variabel $kub
					// selain itu juga kita memastikan data diuraikan dalam bentuk asosiatif menggunakan fungsi fetch_assoc()
					// $kub = $stmt->get_result()->fetch_assoc();
					// $kub = $stmt->get_result()->fetch_assoc();
					// jangan lupa,setelah selesai melakukan query untuk menutup koneksi database dengan fungsi close
					$kub = $stmt->get_result();
					?>
					<input type="hidden" name="id_kub" value="<?= $data_cek['id_kub_asal'] ?>">
					<select id="id_kub" class="form-control" disabled>
						<!-- </?php foreach($stmt as $k){?> -->
						<?php while ($k = $kub->fetch_assoc()) { ?>
							<option value="<?= $k['id_kub'] ?>" <?= ($k['id_kub'] == $data_cek['id_kub_asal']) ? "selected" : "" ?>><?= $k['nama_kub'] ?></option>
						<?php } ?>
					</select>
					<?php
					$stmt->close();
					?>
					<!-- <input type="text" class="form-control" id="id_kub" name="id_kub" placeholder="asal kub" value="</?php echo $kub['nama_kub'] ?>" readonly> -->
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lingkungan Asal</label>
				<div class="col-sm-6">
					<?php
					$query = "SELECT * FROM tb_lingkungan WHERE id_lingkungan=?";

					$stmt = $koneksi->prepare($query);
					$stmt->bind_param('i', $data_cek['id_lingkungan_asal']);
					$stmt->execute();
					$ling = $stmt->get_result()->fetch_assoc();
					$stmt->close();

					?>
					<input type="hidden" name="id_lingkungan" value="<?= $ling['id_lingkungan'] ?>">
					<input type="text" class="form-control" id="id_lingkungan" placeholder="Asal Lingkungan"
						value="<?php echo $ling['nama_lingkungan'] ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KUB Tujuan</label>
				<div class="col-sm-4">
					<select name="id_kub_tujuan" id="id_kub_tujuan" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih KUB -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kub where id_kub";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
							?>
							<option value="<?php echo $row['id_kub'] ?>" <?php echo $row['id_kub'] == $data_cek['id_kub_tujuan'] ? "selected" : "" ?>>
								<?php echo $row['nama_kub'] ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lingkungan Tujuan</label>
				<div class="col-sm-4">
					<select name="id_lingkungan_tujuan" id="id_lingkungan_tujuan" class="form-control select2bs4"
						required>
						<option value="" disabled selected>- Pilih Lingkungan -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lingkungan where id_lingkungan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
							?>
							<option value="<?php echo $row['id_lingkungan'] ?>" <?php echo $row['id_lingkungan'] == $data_cek['id_lingkungan_tujuan'] ? "selected" : "" ?>>
								<?php echo $row['nama_lingkungan'] ?>
							</option>
							<?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="col-md-6 offset-md-6">
				<input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
				<a href="?page=data-pindah" title="Kembali" class="btn btn-danger">Batal</a>
			</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$id = $_GET['kode'];
	$id_umat = $_POST['f_nik'];
	$nama_umat = $_POST['nama_umat'];
	$id_kub_asal = $_POST['id_kub'];
	$id_lingkungan_asal = $_POST['id_lingkungan'];
	$id_kub_tujuan = $_POST['id_kub_tujuan'];
	$id_lingkungan_tujuan = $_POST['id_lingkungan_tujuan'];
	$sql_simpan = "UPDATE tb_pindah set id_umat='$id_umat',id_kub_asal='$id_kub_asal',
	 id_lingkungan_asal='$id_lingkungan_asal', id_kub_tujuan='$id_kub_tujuan',id_lingkungan_tujuan='$id_lingkungan_tujuan' 
	 where id_pindah='$id'";
	$query_ubah = mysqli_query($koneksi, $sql_simpan);

	$sql_pindah = "UPDATE tb_umat set id_kub='$id_kub_tujuan', id_lingkungan='$id_lingkungan_tujuan' where id_umat='$id_umat'";
	$query_pindah = mysqli_query($koneksi, $sql_pindah);
	if ($query_ubah && $query_pindah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pindah';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pindah';
        }
      })</script>";
	}
}