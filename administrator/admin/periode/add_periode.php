<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun Awal</label>
				<div class="col-sm-6">
					<input type="year" class="form-control" id="th_awal" name="th_awal" placeholder="Tahun Awal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun Akhir</label>
				<div class="col-sm-6">
					<input type="year" class="form-control" id="th_akhir" name="th_akhir" placeholder="Tahun Akhir" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-periode" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$tgl = date('Y-m-d H:i:s', time());
	$th_awal = $_POST['th_awal'];
	$th_akhir = $_POST['th_akhir'];
	$sql_simpan = "INSERT INTO tb_periode set th_awal='$th_awal', th_akhir='$th_akhir', created_at='$tgl'";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-periode';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-periode';
          }
      })</script>";
	}
}
     //selesai proses simpan data
