<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();
include('config/database.php');
$pdo = connectDB();
$stmt = $pdo->query("SELECT username, comment, created_at FROM comments ORDER BY created_at DESC, id DESC LIMIT 3");
$latest_comments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychologie barev</title>
    <link rel="stylesheet" href="style.css">
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
                        <a href="/Projekt/WA-2025-Ngo-Nam-Khanh/public/logout.php" id="logout-btn" class="btn">Odhlásit se</a>
                    <?php else: ?>
                        <span class="login-status logged-out">Nepřihlášen</span>
                        <a href="/Projekt/WA-2025-Ngo-Nam-Khanh/public/login.php" id="auth-btn" class="btn">Přihlášení</a>
                    <?php endif; ?>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#introduction" class="nav-link">Úvod</a></li>
                    <li><a href="#meanings" class="nav-link">Barvy</a></li>
                    <li><a href="/Projekt/WA-2025-Ngo-Nam-Khanh/comments.php">Komentáře</a></li>
                    <li><a href="/Projekt/WA-2025-Ngo-Nam-Khanh/colormixer.php">Míchačka barev</a></li>
                    <li><a href="/Projekt/WA-2025-Ngo-Nam-Khanh/savedcolors.php">Uložené Barvy</a></li>
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
                </div>
                
                <div id="color-detail-container" class="color-detail-hidden">
                    <button id="back-to-colors">← Zpět na barvy</button>
                    <div id="color-detail-content">
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


            <section id="comments">
                <h2>
                    Komentáře 
                </h2>
                <div class="latest-comments">
                    <?php if ($latest_comments): ?>
                        <?php foreach ($latest_comments as $comm): ?>
                            <div class="comment">
                                <div class="meta">
                                    <strong><?= htmlspecialchars($comm['username'] ?? 'Anonym') ?></strong>
                                    &middot;
                                    <?= htmlspecialchars($comm['created_at']) ?>
                                </div>
                                <div>
                                    <?= nl2br(htmlspecialchars($comm['comment'])) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Žádné komentáře zatím nejsou.</p>
                    <?php endif; ?>
                </div>

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