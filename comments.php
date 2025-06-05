<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();

include('config/database.php');
$pdo = connectDB();

$error = '';
$editComment = null;

// Handle delete action
if (isset($_GET['delete']) && isset($_SESSION['user_id'])) {
    $comment_id = (int)$_GET['delete'];
    // Only allow delete if the user is the owner
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
    $stmt->execute([$comment_id]);
    $comment = $stmt->fetch();
    if ($comment && $comment['username'] === $_SESSION['username']) {
        $pdo->prepare("DELETE FROM comments WHERE id = ?")->execute([$comment_id]);
        header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
        exit();
    } else {
        $error = "Nemáte oprávnění smazat tento komentář.";
    }
}

// Handle edit action: show form with the comment text
if (isset($_GET['edit']) && isset($_SESSION['user_id'])) {
    $comment_id = (int)$_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
    $stmt->execute([$comment_id]);
    $comment = $stmt->fetch();
    if ($comment && $comment['username'] === $_SESSION['username']) {
        $editComment = $comment;
    } else {
        $error = "Nemáte oprávnění upravit tento komentář.";
    }
}

// Handle update (edit submit)
if (isset($_POST['edit_id']) && isset($_SESSION['user_id'])) {
    $comment_id = (int)$_POST['edit_id'];
    $newComment = trim($_POST['comment']);
    $stmt = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
    $stmt->execute([$comment_id]);
    $comment = $stmt->fetch();
    if ($comment && $comment['username'] === $_SESSION['username']) {
        if ($newComment !== '') {
            $pdo->prepare("UPDATE comments SET comment = ? WHERE id = ?")->execute([$newComment, $comment_id]);
            header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
            exit();
        } else {
            $error = "Komentář nesmí být prázdný.";
            $editComment = $comment;
        }
    } else {
        $error = "Nemáte oprávnění upravit tento komentář.";
    }
}

// Handle new comment
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['edit_id'])) {
    if (!isset($_SESSION['user_id'])) {
        $error = "Pro přidání komentáře se musíte přihlásit.";
    } else {
        $username = $_SESSION['username'];
        $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';

        if ($comment !== '') {
            $stmt = $pdo->prepare("INSERT INTO comments (username, comment, created_at) VALUES (?, ?, NOW())");
            $stmt->execute([$username, $comment]);
            header("Location: " . strtok($_SERVER['REQUEST_URI'], '?'));
            exit();
        } else {
            $error = "Komentář nesmí být prázdný.";
        }
    }
}

// Load comments
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
        button, .edit-link, .delete-link { margin-top: 0.5em; padding: 0.4em 1.2em; background: #2963a5; color: #fff; border: none; border-radius: 4px; text-decoration: none; cursor: pointer; }
        button:hover, .edit-link:hover, .delete-link:hover { background: #19436d; }
        .edit-delete { margin-top: 0.5em; }
        .edit-link, .delete-link { display: inline-block; margin-right: 0.5em; font-size: 0.95em; }
        .delete-link { background: #c00; }
        .delete-link:hover { background: #800; }
    </style>
</head>
<body>
    <header>
    <img src="..\assets\Návrh bez názvu.png" alt="Logo" class="site-logo">
    <h2>Komentáře</h2>
    <h3>Líbila se vám tato stránka? Máte vlastní zkušenosti s barvami? Co byste změnili? Napište nám do komentářů!</h3>

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
                    <?php if (isset($_SESSION['user_id']) && $c['username'] === $_SESSION['username']): ?>
                        <div class="edit-delete">
                            <a href="?edit=<?= $c['id'] ?>" class="edit-link">Upravit</a>
                            <a href="?delete=<?= $c['id'] ?>" class="delete-link" onclick="return confirm('Opravdu chcete smazat tento komentář?')">Smazat</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Žádné komentáře zatím nejsou.</p>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
        <?php if ($editComment): ?>
            <form method="post">
                <?php if ($error): ?>
                    <div class="error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <input type="hidden" name="edit_id" value="<?= $editComment['id'] ?>">
                <label>
                    Uživatelské jméno: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
                </label>
                <br>
                <label>
                    Upravit komentář:<br>
                    <textarea name="comment" rows="4" required maxlength="1000"><?= htmlspecialchars($editComment['comment']) ?></textarea>
                </label>
                <br>
                <button type="submit">Uložit změny</button>
                <a href="<?= strtok($_SERVER['REQUEST_URI'], '?') ?>" class="edit-link">Zrušit</a>
            </form>
        <?php else: ?>
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
        <?php endif; ?>
    <?php else: ?>
        <p style="color: #c00; font-weight: bold;">Pro přidání komentáře se prosím <a class="login-link" href="/Projekt/WA-2025-Ngo-Nam-Khanh/public/login.php">přihlaste</a>. Jako host si můžete komentáře pouze přečíst.</p>
    <?php endif; ?>
</header>
<footer>
    &copy; 2025 Komentáře. Všechna práva vyhrazena.
</footer>
</body>
</html>