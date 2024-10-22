<?php
require 'koneksi.php';

$id_mod = $_GET['id'];
$sql = "SELECT * FROM mods WHERE id_mod='$id_mod'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $nama_mod = $_POST['nama_mod'];
    $versi_mod = $_POST['versi_mod'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $link_download = $_POST['link_download'];

    // Proses upload foto jika ada yang baru
    if ($_FILES['foto']['error'] === 0) {
        $timestamp = date("Y-m-d H.i.s");
        $fotoExtension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        
        if (!in_array($fotoExtension, $allowedExtensions)) {
            echo "<script>alert('Format gambar tidak valid! Hanya .jpg, .jpeg, .png yang diizinkan.');</script>";
            exit;
        }

        $newFotoName = $timestamp . "_foto." . $fotoExtension;
        $targetDir = "../ikon/";
        $targetFotoPath = $targetDir . $newFotoName;

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFotoPath)) {
            if ($row['foto_mod'] && file_exists("../uploads/" . $row['foto_mod'])) {
                unlink("../ikon/" . $row['foto_mod']);
            }

            $sql_update = "UPDATE mods SET nama_mod='$nama_mod', versi_mod='$versi_mod', kategori='$kategori', deskripsi='$deskripsi', link_download='$link_download', foto_mod='$newFotoName' 
                           WHERE id_mod='$id_mod'";
        } else {
            echo "<script>alert('Gagal mengupload foto!');</script>";
            exit;
        }
    } else {
        $sql_update = "UPDATE mods SET nama_mod='$nama_mod', versi_mod='$versi_mod', kategori='$kategori', deskripsi='$deskripsi', link_download='$link_download' 
                       WHERE id_mod='$id_mod'";
    }

    if(mysqli_query($conn, $sql_update)){
        echo "<script>alert('Mod berhasil diupdate');window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate mod');window.location='edit.php?id=$id_mod';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mod Minecraft</title>
    <link rel="stylesheet" href="style_crud.css">
</head>
<body>

<main class="data-mod-section">
    <h1 class="data-mod-title">Edit Mod Minecraft</h1>

    <div class="container">
        <a href="admin.php">
            <button class="back">Back</button>
        </a>
    </div>

    <div class="form-mod">
        <form method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <label class="label-field" for="nama_mod">Nama Mod</label>
                <input type="text" name="nama_mod" id="nama_mod" value="<?php echo $row['nama_mod']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="versi_mod">Versi Mod</label>
                <input type="text" name="versi_mod" id="versi_mod" value="<?php echo $row['versi_mod']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="kategori">Kategori</label>
                <input type="text" name="kategori" id="kategori" value="<?php echo $row['kategori']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
            </div>
            <div class="input-field">
                <label class="label-field" for="link_download">Link Download</label>
                <input type="text" name="link_download" id="link_download" value="<?php echo $row['link_download']; ?>" required>
            </div>
            <div class="input-field">
                <label class="label-field" for="foto">Ganti Foto (Opsional)</label>
                <input type="file" name="foto" id="foto">
            </div>
            <img src="../ikon/<?php echo $row['foto_mod']; ?>" width="200" alt="Foto Mod">
            <input class="button" type="submit" value="Update Mod" name="update">
        </form>
    </div>

</main>

<script src="/scripts/script.js"></script>
</body>
</html>