<?php
$host       = "localhost";
$user       = "root";
$pwd        = "";
$dbase      = "apotek";
$koneksi    = mysqli_connect($host, $user, $pwd, $dbase);

$nama_pelanggan     = "";
$pekerjaan          = "";
$alamat             = "";
$kota               = "";
$success            = "";
$failed             = "";

if (isset($_POST['submit'])) { // Untuk Create Data
    $nama_pelanggan     = $_POST['nama_pelanggan'];
    $pekerjaan          = $_POST['pekerjaan'];
    $alamat             = $_POST['alamat'];
    $kota               = $_POST['kota'];

    if ($nama_pelanggan && $pekerjaan && $alamat && $kota) { // Untuk Insert Data ke Tb_Pelanggan
        $sql1   = "insert into pelanggan(nama_pelanggan, pekerjaan, alamat, kota) values ('$nama_pelanggan','$pekerjaan','$alamat','$kota')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $success     = "Berhasil memasukkan data diri";
        } else {
            $failed      = "Gagal memasukkan data diri";
        }
    } else {
        $failed = "Silakan lengkapi data diri";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelanggan - Apotek Sahabat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../php-kel1/css/pelanggan.css"> -->
    <style>
        body {
            background: linear-gradient(150deg, rgba(44, 127, 38, 1) 0%, rgba(76, 62, 103, 1) 53%, rgba(51, 87, 110, 1) 100%) fixed;
            font-family: 'Karla', sans-serif;
            width: 100%;
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
            top: 22%;
        }
    </style>
</head>

<body>
    <div id="particles-js">
        <div class="card">
            <div class="card-header" style="font-size: 17px; font-weight: 500;">
                <ul class="nav nav-pills justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link active bg-primary" aria-current="page" href="../php-kel1/pelanggan.php">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/produk.php" style="color: #000;">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/transaksi.php" style="color: #000;">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/proses.php" style="color: #000;">Proses</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <?php
                if ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:2;url=pelanggan.php"); // waktu referesh 2 detik
                }
                ?>
                <?php
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php
                    header("refresh:2;url=produk.php");
                }
                ?>
                <h5 class="card-title text-center lead" style="font-size: 17px; margin: 5px 0 0 0;">Masukkan Data Diri Anda</h5><br>
                <table class="table table-responsive align-middle">
                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <label for="nama_pelanggan" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama" value="<?php echo $nama_pelanggan ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan" value="<?php echo $pekerjaan ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="<?php echo $alamat ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota" value="<?php echo $kota ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="../php-kel1/produk.php">
                                <input type="submit" name="submit" value="Pilih Produk" class="btn btn-success btn-sm col-3">
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