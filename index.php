<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();
include('config/database.php');
$pdo = connectDB();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologie barev</title>
    <link rel="stylesheet" href="style.css">
    <style>
    .login-status {
        display: inline-block;
        padding: 0.4em 1em;
        border-radius: 16px;
        margin-left: 1em;
        font-weight: bold;
        font-size: 1em;
    }
    .logged-in {
        background: #e0ffe0;
        color: #1b791b;
        border: 1px solid #51d651;
    }
    .logged-out {
        background: #ffe0e0;
        color: #b21a1a;
        border: 1px solid #f08080;
    }
    </style>
</head>
<body>
    <div class="app-container">
        <header>
            <div class="header-content">
                <h1>Psychologie barev</h1>
                <div class="user-controls">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span id="user-greeting">Vítejte, <?= htmlspecialchars($_SESSION['username']) ?></span>
                        <span class="login-status logged-in">Přihlášen</span>
                        <a href="public/logout.php" id="logout-btn" class="btn">Odhlásit se</a>
                    <?php else: ?>
                        <span class="login-status logged-out">Nepřihlášen</span>
                        <a href="public/login.php" id="auth-btn" class="btn">Přihlášení</a>
                    <?php endif; ?>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#introduction" class="nav-link">Úvod</a></li>
                    <li><a href="#meanings" class="nav-link">Význam barev</a></li>
                    <li><a href="#combinations" class="nav-link">Kombinace</a></li>
                    <li><a href="#effects" class="nav-link">Efekty</a></li>
                    <li><a href="#interactive" class="nav-link">Vyzkoušejte barvy</a></li>
                    <li><a href="#comments" class="nav-link">Komentáře</a></li> 
                </ul>
            </nav>
        </header>

        <main>
            <section id="introduction" class="content-section active-section">
                <h2>Úvod do psychologie barev</h2>
                <p>Psychologie barev studuje, jak barvy ovlivňují naše vnímání a chování.</p>
            </section>

            <section id="meanings" class="content-section">
                <h2>Význam barev</h2>
                <div class="color-grid">
                    <!-- Color cards will be added by JavaScript -->
                </div>
                
                <div id="color-detail-container" class="color-detail-hidden">
                    <button id="back-to-colors">← Zpět na barvy</button>
                    <div id="color-detail-content">
                        <!-- Content will be inserted by JavaScript -->
                    </div>
                </div>
            </section>

            <section id="combinations" class="content-section">
                <h2>Kombinace barev</h2>
                <p>Obsah o kombinacích barev...</p>
            </section>

            <section id="effects" class="content-section">
                <h2>Psychologické efekty</h2>
                <p>Obsah o psychologických efektech barev...</p>
            </section>

            <section id="interactive" class="content-section">
                <h2>Vyzkoušejte barvy</h2>
                <div class="color-picker">
                    <input type="color" id="colorInput" value="#ff0000">
                    <button id="applyColor">Vybrat</button>
                    <div id="colorDisplay"></div>
                    <p id="colorDescription"></p>
                </div>
            </section>

            <section id="comments" class="content-section">
                <h2>Komentáře</h2>
                <div id="comments-list"></div>
                <form id="add-comment-form" autocomplete="off">
                    <textarea id="comment-text" rows="3" style="width:100%;" placeholder="Přidejte komentář..." required></textarea>
                    <button type="submit" style="margin-top:0.5rem;">Přidat komentář</button>
                </form>
            </section>
        </main>

        <footer>
            <p>Zdroje a reference...</p>
        </footer>
    </div>

    <script>
    window.USER_LOGGED_IN = <?php echo (isset($_SESSION['user_id']) ? 'true' : 'false'); ?>;
    </script>
    <script src="main.js"></script>
</body>
</html>