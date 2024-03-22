<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_mutasi_masuk WHERE nik='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" value="<?php echo $data_cek['nik'] ?>" id="nik" name="nik" placeholder="NIK" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" value="<?php echo $data_cek['nama'] ?>" name="nama" placeholder="Nama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Asal Paroki</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="asal_paroki" value="<?php echo $data_cek['asal_paroki'] ?>" name="asal_paroki" placeholder="Asal Paroki" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal Masuk</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="<?php echo $data_cek['tgl_masuk'] ?>" placeholder="Tanggal Masuk" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-info">
			<a href="?page=data-mutasi-masuk" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
	</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_mutasi_masuk SET 
		nik='".$_POST['nik']."',
		nama='".$_POST['nama']."',
		asal_paroki='".$_POST['asal_paroki']."',
		tgl_masuk='".$_POST['tgl_masuk']."'
		WHERE nik='".$_GET['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mutasi-masuk';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-mutasi-masuk';
        }
      })</script>";
    }}
