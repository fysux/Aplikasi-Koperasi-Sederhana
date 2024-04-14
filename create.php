<?php
require 'dbconfig.php';

if (isset($_POST['create'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $status = $_POST['status'];

    // Tentukan nilai untuk jmlh_pinjam atau jmlh_tabung sesuai dengan status yang dipilih
    $jmlh_pinjam = null;
    $jmlh_tabung = null;
    if ($status == 'pinjam') {
        $jmlh_pinjam = $_POST['jmlh_pinjam'];
    } else if ($status == 'tabung') {
        $jmlh_tabung = $_POST['jmlh_tabung'];
    }

    // Gunakan satu query untuk menangani kedua status
    $query = "INSERT INTO member (nama, nik, alamat, jmlh_pinjam, jmlh_tabung, tgl_mulai, tgl_akhir, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama, $nik, $alamat, $jmlh_pinjam, $jmlh_tabung, $tgl_mulai, $tgl_akhir, $status]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-5 ">
        <form action="create.php" method="POST">
            <div class="row mb-3 d-flex justify-content-center">
                <input type="text" name="nama" placeholder="Nama" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <input type="text" name="nik" placeholder="NIK" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <input type="text" name="alamat" placeholder="Alamat" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <input type="number" name="jmlh_pinjam" placeholder="Jumlah Pinjam" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <input type="number" name="jmlh_tabung" placeholder="Jumlah Tabung" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <input type="date" name="tgl_mulai" placeholder="Mulai" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <input type="date" name="tgl_akhir" placeholder="Tenggat" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="pinjam">Anggota Peminjam</option>
                    <option value="tabung">Anggota Tabungan</option>
                </select>
            </div>
            <input type="submit" name="create" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
