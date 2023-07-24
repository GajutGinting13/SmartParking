<?php
error_reporting(0);
ini_set('display_errors', 0);
include("../../header.php");
include("../koneksi.php");

if ($_GET['act'] == 'booking') {
    $nokartu = $_POST['nokartu'];
    $noplat = $_POST['noplat'];
    $menu = $_POST['menu'];
    $pass = $_POST['pass'];


    $sql = mysqli_query($koneksi, "SELECT * FROM member WHERE nokartu='$nokartu' AND noplat='$noplat'");
    $data = mysqli_fetch_array($sql);

    //ambil saldo
    $periksa_saldo = mysqli_query($koneksi, "SELECT * FROM `keuangan`");
    $saldo = mysqli_fetch_array($periksa_saldo);

    if ($data['pass'] == $pass) {
        $sql2 = mysqli_query($koneksi, "SELECT * FROM booking WHERE nokartu='$nokartu' AND noplat='$noplat'");
        $pemeriksaan_daftar_booking = mysqli_num_rows($sql2);
        if ($pemeriksaan_daftar_booking == 0) {
            if (!$menu) {
                echo "<script type=\"text/JavaScript\">";
                echo "pilih_tempat();";
                echo "</script>";
            } else {
                //cek pada parkiran
                $cekparkiran = mysqli_query($koneksi, "SELECT * FROM `catatan` WHERE `nokartu`='$nokartu' and `keluar`='NULL'");
                $hasil = mysqli_num_rows($cekparkiran);
                if ($hasil == 0) {
                    if ($data['saldo'] >= '10000') {
                        mysqli_query($koneksi, "INSERT INTO `booking`(`nokartu`, `noplat`, `noparkir`) VALUE ('$nokartu', '$noplat', '$menu')");
                        $pengurangan_saldo = $data['saldo'] - 5000;
                        mysqli_query($koneksi, "UPDATE `member` SET `saldo` = '$pengurangan_saldo' WHERE `nokartu` = '$nokartu'");
                        $uang = $saldo['saldo'] + 5000;
                        mysqli_query($koneksi, "UPDATE `keuangan` SET `saldo` = '$uang'");
                        echo "<script type=\"text/JavaScript\">";
                        echo "berhasil();";
                        echo "</script>";
                    } else {
                        echo "<script type=\"text/JavaScript\">";
                        echo "saldo_kurang();";
                        echo "</script>";
                    }
                } else {
                    echo "<script type=\"text/JavaScript\">";
                    echo "gagal1();";
                    echo "</script>";
                }
            }
        } else {
            echo "<script type=\"text/JavaScript\">";
            echo "gagal2();";
            echo "</script>";
        }
    } else {
        echo "<script type=\"text/JavaScript\">";
        echo "salah_sandi();";
        echo "</script>";
    }
}
