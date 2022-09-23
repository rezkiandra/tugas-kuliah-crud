<?php
$host       = "localhost";
$user       = "root";
$pwd        = "";
$dbase      = "apotek";
$koneksi    = mysqli_connect($host, $user, $pwd, $dbase);

$nama_pelanggan     = "";
$no_transaksi       = "";
$kode_obat          = "";
$nama_obat          = "";
$harga              = "";
$metode_transaksi   = "";
$tgl_transaksi      = "";
$success            = "";
$failed             = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'beli') { // Untuk membeli obat
    $kode_obat          = $_GET['kode_obat'];
    $sql1               = "select * from obat where kode_obat = '$kode_obat'";
    $q1                 = mysqli_query($koneksi, $sql1);
    $r1                 = mysqli_fetch_array($q1);
    $kode_obat          = $r1['kode_obat'];
    $nama_obat          = $r1['nama_obat'];
    $harga              = $r1['harga'];
}

if (isset($_POST['submit'])) { // Untuk Crete Data
    $nama_pelanggan     = $_POST['nama_pelanggan'];
    $kode_obat          = $_POST['kode_obat'];
    $metode_transaksi   = $_POST['metode_transaksi'];
    $tgl_transaksi      = $_POST['tgl_transaksi'];

    if ($nama_pelanggan && $kode_obat && $metode_transaksi && $tgl_transaksi) { // Untuk Insert Data ke Tb_Transaksi
        $sql1   = "insert into transaksi(nama_pelanggan, kode_obat, metode_transaksi, tgl_transaksi) values ('$nama_pelanggan' ,'$kode_obat', '$metode_transaksi', '$tgl_transaksi')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $success     = "Berhasil melakukan pembayaran";
        } else {
            $failed      = "Gagal melakukan pembayaran";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Apotek Sahabat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(150deg, rgba(44, 127, 38, 1) 0%, rgba(76, 62, 103, 1) 53%, rgba(51, 87, 110, 1) 100%) fixed;
            font-family: 'Karla', sans-serif;
            width: 100%;
            overflow: hidden;
        }

        #particles-js {
            background: linear-gradient(150deg, rgba(44, 127, 38, 1) 0%, rgba(76, 62, 103, 1) 53%, rgba(51, 87, 110, 1) 100%) fixed;
            width: 100%;
            height: 100%;
        }

        .card {
            position: absolute;
            width: 35%;
            display: flex;
            left: 33%;
            top: 13%;
        }

        .nav-item a {
            font-size: 17px;
            color: #000;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div id="particles-js">
        <div class="card">
            <h5 class="card-header">
                <ul class="nav nav-pills justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/pelanggan.php">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/produk.php">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-primary" aria-current="page" href="../php-kel1/transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/proses.php">Proses</a>
                    </li>
                </ul>
            </h5>
            <div class="card-body">
                <?php
                if ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:2;url=transaksi.php"); // waktu 2 detik
                }
                ?>
                <?php
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php
                    header("refresh:2;url=proses.php");
                }
                ?>
                <table class="table table-responsive align-middle">
                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <?php // Menampilkan Data dari Tb_Pelanggan
                            $sql2   = "select * from pelanggan";
                            $q2     = mysqli_query($koneksi, $sql2);
                            $urut   = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $nama_pelanggan         = $r2['nama_pelanggan'];
                            ?>
                            <?php
                            }
                            ?>
                            <label for="nama_pelanggan" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $nama_pelanggan ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <?php // Menampilkan Data dari Tb_Nomor
                            $sql2   = "select * from nomor";
                            $q2     = mysqli_query($koneksi, $sql2);
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $no_transaksi         = $r2['no_transaksi'];
                            ?>
                            <?php
                            }
                            ?>
                            <label for="no_transaksi" class="col-sm-4 col-form-label">Nomor Transaksi</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="no_transaksi" name="no_transaksi" value="<?php echo $no_transaksi++ ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <?php // Menampilkan Data dari Tb_Obat
                            $sql2   = "select * from obat where kode_obat = '$kode_obat'";
                            $q2     = mysqli_query($koneksi, $sql2);
                            $urut   = 1;
                            while ($r2 = mysqli_fetch_array($q2)) {
                                $kode_obat         = $r2['kode_obat'];
                                $nama_obat         = $r2['nama_obat'];
                                $harga             = $r2['harga'];
                            ?>
                            <?php
                            }
                            ?>
                            <label for="kode_obat" class="col-sm-4 col-form-label">Kode Obat</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="kode_obat" name="kode_obat" value="<?php echo $kode_obat ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_obat" class="col-sm-4 col-form-label">Nama Obat</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="nama_obat" name="nama_obat" value="<?php echo $nama_obat ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="metode_transaksi" class="col-sm-4 col-form-label">Metode Transaksi</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="metode_transaksi" id="metode_transaksi">
                                    <option value="">- Pilih Metode Transaksi -</option>
                                    <option value="COD" <?php if ($metode_transaksi == "COD") echo "selected" ?>>Cash On Delivery (COD)</option>
                                    <option value="Shopee Paylater" <?php if ($metode_transaksi == "Shopee Paylater") echo "selected" ?>>Shopee Paylater</option>
                                    <option value="Saldo DANA" <?php if ($metode_transaksi == "Saldo DANA") echo "selected" ?>>Saldo DANA</option>
                                    <option value="Saldo GoPay" <?php if ($metode_transaksi == "Saldo GoPay") echo "selected" ?>>Saldo GoPay</option>
                                    <option value="Transfer Bank" <?php if ($metode_transaksi == "Transfer Bank") echo "selected" ?>>Transfer Bank</option>
                                    <option value="Transfer Kasir Indomaret" <?php if ($metode_transaksi == "Transfer Kasir Indomaret") echo "selected" ?>>Transfer Kasir Indomaret</option>
                                    <option value="Transfer Kasir Alfamart" <?php if ($metode_transaksi == "Transfer Kasir Alfamart") echo "selected" ?>>Transfer Kasir Alfamart</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_transaksi" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $tgl_transaksi ?>">
                            </div>
                        </div>
                        <div class="row">
                            <a href="../php-kel1/proses.php">
                                <input type="submit" name="submit" value="Bayar Sekarang" class="btn btn-success btn-sm col-md-4">
                            </a>
                        </div>
                    </form>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../php-kel1/js/app.js"></script>
</body>

</html>