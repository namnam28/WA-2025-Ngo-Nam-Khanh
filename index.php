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
            <img src="..\assets\Návrh bez názvu.png" alt="Logo" class="site-logo">
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
                    <p>Barvy nejsou jen pasivním vizuálním vjemem – představují komplexní komunikační systém, který hluboce ovlivňuje naši psychiku, fyziologii i společenské interakce. Psychologie barev, jakožto interdisciplinární vědní obor, propojuje poznatky z neurověd, antropologie, marketingu a výtvarného umění, aby odhalila fascinující mechanismy, jakými barevné podněty formují naše vnímání světa. Věděli jste, že lidské oko dokáže rozlišit až 10 milionů barevných odstínů? Každý z těchto odstínů přitom v našem mozku spouští jedinečnou kaskádu biochemických reakcí. Například pouhé vystavení se červenému světlu může zvýšit krevní tlak o 5-10 %, zatímco modré světlo reguluje produkci melatoninu a ovlivňuje tak kvalitu spánku. Tato fyziologická reakce má své kořeny v evoluci – naši předkové se naučili číst barevné signály v přírodě jako varování, příležitost nebo zdroj potravy. Moderní výzkumy dokazují, že vliv barev přesahuje čistě biologickou rovinu. Barvy se staly mocným nódem v mezilidské komunikaci, marketingu a dokonce i v politice.</p>
                    <br>
                    <p>Například:</p>
                    <br>
                    <p>• V obchodním prostředí může správná volba barev zvýšit rozpoznatelnost značky až o 80 %</p>
                    <p>• Vzdělávací prostory s optimální barevnou kombinací zlepšují schopnost učení až o 25 %</p>
                    <p>• Nemocniční pokoje s uklidňující barevnou paletou urychlují rekonvalescenci pacientů</p>
                    <br>
                    <p>Psychologie barev dnes nachází uplatnění v desítkách profesních odvětví – od neurodesignu přes behaviorální marketing až po arteterapii. Její principy využívají architekti při navrhování veřejných prostor, vývojáři při tvorbě uživatelských rozhraní, ale i političtí stratégové při vytváření vizuální identity kampaní. Tento vědní obor nám pomáhá pochopit, proč některé barevné kombinace vyvolávají okamžitou důvěru, zatímco jiné podvědomě odpuzují. Proč se kultura po celém světě shoduje na červené jako barvě nebezpečí, ale vnímání růžové se napříč společnostmi radikálně liší. A především – jak můžeme tyto poznatky využít k vytváření harmonického prostředí, efektivní komunikaci a zlepšení kvality života.</p>
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
            &copy; 2025 Psychologie barev. Všechna práva vyhrazena.
        </footer>
    </div>

    <script>
    window.USER_LOGGED_IN = <?php echo (isset($_SESSION['user_id']) ? 'true' : 'false'); ?>;
    </script>
    <script src="main.js"></script>
</body>
</html>