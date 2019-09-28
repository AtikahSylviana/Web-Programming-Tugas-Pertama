<?php
$koneksi = mysqli_connect("localhost","root","","database_data");

if (mysqli_connect_errno()) {
	echo "Gagal koneksi ke MySQL: " . mysqli_connect_errno();
}
?>