<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kegiatan
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<h5>SEMUA DATA KEGIATAN YANG TERDAFTAR</h5>
			<div class="col-md-6 offset-md-10">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tbh_berita">
					Tambah Kegiatan
				</button>

				<!-- Modal -->
				<div class="modal fade" id="tbh_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form action="" method="post" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Tanggal Posting</label>
										<div class="col-sm-8">
											<input type="date" class="form-control" id="tanggal_postingan" name="tanggal_postingan" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Judul Kegiatan</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan" required>
										</div>
									</div>


									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Konten Kegiatan</label>
										<div class="col-sm-8">
											<textarea class="ckeditor" id="konten_kegiatan" name="konten_kegiatan"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Gambar</label>
										<div class="col-sm-8">
											<input type="file" class="form-control" id="gambar_kegiatan" name="gambar_kegiatan" required>
										</div>
									</div>


									<div class="form-group row">
										<label class="col-sm-4 col-form-label">Admin Posting</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="user_postingan" name="user_postingan" value="Administrator" readonly>
										</div>
									</div>


								</div>
								<div class="modal-footer">
									<button type="submit" name="Simpan" class="btn btn-primary">Simpan</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Kegiatan</th>
					<th>Tanggal Posting</th>
					<th>User</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php
				$no = 1;
				$sql = $koneksi->query("SELECT * FROM tb_kegiatan");
				while ($data = $sql->fetch_assoc()) {
				?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>

						<td>
							<?php echo $data['judul_kegiatan']; ?>
						</td>
						<td>
							<?php echo $data['tanggal_postingan']; ?>
						</td>
						<td>
							<?php echo $data['user_postingan']; ?>
						</td>
						<td>
							<!-- button untuk menampilkan modal edit -->
							<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal<?php echo $data['id_kegiatan'] ?>">
								<i class="fa fa-edit"></i>
							</button>
							<a href="?page=del-kegiatan&kode=<?php echo $data['id_kegiatan']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
							<!-- <a href="?page=edit-berita&kode=<?php echo $data['id_kegiatan']; ?>" title="Ubah" class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a> -->

							<!-- Modal form setelah button edit diklik -->
							<div class="modal fade" id="editModal<?php echo $data['id_kegiatan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<?php
									if ($data['gambar_kegiatan']) {
										$gambar = "website/gambar/" . $data['gambar_kegiatan'];
									} else {
										$gambar = "website/gambar/noimage.png";
									} ?>
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="" method="post" enctype="multipart/form-data">
											<div class="card-body">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Tanggal Posting</label>
													<div class="col-sm-8">
														<input type="date" class="form-control" value="<?php echo $data['tanggal_postingan'] ?>" id="tanggal_postingan" name="tanggal_postingan" required>
													</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Judul Kegiatan</label>
													<div class="col-sm-8">
														<input type="text" value="<?php echo $data['judul_kegiatan'] ?>" class="form-control" id="judul_kegiatan" name="judul_kegiatan" required>
													</div>
												</div>


												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Konten Kegiatan</label>
													<div class="col-sm-8">
														<textarea class="ckeditor" id="konten_berita" name="konten_kegiatan">
											<?php echo $data['konten_kegiatan'] ?>
											</textarea>
													</div>
												</div>
												<input type="hidden" name="id_kegiatan" value="<?php echo $data['id_kegiatan'] ?>">
												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Gambar</label>
													<div class="col-sm-8">
														<input type="file" class="form-control" id="upload" name="gambar_kegiatan">
														<br>
														<img id="preview" src="<?php echo $gambar; ?>" width="200px">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-sm-4 col-form-label">Admin Posting</label>
													<div class="col-sm-8">
														<input type="text" value="<?php echo $data['user_postingan']; ?>" class="form-control" id="user_postingan" name="user_postingan" value="Administrator" readonly>
													</div>
												</div>

											</div>
											<div class="modal-footer">
												<button type="submit" name="Ubah" class="btn btn-primary">Submit</button>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										</form>
									</div>
								</div>
							</div>
						</td>
					</tr>

				<?php
				}
				?>
			</tbody>
			</tfoot>
		</table>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script>
	function readURL(input) {

		if (input.files &&
			input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#upload").change(function() {
		readURL(this);
	});

	$(function() {
		CKEDITOR.replace('editor1');
		CKEDITOR.replace('editor2');
		CKEDITOR.replace('editor1a');
		CKEDITOR.replace('editor2a');
	})
</script>
<?php

// function untuk menambah data kegiatan
if (isset($_POST['Simpan'])) {
	//Store Data
	$fileName = $_FILES['gambar_kegiatan']['name'];

	//Upload Foto 
	move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], "website/gambar/" . $_FILES['gambar_kegiatan']['name']);
	// INSERT SQL
	$sql_simpan = "INSERT INTO tb_kegiatan (judul_kegiatan, konten_kegiatan, tanggal_postingan, user_postingan, gambar_kegiatan)   
		 VALUES (
			 '" . $_POST['judul_kegiatan'] . "',
			 '" . $_POST['konten_kegiatan'] . "',
			 '" . $_POST['tanggal_postingan'] . "',
			 '" . $_POST['user_postingan'] . "',
			 '$fileName')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	// Dapatkan ID Terakhir
	$last_id = mysqli_insert_id($koneksi);

	// Copy dari tempat store ke folder tempat load gambar
	$newFileName = "home/load/kegiatan/" . $last_id . ".png";
	copy("website/gambar/" . $fileName, $newFileName);

	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
  Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
	window.location = 'index.php?page=data-kegiatan';
      console.log('test')
      }
  })</script>";
	} else {
		echo "<script>
  Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
  }).then((result) => {if (result.value){
      window.location = 'index.php?page=data-kegiatan';
      }
  })</script>";
	}
}


// function untuk mengupdate data berita setalh modal disubmit
if (isset($_POST['Ubah'])) {
	$fileName = $_FILES['gambar_kegiatan']['name'];
	if ($fileName) {
		move_uploaded_file($_FILES['gambar_kegiatan']['tmp_name'], "website/gambar/" . $_FILES['gambar_kegiatan']['name']);
		$sql_ubah = "UPDATE tb_kegiatan SET 
		judul_kegiatan='" . $_POST['judul_kegiatan'] . "',
		konten_kegiatan='" . $_POST['konten_kegiatan'] . "',
		tanggal_postingan='" . $_POST['tanggal_postingan'] . "',
		user_postingan='" . $_POST['user_postingan'] . "',
		gambar_kegiatan='$fileName'
		WHERE id_kegiatan='" . $_POST['id_kegiatan'] . "'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);
		if ($query_ubah) {
			echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kegiatan';
        }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kegiatan';
        }
      })</script>";
		}
	} else {
		$sql_ubah = "UPDATE tb_kegiatan SET 
		judul_kegiatan='" . $_POST['judul_kegiatan'] . "',
		konten_kegiatan='" . $_POST['konten_kegiatan'] . "',
		tanggal_postingan='" . $_POST['tanggal_postingan'] . "',
		user_postingan='" . $_POST['user_postingan'] . "'
		WHERE id_kegiatan='" . $_POST['id_kegiatan'] . "'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);
		if ($query_ubah) {
			echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kegiatan';
        }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kegiatan';
        }
      })</script>";
		}
	}
}
