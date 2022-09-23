<?php
$host           = "localhost";
$user           = "root";
$pwd            = "";
$dbase          = "bioskop";
$koneksi        = mysqli_connect($host, $user, $pwd, $dbase);

$judul_film     = "";
$nama_teater    = "";
$hari           = "";

if (isset($_GET['op'])) {
    $op     = $_GET['op'];
} else {
    $op     = "";
}

if ($op == 'pilih') { // Untuk memilih film
    $judul_film         = $_GET['judul_film'];
    $sql1               = "select * from tb_film where judul_film = '$judul_film'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $judul_film         = $r1['judul_film'];
}
if ($op == 'pilih') { // Untuk memilih teater
    $nama_teater         = $_GET['nama_teater'];
    $sql1               = "select * from tb_teater where nama_teater = '$nama_teater'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $nama_teater         = $r1['nama_teater'];
}
if ($op == 'pilih') { // Untuk memilih jadwal
    $hari                = $_GET['hari'];
    $sql1               = "select * from tb_jadwal where hari = '$hari'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $hari               = $r1['hari'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <title>Kursi - Bioskop Cinema</title>
    <style>
        body {
            font-family: 'Karla', sans-serif;
            overflow: hidden;
            font-size: 18px;
            letter-spacing: 3px;
            background: linear-gradient(150deg, rgba(127, 38, 38, 1) 0%, rgba(62, 103, 96, 1) 33%, rgba(95, 63, 107, 1) 67%, rgba(51, 87, 110, 1) 100%) fixed;
        }

        .nav-link {
            color: #fff;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .card {
            width: 70%;
            left: 15%;
            top: 560px;
        }

        .card-header h1 {
            font-size: 24px;
            margin: 1px 0 0 0;
            letter-spacing: 10px;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
        }

        .nav-link:hover {
            color: #fff;
            cursor: default;
        }

        #particles-js {
            position: relative;
            top: -550px;
            z-index: 3;
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="card-header bg-dark">
        <nav class="nav nav-pills justify-content-around">
            <a class="nav-link">Pelanggan</a>
            <a class="nav-link">Film</a>
            <a class="nav-link">Teater</a>
            <a class="nav-link">Jadwal</a>
            <a class="nav-link bg-white text-dark">Kursi</a>
            <a class="nav-link">Transaksi</a>
        </nav>
    </div>
    <div id="particles-js">
        <div class="card">
            <div class="card-header bg-white text-center">
                <h1>SCREEN</h1>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'A' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'B' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'C' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'D' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'E' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'F' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'G' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="card-body">
                <?php // Menampilkan data dari Tb_Kursi
                $sql2   = "select * from tb_kursi where kode_kursi = 'H' order by id_kursi";
                $q2     = mysqli_query($koneksi, $sql2);
                for ($i = 0; $i < 12; $i++) {
                    $r2 = mysqli_fetch_array($q2);
                    $kode_kursi         = $r2['kode_kursi'];
                    $no_kursi           = $r2['no_kursi'];
                ?>
                    <div class="row">
                        <div class="col">
                            <a href="6-transaksi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>&no_kursi=<?php echo $no_kursi ?>">
                                <button type="button" class="btn btn-danger col-md-12 btn-sm"><?php echo $no_kursi ?></button>
                            </a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../sbd/js/app.js"></script>
</body>

</html>