<?php
$host           = "localhost";
$user           = "root";
$pwd            = "";
$dbase          = "bioskop";
$koneksi        = mysqli_connect($host, $user, $pwd, $dbase);
$no_teater      = "";
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <title>Teater - Bioskop Cinema</title>
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
            top: 590px;
        }

        .card-title {
            font-size: 14px;
            margin: 15px 0 15px 0;
        }

        .col-form-label {
            font-size: 16px;
            letter-spacing: 1px;
        }

        .btn-secondary {
            font-size: 12px;
        }

        .table {
            letter-spacing: 1px;
            font-size: 15px;
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
            <a class="nav-link bg-white text-dark">Teater</a>
            <a class="nav-link">Jadwal</a>
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
                        <th scope="col">Nomor Teater</th>
                        <th scope="col">Nama Teater</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // Menampilkan data dari Tb_Teater
                    $sql2   = "select * from tb_teater order by no_teater";
                    $urut   = 1;
                    $q2     = mysqli_query($koneksi, $sql2);
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $id_teater          = $r2['id_teater'];
                        $no_teater          = $r2['no_teater'];
                        $nama_teater        = $r2['nama_teater'];
                    ?>
                        <tr>
                            <td scope="row" class="align-middle text-center"><?php echo $urut++ ?></td>
                            <td scope="row" class="align-middle"><?php echo $no_teater ?></td>
                            <td scope="row" class="align-middle"><?php echo $nama_teater ?></td>
                            <td class="text-center">
                                <a href="4-jadwal.php?op=pilih&judul_film=<?php echo $judul_film ?>&nama_teater=<?php echo $nama_teater ?>">
                                    <button type="button" class="btn btn-secondary col-md-10 btn-sm">PILIH TEATER</button>
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