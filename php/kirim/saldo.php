<?php

include ("../koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM keuangan");
$data = mysqli_fetch_array($sql);

$saldo = $data['saldo'];
$rupiah = "Rp " . number_format($saldo, 2,',','.');
echo $rupiah;
?>