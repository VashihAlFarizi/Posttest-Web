<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
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
    require "../CRUD/koneksi.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $birthdate = htmlspecialchars($_POST['birthdate']);
        $role = htmlspecialchars($_POST['role']);

        $checkQuery = "SELECT * FROM users WHERE username = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Username sudah digunakan!');</script>";
        } else {
            $query = "INSERT INTO users (username, password, role, tanggal_lahir) 
                      VALUES ('$username', '$password', '$role', '$birthdate')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registrasi berhasil!'); window.location.href = 'login.php';</script>";
            } else {
                echo "<script>alert('Registrasi gagal!');</script>";
            }
        }
    }
    ?>

    <div class="form-container" id="form-container">
        <h2>Form Registrasi</h2>
        <form method="POST" action="registerasi.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="birthdate">Tanggal Lahir:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <br><br>
            <input type="submit" value="Sign up">
        </form>
    </div>
    <script src="../script.js"></script>
</body>
</html>