<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pindah
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<h5>SEMUA DATA PINDAH YANG TERDAFTAR</h5>
			<div class="col-md-6 offset-md-10">
				<a href="?page=add-pindah" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Lingkungan Asal</th>
						<th>KUB Asal</th>
						<th>Lingkungan Tujuan</th>
						<th>KUB Tujuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT a.*,b.nama_umat,b.nik, c.nama_lingkungan as lingkungan_asal, d.nama_kub as kub_asal, e.nama_lingkungan as lingkungan_tujuan, f.nama_kub as kub_tujuan from tb_pindah a join tb_umat b on a.id_umat=b.id_umat join tb_lingkungan c on a.id_lingkungan_asal=c.id_lingkungan join tb_kub d on a.id_kub_asal=d.id_kub join tb_lingkungan e on a.id_lingkungan_tujuan=e.id_lingkungan join tb_kub f on a.id_kub_tujuan=f.id_kub");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nik']; ?>
							</td>
							<td>
								<?php echo $data['nama_umat']; ?>
							</td>
							<td>
								<?php echo $data['lingkungan_asal']; ?>
							</td>
							<td>
								<?php echo $data['kub_asal']; ?>
							</td>
							<td>
								<?php echo $data['lingkungan_tujuan']; ?>
							</td>
							<td>
								<?php echo $data['kub_tujuan']; ?>
							</td>
							<td>
								<a href="?page=edit-pindah&kode=<?php echo $data['id_pindah']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pindah&kode=<?php echo $data['id_pindah']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
									<a />
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