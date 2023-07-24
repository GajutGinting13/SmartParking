<?php
include('../koneksi.php');

$sql = mysqli_query($koneksi, "SELECT * FROM parkiran");
$sql2 = mysqli_query($koneksi, "SELECT * FROM `booking`");
$ambildata = mysqli_fetch_array($sql);
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
if ($ambildata['parkiran1'] == 1 and $ambildata['parkiran2'] == 1 and $ambildata['parkiran3'] == 1 and $ambildata['parkiran4'] == 1) {
    if ($p1 == 1 and $p2 == 1 and $p3 == 1 and $p4 == 1) {
        echo '<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#moda_booking" disabled>Parkiran Penuh!</button>';
    }
} else {
    echo '<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#moda_booking">Ayo Booking</button>';
}