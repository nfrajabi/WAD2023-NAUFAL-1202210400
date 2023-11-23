<?php 
$db = mysqli_connect('localhost:3308', 'root', '', 'modul4_wad');

if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>