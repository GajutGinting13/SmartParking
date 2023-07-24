<?php
session_start();
$username = "admin";
$password = "admin";

if (isset($_POST['username']) and isset($_POST['password'])) {
    if ($_POST['username'] == $username and $_POST['password'] == $password) {
        $_SESSION['stat_login'] = 1;
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

        header("location:dashboard/dashboard.php");
    } else {
        $_SESSION['kondisilogin'] = 1;
        header("location:index.php");
    }
}else{
    $_SESSION['kondisilogin'] = 2;
}