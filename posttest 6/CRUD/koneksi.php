<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbmodminecraft"; // Ganti dengan nama database yang kamu gunakan

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Gagal terhubunh ke database: " . mysqli_connect_error());
}
?>