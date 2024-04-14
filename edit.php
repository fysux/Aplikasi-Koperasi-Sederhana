<?php
include 'dbconfig.php';

if(!isset($_GET['id'])) {
    header("Location: index.php");
    exit(); // Keluar dari skrip setelah melakukan redirect
}

$id = $_GET['id'];
$query = "SELECT * FROM member WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);
$row = $member;

if(isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $status = $_POST['status'];

    // Tentukan nilai untuk $jmlh_pinjam atau $jmlh_tabung sesuai dengan status yang dipilih
    $jmlh_pinjam = null;
    $jmlh_tabung = null;
    if ($status == 'pinjam') {
        $jmlh_pinjam = $_POST['jmlh_pinjam'];
    } else if ($status == 'tabung') {
        $jmlh_tabung = $_POST['jmlh_tabung'];
    }

    // Gunakan satu query UPDATE untuk menangani kedua status
    $query = "UPDATE member SET nama = ?, nik = ?, alamat = ?, jmlh_pinjam = ?, jmlh_tabung = ?, tgl_mulai = ?, tgl_akhir = ?, status = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nama, $nik, $alamat, $jmlh_pinjam, $jmlh_tabung, $tgl_mulai, $tgl_akhir, $status, $id]);

    header("Location: index.php");
    exit(); // Keluar dari skrip setelah melakukan redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Edit Member</h1>
    <div class="container mt-5 mb-5 ">
        <form action="" method="POST">
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" value="<?php echo $row['nik']; ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Jumlah Pinjam</label>
                <input type="number" name="jmlh_pinjam" value="<?php if($row['status'] == 'pinjam') { echo $row['jmlh_pinjam']; } ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Jumlah Tabung</label>
                <input type="number" name="jmlh_tabung" value="<?php if($row['status'] == 'tabung') { echo $row['jmlh_tabung']; } ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Tgl Mulai</label>
                <input type="date" name="tgl_mulai" value="<?php echo $row['tgl_mulai']; ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Tgl Akhir</label>
                <input type="date" name="tgl_akhir" value="<?php echo $row['tgl_akhir']; ?>" class="form-control">
            </div>
            <div class="row mb-3 d-flex justify-content-center">
                <label class="form-label">Status</label>
                <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control">
            </div>
            <input type="submit" name="update" value="Update" class="btn btn-primary">
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
