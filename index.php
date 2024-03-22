<?php

//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}


include("administrator/inc/koneksi.php");

include("administrator/home/layout/header.php");
include("administrator/home/route.php");
include("administrator/home/layout/footer.php");
