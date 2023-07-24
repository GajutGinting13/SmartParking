<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Admin || Login</title>
    <link rel="shortcut icon" href="../gambar/logo.png">
    <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
    <link rel=" stylesheet" href="../style/style_admin.css">
    <link rel=" stylesheet" href="../css/sweetalert2.min.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/sweetalert2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</head>

<body>
    <div class="container">
        <div class="form">
            <h2>Hy, Admin</h2>
            <div class="isi">
                <form method="POST" action="aksi.php">
                    <input type="username" class="form_isi" name="username" placeholder="Username" required />
                    <input type="password" class="form_isi" name="password" placeholder="Password" required />
                    <br>
                    <input type="submit" name="login" value="LOGIN" id="btn">
                </form>
            </div>
        </div>
    </div>
</body>
<script>
salahsandi = (teks) => {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: teks,
    })
}
logout = () => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: 'Logout Berhasil !'
    })
}
</script>
<?php

if ($_SESSION['kondisilogin'] == 1) {
    echo '<script>salahsandi("Sandi Atau Email Anda Salah, Mohon Periksa Kembali");</script>';
} else if ($_SESSION['kondisilogin'] == 2) {
    echo '<script>salahsandi("Lengkapi Data Anda");</script>';
} else if ($_SESSION['kondisilogin'] == 3) {
    echo '<script>salahsandi("Anda Belum Melakukan Login, Harap Login Terlebih Dahulu");</script>';
} else if ($_SESSION['kondisilogin'] == 4) {
    echo '<script>logout();</script>';
}
$_SESSION['kondisilogin'] = 0
?>

</html>