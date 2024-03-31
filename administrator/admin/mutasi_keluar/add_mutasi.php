<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Mutasi Keluar
		</h3>
	</div>
	<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
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
					<input type="text" class="form-control" id="nama_umat" name="nama_umat"  readonly>
				</div>
			</div>
			    <!-- nambahin input hidden buat id_kub -->
				<input type="hidden" name="id_kub" id="id_kub" value="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lingkungan Asal</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nama_lingkungan" name="nama_lingkungan" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">KUB Asal</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nama_kub" name="nama_kub" readonly>
                </div>
            </div>

		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tujuan Paroki</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="tujuan_paroki" name="tujuan_paroki" placeholder="Gereja Paroki" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"> Tujuan Keuskupan</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="keuskupan" name="keuskupan" placeholder="Keuskupan" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan keluar</label>
				<div class="col-sm-3">
					<select name="alasan_pindah" id="alasan_pindah" class="form-control" required>
						<option value="" disabled selected>- Pilih Alasan Keluar-</option>
						<option>Dominisili</option>
						<option>Pemindahan</option>
						<option>Alasan lainnya</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Keluar</label>
				<div class="col-sm-4">
					<input type="date" class="form-control" id="tgl_pindah" name="tgl_pindah" placeholder="tgl_pindah" required>
				</div>
			</div>
	</div>
	<div class="card-footer">
	<div class="col-md-6 offset-md-5">
		<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
		<a href="?page=data-mutasi-keluar" title="Kembali" class="btn btn-danger">Batal</a>
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
			success: function(data) {
                $('#nama_umat').val(data.nama_umat)
                $('#id_kub').val(data.id_kub)
                // benerin value nama kub & nama lingkungan
                $('#nama_kub').val(data.nama_kub)
                $('#nama_lingkungan').val(data.nama_lingkungan)
                // var kub = new Option(data.nama_kub, data.id_kub, true, true);
                // $('#nama_kub').append(kub).trigger('change');
                // var lingkungan = new Option(data.nama_lingkungan, data.id_lingkungan, true, true);
                // $('#nama_lingkungan').append(lingkungan).trigger('change');
                $('#id_lingkungan').val(data.id_lingkungan)

            },
        });
		});
		// ambil data dari database
		// $query_simpan = mysqli_query($koneksi, $sql_simpan);
	
</script>



<?php

if (isset($_POST['Simpan'])) {

	// {"f_nik":"7","nama_umat":"Ambrosius Djago","id_kub":"3","id_lingkungan":"1","provinsi":"hahah","Kabupaten":"hahaha","kecamatan":"hhaha","kelurahan":"hahaha","alasan_pindah":"hahaha","tgl_pindah":"2024-01-22","Simpan":"Simpan"}
	$nik = $_POST['f_nik'];
	$nama_umat = $_POST['nama_umat'];
	$id_kub = $_POST['id_kub'];
	$id_lingkungan = $_POST['id_lingkungan'];
	$tujuan_paroki = $_POST['tujuan_paroki'];
	$keuskupan = $_POST['keuskupan'];
	$alasan_pindah = $_POST['alasan_pindah'];
	$tgl_pindah = $_POST['tgl_pindah'];

	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_mutasi_keluar set nik='$nik', nama='$nama_umat',id_lingkungan='$id_lingkungan', id_kub='$id_kub',  tujuan_paroki='$tujuan_paroki', keuskupan='$keuskupan',  alasan_keluar='$alasan_pindah', tgl_keluar='$tgl_pindah'";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
 
	$sql_hapus = "DELETE FROM tb_umat where nik='$nik'";
	$query_hapus = mysqli_query($koneksi, $sql_hapus);

	$hps_masuk = "DELETE FROM tb_mutasi_masuk where nik='$nik'";
	mysqli_query($koneksi, $hps_masuk);

	mysqli_close($koneksi);

	if ($query_simpan && $query_hapus) {
		echo  "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-mutasi-keluar';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-mutasi-keluar';
          }
      })</script>";
	}
}
     //selesai proses simpan data
