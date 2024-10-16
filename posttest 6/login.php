<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link rel="stylesheet" href="style.css">
<body class="light-mode">
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index.html">DL</a>
            </div>
            <ul class="nav-links">
                <a href="index.html">Home</a>
                <li><a href="about.html">About Me</a></li>
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
</body>

</head>
<body>
    <?php
    $isSubmitted = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isSubmitted = true;

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $birthdate = htmlspecialchars($_POST['birthdate']);
        $phone = htmlspecialchars($_POST['phone']);

        echo "<div class='result'>";
        echo "<h3>Data yang Dimasukkan:</h3>";
        echo "<table>";
        echo "<tr><th>Field</th><th>Value</th></tr>";
        echo "<tr><td>Username</td><td>$username</td></tr>";
        echo "<tr><td>Password</td><td>$password</td></tr>";
        echo "<tr><td>Tanggal Lahir</td><td>$birthdate</td></tr>";
        echo "<tr><td>Nomor Telepon</td><td>$phone</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>

    <?php if (!$isSubmitted): ?>
    <div class="form-container" id="form-container">
        <h2>Form Registrasi</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="birthdate">Tanggal Lahir:</label>
            <input type="date" id="birthdate" name="birthdate" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="number" id="phone" name="phone" required>

            <input type="submit" value="login">
        </form>
    </div>
    <?php endif; ?>
    <script src="script.js"></script>
</body>
</html>
