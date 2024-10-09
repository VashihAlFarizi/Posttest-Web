<?php
require "koneksi.php";

if (isset($_POST['tambah'])) {
    // Mengambil data dari form dan menggunakan htmlspecialchars untuk keamanan
    $nama_mod = htmlspecialchars($_POST['nama_mod']);
    $versi_mod = htmlspecialchars($_POST['versi_mod']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    $link_download = htmlspecialchars($_POST['link_download']);

    // Memasukkan data ke database tanpa gambar
    $sql = "INSERT INTO mods (nama_mod, versi_mod, kategori, deskripsi, link_download) 
            VALUES ('$nama_mod', '$versi_mod', '$kategori', '$deskripsi', '$link_download')";

    $result = mysqli_query($conn, $sql);

    // Cek apakah query berhasil
    if ($result) {
        echo "
        <script>
            alert('Mod berhasil ditambahkan!');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal menambah mod!');
            document.location.href = 'tambah.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mod Minecraft</title>
    <link rel="stylesheet" href="style_crud.css">
</head>
<body>

<main class="data-mod-section">
    <h1 class="data-mod-title">Tambah Mod Minecraft</h1>

    <div class="container">
        <a href="admin.php">
            <button class="back">Back</button>
        </a>
    </div>

    <div class="form-mod">
        <form action="" method="post">
            <div class="input-field">
                <label class="label-field" for="nama_mod">Nama Mod</label>
                <input type="text" name="nama_mod" id="nama_mod" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="versi_mod">Versi Mod</label>
                <input type="text" name="versi_mod" id="versi_mod" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" required></textarea>
            </div>
            <div class="input-field">
                <label class="label-field" for="link_download">Link Download</label>
                <input type="text" name="link_download" id="link_download" required>
            </div>
            <input class="button" type="submit" value="Tambah" name="tambah">
        </form>
    </div>

</main>

<script src="/scripts/script.js"></script>
</body>
</html>