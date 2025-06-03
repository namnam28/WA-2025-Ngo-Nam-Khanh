<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();
require_once '../config/database.php';
require_once '../classes/User.php';

$pdo = connectDB();
$user = new User($pdo);

$error = null;

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        if ($password === $confirm_password) {
            if ($user->register($username, $email, $password)) {
                if ($user->login($username, $password)) {
                    header("Location: ../index.php");
                    exit();
                } else {
                    $error = "Registrace proběhla, ale přihlášení selhalo. Zkuste se přihlásit ručně.";
                }
            } else {
                $error = "Registrace selhala - uživatelské jméno nebo e-mail již existuje.";
            }
        } else {
            $error = "Hesla se neshodují";
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
    <title>Registrace</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container">
        <h2>Registrace</h2>
        <?php if ($error) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Uživatelské jméno</label>
                <input type="text" user_id="username" name="username" required autocomplete="username">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" user_id="email" name="email" required autocomplete="email">
            </div>
            <div class="form-group">
                <label for="password">Heslo</label>
                <input type="password" user_id="password" name="password" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Potvrďte heslo</label>
                <input type="password" user_id="confirm_password" name="confirm_password" required autocomplete="new-password">
            </div>
            <button type="submit">Registrovat</button>
        </form>
        <p>Již máte účet? <a href="login.php">Přihlaste se</a></p>
    </div>
</body>
</html>