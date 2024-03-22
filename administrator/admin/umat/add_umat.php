<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Umat
		</h3>
	</div>
	<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-4">
					<select name="nik" id="nik" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih NIK -</option>
						<?php
						// ambil data dari database
						$query = "select a.* from tb_mutasi_masuk a left join tb_umat b on a.nik=b.nik where isnull(b.id_umat)";
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
				<!-- <div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
				</div> -->
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_umat" name="nama_umat" placeholder="Nama Umat" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kategorial</label>
				<div class="col-sm-4">
					<select name="id_kategorial" id="id_kategorial" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Kelompok Kategorial -</option>
				
					
						<?php
						// ambil data dari database
						$query = "select * from tb_kategorial where id_kategorial";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_kategorial'] ?>">
								<?php echo $row['nama_kategorial'] ?>
							</option>
						<?php
						}
						?>
					</select>
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
							<option value="<?php echo $row['id_kub'] ?>">
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
				<label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" required>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" onchange="hitungUmur(this.value)" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Umur</label>
				<div class="col-sm-3">
					<input name="umur" type="text" class="form-control" id="inputUmur" readonly>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
						<option value="" disabled selected>- Pilih Jenis Kelamin -</option>
						<option value="LK">Laki-laki</option>
						<option value="PR">Perempuan</option>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Babtis</label>
				<div class="col-sm-3">
					<select name="status_babtis" id="status_babtis" class="form-control" required>
						<option value="" disabled selected>- Pilih Status Babtis-</option>
						<option>Sudah Babtis</option>
						<option>Belum Babtis</option>
			
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Komuni</label>
				<div class="col-sm-3">
					<select name="status_komuni" id="status_komuni" class="form-control" required>
						<option value="" disabled selected>- Pilih Status Komuni-</option>
						<option>Sudah Komuni</option>
						<option>Belum Komuni</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kelurahan Desa</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" onkeyup="cariDesa(this.value)" id="exampleDataList" placeholder="Cari Kelurahan/Desa">
				</div>
				<div class="col-sm-6">
					<select class="form-control" id="daftarDesaaN" name="kelurahanDesa">
						<option value="" disabled>Pilih Desa</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-3">
					<select name="gol_darah" id="gol_darah" class="form-control" required>
						<option value="" disabled selected>- Pilih Golongan Darah -</option>
						<option>A</option>
						<option>B</option>
						<option>AB</option>
						<option>O</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan</label>
				<div class="col-sm-3">
					<select name="pendidikan" id="pendidikan" class="form-control" required>
						<option value="" disabled selected>- Pilih Pendidikan -</option>
						<option>TK</option>
						<option>SD</option>
						<option>SMA</option>
						<option>SMK</option>
						<option>S1</option>
						<option>S2</option>
						<option>S3</option>
						<option>Tidak Bersekolah</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Krisma</label>
				<div class="col-sm-3">
					<select name="status_krisma" id="status_krisma" class="form-control" required>
						<option value="" disabled selected>- Pilih Status Krisma-</option>
						<option>Sudah Krisma</option>
						<option>Belum Krisma</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-3">
					<select name="pekerjaan" id="pekerjaan" class="form-control" required>
						<option value="" disabled selected>- Pilih Pekerjaan-</option>
						<option>Tukang</option>
						<option>Wiraswasta</option>
						<option>PNS</option>
						<option>Pelajar</option>
						<option>Tidak Bekerja</option>
						<option>Belum Bekerja</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan Gereja</label>
				<div class="col-sm-3">
					<select name="jabatan_gereja" id="jabatan_gereja" class="form-control">
						<option value="" disabled selected>- Pilih Jabatan Gereja -</option>
						<option>Pengurus Gereja</option>
						<option>Pengurus Stasi</option>
						<option>Pengurus Lingkungan</option>
						<option>Pengurus KUB</option>
						<option>Umat Biasa</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="status_kawin" id="status_kawin" class="form-control" required>
						<option value="" disabled selected>- Pilih Status Perkawinan-</option>
						<option>Sudah</option>
						<option>Belum</option>
						<option>Cerai Mati</option>
						<option>Cerai Hidup</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No. Handphone/WhatsApp</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="082123...." required>
				</div>
			</div>
			<!-- 
				<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTN</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_nikah" name="tempat_nikah" placeholder="Tempat nikah">
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tanggal_nikah" name="tanggal_nikah" placeholder="Tanggal nikah">
				</div>
			</div>

				<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTK</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_komuni" name="tempat_komuni" placeholder="Tempat komuni">
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tanggal_komuni" name="tanggal_komuni" placeholder="Tanggal komuni">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTB</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_baptis" name="tempat_baptis" placeholder="Tempat Baptis">
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tanggal_baptis" name="tanggal_baptis" placeholder="Tanggal Baptis">
				</div>
			</div> -->

	</div>
	<div class="card-footer">
	<div class="col-md-6 offset-md-6">
		<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
		<a href="?page=data-umat" title="Kembali" class="btn btn-danger">Batal</a>
	</div>
	</form>
