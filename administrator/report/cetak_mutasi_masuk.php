<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
include "../inc/koneksi.php";
if (isset ($_POST['Cetak']))
{
  // Proses cetak data kub dalam bentuk PDF dimana data diambil dari database berdasarkan id_kub
  $d=mysqli_query($koneksi, "SELECT * FROM tb_kematian");
  $datak=mysqli_fetch_assoc($d);
  $nama_kub=$datak['nama_kub'];
  $sql_cek18="SELECT * FROM tb_pengaturan";
  $query_cek18=mysqli_query($koneksi, $sql_cek18);
  $data_cek18=mysqli_fetch_array($query_cek18,MYSQLI_BOTH);
}
$satu_hari=mktime(0,0,0,date("n"),date("j"),date("Y"));   
function tglIndonesia($str)
{
  //Proses Manampilkan tanggal,bulan,dan tahun berdasarkan zona waktu indonesia
  $tr=trim($str);
  $str=str_replace(array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'), array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'), $tr);
  return $str;
}
?>
<html>
<head>
  <title>Print PDF</title>
  <style>
    table {border-collapse:collapse;table-layout:fixed;width: 100%;text-align: center;}
      table td{word-wrap:break-word;width: 20%;padding: 5px;}
      table th{padding: 5px;}
  </style>
</head>
<body>
  <div>
    <div style="font-size: 20px;" align="center"><?php echo $data_cek18["nama_web"];?></div>
    <div style="font-size: 12px;" align="center"><?php echo $data_cek18["alamat_gereja"]; ?>, <?php echo $data_cek18["kecamatan_gereja"];?>, <?php echo $data_cek18["kelurahan_gereja"];?>, <?php echo $data_cek18["kabupaten_gereja"];?>, <?php echo $data_cek18["provinsi_gereja"];?></div>
    <div style="font-size: 12px;" align="center">Email: <?php echo $data_cek18["email_gereja"];?> Telp. <?php echo $data_cek18["no_hp"];?></div>
  </div>
  <hr class="sidebar-divider" style="border:0.5px solid black;margin:10px 5px 10px 5px;">
  <b>Data Mutasi Masuk</b><br><br>
  <table border="1">
    <tr>
      <th>No.</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Asal Paroki</th>
      <th>Tanggal Masuk</th>
    </tr>
  <!-- Menampilkan data kub berdasarkan id_kub -->
	<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT * from tb_mutasi_masuk");
$no=1;
while ($data=mysqli_fetch_array($sql,MYSQLI_BOTH)){?>
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
            <?php echo $data['asal_paroki']; ?>
						</td>
						<td>
							<?php echo $data['tgl_masuk']; ?>
						</td>
					</tr>
    <?php };?>
  </table><br><br><br>
  <?php $tgl=date('Y-m-d');?>
  <table width="100%" align="right" style="padding-right: 40px;">
    <tr>
      <td align="jusrt"></td>
      <td align="center";width="200px"> Kupang, <?php echo tglIndonesia(date('d F Y',strtotime($tgl)));?><br>Pastor Paroki<br><br><br><br><b><u><?php echo $data_cek18["pastor_paroki"];?></u></b><br></td>
    </tr>
  </table>
</body>
</html>
<!-- Mengambil sintaks untuk mencetak dokumen dalam bentuk PDF -->
<?php
$html =ob_get_contents();
ob_end_clean();
require '../admin/plugin/html2pdf/autoload.php';
$pdf=new Spipu\Html2Pdf\Html2Pdf('L','F4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Mutasi Masuk.pdf','D');