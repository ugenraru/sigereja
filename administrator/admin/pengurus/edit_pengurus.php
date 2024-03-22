<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * FROM tb_pengurus WHERE id_pengurus='" . $_GET['kode'] . "'";
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
							<option value="<?php echo $row['id_periode'] ?>" <?php echo ($row['id_periode'] == $data_cek['id_periode'] ? "selected" : "") ?>>
								<?php echo $row['th_awal'] . ' - ' . $row['th_akhir'] ?>
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
							<option value="<?php echo $row['pastor_paroki'] ?>" <?php echo ($row['pastor_paroki'] == $data_cek['ketua_umum'] ? "selected" : "") ?>>
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
							<option value="<?php echo $row['id_umat'] ?>" <?php echo ($row['id_umat'] == $data_cek['ketua_1'] ? "selected" : "") ?>>
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
							<option value="<?php echo $row['id_umat'] ?>" <?php echo ($row['id_umat'] == $data_cek['ketua_2'] ? "selected" : "") ?>>
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
							<option value="<?php echo $row['id_umat'] ?>" <?php echo ($row['id_umat'] == $data_cek['sekretaris_1'] ? "selected" : "") ?>>
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
							<option value="<?php echo $row['id_umat'] ?>" <?php echo ($row['id_umat'] == $data_cek['sekretaris_2'] ? "selected" : "") ?>>
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
							<option value="<?php echo $row['id_umat'] ?>" <?php echo ($row['id_umat'] == $data_cek['bendahara_1'] ? "selected" : "") ?>>
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
							<option value="<?php echo $row['id_umat'] ?>" <?php echo ($row['id_umat'] == $data_cek['bendahara_2'] ? "selected" : "") ?>>
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
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-8">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-info">
			<a href="?page=data-pengurus" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php
