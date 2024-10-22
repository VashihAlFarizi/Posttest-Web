<?php
require '../CRUD/koneksi.php';

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$sql = "SELECT * FROM users WHERE username LIKE '%$search%' OR role LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
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

    <h1>Data Users</h1>

    <form method="GET" class="search-bar">
        <input type="text" name="search" placeholder="Cari username atau role di sini" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Cari</button>
    </form>

    <div class="button-container">
        <a href="../CRUD/admin.php">Daftar Mod</a>
        <a href="../index.php" class="back-btn">Back</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Tanggal Lahir</th>
            <th>Role</th>
        </tr>
        <?php 
        if (mysqli_num_rows($result) > 0) {
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { 
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo htmlspecialchars($row['username']); ?></td>
            <td><?php echo htmlspecialchars($row['tanggal_lahir']); ?></td>
            <td><?php echo htmlspecialchars($row['role']); ?></td>

        </tr>
        <?php 
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data pengguna yang ditemukan</td></tr>";
        }
        ?>
    </table>

</body>
</html>