# Absensi-Mahasiswa-CRUD-PHP
aplikasi web absensi mahasiswa menggunakan bahasa pemrograman php

ubah koneksi.php menjadi dengan mengikuti localhost/hosting anda

<?php
$db_host = "localhost";
$db_user = "rivaldyhisham";
$db_pass = "?";
$db_name = "rivaldyhisham";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
