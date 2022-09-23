<?php
$host       = "localhost";
$user       = "root";
$pwd        = "";
$dbase      = "apotek";
$koneksi    = mysqli_connect($host, $user, $pwd, $dbase);

if (isset($_POST['keluar'])) { // Untuk Create Data
    $no_transaksi = $_POST['no_transaksi'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $kode_obat = $_POST['kode_obat'];
    $nama_obat = $_POST['nama_obat'];
    $metode_transaksi = $_POST['metode_transaksi'];
    $tgl_transaksi = $_POST['tgl_transaksi'];

    if ($no_transaksi && $nama_pelanggan && $kode_obat && $nama_obat && $metode_transaksi && $tgl_transaksi) { // Untuk Insert Data ke Tb_Pembelian
        $sql1 = "insert into pembelian(no_transaksi, nama_pelanggan, kode_obat, nama_obat, metode_transaksi, tgl_transaksi) values ('$no_transaksi','$nama_pelanggan','$kode_obat','$nama_obat', '$metode_transaksi', $tgl_transaksi')";
        $q1 = mysqli_query($koneksi, $sql1);
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
            width: 81%;
            display: flex;
            left: 10%;
            top: 16%;
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
                        <a class="nav-link" href="../php-kel1/transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active bg-primary" aria-current="page" " href=" ../php-kel1/proses.php">Proses</a>
                    </li>
                </ul>
            </h5>
            <div class="card-body">
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nomor Transaksi</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Kode Obat</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Metode Transaksi</th>
                            <th scope="col">Tanggal Pembelian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from obat"; // Tabel obat
                        $q2     = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $nama_obat        = $r2['nama_obat'];
                        ?>
                        <?php
                        }
                        ?>
                        <?php
                        $sql2   = "select * from nomor"; // Tabel nomor
                        $q2     = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $no_transaksi        = $r2['no_transaksi'];
                        ?>
                        <?php
                        }
                        ?>
                        <?php
                        $sql2   = "select * from transaksi"; // Tabel transaksi
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_transaksi        = $r2['id_transaksi'];
                            $nama_pelanggan      = $r2['nama_pelanggan'];
                            $kode_obat           = $r2['kode_obat'];
                            $metode_transaksi    = $r2['metode_transaksi'];
                            $tgl_transaksi       = $r2['tgl_transaksi'];
                        ?>
                            <tr>
                                <form action="" method="POST">
                                    <td scope="col" class="col-md-1">
                                        <input type="text" class="form-control-plaintext" name="id_transaksi" value="<?php echo $urut++ ?>">
                                    </td>
                                    <td scope="col">
                                        <input type="text" class="form-control-plaintext" name="no_transaksi" value="<?php echo $no_transaksi++ ?>">
                                    </td>
                                    <td scope="col">
                                        <input type="text" class="form-control-plaintext" name="nama_pelanggan" value="<?php echo $nama_pelanggan ?>">
                                    </td>
                                    <td scope="col">
                                        <input type="text" class="form-control-plaintext" name="kode_obat" value="<?php echo $kode_obat ?>">
                                    </td>
                                    <td scope="col">
                                        <input type="text" class="form-control-plaintext" name="nama_obat" value="<?php echo $nama_obat ?>">
                                    </td>
                                    <td scope="col" class="col-md-3">
                                        <input type="text" class="form-control-plaintext" name="metode_transaksi" value="<?php echo $metode_transaksi ?>">
                                    </td>
                                    <td scope="col" class="col-md-2">
                                        <input type="text" class="form-control-plaintext" name="tgl_transaksi" value="<?php echo $tgl_transaksi ?>">
                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="col-md-12">
                    <a href="../php-kel1/produk.php">
                        <input type="submit" name="beli" value="<-- Beli lagi" class="btn btn-success btn-sm col-2">
                    </a>
                    <a href="../php-kel1/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar halaman?')">
                        <input type="submit" name="keluar" value="Keluar halaman -->" class="btn btn-secondary btn-sm col-2 float-end">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../php-kel1/js/app.js"></script>
</body>

</html>