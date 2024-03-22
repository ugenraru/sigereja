<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Kematian
		</h3>
	</div>
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
							<option value="<?php echo $row['nik'] ?>">
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
					<input type="text" class="form-control" id="nama_umat" name="nama_umat" placeholder="Nama Umat" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KUB</label>
				<div class="col-sm-4">
					<select name="id_kub" id="id_kub" class="form-control select2bs4">
						<option value="" disabled selected> KUB - </option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kub where id_kub";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kub'] ?>" >
								<?php echo $row['nama_kub'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Lingkungan</label>
				<div class="col-sm-4">
					<select name="id_lingkungan" id="id_lingkungan" class="form-control select2bs4" >
						<option value="" disabled selected>Lingkungan -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_lingkungan where id_lingkungan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_lingkungan'] ?>">
								<?php echo $row['nama_lingkungan'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Kematian</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Tempat Kematian" name="tempat_kematian" required id="tempat_kematian">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Kematian</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" placeholder="Tanggal Kematian" name="tanggal_kematian" required id="tanggal_kematian">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Sakramen</label>
				<div class="col-sm-4">
					<select name="status_sakramen" class="form-control" id="status_sakramen">
						<option value="">--- Pilih Sakramen ---</option>
						<option value="belum">Belum Menerima</option>
						<option value="sudah">Sudah Menerima</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-kematian" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>
<script src="plugins/jquery/jquery.min.js"></script>

<script>
	$('#btn_nik').click(function() {
		var val = $('#f_nik').val();
		$.ajax({
			url: "http://localhost/sigereja/administrator/query.php?q=get_data",
			type: "POST",
			dataType: "JSON",
			data: {
				tbl: 'tb_umat',
				q: val
			},
			success: function(data) {
				$('#nama_umat').val(data.nama_umat)
				// $('#id_kub').val(data.id_kub)
				var kub = new Option(data.nama_kub, data.id_kub, true, true);
				$('#id_kub').append(kub).trigger('change');
				var lingkungan = new Option(data.nama_lingkungan, data.id_lingkungan, true, true);
				$('#id_lingkungan').append(lingkungan).trigger('change');
				// $('#id_lingkungan').val(data.id_lingkungan)

			},
		});
		// ambil data dari database
		// $query_simpan = mysqli_query($koneksi, $sql_simpan);
	})
</script>
<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	// {"f_nik":"5316034209000003","nama_umat":"Katarina Nggua","id_kub":"3","id_lingkungan":"1","tempat_kematian":"banyuwangi","tanggal_kematian":"2024-01-22","status_sakramen":"sudah","Simpan":"Simpan"}
	$nik = $_POST['f_nik'];
	$nama_umat = $_POST['nama_umat'];
	$id_kub = $_POST['id_kub'];
	$id_lingkungan = $_POST['id_lingkungan'];
	$tempat_kematian = $_POST['tempat_kematian'];
	$tanggal_kematian = $_POST['tanggal_kematian'];
	$status_sakramen = $_POST['status_sakramen'];

	$sql_simpan = "INSERT INTO tb_kematian set nik='$nik', nama='$nama_umat', id_lingkungan='$id_lingkungan', id_kub='$id_kub', tempat_kematian='$tempat_kematian', tanggal_kematian='$tanggal_kematian', status_sakramen='$status_sakramen'";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	$sql_hapus = "DELETE FROM tb_umat where nik='$nik'";
	$query_hapus = mysqli_query($koneksi, $sql_hapus);

	$hps_masuk = "DELETE FROM tb_mutasi_masuk where nik='$nik'";
	mysqli_query($koneksi, $hps_masuk);
	
	mysqli_close($koneksi);

	if ($query_simpan && $sql_hapus) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kematian';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kematian';
          }
      })</script>";
	}
}
     //selesai proses simpan data
