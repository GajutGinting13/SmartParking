<?php

include ("../koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM status_kendaraan");
$data = mysqli_fetch_array($sql);

$keluar = $data['kendaraan_keluar'];
echo $keluar;
?>