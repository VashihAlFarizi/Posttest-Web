<?php
require 'koneksi.php';

$id_mod = $_GET['id'];
$sql = "DELETE FROM mods WHERE id_mod='$id_mod'";

if(mysqli_query($conn, $sql)){
    echo "<script>alert('Mod berhasil dihapus');window.location='admin.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus mod');window.location='admin.php';</script>";
}
?>