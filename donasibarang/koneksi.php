<?php

$host = "localhost:3308";
$user = "root";
$password = "";
$db = "donasibarang";

$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Koneksi Gagal:" . mysqli_connect_error());
}
?>
