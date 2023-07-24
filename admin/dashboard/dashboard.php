<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION['stat_login']) and !isset($_SESSION['username']) and !isset($_SESSION['password'])) {
    $_SESSION['kondisilogin'] = 3;
    header("location:../index.php");
} else {
    $_SESSION['kondisilogin'] = 0;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../../gambar/logo.png">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/dashboard.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../css/sweetalert2.min.css">
    <link rel="stylesheet" href="../../style/loading.css">
    <script type="text/javascript" src="../../jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/sweetalert2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        setInterval(function() {
            $("#masuk").load("../../php/kirim/masuk.php");
            $("#keluar").load("../../php/kirim/keluar.php");
            $("#catatan").load("../../php/tambahdata.php");
            $("#member").load("../../php/member.php");
            $("#saldo").load("../../php/kirim/saldo.php");
            $("#parkir1").load("../../php/statusparkir/parkir1.php");
        }, 1000);
    });
    </script>
</head>

<body onload="preloading();">
    <div class="loading" id="app">
        <div class="loadingio-spinner-double-ring-q927dnfpc6">
            <div class="ldio-orb5kzd7sxn">
                <div></div>
                <div></div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" id="konfir_keluar">
                <img src="../../image/STMIK Triguna Dharma.png" alt="" width="30" height="30"
                    class="d-inline-block align-text-top"> Dashboard</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col col-lg-2" style="background-color: #06d6a0;">
                <ul>
                    <li>
                        <h5 style="color:#dee2e5">IN</h5>
                    </li>
                    <li><img src="../../image/in.png" alt="IN" class="logo"></li>
                </ul>
                <h2 style="margin-left: 30px; color: white;"><span id="masuk">0</span></h2>
            </div>
            <div class="col col-lg-2" style="background-color: #ef476f;">
                <ul>
                    <li>
                        <h5 style="color:#dee2e5">OUT</h2>
                    </li>
                    <li><img src="../../image/out.png" alt="OUT" class="logo"></li>
                </ul>
                <h2 style="margin-left: 30px; color:white;"><span id="keluar">0</span></h2>
            </div>
            <div class="col jam">
                <h2 style="letter-spacing: 5px;">MEDAN</h2>
                <h1></h1>
            </div>
        </div>
        <div class="row">
            <div class="col" style="background-image: url(../../image/bg2.jpg); background-position: center;">
                <h4>Selamat Datang Kembali Gajut!</h4>
                <h5 style="margin-left: 90px;">Status Parkiran Saat Ini</h5>
            </div>
            <div class="col col-lg-4 jumblah_harian" style="background-color: #ffd166;">
                <h6 style="color: #98A6AD;">Jumblah Saldo :</h6>
                <h1 style="color: black;"><span id="saldo">00</span></h1>
            </div>
        </div>
        <br>
        <div class="member catatan" style="padding: 5px;">
            <h3 class="float-start">Member</h3>
            <a href="tambahmember.php" class="btn btn-primary btn-md active" role="button" aria-pressed="true"
                style="margin-left:20px"><i class="fa-solid fa-user-plus"></i></a>
            <table class="table table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <th style="width:10px">No</th>
                        <th style="width:100px">Nomor Kartu</th>
                        <th style="width:300px">Nama</th>
                        <th style=" width:100px">Nomor Plat</th>
                        <th style="width:200px">Saldo</th>
                        <th style="width:200px">Aksi</th>
                    </tr>
                </thead>
                <tbody id="member">

                </tbody>
            </table>
        </div>

        <br><br>
        <div class="catatan" style="padding: 5px;">
            <div class="clearfix">
                <h3 class="float-start">Catatan Parkiran</h3>
                <ul class="float-end">
                    <li id="parkir1"></li>
                </ul>
            </div>
            <br>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width:10px; text-align:center">No</th>
                        <th style="text-align: center;">No Kartu</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">No Plat</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="width:200px; text-align: center;">Jam Masuk</th>
                        <th style="width:200px; text-align: center;">Jam Keluar</th>
                    </tr>
                </thead>
                <tbody id="catatan">

                </tbody>
            </table>
        </div>
    </div>
    <!--==========================================================================-->
    </div>

    <div class="footer">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <span></span>
            </ul>
            <p class="text-center text-muted">&copy; 2023 Smart Parking || STMIK Triguna Dharma</p>
        </footer>
    </div>

    <script type="text/javascript" src="../../js/dashboard.js"></script>
    <script type="text/javascript" src="../../js/loading.js"></script>
</body>
<?php
if (isset($_SESSION['konfirmasi'])) {
    echo '<script>aksi("Data Berhasil DiTambahkan !");</script>';
}
if (isset($_SESSION['topup'])) {
    echo '<script>aksi("Topup Berhasil! Senilai : Rp ' . $_SESSION['jumlah_saldo'] . ' Atas Nama ' . $_SESSION['nama'] . '");</script>';
}
if (isset($_SESSION['editdata'])) {
    echo '<script>aksi("Data Berhasil Diubah!");</script>';
}
if (isset($_SESSION['hapusdata'])) {
    echo '<script>aksi("Data Berhasil Dihapus!");</script>';
}
unset($_SESSION['konfirmasi'], $_SESSION['topup'], $_SESSION['editdata'], $_SESSION['jumlah_saldo'], $_SESSION['nama'], $_SESSION['hapusdata']);

?>

</html>