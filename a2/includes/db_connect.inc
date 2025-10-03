<?php
// a2/includes/db_connect.inc
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'skillswap';

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn === false) {
    die('DB connect failed (' . mysqli_connect_errno() . '): ' . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8mb4');
