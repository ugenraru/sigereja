<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Umat
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<h5>SEMUA DATA UMAT YANG TERDAFTAR</h5>
				<div class="col-md-6 offset-md-10">
					<!-- <a href="?page=add-umat" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a> -->
					<!-- Button trigger modal -->
					<a href="?page=add-umat" class="btn btn-primary">
						<i class="fa fa-edit"></i> Tambah Data</a>
				</div>
				<br>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>NIK</th>
							<th>Nama Lengkap</th>
							<th>Jenis Kelamin</th>
							<th>Umur</th>
							<th>Alamat</th>
							<th>KUB</th>
							<th>Lingkungan--Stasi</th>
							<th>Kategorial</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("SELECT p.id_umat,p.id_kub,p.id_kategorial,p.status_babtis,p.status_komuni,p.pendidikan,p.status_krisma,p.gol_darah,p.status_kawin,p.pekerjaan,p.jabatan_gereja,p.no_hp, p.tanggal_lahir,p.tempat_lahir, p.nik, p.nama_umat, p.jenis_kelamin, p.alamat, 
					p.rt, p.rw, b.id_kub, b.nama_kub, c.id_lingkungan, 
					c.nama_lingkungan, d.id_stasi, d.nama_stasi, e.id_kategorial, e.nama_kategorial from 
			        tb_umat p left join tb_lingkungan c on p.id_lingkungan=c.id_lingkungan
					 left join tb_stasi d on c.id_stasi=d.id_stasi inner join tb_kub b on p.id_kub=b.id_kub
			        inner join tb_kategorial e on p.id_kategorial=e.id_kategorial
			         where status_umat='Ada'");
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
									<?php echo $data['jenis_kelamin']; ?>
								</td>
								<input hidden type="date" class="form-control" id="tanggal_lahirA" value="<?php echo $data['tanggal_lahir']; ?>" />
								<td id="">
									<?php

									$originalDate = $data['tanggal_lahir'];
									$dateOfBirth = date("Y-m-d", strtotime($originalDate));
									$today = date("Y-m-d");
									$diff = date_diff(date_create($dateOfBirth), date_create($today));

									echo ($diff->format("%y tahun"));
									?>
								</td>
								<td>
									<?php echo $data['alamat']; ?>
									RT
									<?php echo $data['rt']; ?>/ RW
									<?php echo $data['rw']; ?>.
								</td>
								<!-- <td>
								<?php echo $data['no_kk']; ?>-
								<?php echo $data['kepala_keluarga']; ?>
							</td> -->
								<td>
									<?php echo $data['nama_kub']; ?>
								</td>

								<td>
									<?php echo $data['nama_lingkungan']; ?>-
									<?php echo $data['nama_stasi']; ?>
								</td>
								<td>
									<?php echo $data['nama_kategorial']; ?>
								</td>
								<td>
									<!-- <<title="Detail" class="btn btn-info btn-sm">
									<i class="fa fa-eye"></i>
								</a> -->
									
								<!-- Button untuk modal detail data umat -->

									<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $data['id_umat']?>">
										<i class="fa fa-eye"></i>
									</button>

									<!-- Modal form detail data umat setelah button itu diklik-->
									<div class="modal fade" id="detailModal<?php echo $data['id_umat']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Detail Data Umat</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-3">
															NIK
														</div>
														<div class="col-md-9"> :
															<?php echo $data['nik']; ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Nama
														</div>
														<div class="col-md-9"> :
															<?php echo $data['nama_umat']; ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															TTL
														</div>
														<div class="col-md-9"> :
															<?php echo $data['tempat_lahir'].', '.$data['tanggal_lahir']; ?>
															<!-- echo ($diff->format("%y tahun")); -->
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Umur
														</div>
														<div class="col-md-9"> :
															<?php 
															echo ($diff->format("%y tahun"));
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Jenis Kelamin
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['jenis_kelamin']
															 ?>
														</div>
													</div>

													<div class="row">
														<div class="col-md-3">
															Status Baptis
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['status_babtis']
															 ?>
														</div>
													</div>
													
													<div class="row">
														<div class="col-md-3">
															Alamat
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['alamat']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Status Komuni
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['status_komuni']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Pendidikan
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['pendidikan']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Status Krisma
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['status_krisma']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Gol. Darah
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['gol_darah']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Status Kawin
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['status_kawin']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Pekerjaan
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['pekerjaan']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															Jabatan Gereja
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['jabatan_gereja']
															 ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															No. HP / WA
														</div>
														<div class="col-md-9"> :
															<?php 
															echo $data['no_hp']
															 ?>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
													<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
												</div>
											</div>
										</div>
									</div>
									<a href="?page=edit-umat&kode=<?php echo $data['id_umat']; ?>" title="Ubah" class="btn btn-success btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="?page=del-umat&kode=<?php echo $data['id_umat']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
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