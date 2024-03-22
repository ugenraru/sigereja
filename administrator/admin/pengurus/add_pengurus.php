<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Pengurus
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<h4 class="text-center text-bold">PENGURUS INTI</h4>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Periode</label>
				<div class="col-sm-4">
					<select name="periode" id="periode" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Periode -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_periode";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_periode'] ?>">
								<?php echo $row['th_awal'].' - '.$row['th_akhir'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Ketua Umum</label>
				<div class="col-sm-4">
					<select name="ketua_umum" id="ketua_umum" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Ketua Umum -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_pengaturan";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['pastor_paroki'] ?>">
								<?php echo $row['pastor_paroki'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Ketua 1</label>
				<div class="col-sm-4">
					<select name="ketua_1" id="ketua_1" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Ketua 1 -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat order by nama_umat asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>">
								<?php echo $row['nama_umat'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Ketua 2</label>
				<div class="col-sm-4">
					<select name="ketua_2" id="ketua_2" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Ketua 2 -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat order by nama_umat asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>">
								<?php echo $row['nama_umat'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Sekretaris 1</label>
				<div class="col-sm-4">
					<select name="sekretaris_1" id="sekretaris_1" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Sekretaris 1 -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat order by nama_umat asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>">
								<?php echo $row['nama_umat'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Sekretaris 2</label>
				<div class="col-sm-4">
					<select name="sekretaris_2" id="sekretaris_2" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Sekretaris 2 -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat order by nama_umat asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>">
								<?php echo $row['nama_umat'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Bendahara 1</label>
				<div class="col-sm-4">
					<select name="bendahara_1" id="bendahara_1" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Bendahara 1 -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat order by nama_umat asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>">
								<?php echo $row['nama_umat'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 col-form-label">Nama Bendahara 2</label>
				<div class="col-sm-4">
					<select name="bendahara_2" id="bendahara_2" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Nama Bendahara 2 -</option>
						<?php
						// ambil data dari database
						$query = "select * from tb_umat order by nama_umat asc";
						$hasil = mysqli_query($koneksi, $query);
						while ($row = mysqli_fetch_array($hasil)) {
						?>
							<option value="<?php echo $row['id_umat'] ?>">
								<?php echo $row['nama_umat'] ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
			<br><br>
			<h5 class="text-center">
				Bidang Pembinaan Imam : Liturgi, Musik, Pewartaan, KS
			</h5>
			<div class="form-group row">
				<div class="col">
					<table width="100%" id="form_a">
						<tr>
							<td width="60%">
								<select name="a_nama[]" id="a_nama" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_umat order by nama_umat asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_umat'] ?>">
											<?php echo $row['nama_umat'] ?>
										</option>
									<?php
									}
									?>
								</select>
							</td>
							<td width="30%">
								<select name="a_status[]" id="a_status" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Status ---</option>
									<option value="Koordinator">Koordinator</option>
									<option value="Anggota">Anggota</option>
								</select>
							</td>
							<td>
								<button type="button" id="a_tbh" title="Tambah Form" class="btn btn-success btn-sm">
									<i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<br><br>
			<h5 class="text-center">
				Bidang Pengamalan Iman : Sosek, Perempuan, HAM
			</h5>
			<div class="form-group row">
				<div class="col">
					<table width="100%" id="form_b">
						<tr>
							<td width="60%">
								<select name="b_nama[]" id="b_nama" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_umat order by nama_umat asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_umat'] ?>">
											<?php echo $row['nama_umat'] ?>
										</option>
									<?php
									}
									?>
								</select>
							</td>
							<td width="30%">
								<select name="b_status[]" id="b_status" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Status ---</option>
									<option value="Koordinator">Koordinator</option>
									<option value="Anggota">Anggota</option>
								</select>
							</td>
							<td>
							
								<button type="button" id="b_tbh" title="Tambah Form" class="btn btn-success btn-sm">
									<i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<br><br>
			<h5 class="text-center">
				Bidang Pendidikan dan Kerawam : Kepemudaan, Sekami, Kategorial
			</h5>
			<div class="form-group row">
				<div class="col">
					<table width="100%" id="form_c">
						<tr>
							<td width="60%">
								<select name="c_nama[]" id="c_nama" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_umat order by nama_umat asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_umat'] ?>">
											<?php echo $row['nama_umat'] ?>
										</option>
									<?php
									}
									?>
								</select>
							</td>
							<td width="30%">
								<select name="c_status[]" id="c_status" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Status ---</option>
									<option value="Koordinator">Koordinator</option>
									<option value="Anggota">Anggota</option>
								</select>
							</td>
							<td>
								<button type="button" id="c_tbh" title="Tambah Form" class="btn btn-success btn-sm">
									<i class="fa fa-plus"></i>
								</button>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-8">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-pengurus" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	var i = 0;
	var j = 0;
	var k = 0;
	var f_kr_a = [];
	var f_kr_b = [];
	var f_kr_c = [];
	$(function() {
		$('#a_tbh').click(function() {
			i = i + 1;
			$('#form_a').append(`<tr id="aa` + i + `">
							<td width="60%">
								<select name="a_nama[]" id="a_nama" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_umat order by nama_umat asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_umat'] ?>">
											<?php echo $row['nama_umat'] ?>
										</option>
									<?php
									}
									?>
								</select>
							</td>
							<td width="30%">
								<select name="a_status[]" id="a_status" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Status ---</option>
									<option value="Koordinator">Koordinator</option>
									<option value="Anggota">Anggota</option>
								</select>
							</td>
							<td>
								<button type="button" id="a_krg` + i + `" title="Tambah Form" class="btn btn-danger btn-sm">
									<i class="fa fa-times"></i>
								</button>
							</td>
						</tr>`)
			f_kr_a[i] = $('#a_krg' + i).click(function() {
				$('#aa' + i).remove();
				i = i - 1;
			})
		})
		$('#b_tbh').click(function() {
			j = j + 1;
			$('#form_b').append(`<tr id="bb` + j + `">
							<td width="60%">
								<select name="b_nama[]" id="b_nama" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_umat order by nama_umat asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_umat'] ?>">
											<?php echo $row['nama_umat'] ?>
										</option>
									<?php
									}
									?>
								</select>
							</td>
							<td width="30%">
								<select name="b_status[]" id="b_status" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Status ---</option>
									<option value="Koordinator">Koordinator</option>
									<option value="Anggota">Anggota</option>
								</select>
							</td>
							<td>
								<button type="button" id="b_krg` + j + `" title="Tambah Form" class="btn btn-danger btn-sm">
									<i class="fa fa-times"></i>
								</button>
							</td>
						</tr>`)
			f_kr_b[j] = $('#b_krg' + j).click(function() {
				$('#bb' + j).remove();
				j = j - 1;
			})
		})
		$('#c_tbh').click(function() {
			k = k + 1;
			$('#form_c').append(`<tr id="cc` + k + `">
							<td width="60%">
								<select name="c_nama[]" id="c_nama" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php
									// ambil data dari database
									$query = "select * from tb_umat order by nama_umat asc";
									$hasil = mysqli_query($koneksi, $query);
									while ($row = mysqli_fetch_array($hasil)) {
									?>
										<option value="<?php echo $row['id_umat'] ?>">
											<?php echo $row['nama_umat'] ?>
										</option>
									<?php
									}
									?>
								</select>
							</td>
							<td width="30%">
								<select name="c_status[]" id="c_status" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Status ---</option>
									<option value="Koordinator">Koordinator</option>
									<option value="Anggota">Anggota</option>
								</select>
							</td>
							<td>
								<button type="button" id="c_krg` + k + `" title="Tambah Form" class="btn btn-danger btn-sm">
									<i class="fa fa-times"></i>
								</button>
							</td>
						</tr>`)
			f_kr_c[k] = $('#c_krg' + k).click(function() {
				$('#cc' + k).remove();
				k = k - 1;
			})
		})


	})
</script>

<?php

if (isset($_POST['Simpan'])) {
	// {"periode":"3","ketua_umum":"Pastor RD Fidelis Demu","ketua_1":"91","ketua_2":"42","sekretaris_1":"20","sekretaris_2":"181","bendahara_1":"17","bendahara_2":"197","a_nama":["165","20"],"a_status":["Koordinator","Anggota"],"b_nama":["187","114"],"b_status":["Koordinator","Anggota"],"c_nama":["35","119","127"],"c_status":["Koordinator","Anggota","Anggota"],"Simpan":"Simpan"}

	$periode = $_POST['periode'];
	$ketua_umum = $_POST['ketua_umum'];
	$ketua_1 = $_POST['ketua_1'];
	$ketua_2 = $_POST['ketua_2'];
	$sekretaris_1 = $_POST['sekretaris_1'];
	$sekretaris_2 = $_POST['sekretaris_2'];
	$bendahara_1 = $_POST['bendahara_1'];
	$bendahara_2 = $_POST['bendahara_2'];
	$a_nama = $_POST['a_nama'];
	$b_nama = $_POST['b_nama'];
	$c_nama = $_POST['c_nama'];
	$a_status = $_POST['a_status'];
	$b_status = $_POST['b_status'];
	$c_status = $_POST['c_status'];
	$tgl = date('Y-m-d H:i:s',time());
	$sql_simpan = "INSERT INTO tb_pengurus set id_periode='$periode',ketua_umum='$ketua_umum',ketua_1='$ketua_1',ketua_2='$ketua_2',sekretaris_1='$sekretaris_1',sekretaris_2='$sekretaris_2',bendahara_1='$bendahara_1',bendahara_2='$bendahara_2',created_at='$tgl' ";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);

	$id_pengurus = mysqli_insert_id($koneksi);
	if($a_nama){
		foreach($a_nama as $i => $j){
			$sql_bid = "INSERT INTO tb_bidang set id_pengurus='$id_pengurus', tipe='1', nama='$j', status='$a_status[$i]'";
			mysqli_query($koneksi, $sql_bid);
		}
	}
	if($b_nama){
		foreach($b_nama as $i => $j){
			$sql_bid = "INSERT INTO tb_bidang set id_pengurus='$id_pengurus', tipe='2', nama='$j', status='$b_status[$i]'";
			mysqli_query($koneksi, $sql_bid);
		}
	}
	if($c_nama){
		foreach($c_nama as $i => $j){
			$sql_bid = "INSERT INTO tb_bidang set id_pengurus='$id_pengurus', tipe='3', nama='$j', status='$c_status[$i]'";
			mysqli_query($koneksi, $sql_bid);
		}
	}
	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pengurus';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pengurus';
          }
      })</script>";
	}
}
?>