$qq = "select * from tb_bidang where id_pengurus='" . $data_cek['id_pengurus'] . "'";
$list = mysqli_query($koneksi, $qq);
$res_a = array();
$res_b = array();
$res_c = array();
foreach ($list as $l) {
	if ($l['tipe'] == 1) {
		$res_a[] = $l;
	}
	if ($l['tipe'] == 2) {
		$res_b[] = $l;
	}
	if ($l['tipe'] == 3) {
		$res_c[] = $l;
	}
}
// ambil data dari database
$q_a = "select * from tb_umat order by nama_umat asc";
$hasila = mysqli_query($koneksi, $q_a);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	var i = 0;
	var j = 0;
	var k = 0;
	var f_kr_a = [];
	var f_kr_b = [];
	var f_kr_c = [];
	$(document).ready(function() {
		var list_a = <?php echo json_encode($res_a); ?>;
		var list_b = <?php echo json_encode($res_b); ?>;
		var list_c = <?php echo json_encode($res_c); ?>;
		if (list_a.length > 0) {
			$.each(list_a, function(x, v) {
				i = i + 1;
				if (i == 1) {
					$('#form_a').append(`<tr>
							<td width="60%">
								<select name="a_nama[]" id="a_nama` + i + `" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php foreach ($hasila as $h) : ?>				
										<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
									<?php endforeach ?>				
								</select>
							</td>
							<td width="30%">
								<select name="a_status[]" id="a_status` + i + `" class="form-control select2bs4" required>
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
						</tr>`)
					$('#a_nama' + i).val(v['nama'])
					$('#a_status' + i).val(v['status'])
				} else {
					$('#form_a').append(`<tr id="aa` + i + `">
							<td width="60%">
								<select name="a_nama[]" id="a_nama` + i + `" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php foreach ($hasila as $h) : ?>				
										<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
									<?php endforeach ?>	
									</select>
							</td>
							<td width="30%">
								<select name="a_status[]" id="a_status` + i + `" class="form-control select2bs4" required>
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
					$('#a_nama' + i).val(v['nama'])
					$('#a_status' + i).val(v['status'])
				}
			});
		} else {
			$('#form_a').append(`<tr id="aa` + i + `">
							<td width="60%">
								<select name="a_nama[]" id="a_nama` + i + `" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php foreach ($hasila as $h) : ?>				
										<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
									<?php endforeach ?>	
									</select>
							</td>
							<td width="30%">
								<select name="a_status[]" id="a_status` + i + `" class="form-control select2bs4" required>
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
						</tr>`)
			f_kr_a[i] = $('#a_krg' + i).click(function() {
				$('#aa' + i).remove();
				i = i - 1;
			})
		}
		if (list_b.length > 0) {
			$.each(list_b, function(x, v) {
				j = j + 1;
				if (j == 1) {
					$('#form_b').append(`<tr>
							<td width="60%">
								<select name="b_nama[]" id="b_nama` + j + `" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php foreach ($hasila as $h) : ?>				
										<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
									<?php endforeach ?>				
								</select>
							</td>
							<td width="30%">
								<select name="b_status[]" id="b_status` + j + `" class="form-control select2bs4" required>
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
						</tr>`)
					$('#b_nama' + j).val(v['nama'])
					$('#b_status' + j).val(v['status'])
				} else {
					$('#form_b').append(`<tr id="bb` + j + `">
							<td width="60%">
								<select name="b_nama[]" id="b_nama` + j + `" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php foreach ($hasila as $h) : ?>				
										<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
									<?php endforeach ?>	
									</select>
							</td>
							<td width="30%">
								<select name="b_status[]" id="b_status` + j + `" class="form-control select2bs4" required>
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
					$('#b_nama' + j).val(v['nama'])
					$('#b_status' + j).val(v['status'])
				}
			});
		} else {
			$('#form_b').append(`<tr>
							<td width="60%">
								<select name="b_nama[]" id="b_nama` + j + `" class="form-control select2bs4" required>
									<option value="" disabled selected>--- Pilih Nama ----</option>
									<?php foreach ($hasila as $h) : ?>				
										<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
									<?php endforeach ?>				
								</select>
							</td>
							<td width="30%">
								<select name="b_status[]" id="b_status` + j + `" class="form-control select2bs4" required>
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
						</tr>`)
						f_kr_b[j] = $('#b_krg' + j).click(function() {
						$('#bb' + j).remove();
						j = j - 1;
					})
		}
		if(list_c.length > 0){
			$.each(list_c, function(x, v) {
				k = k + 1;
				if (k == 1) {
					$('#form_c').append(`<tr>
								<td width="60%">
									<select name="c_nama[]" id="c_nama` + k + `" class="form-control select2bs4" required>
										<option value="" disabled selected>--- Pilih Nama ----</option>
										<?php foreach ($hasila as $h) : ?>				
											<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
										<?php endforeach ?>				
									</select>
								</td>
								<td width="30%">
									<select name="c_status[]" id="c_status` + k + `" class="form-control select2bs4" required>
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
							</tr>`)
					$('#c_nama' + k).val(v['nama'])
					$('#c_status' + k).val(v['status'])
				} else {
					$('#form_c').append(`<tr id="cc` + k + `">
								<td width="60%">
									<select name="c_nama[]" id="c_nama` + k + `" class="form-control select2bs4" required>
										<option value="" disabled selected>--- Pilih Nama ----</option>
										<?php foreach ($hasila as $h) : ?>				
											<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
										<?php endforeach ?>	
										</select>
								</td>
								<td width="30%">
									<select name="c_status[]" id="c_status` + k + `" class="form-control select2bs4" required>
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
					$('#c_nama' + k).val(v['nama'])
					$('#c_status' + k).val(v['status'])
				}
			});
		}else{
			$('#form_c').append(`<tr>
								<td width="60%">
									<select name="c_nama[]" id="c_nama` + k + `" class="form-control select2bs4" required>
										<option value="" disabled selected>--- Pilih Nama ----</option>
										<?php foreach ($hasila as $h) : ?>				
											<option value="<?php echo $h['id_umat'] ?>"><?php echo $h['nama_umat'] ?></option>
										<?php endforeach ?>				
									</select>
								</td>
								<td width="30%">
									<select name="c_status[]" id="c_status` + k + `" class="form-control select2bs4" required>
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
							</tr>`)
							f_kr_c[k] = $('#c_krg' + k).click(function() {
						$('#cc' + k).remove();
						k = k - 1;
					})
		}
	})

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

if (isset($_POST['Ubah'])) {
	$id = $_GET['kode'];

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
	$sql_ubah = "UPDATE tb_pengurus set id_periode='$periode',ketua_umum='$ketua_umum',ketua_1='$ketua_1',ketua_2='$ketua_2',sekretaris_1='$sekretaris_1',sekretaris_2='$sekretaris_2',bendahara_1='$bendahara_1',bendahara_2='$bendahara_2' where id_pengurus='$id' ";
	$query_simpan = mysqli_query($koneksi, $sql_ubah);


	$sql_del_bid = "DELETE FROM tb_bidang where id_pengurus='$id'";
	mysqli_query($koneksi, $sql_del_bid);
	if ($a_nama) {
		foreach ($a_nama as $i => $j) {
			$sql_bid = "INSERT INTO tb_bidang set id_pengurus='$id', tipe='1', nama='$j', status='$a_status[$i]'";
			mysqli_query($koneksi, $sql_bid);
		}
	}
	if ($b_nama) {
		foreach ($b_nama as $i => $j) {
			$sql_bid = "INSERT INTO tb_bidang set id_pengurus='$id', tipe='2', nama='$j', status='$b_status[$i]'";
			mysqli_query($koneksi, $sql_bid);
		}
	}
	if ($c_nama) {
		foreach ($c_nama as $i => $j) {
			$sql_bid = "INSERT INTO tb_bidang set id_pengurus='$id', tipe='3', nama='$j', status='$c_status[$i]'";
			mysqli_query($koneksi, $sql_bid);
		}
	}

	mysqli_close($koneksi);

	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pengurus';
        }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pengurus';
        }
      })</script>";
	}
}
