<?php

require 'connect.php';

function login($input) {

    global $db;
        $email = $input['email'];
        $password = $input['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        if(password_verify($password, $data['password'])) {

            $_SESSION['login'] = true ;
            $_SESSION['id'] = $data['id']; 
            if(isset($input['remember'])) {
                setcookie('id', $data['id'], time() + 3600);
            }
        }
        else {
            $_SESSION['message'] = 'Password salah!';
            $_SESSION['color'] = 'danger';
        }
        }
    else {
        $_SESSION['message'] = 'Email tidak ditemukan!';
        $_SESSION['color'] = 'danger';
    }
}
function rememberMe($cookie)
{
    global $db;
    $id = $cookie['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
        $_SESSION['login'] = true;
        $_SESSION['email'] = $data['email'];
        }
}
?>