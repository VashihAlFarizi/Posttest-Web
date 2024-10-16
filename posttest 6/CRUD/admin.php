<?php
require 'koneksi.php';

$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$sql = "SELECT * FROM mods WHERE nama_mod LIKE '%$search%' OR versi_mod LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mods</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid green;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: green;
            color: white;
        }
        .search-bar {
            margin: 20px auto;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-bar input {
            width: 80%;
            padding: 10px;
            border: 2px solid green;
            border-radius: 20px 0 0 20px;
        }
        .search-bar button {
            padding: 10px;
            border: none;
            background-color: green;
            color: white;
            border-radius: 0 20px 20px 0;
        }
        .button-container {
            margin: 20px;
        }
        .button-container a {
            text-decoration: none;
            padding: 10px 20px;
            color: white;
            background-color: green;
            border-radius: 5px;
        }
        .button-container a.back-btn {
            background-color: lightblue;
        }
    </style>
</head>
<body>

    <h1>Data Mods</h1>

    <form method="POST" class="search-bar">
        <input type="text" name="search" placeholder="Cari nama atau versi mod di sini" value="<?php echo $search; ?>">
        <button type="submit">Cari</button>
    </form>

    <div class="button-container">
        <a href="tambah.php">Tambah</a>
        <a href="../index.html" class="back-btn">Back</a>
    </div>


    <table>
        <tr>
            <th>No</th>
            <th>Nama Mod</th>
            <th>Versi</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Link Download</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php 
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { 
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama_mod']; ?></td>
            <td><?php echo $row['versi_mod']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><a href="<?php echo $row['link_download']; ?>" target="_blank">Download</a></td>
            <td><img src="../ikon/<?php echo $row['foto_mod']; ?>" width="100" alt="Foto Mod"></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id_mod']; ?>">Edit</a> | 
                <a href="delete.php?id=<?php echo $row['id_mod']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
            </td>
        </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='8'>Tidak ada data mod yang ditemukan</td></tr>";
        }
        ?>
    </table>

</body>
</html>