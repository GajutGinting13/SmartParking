<?php

include ("../koneksi.php");
$sql = mysqli_query($koneksi, "SELECT * FROM parkiran");
$status = mysqli_fetch_array($sql);

if ($status['parkiran1'] == 1){
    echo "<span style=background-color:red></span>";
}else{
    echo "<span style=background-color:#2dff29></span>";
}
// 
if ($status['parkiran2'] == 1){
    echo "<span style=background-color:red></span>";
}else{
    echo "<span style=background-color:#2dff29;></span>";
}
// 
if ($status['parkiran3'] == 1){
    echo "<span style=background-color:red></span>";
}else{
    echo "<span style=background-color:#2dff29></span>";
}
// 
if ($status['parkiran4'] == 1){
    echo "<span style=background-color:red></span>";
}else{
    echo "<span style=background-color:#2dff29></span>";
}