<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_kematian WHERE id_kematian='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data Kematian
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="f_nik" name="f_nik" placeholder="NIK" value="<?php echo $data_cek['nik'] ?>" readonly>
				</div>
				
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_umat" value="<?php echo $data_cek['nama'] ?>" name="nama_umat" placeholder="Nama Umat" readonly>
				</div>
			</div>

		

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Kematian</label>
				<div class="col-sm-4">
					<input type="text" class="form-control"  value="<?php echo $data_cek['tempat_kematian'] ?>" placeholder="Tempat Kematian" name="tempat_kematian" required id="tempat_kematian">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Kematian</label>
				<div class="col-sm-4">
					<input type="date" class="form-control"  value="<?php echo $data_cek['tanggal_kematian'] ?>" placeholder="Tanggal Kematian" name="tanggal_kematian" required id="tanggal_kematian">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Sakramen</label>
				<div class="col-sm-4">
					<select name="status_sakramen" class="form-control" id="status_sakramen">
						<option value="">--- Pilih Sakramen ---</option>
						<option value="belum" <?php echo $data_cek['status_sakramen'] == 'belum' ? "selected" : "" ?>>Belum Menerima</option>
						<option value="sudah" <?php echo $data_cek['status_sakramen'] == 'sudah' ? "selected" : "" ?>>Sudah Menerima</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
			<a href="?page=data-kematian" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])) {
	$id=$_GET['kode'];
	$sql_ubah = "UPDATE tb_kematian SET 
		nik='" . $_POST['f_nik'] . "',
		nama='" . $_POST['nama_umat'] . "',
		tempat_kematian='" . $_POST['tempat_kematian'] . "',
		tanggal_kematian='" . $_POST['tanggal_kematian'] . "',
		status_sakramen='" . $_POST['status_sakramen'] . "'  where id_kematian='$id'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kematian';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kematian';
        }
      })</script>";
	}
}
