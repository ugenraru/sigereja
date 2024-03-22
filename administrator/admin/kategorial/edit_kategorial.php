<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kategorial WHERE id_kategorial='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Nama Kategorial</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_kategorial" 
					name="nama_kategorial" value="<?php echo $data_cek['nama_kategorial']; ?>"
					/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Ketua</label>
				<div class="col-sm-3">
					<select name="koordinator" id="koordinator" class="form-control">
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
				<label class="col-sm-2 col-form-label">Jumlah Anggota</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="jumlah_anggota" name="jumlah_anggota" 
					value="<?php echo $data_cek['jumlah_anggota']; ?>"/>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<div class="col-md-6 offset-md-6">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-info">
			<a href="?page=data-kategorial" title="Kembali" class="btn btn-danger">Batal</a>
		</div>
	</form>
	</div>

<?php


    if (isset ($_POST['Ubah'])){
	$id=$_GET['kode'];
    $sql_ubah = "UPDATE tb_kategorial SET 
		nama_kategorial='".$_POST['nama_kategorial']."',
		koordinator='".$_POST['koordinator']."',
      
		jumlah_anggota='".$_POST['jumlah_anggota']."' where id_kategorial='$id'";
		$query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kategorial';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kategorial';
        }
      })</script>";
    }}