<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/loading.css">
    <title>TopUp</title>
    <link rel="shortcut icon" href="../../gambar/logo.png">
    <style>
    .mx-auto {
        width: 800px;
        margin-top: 20px;
    }
    </style>
</head>
<?php
session_start();
include("../../php/koneksi.php");
$topup = "";
$id = $_GET['id'];
$cek = mysqli_query($koneksi, "SELECT * FROM member WHERE id ='$id'");
$data = mysqli_fetch_array($cek);
$uang = $data['saldo'];
$_SESSION['nama'] = $data['nama'];

if (isset($_POST['kirim'])) {
    $topup = $_POST['topup'];
    if ($topup) {
        $jumblah = $uang + $topup;
        $kirimuang = mysqli_query($koneksi, "UPDATE member SET saldo='$jumblah' WHERE id='$id'");
        $_SESSION['topup'] = 1;
        $_SESSION['jumlah_saldo'] = $topup;
?>
<script type='text/javascript'>
location.replace('dashboard.php');
</script>";
<?php
    }
}

?>

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
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Isi Saldo
            </div>
            <form class="form-inline" method="POST" action="">
                <fieldset disabled>
                    <label class="sr-only" for="nama">Nama Member</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="nama"
                        placeholder=<?php echo $data['nama'] ?>>
                    <label class="sr-only" for="nama">Nomor Plat</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="nama"
                        placeholder=<?php echo $data['noplat'] ?>>
                </fieldset>
                <label class="sr-only" for="Jumblah">Jumblah :</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" class="form-control" name="topup" id="topup" placeholder="Jumblah uang"
                        autocomplete="off">
                </div>
                <div class="col-12">
                    <input type="submit" name="kirim" value="Top Up" class="btn btn-outline-success">
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../../js/loading.js"></script>
</body>


</html>