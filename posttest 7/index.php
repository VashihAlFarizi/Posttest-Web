<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Penyedia Mod Minecraft</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="light-mode">
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="index.php">DL</a>
            </div>
            <ul class="nav-links">
                <a href="index.php">Home</a>
                <li><a href="about.php">About Me</a></li>
            </ul>
            <div class="nav-buttons">
                <button id="darkModeToggle" class="dark-mode-btn">Dark Mode</button>
                <button onclick="window.location.href='user/login.php';" class="login-btn">Login</button>
            </div>
            <div class="hamburger-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <main id="home">
        <section class="welcome-container">
            <h1>Welcome to Minecraft Mods</h1>
            <p>Temukan dan unduh mod terbaik untuk Minecraft di sini!</p>
        </section>
    </main>

    <section class="mod-list">
        <div class="mod-item">
            <img src="ikon/NewbX.png" alt="NewbX" class="mod-image">
            <div class="mod-info">
                <h3>NewbX</h3>
                <p class="mod-author">By Eagle1309</p>
                <p class="mod-description">Texture Pack </p>
                <div class="mod-details">
                    <span>Sep 22, 2024</span> |
                    <span>1.28 MB</span> |
                    <span>1.21.1</span>
                </div>
            </div> 
        </div>
    
        <div class="mod-item">
            <img src="ikon/Actions&Stuff.png" alt="Actions&Stuff" class="mod-image">
            <div class="mod-info">
                <h3>Actions & Stuff</h3>
                <p class="mod-author">By Elemebtal Ecko</p>
                <p class="mod-description">A 3D animation library for entities, blocks, items, armor, and more!</p>
                <div class="mod-details">
                    <span>Sep 16, 2024</span> |
                    <span>554.93 KB</span> |
                    <span>1.21.1</span>
                </div>
            </div>
        </div>
    
        <div class="mod-item">
            <img src="ikon/LivelyVillagers.png" alt="Lively Villagers" class="mod-image">
            <div class="mod-info">
                <h3>Lively Villagers</h3>
                <p class="mod-author">By ShowdownMan</p>
                <p class="mod-description">entities</p>
                <div class="mod-details">
                    <span>Aug 27, 2024</span> |
                    <span>700 KB</span> |
                    <span>1.21.1</span>
                </div>
            </div>
        </div>
    </section>    
    <script src="script.js"></script>
</body>
</html>
