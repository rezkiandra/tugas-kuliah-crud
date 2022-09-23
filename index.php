<?php
$host          = "localhost";
$user          = "root";
$pass          = "";
$dbase         = "dbMahasiswa";

$koneksi    = mysqli_connect($host, $user, $pass, $dbase);
if (!$koneksi) {
    // die("Tidak bisa terkoneksi ke database");
} else {
    // echo "Koneksi berhasil"
}
$nim         = "";
$nama        = "";
$alamat      = "";
$prodi       = "";
$success     = "";
$failed      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id         = $_GET['id'];
    $sql1       = "delete from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $success = "Berhasil menghapus data";
    } else {
        $failed  = "Gagal menghapus data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from mahasiswa where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nim        = $r1['nim'];
    $nama       = $r1['nama'];
    $alamat     = $r1['alamat'];
    $prodi      = $r1['prodi'];
}
if (isset($_POST['submit'])) { //untuk create data
    $nim        = $_POST['nim'];
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $prodi      = $_POST['prodi'];

    if ($nim && $nama && $alamat && $prodi) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update mahasiswa set NIM : '$nim', Nama : '$nama', Alamat : '$alamat', Prodi : '$prodi' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success = "Data berhasil diupdate";
            } else {
                $failed  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into mahasiswa(NIM, Nama, Alamat, Prodi) values ('$nim','$nama','$alamat','$prodi')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $success     = "Berhasil memasukkan data baru";
            } else {
                $failed      = "Gagal memasukkan data baru";
            }
        }
    } else {
        $failed = "Silakan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../php-crud/style.css">
</head>

<body>
    <!-- untuk memasukkan data -->
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">Create / Edit Data Mahasiswa</div>
            <div class="card-body">
                <?php
                if ($failed) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $failed ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php"); // waktu 5 detik
                }
                ?>
                <?php
                if ($success) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" value="<?php echo $nim ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="prodi" id="prodi">
                                <option value="">- Pilih Program Studi -</option>
                                <option value="AKP" <?php if ($prodi == "AKP") echo "selected" ?>>Akuntansi Keuangan dan Perusahaan</option>
                                <option value="MIF" <?php if ($prodi == "MIF") echo "selected" ?>>Manajemen Informatika</option>
                                <option value="TMM" <?php if ($prodi == "TMM") echo "selected" ?>>Teknik Multimedia</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">Data Mahasiswa</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NIM</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">PRODI</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from mahasiswa order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nim        = $r2['nim'];
                            $nama       = $r2['nama'];
                            $alamat     = $r2['alamat'];
                            $prodi      = $r2['prodi'];
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nim ?></td>	
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $prodi ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>">
                                        <button type="button" class="btn btn-warning">Edit</button>
									</a>
                                    <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Apakah yakin mau delete data?')">
                                        <button type="button" class="btn btn-danger">Delete</button>
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
</body>

</html>