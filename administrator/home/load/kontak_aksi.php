<?php


include '../../inc/koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$subjek = $_POST['subjek'];
$isi_pesan = $_POST['isi_pesan'];
$tanggal_pesan = time();

mysqli_query($koneksi, "INSERT INTO `tb_pesan` (`nama_lengkap`, `email`,subjek, `isi_pesan`, `tanggal_pesan`) VALUES ('$nama_lengkap', '$email',' $subjek', '$isi_pesan', '$tanggal_pesan')");

?>

<script>
  alert('Pesan berhasil dikirim!');
</script>

<meta http-equiv="refresh" content="0; url=../../index.php">