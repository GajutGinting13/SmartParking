<?php
include ("../php/koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM catatan");
$no = 0;
while ($data = mysqli_fetch_array($sql)){
    $no++;

    echo "<tr style=text-align:center>";
    echo "<th>".$no."</th>";
    echo "<td style=border:none>". $data['nokartu'] ."</td>";
    echo "<td style=border:none>".$data['nama']. "</td>";
    echo "<td style=border:none>".$data['noplat']. "</td>";
    echo "<td style=border:none>".$data['tanggal']. "</td>";
    echo "<td style=border:none>".$data['masuk']. "</td>";
    echo "<td style=border:none>".$data['keluar']. "</td>";
    echo "</tr>";
}
?>