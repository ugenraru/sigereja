<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pengurus
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<h5>SEMUA DATA PENGURUS YANG TERDAFTAR</h5>
			<div class="col-md-6 offset-md-10">
				<a href="?page=add-pengurus" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Periode</th>
						<th>Ketua Umum</th>
						<th>Ketua 1</th>
						<th>Ketua 2</th>
						<th>Sekretaris 1</th>
						<th>Sekretaris 2</th>
						<th>Bendahara 1</th>
						<th>Bendahara 2</th>
						<th>Bidang-bidang</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT a.*,b.th_awal, b.th_akhir, c.nama_umat as nama_ketua1 ,d.nama_umat as nama_ketua2,e.nama_umat as nama_sekretaris1,f.nama_umat as nama_sekretaris2,g.nama_umat as nama_bendahara1,h.nama_umat as nama_bendahara2  from tb_pengurus a join tb_periode b on a.id_periode=b.id_periode join tb_umat c on a.ketua_1 = c.id_umat join tb_umat d on a.ketua_2 = d.id_umat join tb_umat e on a.sekretaris_1 = e.id_umat join tb_umat f on a.sekretaris_2 = f.id_umat join tb_umat g on a.bendahara_1 = g.id_umat join tb_umat h on a.bendahara_2 = h.id_umat");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['th_awal'] . ' s/d ' . $data['th_akhir']; ?>
							</td>
							<td>
								<?php echo $data['ketua_umum']; ?>
							</td>
							<td>
								<?php echo $data['nama_ketua1']; ?>
							</td>
							<td>
								<?php echo $data['nama_ketua2']; ?>
							</td>
							<td>
								<?php echo $data['nama_sekretaris1']; ?>
							</td>

							<td>
								<?php echo $data['nama_sekretaris2']; ?>
							</td>

							<td>
								<?php echo $data['nama_bendahara1']; ?>
							</td>

							<td>
								<?php echo $data['nama_bendahara2']; ?>
							</td>
							<td>
							<?php
								$bidang = $koneksi->query("SELECT a.*, b.nama_umat FROM tb_bidang a join tb_umat b on a.nama=b.id_umat where a.id_pengurus='$data[id_pengurus]' order by tipe asc");
								$ii = 0;
								$isi = '';
								foreach ($bidang as  $v) {
									if ($ii == $v['tipe']) {
										$isi = $isi . $v['nama_umat'] . ' - ' . $v['status'] . '<br>';
									} else {
										$ii = $v['tipe'];
										if ($v['tipe'] == 1) {
											$isi = $isi . '<b>Bidang Pembinaan Iman : Liturgi, Musik, Pewartaan , KS </b><br>' . $v['nama_umat'] . ' - ' . $v['status'] . '<br>';
										} else if ($v['tipe'] == 2) {
											$isi = $isi . '<br><b>Bidang Pengamalan Iman : Sosek, Perempuan, HAM </b><br>' . $v['nama_umat'] . ' - ' . $v['status'] . '<br>';
										} else if ($v['tipe'] == 3) {
											$isi = $isi . '<br><b>Bidang Pendidikan dan Kerawam : Kepemudaan, Sekami, Kategorial</b> <br>' . $v['nama_umat'] . ' - ' . $v['status'] . '<br>';
										}
									}
								}
								?>
								<!-- Button trigger modal -->
									<button type="button" class="btn btn-sm btn-primary w-100" data-toggle="modal" data-target="#tbh_info<?php echo $v['id_pengurus']?>">
										<i class="fa fa-eye"></i>
									</button>

								<!-- Modal -->
								<div class="modal fade" id="tbh_info<?php echo $v['id_pengurus']?>" tabindex="-1" role="dialog" aria-labelledby="tbh_infoLabel" aria-hidden="true">
									<div class="modal-dialog " role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="tbh_infoLabel">Info Pengurus Bidang</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<?php echo $isi ?>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>

							
							</td>

							<td>
								<a href="?page=edit-pengurus&kode=<?php echo $data['id_pengurus']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del-pengurus&kode=<?php echo $data['id_pengurus']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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