<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';

$pdo = connectDB();
$user = new User($pdo);

$error = null;


// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location:../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        if ($user->login($username, $password)) {
            header("Location:../index.php");
            exit();
        } else {
            $error = "Neplatné uživatelské jméno nebo heslo";
        }
    } else {
        $error = "Vyplňte prosím všechna pole";
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Přihlášení</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Uživatelské jméno</label>
                <input type="text" user_id="username" name="username" required autocomplete="username">
            </div>
            <div class="form-group">
                <label for="password">Heslo</label>
                <input type="password" user_id="password" name="password" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn-primary">Přihlásit</button>
        </form>

        <p class="auth-link">Nemáte účet? <a href="register.php">Zaregistrujte se</a></p>
    </div>
</body>
</html>