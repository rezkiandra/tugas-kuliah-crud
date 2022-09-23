<?php
$host           = "localhost";
$user           = "root";
$pwd            = "";
$dbase          = "bioskop";
$koneksi        = mysqli_connect($host, $user, $pwd, $dbase);

$judul_film     = "";
$genre          = "";
$produser       = "";
$rating         = "";
$durasi         = "";
$negara         = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <title>Film - Bioskop Cinema</title>
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
            width: 89%;
            left: 5.5%;
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
            font-size: 14px;
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
            <a class="nav-link bg-white text-dark">Film</a>
            <a class="nav-link">Teater</a>
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
                        <th scope="col" class="text-center">No.</th>
                        <th scope="col" class="text-center">Judul Film</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Produser</th>
                        <th scope="col"">Rating</th>
						<th scope=" col"">Durasi</th>
                        <th scope="col">Negara</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php // Menampilkan data dari Tb_Film
                    $sql2   = "select * from tb_film order by judul_film";
                    $q2     = mysqli_query($koneksi, $sql2);
                    $urut   = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $judul_film         = $r2['judul_film'];
                        $genre              = $r2['genre'];
                        $produser           = $r2['produser'];
                        $rating             = $r2['rating'];
                        $durasi             = $r2['durasi'];
                        $negara             = $r2['negara'];
                    ?>
                        <tr>
                            <td scope="row" class="align-middle text-center"><?php echo $urut++ ?></td>
                            <td scope="row" class="align-middle"><?php echo $judul_film ?></td>
                            <td scope="row" class="align-middle"><?php echo $genre ?></td>
                            <td scope="row" class="align-middle"><?php echo $produser ?></td>
                            <td scope="row" class="align-middle"><?php echo $rating ?></td>
                            <td scope="row" class="align-middle"><?php echo $durasi ?></td>
                            <td scope="row" class="align-middle"><?php echo $negara ?></td>
                            <td class="text-center">
                                <a href="3-teater.php?op=pilih&judul_film=<?php echo $judul_film ?>">
                                    <button type="button" name="pesan" class="btn btn-secondary col-md-12 btn-sm">PILIH FILM</button>
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