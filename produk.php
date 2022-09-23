<?php
$host       = "localhost";
$user       = "root";
$pwd        = "";
$dbase      = "apotek";
$koneksi    = mysqli_connect($host, $user, $pwd, $dbase);

$id_obat        = "";
$kode_obat      = "";
$nama_obat      = "";
$jenis_obat     = "";
$stok           = "";
$harga          = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Apotek Sahabat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../php-kel1/css/produk.css"> -->
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
            width: 75%;
            display: flex;
            left: 13%;
            top: 5%;
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
                        <a class="nav-link active bg-primary" aria-current="page" href="../php-kel1/produk.php">Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php-kel1/proses.php">Proses</a>
                    </li>
                </ul>
            </h5>
            <div class="card-body">
                <table class="table table-hover table-responsive align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kode Obat</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jenis Obat</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga Obat</th>
                            <th scope="col" class="text-center" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php // Menampilkan data dari Tb_Obat
                        $sql2   = "select * from obat order by nama_obat";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $kode_obat        = $r2['kode_obat'];
                            $nama_obat        = $r2['nama_obat'];
                            $jenis_obat       = $r2['jenis_obat'];
                            $stok             = $r2['stok'];
                            $harga            = $r2['harga'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $kode_obat ?></td>
                                <td scope="row"><?php echo $nama_obat ?></td>
                                <td scope="row"><?php echo $jenis_obat ?></td>
                                <td scope="row"><?php echo $stok ?></td>
                                <td scope="row"><?php echo $harga ?></td>
                                <td class="text-center">
                                    <a href="transaksi.php?op=beli&kode_obat=<?php echo $kode_obat ?>">
                                        <button type="button" class="btn btn-success col-md-12 btn-sm">Beli</button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../php-kel1/js/app.js"></script>
</body>

</html>