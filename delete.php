<?php
require_once 'dbconfig.php';
if(!isset($_GET['id'])) {
    header("Location: index.php");
}

$id = $_GET['id'];
$query = "DELETE FROM member WHERE id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
header("Location: index.php");
?>