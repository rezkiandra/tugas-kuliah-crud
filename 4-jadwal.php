<?php
$host           = "localhost";
$user           = "root";
$pwd            = "";
$dbase          = "bioskop";
$koneksi        = mysqli_connect($host, $user, $pwd, $dbase);

$hari           = "";
$jam            = "";
$harga          = "";
$judul_film     = "";
$nama_teater    = "";

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <title>Jadwal - Bioskop Cinema</title>
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
            width: 55%;
            left: 22.5%;
            top: 550px;
        }

        .card-title {
            font-size: 14px;
            margin: 15px 0 15px 0;
        }

        .btn-secondary {
            font-size: 13px;
        }

        .col-form-label {
            font-size: 14px;
            letter-spacing: 1px;
        }

        .table {
            letter-spacing: 1px;
            font-size: 16px;
        }

        .nav-link:hover {
            color: #fff;
            cursor: default;
        }

        #particles-js {
            position: relative;
            top: -450px;
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
            <a class="nav-link bg-white text-dark">Jadwal</a>
            <a class="nav-link">Kursi</a>
            <a class="nav-link">Transaksi</a>
        </nav>
    </div>
    <div id="particles-js">
        <div class="card">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Harga (Rp.)</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // Menampilkan data dari Tb_Jadwal
                    $sql2   = "select * from tb_jadwal order by id_jadwal";
                    $q2     = mysqli_query($koneksi, $sql2);
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id_jadwal      = $r2['id_jadwal'];
                        $hari           = $r2['hari'];
                        $jam            = $r2['jam'];
                        $harga          = $r2['harga'];
                        $kelas          = $r2['kelas'];
                    ?>
                        <tr>
                            <td scope="row" class="align-middle text-center"><?php echo $id_jadwal ?></td>
                            <td scope="row" class="align-middle"><?php echo $hari ?></td>
                            <td scope="row" class="align-middle"><?php echo $jam ?></td>
                            <td scope="row" class="align-middle"><?php echo $kelas ?></td>
                            <td scope="row" class="align-middle"><?php echo $harga ?></td>
                            <td class="text-center">
                                <a href="5-kursi.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>&hari=<?php echo $hari ?>">
                                    <button type="button" class="btn btn-secondary col-md-10 btn-sm">PILIH JADWAL</button>
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
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../sbd/js/app.js"></script>
</body>

</html>