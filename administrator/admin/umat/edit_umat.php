<?php

if (isset($_GET['kode']))
{
	$sql_cek = "SELECT * FROM tb_umat WHERE id_umat='" . $_GET['kode'] . "'";
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
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_umat" name="nama_umat" value="<?php echo $data_cek['nama_umat']; ?>"readonly />
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
						while ($row = mysqli_fetch_array($hasil))
						{
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
						while ($row = mysqli_fetch_array($hasil))
						{
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
				<label class="col-sm-2 col-form-label">Nama Kategorial</label>
				<div class="col-sm-4">
					<select name="id_kategorial" id="id_kategorial" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Kategorial -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_kategorial where id_kategorial";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil))
						{
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
				<label class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $data_cek['tempat_lahir']; ?>" />
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tanggal_lahirA" onchange="hitungUmur(this.value)" name="tanggal_lahir" value="<?php echo $data_cek['tanggal_lahir']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Umur</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="inputUmur" readonly value="">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
						<option value="" disabled selected>- Pilih jenis kelamin -</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['jenis_kelamin'] == "LK") echo "<option value='LK' selected>Laki-laki</option>";
						else echo "<option value='LK'>Laki-laki</option>";

						if ($data_cek['jenis_kelamin'] == "PR") echo "<option value='PR' selected>Perempuan</option>";
						else echo "<option value='PR'>Perempuan</option>";
						?>
					</select>
				</div>
			</div>		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Babtis</label>
				<div class="col-sm-3">
					<select name="status_babtis" id="status_babtis" class="form-control">
						<option value="" disabled selected>- Pilih Babtis -</option>
						<?php
						//mengecek data yg dipilih sebelumnya
						if ($data_cek['status_babtis'] == "Sudah Babtis") echo "<option value='Sudah Babtis' selected>Sudah Babtis</option>";
						else echo "<option value='Sudah Babtis'>Sudah Babtis</option>";

						if ($data_cek['status_babtis'] == "Belum Babtis") echo "<option value='Belum Babtis' selected>Belum Babtis</option>";
						else echo "<option value='Belum Babtis'>Belum Babtis</option>";
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_cek['alamat']; ?>" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Komuni</label>
				<div class="col-sm-3">
					<select name="status_komuni" id="status_komuni" class="form-control">
						<option value="" disabled selected>- Pilih Komuni  -</option>
						<?php
						//mengecek data yg dipilih sebelumnya
						if ($data_cek['status_komuni'] == "Sudah Komuni") echo "<option value='Sudah Komuni' selected>Sudah Komuni</option>";
						else echo "<option value='Sudah'>Sudah Komuni</option>";

						if ($data_cek['status_komuni'] == "Belum Komuni") echo "<option value='Belum Komuni' selected>Belum Komuni</option>";
						else echo "<option value='Belum Komuni'>Belum Komuni</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>" />
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>" />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-3">
					<select name="gol_darah" id="gol_darah" class="form-control">
						<option value="" disabled selected>- Pilih Gol. Darah -</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['gol_darah'] == "A") echo "<option value='A' selected>A</option>";
						else echo "<option value='A'>A</option>";

						if ($data_cek['gol_darah'] == "B") echo "<option value='B' selected>B</option>";
						else echo "<option value='B'>B</option>";

						if ($data_cek['gol_darah'] == "AB") echo "<option value='AB' selected>AB</option>";
						else echo "<option value='AB'>AB</option>";

						if ($data_cek['gol_darah'] == "O") echo "<option value='0' selected>O</option>";
						else echo "<option value='O'>O</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pendidikan</label>
				<div class="col-sm-3">
					<select name="pendidikan" id="pendidikan" class="form-control">
						<option value="" disabled selected>- Pilih Pendidikan -</option>
						<?php
						//mengecek data yg dipilih sebelumnya
						if ($data_cek['pendidikan'] == "TK") echo "<option value='TK' selected>TK</option>";
						else echo "<option value='TK'>TK</option>";

						if ($data_cek['pendidikan'] == "SD") echo "<option value='SD' selected>SD</option>";
						else echo "<option value='SD'>SD</option>";

						if ($data_cek['pendidikan'] == "SMA") echo "<option value='SMA' selected>SMA</option>";
						else echo "<option value='SMA'>SMA</option>";

						if ($data_cek['pendidikan'] == "SMK") echo "<option value='SMK' selected>SMK</option>";
						else echo "<option value='SMK'>SMK</option>";

						if ($data_cek['pendidikan'] == "S1") echo "<option value='S1' selected>S1</option>";
						else echo "<option value='S1'>S1</option>";

						if ($data_cek['pendidikan'] == "S2") echo "<option value='S2' selected>S2</option>";
						else echo "<option value='S2'>S2</option>";

						if ($data_cek['pendidikan'] == "S3") echo "<option value='S3' selected>S3</option>";
						else echo "<option value='S3'>S3</option>";

						if ($data_cek['pendidikan'] == "Tidak Bersekolah") echo "<option value='Tidak Bersekolah' selected>SMK</option>";
						else echo "<option value='Tidak Bersekolah'>Tidak Bersekolah</option>";
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Krisma</label>
				<div class="col-sm-3">
					<select name="status_krisma" id="status_krisma" class="form-control">
						<option value="" disabled selected>- Pilih Status -</option>
						<?php
						//mengecek data yg dipilih sebelumnya
						if ($data_cek['status_krisma'] == "Sudah Krisma") echo "<option value='Sudah Krisma' selected>Sudah Krisma</option>";
						else echo "<option value='Sudah Krisma'>Sudah Krisma</option>";

						if ($data_cek['status_krisma'] == "Belum Krisma") echo "<option value='Belum Krisma' selected>Belum Krisma</option>";
						else echo "<option value='Belum Krisma'>Belum Krisma</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="status_kawin" id="status_kawin" class="form-control">
						<option value="" disabled selected>- Pilih Status -</option>
						<?php
						//mengecek data yg dipilih sebelumnya
						if ($data_cek['status_kawin'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
						else echo "<option value='Sudah'>Sudah</option>";

						if ($data_cek['status_kawin'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
						else echo "<option value='Belum'>Belum</option>";

						if ($data_cek['status_kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
						else echo "<option value='Cerai Mati'>Cerai Mati</option>";

						if ($data_cek['status_kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
						else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-3">
					<select name="pekerjaan" id="pekerjaan" class="form-control">
						<option value="" disabled selected>- Pilih Pekerjaan -</option>
						<?php
						if ($data_cek['pekerjaan'] == "Tukang") echo "<option value='Tukang' selected>Tukang</option>";
						else echo "<option value='Tukang'>Tukang</option>";

						if ($data_cek['pekerjaan'] == "Wiraswasta") echo "<option value='Wiraswasta' selected>Wiraswasta</option>";
						else echo "<option value='Wiraswasta'>Wiraswasta</option>";

						if ($data_cek['pekerjaan'] == "PNS") echo "<option value='PNS' selected>PNS</option>";
						else echo "<option value='PNS'>PNS</option>";

						if ($data_cek['pekerjaan'] == "Pelajar") echo "<option value='Pelajar' selected>Cerai Hidup</option>";
						else echo "<option value='Pelajar'>Pelajar</option>";

						if ($data_cek['pekerjaan'] == "Belum Bekerja") echo "<option value='Belum Bekerja' selected>Belum Bekerja</option>";
						else echo "<option value='Belum Bekerja'>Belum Bekerja</option>";

						if ($data_cek['pekerjaan'] == "Tidak Bekerja") echo "<option value='Tidak Bekerja' selected>Tidak Bekerja</option>";
						else echo "<option value='Tidak Bekerja'>Tidak Bekerja</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan Gereja</label>
				<div class="col-sm-3">
					<select name="jabatan_gereja" id="jabatan_gereja" class="form-control">
						<option value="" disabled selected>- Pilih Status -</option>
						<?php
						//menhecek data yg dipilih sebelumnya
						if ($data_cek['jabatan_gereja'] == "Pengurus Gereja") echo "<option value='Pengurus Gereja' selected>Pengurus Gereja</option>";
						else echo "<option value='Pengurus Gereja'>Pengurus Gereja</option>";

						if ($data_cek['jabatan_gereja'] == "Pengurus Stasi") echo "<option value='Pengurus Stasi' selected>Pengurus Stasi</option>";
						else echo "<option value='Pengurus Stasi'>Pengurus Stasi</option>";

						if ($data_cek['jabatan_gereja'] == "Pengurus Lingkungan") echo "<option value='Pengurus Lingkungan' selected>Pengurus Lingkungan</option>";
						else echo "<option value='Pengurus Lingkungan'>Pengurus Lingkungan</option>";

						if ($data_cek['jabatan_gereja'] == "Pengurus KUB") echo "<option value='Pengurus KUB' selected>Pengurus KUB</option>";
						else echo "<option value='Pengurus KUB'>Pengurus KUB</option>";

						if ($data_cek['jabatan_gereja'] == "Umat") echo "<option value='Umat' selected>Umat</option>";
						else echo "<option value='Umat'>Umat</option>";
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No. Handphone/WhatsApp</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>" />
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-primary">
			<a href="?page=data-umat" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Ubah'])){
	$id=$_GET['kode'];
	$sql_ubah = "UPDATE tb_umat SET 
		nik='" . $_POST['nik'] . "',
		nama_umat='" . $_POST['nama_umat'] . "',
		id_kub='" . $_POST['id_kub'] . "',
		id_lingkungan='" . $_POST['id_lingkungan'] . "',
		id_kategorial='" . $_POST['id_kategorial'] . "',
		jenis_kelamin='" . $_POST['jenis_kelamin'] . "',
		status_babtis='" . $_POST['status_babtis'] . "',
		alamat='" . $_POST['alamat'] . "',
		status_komuni='" . $_POST['status_komuni'] . "',
		rt='" . $_POST['rt'] . "',
		rw='" . $_POST['rw'] . "',
		pekerjaan='" . $_POST['pekerjaan'] . "',
		jabatan_gereja='" . $_POST['jabatan_gereja'] . "',
		pendidikan='" . $_POST['pendidikan'] . "',
		status_krisma='" . $_POST['status_krisma'] . "',
		gol_darah='" . $_POST['gol_darah'] . "',
		no_hp='" . $_POST['no_hp'] . "',
		tempat_lahir='" . $_POST['tempat_lahir'] . "',
		tanggal_lahir='" . $_POST['tanggal_lahir'] . "',
		status_kawin='" . $_POST['status_kawin'] . "' where id_umat='$id'";
	$query_ubah = mysqli_query($koneksi, $sql_ubah);
	mysqli_close($koneksi);

	if ($query_ubah)
	{
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-umat';
        }
      })</script>";
	}
	else
	{
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-umat';
        }
      })</script>";
	}
}
