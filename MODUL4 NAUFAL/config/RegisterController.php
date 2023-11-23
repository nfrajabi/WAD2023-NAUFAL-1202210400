<?php
require 'connect.php';
session_start();
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$query1 = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($db, $query1);
if (mysqli_num_rows($result) == 0) {
    $query2 = "INSERT INTO users (email, name, username, password) VALUES ('$email','$name', '$username', '$password')";
    $insert = mysqli_query($db, $query2);
    if ($insert) {
        $_SESSION['message'] = 'Pendaftaran sukses, silakan login';
        $_SESSION['color'] = 'success';
        header('Location: ../views/login.php');
    }else {
        $_SESSION['message'] = 'Pendaftaran gagal';
    }
}
else {
    $_SESSION['message'] = 'Email sudah terdaftar';
    header('Location: ../views/register.php');
}
?>