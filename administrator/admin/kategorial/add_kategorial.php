<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kategorial</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_kategorial" name="nama_kategorial" placeholder="Nama Kategorial" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Koordinator</label>
				<div class="col-sm-4">
					<select name="ketua" id="ketua" class="form-control select2bs4" required>
						<option value="" disabled selected>- Pilih Koordinator -</option>
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
				<label class="col-sm-2 col-form-label">Jumlah Anggota</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_anggota" name="jumlah_anggota" placeholder="Jumlah anggota" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-primary">
			<a href="?page=data-kategorial" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_kategorial (nama_kategorial, ketua, wakil, sekretaris, bendahara, jumlah_anggota) VALUES (
            '".$_POST['nama_kategorial']."',
			'".$_POST['ketua']."',
            '".$_POST['wakil']."',
			'".$_POST['sekretaris']."',
			'".$_POST['bendahara']."',
			'".$_POST['jumlah_anggota']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kategorial';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kategorial';
          }
      })</script>";
    }}
     //selesai proses simpan data
