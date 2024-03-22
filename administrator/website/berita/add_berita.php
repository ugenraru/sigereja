<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Posting</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tanggal_postingan" name="tanggal_postingan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Judul Berita</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Konten Berita</label>
				<div class="col-sm-6">
					<textarea class="ckeditor" id="konten_berita" name="konten_berita"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Gambar</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="gambar_berita" name="gambar_berita" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Admin Posting</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="user_postingan" name="user_postingan"
						value="Administrator" readonly>
				</div>
			</div>


		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-berita" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php

if (isset($_POST['Simpan'])) {
	//Store Data
	$fileName = $_FILES['gambar_berita']['name'];

	//Upload Foto 
	move_uploaded_file($_FILES['gambar_berita']['tmp_name'], "website/gambar/" . $_FILES['gambar_berita']['name']);
	// INSERT SQL
	$sql_simpan = "INSERT INTO tb_berita (judul_berita, konten_berita, tanggal_postingan, user_postingan, gambar_berita)   
		 VALUES (
			 '" . $_POST['judul_berita'] . "',
			 '" . $_POST['konten_berita'] . "',
			 '" . $_POST['tanggal_postingan'] . "',
			 '" . $_POST['user_postingan'] . "',
			 '$fileName')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	// Dapatkan ID Terakhir
	$last_id = mysqli_insert_id($koneksi);

	// Copy dari tempat store ke folder tempat load gambar
	$newFileName = "home/load/berita/" . $last_id . ".png";
	copy("website/gambar/" . $fileName, $newFileName);

	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
  Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
      console.log('test')
      }
  })</script>";
	} else {
		echo "<script>
  Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
      window.location = 'index.php?page=add-berita';
      }
  })</script>";
	}

}
//selesai proses simpan data
