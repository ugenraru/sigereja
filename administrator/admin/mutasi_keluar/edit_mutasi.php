<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_mutasi_keluar WHERE id_mutasi_keluar='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
		<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<!-- <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required> -->
					<select name="f_nik" id="f_nik" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih NIK -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat where nik";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>" <?php echo $row['id_umat'] == $data_cek['nik'] ? "selected" : "" ?>>
								<?php echo $row['nik'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-sm-2">
					<button id="btn_nik" class="btn btn-info" type="button"> Cari</button>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" value="<?php echo $data_cek['nama'] ?>" id="nama_umat" name="nama_umat" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama KUB</label>
				<div class="col-sm-4">
					<select name="id_kub" id="id_kub" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih KUB -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kub where id_kub";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kub'] ?>" <?php echo ($data_cek['id_kub'] == $row['id_kub'] ? 'selected' : "") ?>>
								<?php echo $row['nama_kub'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lingkungan</label>
				<div class="col-sm-4">
					<select name="id_lingkungan" id="id_lingkungan" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Lingkungan -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lingkungan where id_lingkungan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_lingkungan'] ?>"  <?php echo ($data_cek['id_lingkungan'] == $row['id_lingkungan'] ? 'selected' : "") ?>>
								<?php echo $row['nama_lingkungan'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan Paroki</label>
				<div class="col-sm-4">
					<input type="text" class="form-control"  value="<?php echo $data_cek['tujuan_paroki'] ?>" id="tujuan_paroki" name="tujuan_paroki" placeholder="Tujuan Gereja Paroki" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keuskupan</label>
				<div class="col-sm-4">
					<input type="text" class="form-control"  value="<?php echo $data_cek['keuskupan'] ?>" id="keuskupan" name="keuskupan" placeholder="Keuskupan" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan Keluar</label>
				<div class="col-sm-3">
					<select name="alasan_pindah" id="alasan_pindah" class="form-control">
						<option value="" disabled selected>- Pilih Alasan keluar -</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['alasan_keluar'] == "Dominisili") echo "<option value='Dominisili' selected>Dominisili</option>";
						else echo "<option value='Dominisili'>Dominisili</option>";

						if ($data_cek['alasan_keluar'] == "Pemindahan") echo "<option value='Pindah' selected>Pindah</option>";
						else echo "<option value='Pemindahan'>Pemindahan</option>";

						if ($data_cek['alasan_keluar'] == "Alasan lainnya") echo "<option value='Alasan lainnya' selected>PAlasan lainnya</option>";
						else echo "<option value='Alasan lainnya'>Alasan lainnya</option>";

						
						?>
					</select>
				</div>
					</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Keluar</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="tgl_pindah"  value="<?php echo $data_cek['tgl_keluar'] ?>" name="tgl_pindah" placeholder="tgl_pindah" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-info">
			<a href="?page=data-mutasi-keluar" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {

	$sql_ubah = "UPDATE tb_mutasi_keluar SET 
		nik='" . $_POST['f_nik'] . "',
		nama='" . $_POST['nama_umat'] . "',
		tujuan_paroki='" . $_POST['tujuan_paroki'] . "',
		id_kub='" . $_POST['id_kub'] . "',
		id_lingkungan='" . $_POST['id_lingkungan'] . "',
		provinsi='" . $_POST['provinsi'] . "',
		kabupaten='" . $_POST['kabupaten'] . "',
		kecamatan='" . $_POST['kecamatan'] . "',
		kelurahan='" . $_POST['kelurahan'] . "',
		alasan_keluar='" . $_POST['alasan_pindah'] . "',
		tgl_keluar='" . $_POST['tgl_pindah'] . "'
		WHERE id_mutasi_keluar='" . $_GET['kode'] . "'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mutasi-keluar';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mutasi-keluar';
        }
      })</script>";
	}
}
