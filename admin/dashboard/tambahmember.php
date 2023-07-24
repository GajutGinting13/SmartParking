<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/loading.css">
    <title>Tambah | Edit Data</title>
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
$nama = "";
$nokartu = "";
$noplat = "";
$nohp = "";
$pass = "";
$sukses = "";
$error = "";
// error_reporting(0);

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'hapus') {
    $id = $_GET['id'];
    $hapusdata = mysqli_query($koneksi, "DELETE FROM member WHERE id='$id' ");
    $_SESSION['hapusdata'] = 1;
?>
<script type='text/javascript'>
location.replace('dashboard.php');
</script>";
<?php
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $cek = mysqli_query($koneksi, "SELECT * FROM member WHERE id ='$id'");
    $data = mysqli_fetch_array($cek);
    $nama = $data['nama'];
    $nokartu = $data['nokartu'];
    $noplat = $data['noplat'];
    $nohp = $data['nohp'];
    $pass = $data['pass'];

    if ($nama == '') {
        $error = "Data Tidak Ditemukan!";
    }
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nokartu = $_POST['nokartu'];
    $noplat = $_POST['noplat'];
    $nohp = $_POST['nohp'];
    $pass = $_POST['pass'];

    if ($nama && $nokartu && $noplat && $nohp && $pass) {
        if ($op == 'edit') {
            $updatedata = mysqli_query($koneksi, "UPDATE `member` SET
`nokartu`='$nokartu',`nama`='$nama',`nohp`='$nohp',`noplat`='$noplat',`pass`='$pass' WHERE `id`='$id'");
            $sukses = "Data Berhasil Diupdate!";
            $_SESSION['editdata'] = 1;
        } else {
            $cekdata = mysqli_query($koneksi, "SELECT * FROM member WHERE nokartu='$nokartu'");
            $hasil = mysqli_fetch_array($cekdata);
            if (!$hasil['nokartu']) {
                $sql = mysqli_query($koneksi, "INSERT INTO member (nama, nokartu, noplat, nohp, pass, saldo) values ('$nama',
'$nokartu', '$noplat', '$nohp','$pass',0)");
                $sukses = "Berhasil Menambahkan Data";
            } else {
                $error = "Nomor Kartu Sudah pernah Digunakan";
            }
        }
    } else {
        $error = "Silahkan Lengkapi Semua Data";
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
    <div class=" mx-auto">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Tambah | Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses;
                        $_SESSION['konfirmasi'] = 1;
                        ?>
                </div>
                <script type='text/javascript'>
                location.replace('dashboard.php');
                </script>";
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off"
                                value=<?php echo $nama ?>>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="nokartu" class="col-sm-2 col-form-label">Nomor Kartu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nokartu" name="nokartu" autocomplete="off"
                                value=<?php echo $nokartu ?>>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="noplat" class="col-sm-2 col-form-label">Nomor Plat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="noplat" name="noplat" autocomplete="off"
                                value=<?php echo $noplat ?>>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="nohp" class="col-sm-2 col-form-label">Nomor Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nohp" autocomplete="off" name="nohp"
                                value=<?php echo $nohp ?>>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pass" name="pass" value=<?php echo $pass ?>>
                        </div>
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../js/loading.js"></script>
</body>

</html>