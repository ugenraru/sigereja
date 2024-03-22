<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Mutasi Keluar</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<h5>SEMUA DATA MUTASI KELUAR YANG TERDAFTAR</h5>
			<div class="col-md-6 offset-md-10">
				<a href="?page=add-mutasi-keluar" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
            <th>Asal Kub</th>
            <th>Lingkungan- Stasi</th>
						<th>Tujuan Paroki</th>
						<th>Provinsi</th>
						<th>Kabupaten</th>
						<th>Kecamatan</th>
						<th>Alasan Keluar</th>
						<th>Tanggal Keluar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

        <?php
              $no = 1;
			  $sql = $koneksi->query("SELECT a.*,b.nama_lingkungan,c.nama_kub, d.nama_stasi from tb_mutasi_keluar a join tb_lingkungan b on a.id_lingkungan=b.id_lingkungan join tb_kub c on a.id_kub=c.id_kub join tb_stasi d on b.id_stasi=d.id_stasi");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
            <td>
							<?php echo $data['nama_kub']; ?>
						</td>
						<td>
							<?php echo $data['nama_lingkungan'].'/'.$data['nama_stasi']; ?>
						</td>
            <td>
							<?php echo $data['tujuan_paroki']; ?>
						</td>
						<td>
							<?php echo $data['provinsi']; ?>
						</td>
						<td>
							<?php echo $data['kabupaten']; ?>
						</td>
						<td>
							<?php echo $data['kecamatan']; ?>
              </td>
						<td>
							<?php echo $data['alasan_keluar']; ?>
						</td>
						<td>
							<?php echo $data['tgl_keluar']; ?>
						</td>

						<td>
							<a href="?page=edit-mutasi-keluar&kode=<?php echo $data['id_mutasi_keluar']; ?>" title="Ubah"
							 class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-mutasi-keluar&kode=<?php echo $data['id_mutasi_keluar']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
							 title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
								<a/>
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