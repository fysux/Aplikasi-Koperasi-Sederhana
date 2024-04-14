<?php
require_once 'dbconfig.php';

$id = $_GET['id'];
$query = "SELECT * FROM member WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);
$row = $member;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 p-2 bg-light rounded shadow">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <td>NAMA</td>
                    <td>NIK</td>
                    <td>ALAMAT</td>
                    <td>JUMLAH SALDO</td>
                    <td>TANGGAL MULAI</td>
                    <td>TANGGAL AKHIR</td>
                    <td>KEANGGOTAAN</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nik']; ?></td>
                    <td><?= $row['alamat']; ?></td>
                    <td><?php if ($row['status'] == 'pinjam') { echo $row['jmlh_pinjam']; } else if ($row['status'] == 'tabung') { echo $row['jmlh_tabung']; } ?></td>
                    <td><?= $row['tgl_mulai']; ?></td>
                    <td><?= $row['tgl_akhir']; ?></td>
                    <td><?= $row['status']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container mt-3">
        <a href="index.php" class="btn btn-primary">KEMBALI</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
