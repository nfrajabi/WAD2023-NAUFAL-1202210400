<?php 
setcookie('id', $data['id'], time() + 3600, '/WAD2023-NAUFAL-1202210400/MODUL4%20NAUFAL/views');
session_start();
session_destroy();
header('Location: ../views/login.php');
exit;

?>