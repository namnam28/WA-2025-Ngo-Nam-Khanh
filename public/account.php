<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();
require_once '../config/database.php';
require_once '../classes/user.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$pdo = connectDB();
$user = new User($pdo);
$userData = $user->getUser($_SESSION['user_id']);
if (!$userData) {
    // user nenalezen; log out and redirect
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Můj účet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Vítejte, <?= htmlspecialchars($userData['username']) ?></h1>
    <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
    <p>Členem od: <?= date('F j, Y', strtotime($userData['created_at'])) ?></p>
    <a href="logout.php">Odhlásit se</a>
</body>
</html>