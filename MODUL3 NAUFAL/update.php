<?php
include("connect.php");
    $nama_mobil = $_POST["nama_mobil"];
    $brand_mobil = $_POST["brand_mobil"];
    $warna_mobil = $_POST["warna_mobil"];
    $tipe_mobil = $_POST["tipe_mobil"];
    $harga_mobil = $_POST["harga_mobil"];
    mysqli_query($connect, "UPDATE showroom_mobil set nama_mobil='$nama_mobil', brand_mobil='$brand_mobil', warna_mobil='$warna_mobil', tipe_mobil='$tipe_mobil', harga_mobil='$harga_mobil'");
    header("Location:list_mobil.php");
?>