<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="gambar/logo.png">
    <title>Cek Saldo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/modal_kirim.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

</html>
<?php
error_reporting(0);
ini_set('display_errors', 0);
include("php/koneksi.php");

$nokartu = $_POST['nokartu'];
$pass = $_POST['pass'];

$sql = mysqli_query($koneksi, "SELECT * FROM `member` WHERE `nokartu`='$nokartu' and `pass` = '$pass'");
$data = mysqli_fetch_array($sql);
$saldo = $data['saldo'];

if (!empty($nokartu) and !empty($pass)) {
    if ($data) {
        echo "<script type=\"text/JavaScript\">";
        echo "cek_berhasil($saldo);";
        echo "</script>";
    } else {
        echo "<script type=\"text/JavaScript\">";
        echo "salah_data();";
        echo "</script>";
    }
} else {
    echo "<script type=\"text/JavaScript\">";
    echo "data_kosong();";
    echo "</script>";
}