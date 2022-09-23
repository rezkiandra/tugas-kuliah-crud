<?php
$host           = "localhost";
$user           = "root";
$pwd            = "";
$dbase          = "bioskop";
$koneksi        = mysqli_connect($host, $user, $pwd, $dbase);

$username           = "";
$password           = "";
$success            = "";
$failed             = "";

if (isset($_POST['pilih'])) { // Untuk Create Data
    $username           = $_POST['username'];
    $password           = $_POST['password'];

    if ($username && $password) { // Untuk Insert Data ke Tb_Login
        $sql1   = "insert into tb_login(username, password) values ('$username', '$password')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $success     = "Berhasil login";
        } else {
            $failed      = "Gagal login";
        }
    } else {
        $failed         = "Silahkan login terlebih dahulu";
    }
}
if (isset($_POST['pilih'])) { // Untuk Create Data
    $username           = $_POST['username'];

    if ($username) { // Untuk Insert Data ke Tb_Pelanggan
        $sql1   = "insert into tb_pelanggan(username) values ('$username')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $success     = "Berhasil login";
        } else {
            $failed      = "Gagal login";
        }
    } else {
        $failed         = "Silahkan login terlebih dahulu";
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
    <title>Pelanggan - Bioskop Cinema</title>
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
            width: 30%;
            left: 35%;
            top: 440px;
        }

        .card-title {
            font-size: 15px;
            margin: 15px 0 15px 0;
            letter-spacing: 1px;
        }

        .col-form-label {
            font-size: 16px;
            letter-spacing: 1px;
        }

        .alert {
            font-size: 14px;
            top: -20px;
            letter-spacing: 1px;
            /* text-align: center; */
        }

        .nav-link:hover {
            color: #fff;
            cursor: default;
        }

        #particles-js {
            position: relative;
            top: -290px;
            z-index: 3;
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="card-header bg-dark">
        <nav class="nav nav-pills justify-content-around">
            <a class="nav-link bg-white text-dark">Pelanggan</a>
            <a class="nav-link">Film</a>
            <a class="nav-link">Teater</a>
            <a class="nav-link">Jadwal</a>
            <a class="nav-link">Kursi</a>
            <a class="nav-link">Transaksi</a>
        </nav>
    </div>
    <div id="particles-js">
        <div class="card">
            <div class="card-header text-center">Cinema XXI</div>
            <div class="card-title text-center">Masukkan Data Diri Anda</div>
            <div class="card-body">
                <?php
                if ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:2;url=1-pelanggan.php"); // waktu referesh 2 detik
                }
                ?>
                <?php
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php
                    header("refresh:2;url=2-film.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-4 offset-1 col-form-label">Username</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 offset-1 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-4 offset-1">
                            <a href="../sbd/2-film.php?op=pilih&username=<?php echo $username ?>">
                                <input type="submit" name="pilih" value="Login" class="form-control btn-sm btn-success">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
    <script src="../sbd/js/app.js"></script>
</body>

</html>