</div>

<script src="plugins/jquery/jquery.min.js"></script>

<script>
	$('#btn_nik').click(function() {
		var val = $('#nik').val();
		$.ajax({
			url: "http://localhost/sigereja/administrator/query.php?q=get_masuk",
			type: "POST",
			dataType: "JSON",
			data: {
				tbl: 'tb_mutasi_masuk',
				q: val
			},
			success: function(data) {
				$('#nama_umat').val(data.nama)
			},
		});
	})
</script>




<?php

if (isset($_POST['Simpan'])) {
	// {"nik":"3510126907080003","nama_umat":"testing","id_kub":"3","id_lingkungan":"8","tempat_lahir":"haha","tanggal_lahir":"2024-01-23","umur":"1","jenis_kelamin":"LK","alamat":"gintagan","rt":"11","rw":"11","kelurahanDesa":"20305","gol_darah":"B","pendidikan":"SD","status_kawin":"Belum","pekerjaan":"Pelajar","jabatan_gereja":"Pengurus Gereja","no_hp":"087857173593","Simpan":"Simpan"}
	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_umat (id_kub, id_lingkungan,id_kategorial, nik, nama_umat, jenis_kelamin,status_babtis,
	 alamat, status_komuni, rt, rw, pekerjaan, jabatan_gereja, pendidikan, status_krisma, gol_darah, no_hp, tempat_lahir, 
	 tanggal_lahir, status_kawin, umur, status_umat) VALUES (
      		'" . $_POST['id_kub'] . "',
      		 '" . $_POST['id_lingkungan'] . "',
			   '" . $_POST['id_kategorial'] . "',
            '" . $_POST['nik'] . "',
            '" . $_POST['nama_umat'] . "',
			'" . $_POST['jenis_kelamin'] . "',
			'" . $_POST['status_babtis'] . "',
			'" . $_POST['alamat'] . "',
			'" . $_POST['status_komuni'] . "',
			'" . $_POST['rt'] . "',
			'" . $_POST['rw'] . "',
			'" . $_POST['pekerjaan'] . "',
			'" . $_POST['jabatan_gereja'] . "',
			'" . $_POST['pendidikan'] . "',
			'" . $_POST['status_krisma'] . "',
			'" . $_POST['gol_darah'] . "',
			'" . $_POST['no_hp'] . "',
			'" . $_POST['tempat_lahir'] . "',
			'" . $_POST['tanggal_lahir'] . "',
			'" . $_POST['status_kawin'] . "',
			'" . $_POST['umur'] . "',

            'Ada')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
mysqli_close($koneksi);

	if ($query_simpan) {
		echo  "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-umat';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal ',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-umat';
          }
      })</script>";
	}
}
     //selesai proses simpan data
