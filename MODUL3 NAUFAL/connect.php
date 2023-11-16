<?php
$servername = "localhost:3308";
$user = "root";
$password = "";
$database = "modul3_wad";


$conn = new mysqli($servername, $user, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  echo "Connected successfully";}
?>