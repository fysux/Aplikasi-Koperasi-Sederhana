<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbname = 'esra';
$dbpass = '';

$pdo = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8', $dbuser, $dbpass);
?>