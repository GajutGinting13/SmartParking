<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Parkirankita</title>
    <link rel="shortcut icon" href="gambar/logo.png">
    <link rel="stylesheet" href="style/bootstrap/bootstrap.min.css">
    <link rel=" stylesheet" href="style/style.css">
    <link rel=" stylesheet" href="style/loading.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="js/modal_kirim.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <?php include("php/koneksi.php"); ?>
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
    <div class="container-fluid banner">
        <div class="btn_batal">
            <button type="button" class="btn btn-outline-info"
                style="border-top-left-radius: 0px;border-top-right-radius: 0px;" data-toggle="modal"
                data-target="#modal_batal">Batal
                Pesanan</button>
            <button type="button" class="btn btn-success"
                style="border-top-left-radius: 0px;border-top-right-radius: 0px;" data-toggle="modal"
                data-target="#cek_saldo">Cek Saldo</button>
        </div>
        <div class="header">
            <h1>HELLO</h1>
            <h2>SELAMAT DATANG DI WEBSITE MONITORING <b style="color: yellow;">PARKIRAN</b></h2>
            <div class="btnboking">
                <span id="monitor"></span>
            </div>
        </div>
    </div>
    <div class="contain">
        <h1><b>STATUS SLOT <span style="color: yellow;">PARKIR</span></b></h1>
    </div>
    <div class="monitor">
        <div class="menu">
            <span id="parkir"></span>
        </div>
    </div>
    <!-- MODAL  BOOKING-->
    <div class="modal fade" id="moda_booking" tabindex="-1" role="dialog" aria-labelledby="moda_bookingTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Isi Data Berikut :</h5>
                </div>
                <div class="modal-body">
                    <form action="php/kirim/kirimdatamodal.php?act=booking" method="POST">
                        <div class=" form-group row">
                            <label for="nokartu" class="col-sm-2 col-form-label">Nomor
                                Kartu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nokartu" name="nokartu"
                                    style="color: green;">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="noplat" class="col-sm-2 col-form-label">Nomor Plat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="noplat" name="noplat" style="color: green;">
                            </div>
                        </div>
                        <br>
                        <div class=" form-row align-items-center">
                            <div class="col-auto my-1">
                                <label class="mr-sm-2" for="menu">Lokasi</label>
                                <select class="custom-select mr-sm-2" id="menu" name="menu">
                                    <option selected value="0">Nomor..</option>
                                    <?php
                                    $sql = mysqli_query($koneksi, "SELECT * FROM `parkiran`");
                                    $sql2 = mysqli_query($koneksi, "SELECT * FROM `booking`");
                                    $data = mysqli_fetch_array($sql);
                                    while ($data_booking = mysqli_fetch_array($sql2)) {
                                        switch ($data_booking['noparkir']) {
                                            case '1':
                                                $p1 = 1;
                                                break;
                                            case '2':
                                                $p2 = 1;
                                                break;
                                            case '3':
                                                $p3 = 1;
                                                break;
                                            case '4':
                                                $p4 = 1;
                                                break;
                                        }
                                    }
                                    if ($data['parkiran1'] != 0 or $p1 != 0) {
                                        echo '<option value="1" class=text-danger disabled>Parkiran 1</option>';
                                    } else {
                                        echo '<option value="1" class="text-success">Parkiran 1</option>';
                                    }
                                    if ($data['parkiran2'] != 0 or $p2 != 0) {
                                        echo '<option value="2" class=text-danger disabled>Parkiran 2</option>';
                                    } else {
                                        echo '<option value="2" class="text-success">Parkiran 2</option>';
                                    }
                                    if ($data['parkiran3'] != 0 or $p3 != 0) {
                                        echo '<option value="3" class=text-danger disabled>Parkiran 3</option>';
                                    } else {
                                        echo '<option value="3" class="text-success">Parkiran 3</option>';
                                    }
                                    if ($data['parkiran4'] != 0 or $p4 != 0) {
                                        echo '<option value="4" class=text-danger disabled>Parkiran 4</option>';
                                    } else {
                                        echo '<option value="4" class="text-success">Parkiran 4</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="pass" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="pass" name="pass">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-12">
                                <input type="submit" name="submit" value="Booking!" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL BATAL PESANAN -->
    <div class="modal fade" id="modal_batal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Batal Pesanan</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">PERINGATAN</div>
                        <div class="card-body">
                            <p class="card-text">Membatalkan Pesanan Parkir Maka Saldo Anda Tidak Dapat Dikembalikan!
                            </p>
                        </div>
                    </div>
                    <form action="php/statusparkirindex/batal_pesanan.php" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-10" style="margin: 10px;">
                                <input type="text" class="form-control" id="nokartu" name="nokartu"
                                    style="color: green;" placeholder="Nomor Kartu" value="">
                            </div>
                            <br>
                            <div class="col-sm-10" style="margin: 10px;">
                                <input type="password" class="form-control" id="pass" name="pass" style="color: green;"
                                    placeholder="Password" autocomplete="off" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-12">
                                <input type="submit" name="submit" value="Batal Pesanan" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Pesanan?')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cek Saldo -->
    <div class="modal fade" id="cek_saldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="ceksaldo.php">
                    <div class="form-group row">
                        <div class="col-sm-10" style="margin: 10px;">
                            <input type="text" class="form-control" id="nokartu" name="nokartu" style="color: green;"
                                placeholder="Nomor Kartu" value="">
                        </div>
                        <br>
                        <div class="col-sm-10" style="margin: 10px;">
                            <input type="password" class="form-control" id="pass" name="pass" style="color: green;"
                                placeholder="Password" autocomplete="off" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-20">
                            <input type="submit" name="submit" value="Cek Saldo" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/loading.js"></script>
</body>

</html>