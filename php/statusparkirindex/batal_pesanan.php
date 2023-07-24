<?php
include("../koneksi.php");

$nokartu = $_POST['nokartu'];
$pass = $_POST['pass'];

//periksa Data
$sql = mysqli_query($koneksi, "SELECT * FROM `member` WHERE `nokartu`='$nokartu' and `pass` = '$pass'");
$data = mysqli_fetch_array($sql);

//periksa booking
$sql1 = mysqli_query($koneksi, "SELECT * FROM `booking` WHERE `nokartu`='$nokartu'");
$data_booking = mysqli_fetch_array($sql1);

if (!empty($nokartu) and !empty($pass)) {
    if ($data) {
        if ($data_booking) {
            mysqli_query($koneksi, "DELETE FROM `booking` WHERE `nokartu` = '$nokartu'");
            echo "<script type=\"text/javascript\">;";
            echo "location.replace(\"../../index.php\");";
            echo "</script>";
        } else {
            echo "<script type=\"text/JavaScript\">";
            echo "alert(\"🙏 Mohon Maaf Data Yang Anda Masukan Tidak Memesan Parkir.Terima Kasih \");";
            echo "location.replace(\"../../index.php\");";
            echo "</script>";
        }
    } else {
        echo "<script type=\"text/JavaScript\">";
        echo "alert(\"🙏 Mohon Maaf Data Yang Anda Masukan Tidak Terdaftar Disistem Kami. Harap Diperiksa Kembali.\");";
        echo "location.replace(\"../../index.php\");";
        echo "</script>";
    }
} else {
    echo "<script type=\"text/JavaScript\">";
    echo "alert(\"🙏 Mohon Isi Nomor Kartu Serta Password\");";
    echo "location.replace(\"../../index.php\");";
    echo "</script>";
}