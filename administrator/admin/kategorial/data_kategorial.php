<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kelompok Kategorial</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<h5>SEMUA DATA KATEGORIAL YANG TERDAFTAR</h5>
			<div class="col-md-6 offset-md-10">
				<a href="?page=add-kategorial" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama kategorial</th>
						<th>koordinator</th>
						<th>Jumlah Anggota</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              //mengambildata
			  $sql = $koneksi->query("SELECT * from tb_kategorial");
              while ($data= $sql->fetch_assoc()) {
              $ket = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from tb_umat where id_umat='$data[koordinator]'"));
             
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nama_kategorial']; ?>
						</td>
						<td>
							<?php echo $ket['nama_umat']; ?>
						</td>
					
						<td>
							<?php echo $data['jumlah_anggota']; ?>
							<a href="?page=data-umat&kode=<?php echo $data['id_kategorial']; ?>" title="Detail"
							 class="btn btn-info btn-sm">
							<i class="fa fa-users"></i>
							</a>
						</td>

						<td>
							<a href="?page=edit-kategorial&kode=<?php echo $data['id_kategorial']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-kategorial&kode=<?php echo $data['id_kategorial']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								</>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->