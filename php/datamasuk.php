<?php
include("koneksi.php");
$kode = $_GET['kode'];

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$jam = date('H:i:s');
$parkir1 = $_GET['parkir1'];
$parkir2 = $_GET['parkir2'];
$parkir3 = $_GET['parkir3'];
$parkir4 = $_GET['parkir4'];

$gerbang1 = "0";
$gerbang2 = "0";

$p1 = 0;
$p2 = 0;
$p3 = 0;
$p4 = 0;

$sql4 = mysqli_query($koneksi, "SELECT * FROM `status_kendaraan`");
$datamobil = mysqli_fetch_array($sql4);
$mobilmasuk = $datamobil['kendaraan_masuk'];
$mobilkeluar = $datamobil['kendaraan_keluar'];

if ($kode == '0') {
    $nokartu = $_GET['nokartu'];
    $noplat = $_GET['noplat'];


    //memeriksa data member
    $periksa = mysqli_query($koneksi, "SELECT * FROM `member` WHERE `nokartu`='$nokartu' and `noplat`='$noplat'");
    $data_member = mysqli_num_rows($periksa);
    $datanama = mysqli_fetch_array($periksa);

    //memeriksa bookingan
    $periksa_booking = mysqli_query($koneksi, "SELECT * FROM `booking` WHERE `nokartu`='$nokartu' and `noplat`='$noplat'");
    $bookingan = mysqli_num_rows($periksa_booking);

    //periksa kendaraan didalam
    $periksa_kendaraan = mysqli_query($koneksi, "SELECT * FROM `catatan` WHERE `nokartu`='$nokartu' and `keluar`='NULL'");
    $periksa_hasil = mysqli_num_rows($periksa_kendaraan);

    //periksa keadaan slot
    $sql5 = mysqli_query($koneksi, "SELECT * FROM `parkiran`");
    $slot = mysqli_fetch_array($sql5);
    if ($slot['parkiran1'] == '1' and $slot['parkiran2'] == '1' and $slot['parkiran3'] == '1' and $slot['parkiran4'] == '1') {
        $kondisi = "penuh";
    } else {
        $kondisi = "ada";
    }

    if ($periksa_hasil == 1 or $kondisi == "penuh") {
        //echo "Kartu Ditolak Dikarenakan Kartu Sudah Di Gunakan";
        $gerbang1 = "1";
    } else {
        if ($data_member) {
            if ($bookingan) {
                $data = mysqli_fetch_array($periksa_booking);
                switch ($data['noparkir']) {
                    case '1':
                        $p1 = 3;
                        break;
                    case '2':
                        $p2 = 3;
                        break;
                    case '3':
                        $p3 = 3;
                        break;
                    case '4':
                        $p4 = 3;
                        break;
                }
                $hasil = mysqli_query($koneksi, "DELETE FROM `booking` WHERE `nokartu`='$nokartu'"); // hapus dari daftar booking
            }
            $nama_member = $datanama['nama'];
            mysqli_query($koneksi, "INSERT INTO `catatan` (`nama`, `nokartu`, `noplat`, `tanggal`, `masuk`) VALUES ('$nama_member','$nokartu', '$noplat', '$tanggal', '$jam') ");
            $gerbang1 = "2";
            $conter_masuk = $mobilmasuk + 1;
            mysqli_query($koneksi, "UPDATE `status_kendaraan` SET `kendaraan_masuk`='$conter_masuk'");
        } else {
            $gerbang1 = "1";
        }
    }
} else if ($kode == '1') {
    //gerbang kaluar
    $nokartu = $_GET['nokartu'];
    $noplat = $_GET['noplat'];

    $periksa_saldo = mysqli_query($koneksi, "SELECT * FROM `member` WHERE `nokartu`='$nokartu' and `noplat` = '$noplat'");
    $uang = mysqli_query($koneksi, "SELECT * FROM `keuangan`");
    $keuangan = mysqli_fetch_array($uang);
    $hasil = mysqli_num_rows($periksa_saldo);
    $hasil2 = mysqli_fetch_array($periksa_saldo);
    $periksa_kendaraan = mysqli_query($koneksi, "SELECT * FROM `catatan` WHERE `nokartu`='$nokartu' and `keluar`='NULL'");
    $periksa_hasil = mysqli_num_rows($periksa_kendaraan);

    if ($periksa_hasil) {
        if ($hasil) {
            if ($hasil2['saldo'] >= '5000') {
                $saldo = $hasil2['saldo'] - 5000;
                mysqli_query($koneksi, "UPDATE `member` SET `saldo` = '$saldo' WHERE `nokartu`='$nokartu'");
                $tambah_saldo = $keuangan['saldo'] + 5000;
                mysqli_query($koneksi, "UPDATE `keuangan` SET `saldo`='$tambah_saldo'");
                mysqli_query($koneksi, "UPDATE `catatan` SET `keluar`='$jam' WHERE `nokartu`='$nokartu' and `noplat`='$noplat' ");
                $gerbang2 = "2";
                $conter_keluar = $mobilkeluar + 1;
                mysqli_query($koneksi, "UPDATE `status_kendaraan` SET `kendaraan_keluar`='$conter_keluar'");
            } else {
                // echo "Saldo Tidak Cukup";
                $gerbang2 = "1";
            }
        } else {
            // echo "Data Tidak Ada";
            $gerbang2 = "1";
        }
    } else {
        //echo "Kartu Anda Salah";
        $gerbang2 = "1";
    }
} else {
    $hasil = mysqli_query($koneksi, "UPDATE `parkiran` SET `parkiran1` = '$parkir1', `parkiran2` = '$parkir2', `parkiran3` = '$parkir3', `parkiran4` = '$parkir4'");
}
//ambil data boking
$sql3 = mysqli_query($koneksi, "SELECT * FROM `booking`");
while ($data_booking = mysqli_fetch_array($sql3)) {
    switch ($data_booking['noparkir']) {
        case '1':
            $p1 = 1;
            break;
        case '2':
            $p2 = 1;
            break;
        case '3':
            $p3 = 1;
            break;
        case '4':
            $p4 = 1;
            break;
    }
}
echo "{\"gerbang1\": $gerbang1, \"gerbang2\": $gerbang2, \"b1\": $p1, \"b2\": $p2, \"b3\": $p3, \"b4\": $p4}";

//url pengecekan koneksi
//http://localhost/website/php/datamasuk.php?kode=1&nokartu=24712317564&noplat=BK4927FF&parkir1=1&parkir2=0&parkir3=1&parkir4=0