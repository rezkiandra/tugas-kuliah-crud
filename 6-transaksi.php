<?php
$host           = "localhost";
$user           = "root";
$pwd            = "";
$dbase          = "bioskop";
$koneksi        = mysqli_connect($host, $user, $pwd, $dbase);

$username           = "";
$judul_film         = "";
$nama_teater        = "";
$hari               = "";
$no_kursi           = "";
$harga              = "";
$metode_transaksi   = "";
$success            = "";
$failed             = "";
$op                 = "";

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

if ($op == 'pilih') { // Untuk memilih kursi
    $no_kursi          = $_GET['no_kursi'];
    $sql1               = "select * from tb_kursi where no_kursi = '$no_kursi'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $no_kursi          = $r1['no_kursi'];
}

if (isset($_POST['bayar'])) { // Untuk Crete Data
    $username           = $_POST['username'];
    $nama_teater        = $_POST['nama_teater'];
    $hari               = $_POST['hari'];
    $no_kursi           = $_POST['no_kursi'];
    $harga              = $_POST['harga'];
    $judul_film         = $_POST['judul_film'];
    $metode_transaksi   = $_POST['metode_transaksi'];

    if ($username && $nama_teater && $hari && $no_kursi && $harga && $judul_film && $metode_transaksi) { // Untuk Insert Data ke Tb_Transaksi
        $sql1   = "insert into tb_transaksi(username, nama_teater, hari, no_kursi, harga, judul_film, metode_transaksi) values ('$username', '$nama_teater', '$hari', '$no_kursi', '$harga', '$judul_film', '$metode_transaksi')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $success     = "Berhasil melakukan pembayaran";
        } else {
            $failed      = "Gagal melakukan pembayaran";
        }
    } else {
        $failed          = "Silahkan pilih metode transaksi";
    }
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
    <title>Transaksi - Bioskop Cinema</title>
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
            width: 40%;
            left: 31%;
            top: 590px;
        }

        .card-body {
            font-size: 16px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .col-form-label {
            font-size: 14px;
            letter-spacing: 1px;
        }

        .form-control {
            font-size: 14px;
        }

        .btn-success {
            font-size: 13px;
        }

        a {
            text-decoration: none;
        }

        .table {
            letter-spacing: 1px;
        }

        .alert {
            font-size: 14px;
            letter-spacing: 1px;
            text-align: center;
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
            <a class="nav-link">Kursi</a>
            <a class="nav-link bg-white text-dark">Transaksi</a>
        </nav>
    </div>
    <div id="particles-js">
        <div class="card">
            <div class="card-header text-center">Cinema XXI</div>
            <div class="card-body text-center">-- Keterangan Transaksi --</div>
            <?php
            if ($failed) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $failed ?>
                </div>
            <?php
                header("refresh:2;url=6-transaksi.php"); // waktu referesh 2 detik
            }
            ?>
            <?php
            if ($success) {
            ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success ?>
                </div>
            <?php
                header("refresh:2;url=1-pelanggan.php");
            }
            ?>
            <?php // Menampilkan data dari Tb_Jadwal
            $sql2   = "select * from tb_pelanggan";
            $q2     = mysqli_query($koneksi, $sql2);
            while ($r2 = mysqli_fetch_array($q2)) {
                $username      = $r2['username'];
            ?>
            <?php
            }
            ?>
            <?php // Menampilkan data dari Tb_Jadwal
            $sql2   = "select * from tb_film where judul_film = '$judul_film'";
            $q2     = mysqli_query($koneksi, $sql2);
            while ($r2 = mysqli_fetch_array($q2)) {
                $judul_film      = $r2['judul_film'];
            ?>
            <?php
            }
            ?>
            <?php // Menampilkan data dari Tb_Jadwal
            $sql2   = "select * from tb_teater where nama_teater = '$nama_teater'";
            $q2     = mysqli_query($koneksi, $sql2);
            while ($r2 = mysqli_fetch_array($q2)) {
                $nama_teater      = $r2['nama_teater'];
            ?>
            <?php
            }
            ?>
            <?php // Menampilkan data dari Tb_Jadwal
            $sql2   = "select * from tb_jadwal where hari = '$hari'";
            $q2     = mysqli_query($koneksi, $sql2);
            while ($r2 = mysqli_fetch_array($q2)) {
                $hari      = $r2['hari'];
                $harga     = $r2['harga'];
            ?>
            <?php
            }
            ?>
            <?php // Menampilkan data dari Tb_Jadwal
            $sql2   = "select * from tb_kursi where no_kursi = '$no_kursi'";
            $q2     = mysqli_query($koneksi, $sql2);
            while ($r2 = mysqli_fetch_array($q2)) {
                $no_kursi      = $r2['no_kursi'];
            ?>
            <?php
            }
            ?>
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-4 offset-1 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="username" id="username" value="<?php echo $username ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul_film" class="col-sm-4 offset-1 col-form-label">Judul Film</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="judul_film" id="judul_film" value="<?php echo $judul_film ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_teater" class="col-sm-4 offset-1 col-form-label">Nama Teater</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="nama_teater" id="nama_teater" value="<?php echo $nama_teater ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="hari" class="col-sm-4 offset-1 col-form-label">Hari</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="hari" id="hari" value="<?php echo $hari ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_kursi" class="col-sm-4 offset-1 col-form-label">Nomor Kursi</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="no_kursi" id="no_kursi" value="<?php echo $no_kursi ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-sm-4 offset-1 col-form-label">Harga bayar (Rp.)</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control" name="harga" id="harga" value="<?php echo $harga ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="metode_transaksi" class="col-sm-4 offset-1 col-form-label">Metode Transaksi</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="metode_transaksi" id="metode_transaksi">
                            <option value="">- Pilih Metode Transaksi -</option>
                            <option value="Shopee Paylater" <?php if ($metode_transaksi == "Shopee Paylater") echo "selected" ?>>Shopee Paylater</option>
                            <option value="Saldo DANA" <?php if ($metode_transaksi == "Saldo DANA") echo "selected" ?>>Saldo DANA</option>
                            <option value="Saldo GoPay" <?php if ($metode_transaksi == "Saldo GoPay") echo "selected" ?>>Saldo GoPay</option>
                            <option value="Transfer Bank" <?php if ($metode_transaksi == "Transfer Bank") echo "selected" ?>>Transfer Bank</option>
                            <option value="Visa MasterCard" <?php if ($metode_transaksi == "Visa MasterCard") echo "selected" ?>>Visa MasterCard</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-4 offset-1">
                        <a href="../sbd/1-pelanggan.php">
                            <input type="submit" name="bayar" id="bayar" class="form-control btn-sm btn-success" value="Bayar sekarang">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../sbd/js/app.js"></script>
</body>

</html>