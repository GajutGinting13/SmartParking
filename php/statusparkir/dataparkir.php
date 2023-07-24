<?php
include ("../../php/koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM parkiran");
$data = mysqli_fetch_array($sql);

if ($data['parkiran1']){
    echo '<option value="1" class=text-success>Parkiran 1</option>';
}else{
    echo '<option value="1" disabled class=text-success>Parkiran 1</option>';
}
?>