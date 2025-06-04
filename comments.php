<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();

include('config/database.php');
$pdo = connectDB();

// Zpracování nových komentářů (pouze pro přihlášené uživatele)
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        $error = "Pro přidání komentáře se musíte přihlásit.";
    } else {
        $username = $_SESSION['username'];
        $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

        if ($comment !== '') {
            $stmt = $pdo->prepare("INSERT INTO comments (username, comment, created_at) VALUES (?, ?, NOW())");
            $stmt->execute([$username, $comment]);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "Komentář nesmí být prázdný.";
        }
    }
}

// Načíst komentáře
$stmt = $pdo->query("SELECT * FROM comments ORDER BY created_at DESC, id DESC");
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Komentáře</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2em; background: #f9f9f9;}
        h2 { color: #333; }
        .comment-list { margin-bottom: 2em; }
        .comment { background: #fff; border-radius: 6px; box-shadow: 0 1px 3px #ccc; padding: 1em; margin-bottom: 1em; }
        .comment .meta { color: #888; font-size: 0.9em; margin-bottom: 0.3em; }
        form { background: #fff; padding: 1em; border-radius: 6px; box-shadow: 0 1px 3px #ccc; }
        textarea { width: 100%; box-sizing: border-box; }
        .error { color: #c00; margin-bottom: 1em; }
        .login-link { color: #2963a5; text-decoration: underline; }
        button { margin-top: 0.5em; padding: 0.4em 1.2em; background: #2963a5; color: #fff; border: none; border-radius: 4px; }
        button:hover { background: #19436d; }
    </style>
</head>
<body>
    <h2>Komentáře</h2>
    <h3></h3>

    <div class="comment-list">
        <?php if ($comments): ?>
            <?php foreach ($comments as $c): ?>
                <div class="comment">
                    <div class="meta">
                        <strong><?= htmlspecialchars($c['username'] ?? 'Anonym') ?></strong>
                        &middot;
                        <?= htmlspecialchars($c['created_at'] ?? '') ?>
                    </div>
                    <div>
                        <?= nl2br(htmlspecialchars($c['comment'])) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Žádné komentáře zatím nejsou.</p>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
        <form method="post">
            <?php if ($error): ?>
                <div class="error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <label>
                Uživatelské jméno: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
            </label>
            <br>
            <label>
                Komentář:<br>
                <textarea name="comment" rows="4" required maxlength="1000" placeholder="Napište svůj komentář..."></textarea>
            </label>
            <br>
            <button type="submit">Přidat komentář</button>
        </form>
    <?php else: ?>
        <p style="color: #c00; font-weight: bold;">Pro přidání komentáře se prosím <a class="login-link" href="/Projekt/WA-2025-Ngo-Nam-Khanh/public/login.php">přihlaste</a>. Jako host si můžete komentáře pouze přečíst.</p>
    <?php endif; ?>
</body>
</html>