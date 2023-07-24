<?php
include("../koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM parkiran ");
$sql2 = mysqli_query($koneksi, "SELECT * FROM `booking`");
$hasil = mysqli_fetch_array($sql);
$p1 = "0";
$p2 = "0";
$p3 = "0";
$p4 = "0";

while ($data = $hasil2 = mysqli_fetch_array($sql2)) {
    switch ($data['noparkir']) {
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
if ($hasil['parkiran1'] == 1 and $p1 == 0) {
    echo "<div class=coloum id=merah>";
    echo "<h1>1</h1>";
    echo "<h2>Sudah Terisi</h2>";
    echo "<img src=gambar/logo3.png class=logo>";
    echo "</div>";
} else if ($hasil['parkiran1'] == 1 and $p1 == 1 or $hasil['parkiran1'] == 0 and $p1 == 1) {
    echo "<div class=coloum id=biru>";
    echo "<h1>1</h1>";
    echo "<h2>Sudah Dibooking</h2>";
    echo "<img src=gambar/waktu.png class=logo>";
    echo "</div>";
} else {
    echo "<div id=hijau class=coloum>";
    echo "<h1>1</h1>";
    echo "<h2>Kosong</h2>";
    echo "<img src=gambar/logo1.png class=logo>";
    echo "</div>";
}
// 
if ($hasil['parkiran2'] == 1 and $p2 == 0) {
    echo "<div class=coloum id=merah>";
    echo "<h1>2</h1>";
    echo "<h2>Sudah Terisi</h2>";
    echo "<img src=gambar/logo3.png class=logo>";
    echo "</div>";
} else if ($hasil['parkiran2'] == 1 and $p2 == 1 or $hasil['parkiran2'] == 0 and $p2 == 1) {
    echo "<div class=coloum id=biru>";
    echo "<h1>2</h1>";
    echo "<h2>Sudah Dibooking</h2>";
    echo "<img src=gambar/waktu.png class=logo>";
    echo "</div>";
} else {
    echo "<div id=hijau class=coloum>";
    echo "<h1>2</h1>";
    echo "<h2>Kosong</h2>";
    echo "<img src=gambar/logo1.png class=logo>";
    echo "</div>";
}
// 
if ($hasil['parkiran3'] == 1  and $p3 == 0) {
    echo "<div class=coloum id=merah>";
    echo "<h1>3</h1>";
    echo "<h2>Sudah Terisi</h2>";
    echo "<img src=gambar/logo3.png class=logo>";
    echo "</div>";
} else if ($hasil['parkiran3'] == 1 and $p3 == 1 or $hasil['parkiran3'] == 0 and $p3 == 1) {
    echo "<div class=coloum id=biru>";
    echo "<h1>3</h1>";
    echo "<h2>Sudah Dibooking</h2>";
    echo "<img src=gambar/waktu.png class=logo>";
    echo "</div>";
} else {
    echo "<div id=hijau class=coloum>";
    echo "<h1>3</h1>";
    echo "<h2>Kosong</h2>";
    echo "<img src=gambar/logo1.png class=logo>";
    echo "</div>";
}
// 
if ($hasil['parkiran4'] == 1  and $p4 == 0) {
    echo "<div class=coloum id=merah>";
    echo "<h1>4</h1>";
    echo "<h2>Sudah Terisi</h2>";
    echo "<img src=gambar/logo3.png class=logo>";
    echo "</div>";
} else if ($hasil['parkiran4'] == 1 and $p4 == 1 or $hasil['parkiran4'] == 0 and $p4 == 1) {
    echo "<div class=coloum id=biru>";
    echo "<h1>4</h1>";
    echo "<h2>Sudah Dibooking</h2>";
    echo "<img src=gambar/waktu.png class=logo>";
    echo "</div>";
} else {
    echo "<div id=hijau class=coloum>";
    echo "<h1>4</h1>";
    echo "<h2>Kosong</h2>";
    echo "<img src=gambar/logo1.png class=logo>";
    echo "</div>";
}