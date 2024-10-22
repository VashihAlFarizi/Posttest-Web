<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body class="light-mode">
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../index.php">DL</a>
            </div>
            <ul class="nav-links">
                <a href="../index.php">Home</a>
                <li><a href="../about.php">About Me</a></li>
            </ul>
            <div class="nav-buttons">
                <button id="darkModeToggle" class="dark-mode-btn">Dark Mode</button>
            </div>
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <?php
    session_start();
    require "../CRUD/koneksi.php"; // Path ke file koneksi.php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        // Query untuk mendapatkan data user berdasarkan username
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $user['role'];

                // Cek role
                if ($user['role'] === 'Admin') {
                    echo "<script>alert('Login berhasil! Selamat datang Admin.'); window.location.href = '../CRUD/admin.php';</script>";
                } else {
                    echo "<script>alert('Login berhasil!'); window.location.href = '../index.php';</script>";
                }
            } else {
                echo "<script>alert('Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!');</script>";
        }
    }
    ?>

    <div class="form-container" id="form-container">
        <h2>Form Login</h2>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
            <label>Tidak Punya Akun? <a href="registerasi.php">Sign up</a></label>
        </form>
    </div>
    <script src="../script.js"></script>
</body>
</html>