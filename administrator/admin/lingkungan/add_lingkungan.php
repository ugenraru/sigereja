<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Lingkungan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_lingkungan" name="nama_lingkungan" placeholder="Nama lingkungan" required>
				</div>
			</div>

				<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Stasi</label>
				<div class="col-sm-4">
					<select name="id_stasi" id="id_stasi" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Stasi -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_stasi where id_stasi";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_stasi'] ?>">
							<?php echo $row['nama_stasi'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ketua</label>
				<div class="col-sm-4">
					<select name="ketua" id="ketua" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Ketua -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_umat where status_umat='Ada'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_umat'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama_umat'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Sekretaris</label>
				<div class="col-sm-4">
					<select name="sekretaris" id="sekretaris" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Sekretaris -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_umat where status_umat='Ada'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_umat'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama_umat'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Bendahara</label>
				<div class="col-sm-4">
				<select name="bendahara" id="bendahara" class="form-control select2bs4" required>
							<optio value="" disabled selected>- Pilih Bendahara -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_umat where status_umat='Ada'";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_umat'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama_umat'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Kepala Keluarga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_kk" name="jumlah_kk" placeholder="Jumlah KK" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-lingkungan" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_lingkungan (nama_lingkungan, id_stasi, ketua, sekretaris, bendahara, jumlah_kk) VALUES (
            '".$_POST['nama_lingkungan']."',
             '".$_POST['id_stasi']."',
			'".$_POST['ketua']."',
			'".$_POST['sekretaris']."',
			'".$_POST['bendahara']."',
			'".$_POST['jumlah_kk']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-lingkungan';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-lingkungan';
          }
      })</script>";
    }}
     //selesai proses simpan data
