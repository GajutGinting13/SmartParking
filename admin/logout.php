<?php
session_start();

unset($_SESSION['stat_login']);
unset($_SESSION['username']);
unset($_SESSION['password']);

$_SESSION['kondisilogin'] = 4;
header("location:index.php");
?>