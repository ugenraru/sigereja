<?php
// function untuk mengupdate data pengaturan
if (isset($_POST['Ubah'])) {
	$fileName = $_FILES['gambar_gereja']['name'];
	if ($fileName) {
		move_uploaded_file($_FILES['gambar_gereja']['tmp_name'], "website/gambar/" . $_FILES['gambar_gereja']['name']);
		$sql_ubah = "UPDATE tb_pengaturan SET 
		nama_web='" . $_POST['nama_web'] . "',
		isi_judul='" . $_POST['isi_judul'] . "',
		tentang_gereja='" . $_POST['tentang_gereja'] . "',
		no_hp='" . $_POST['no_hp'] . "',
		email_gereja='" . $_POST['email_gereja'] . "',
		alamat_gereja='" . $_POST['alamat_gereja'] . "',
		provinsi_gereja='" . $_POST['provinsi_gereja'] . "',
		kabupaten_gereja='" . $_POST['kabupaten_gereja'] . "',
		kecamatan_gereja='" . $_POST['kecamatan_gereja'] . "',
		kelurahan_gereja='" . $_POST['kelurahan_gereja'] . "',
		gambar_gereja='$fileName',
		pastor_paroki='" . $_POST['pastor_paroki'] . "',
		tentang_pastor='" . $_POST['tentang_pastor'] . "'
		WHERE id_pengaturan='" . $_POST['id_pengaturan'] . "'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);

		if ($query_ubah) {
			echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=edit-pengaturan';
        }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=edit-pengaturan';
        }
      })</script>";
		}
	} else {
		$sql_ubah = "UPDATE tb_pengaturan SET 
		nama_web='" . $_POST['nama_web'] . "',
		isi_judul='" . $_POST['isi_judul'] . "',
		tentang_gereja='" . $_POST['tentang_gereja'] . "',
		no_hp='" . $_POST['no_hp'] . "',
		email_gereja='" . $_POST['email_gereja'] . "',
		alamat_gereja='" . $_POST['alamat_gereja'] . "',
		provinsi_gereja='" . $_POST['provinsi_gereja'] . "',
		kabupaten_gereja='" . $_POST['kabupaten_gereja'] . "',
		kecamatan_gereja='" . $_POST['kecamatan_gereja'] . "',
		kelurahan_gereja='" . $_POST['kelurahan_gereja'] . "',
		gambar_gereja='$fileName',
		pastor_paroki='" . $_POST['pastor_paroki'] . "',
		tentang_pastor='" . $_POST['tentang_pastor'] . "'
		WHERE id_pengaturan='" . $_POST['id_pengaturan'] . "'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
		mysqli_close($koneksi);

		if ($query_ubah) {
			echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=edit-pengaturan';
        }
      })</script>";
		} else {
			echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=edit-pengaturan';
        }
      })</script>";
		}
	}
}
$sql_cek = "SELECT * FROM tb_pengaturan WHERE id_pengaturan";
$query_cek = mysqli_query($koneksi, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);

if ($data_cek['gambar_gereja']) {
	$gambar = "website/gambar/" . $data_cek['gambar_gereja'];
} else {
	$gambar = "website/gambar/noimage.png";
}

?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Pengaturan
		</h3>
	</div>
	<div class="card-body">
		<!-- Button untuk memunculkan form edit modal pengaturan -->
		<center>
			<button type="button" class="btn btn-primary" id="btn_edit" data-toggle="modal" data-target="#modal_pengaturan">
				Edit Pengaturan
			</button>
		</center>

		<!-- Modal form setelah button edit diklik -->
		<div class="modal fade" id="modal_pengaturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Pengaturan</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nama Website</label>
									<input type="hidden" class="form-control" id="id_pengaturan" name="id_pengaturan" value="<?php echo $data_cek['id_pengaturan']; ?>" readonly />
									<div class="col-sm-10">
										<input type="text" class="form-control" id="nama_web" name="nama_web" value="<?php echo $data_cek['nama_web']; ?>" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tentang Gereja</label>
									<div class="col-sm-10">
										<textarea class="ckeditor" id="tentang_gereja" name="tentang_gereja"><?php echo $data_cek['tentang_gereja']; ?></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Nomor Handphone</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Quotes</label>
									<div class="col-sm-10">
										<textarea class="ckeditor" id="isi_judul" name="isi_judul"><?php echo $data_cek['isi_judul']; ?></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Email</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="email_gereja" name="email_gereja" value="<?php echo $data_cek['email_gereja']; ?>" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Alamat Gereja</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="alamat_gereja" name="alamat_gereja" placeholder="Jln....." value="<?php echo $data_cek['alamat_gereja']; ?>" />
									</div>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="kecamatan_gereja" name="kecamatan_gereja" placeholder="Kecamatan..." 
										value="<?php echo $data_cek['kecamatan_gereja']; ?>" />
									</div>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="kelurahan_gereja" name="kelurahan_gereja" placeholder="Kelurahan..." 
										value="<?php echo $data_cek['kelurahan_gereja']; ?>" />
									</div>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="kabupaten_gereja" name="kabupaten_gereja" placeholder="Kabupaten..."
										 value="<?php echo $data_cek['kabupaten_gereja']; ?>" />
									</div>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="provinsi_gereja" name="provinsi_gereja" placeholder="Provinsi..." 
										value="<?php echo $data_cek['provinsi_gereja']; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Gambar Gereja</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" id="upload" name="gambar_gereja" value="<?php echo $data_cek['gambar_gereja']; ?>" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label"></label>
									<div class="col-sm-10">
										<img id="preview" src="<?php echo $gambar; ?>" width="200px">
									</div>
								</div>


								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Pastor Paroki</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="pastor_paroki" name="pastor_paroki" value="<?php echo $data_cek['pastor_paroki']; ?>" />
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tentang Pastor</label>
									<div class="col-sm-10">
										<textarea class="ckeditor" id="tentang_pastor" name="tentang_pastor"><?php echo $data_cek['tentang_pastor']; ?></textarea>
									</div>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<input type="submit" name="Ubah" value="Simpan" class="btn btn-primary">
						<a href="index.php" title="Kembali" class="btn btn-danger">Batal</a>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

	// function yg membuat modal itu muncul pertama kali web diakses
	$(document).ready(function() {
		$('#modal_pengaturan').modal('show');
	})

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

