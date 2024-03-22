<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" id="nik" name="nik" placeholder="NIK" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Asal Paroki</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="asal_paroki" name="asal_paroki" placeholder="Asal Paroki" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Masuk</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Tanggal Masuk" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-mutasi-masuk" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$asal_paroki = $_POST['asal_paroki'];
	$tgl_masuk = $_POST['tgl_masuk'];
	$sql_simpan = "INSERT INTO tb_mutasi_masuk set nik='$nik', nama='$nama', asal_paroki='$asal_paroki', tgl_masuk='$tgl_masuk'";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-mutasi-masuk';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-mutasi-masuk';
          }
      })</script>";
	}
}
     //selesai proses simpan data
