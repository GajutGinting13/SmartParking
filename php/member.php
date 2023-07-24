<?php
include("../php/koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM member");
$no = 0;
while ($data = mysqli_fetch_array($sql)) {
    $id = $data['id'];
    echo $id;
    $no++;
    echo "<tr style=text-align:center>";
    echo "<th>" . $no . "</th>";
    echo "<td style=border:none>" . $data['nokartu'] . "</td>";
    echo "<td style=border:none>" . $data['nama'] . "</td>";
    echo "<td style=border:none>" . $data['noplat'] . "</td>";
    echo "<td style=border:none>" . uang($data['saldo']) . "</td>";
    echo "<td style=border:none>";
    echo '<a href="tambahmember.php?op=hapus&id=' . $id . '"onclick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Data Pelanggan Atas Nama ' . $data['nama'] . '? Klik OK Jika Setuju\');"><button style=margin:1px type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>';
    echo '<a href="tambahmember.php?op=edit&id=' . $id . '"><button style=margin:1px type="button" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></button></a>';
    echo '<a href="topup.php?op=edit&id=' . $id . '""><button style=margin:1px type="button" class="btn btn-success"><i class="fa-solid fa-coins"></i></button></a>';
    echo "</td>";
    echo "</tr>";
}
function uang($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}