<?php 
include "inc/koneksi.php";

if (isset($_GET['q'])) {
	if ($_GET['q'] == 'get_data') {
        $tbl = $_POST['tbl'];
        $q = $_POST['q'];
        $query = "SELECT a.*,b.nama_kub, c.nama_lingkungan FROM $tbl a join tb_kub b on a.id_kub=b.id_kub join tb_lingkungan c on a.id_lingkungan = c.id_lingkungan where a.nik='$q'";
        $res = mysqli_query($koneksi, $query)->fetch_assoc();
        echo json_encode($res);
    }
    if ($_GET['q'] == 'get_masuk') {
        $tbl = $_POST['tbl'];
        $q = $_POST['q'];
        $query = "SELECT * from $tbl where nik='$q'";
        $res = mysqli_query($koneksi, $query)->fetch_assoc();
        echo json_encode($res);
    }
    if ($_GET['q'] == 'get_data_pindah') {
        $tbl = $_POST['tbl'];
        $q = $_POST['q'];
        $query = "SELECT a.*,b.nama_kub, c.nama_lingkungan FROM $tbl a join tb_kub b on a.id_kub=b.id_kub join tb_lingkungan c on a.id_lingkungan = c.id_lingkungan where a.id_umat='$q'";
        $res = mysqli_query($koneksi, $query)->fetch_assoc();
        echo json_encode($res);
    }
    if ($_GET['q'] == 'get_data_kub') {
        $tbl = $_POST['tbl'];
        $q = $_POST['q'];
        $query = "SELECT * FROM $tbl a join tb_lingkungan b on a.id_lingkungan=b.id_lingkungan where a.id_kub='$q'";
        $res = mysqli_query($koneksi, $query)->fetch_assoc();
        echo json_encode($res);
    }
    if ($_GET['q'] == 'mutasi') {
        echo json_encode($_POST);
        // $tbl = $_POST['tbl'];
        // $q = $_POST['q'];
        // $query = "SELECT a.*,b.nama_kub, c.nama_lingkungan FROM $tbl a join tb_kub b on a.id_kub=b.id_kub join tb_lingkungan c on a.id_lingkungan = c.id_lingkungan where a.id_umat='$q'";
        // $res = mysqli_query($koneksi, $query)->fetch_assoc();
        // echo json_encode($res);
    }
}
