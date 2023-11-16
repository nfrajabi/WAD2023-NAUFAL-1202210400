<?php
include("connect.php");
    $nama_mobil = $_POST["nama_mobil"];
    $brand_mobil = $_POST["brand_mobil"];
    $warna_mobil = $_POST["warna_mobil"];
    $tipe_mobil = $_POST["tipe_mobil"];
    $harga_mobil = $_POST["harga_mobil"];

    $input = "INSERT into showroom_mobil (nama_mobil,brand_mobil,warna_mobil,tipe_mobil,harga_mobil)
                 VALUES ('$nama_mobil','$brand_mobil','$warna_mobil','$tipe_mobil','$harga_mobil')";
    
    mysqli_query($conn, $input);
    if($conn->query($input)===TRUE){
        echo "<script>
        alert('Data telah ditambahkan');
        document.location.href=list_mobil.php;
        </script>";    
    }else{
        echo "<script>
        alert('Error:');
        document.location.href=list_mobil.php;
        </script>";
    

    $conn->close();
    }
?>

