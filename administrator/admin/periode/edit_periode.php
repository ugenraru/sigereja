<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_periode WHERE id_periode='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Tahun Awal</label>
				<div class="col-sm-6">
					<input type="hidden" name="id_periode" value="<?php echo $data_cek['id_periode'] ?>">
					<input type="year" value="<?php echo $data_cek['th_awal'] ?>" class="form-control" id="th_awal" name="th_awal" placeholder="Tahun Awal" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tahun Akhir</label>
				<div class="col-sm-6">
					<input type="year" class="form-control"  value="<?php echo $data_cek['th_akhir'] ?>"  id="th_akhir" name="th_akhir" placeholder="Tahun Akhir" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Ubah" value="Ubah" class="btn btn-info">
			<a href="?page=data-periode" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
	</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_periode SET 
		th_awal='".$_POST['th_awal']."',
		th_akhir='".$_POST['th_akhir']."'
		WHERE id_periode='".$_POST['id_periode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-periode';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-periode';
        }
      })</script>";
    }}
