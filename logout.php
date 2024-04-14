<?php
require_once 'dbconfig.php';

session_destroy();
header("Location: login.php");

?>