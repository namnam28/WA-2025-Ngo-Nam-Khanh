<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();

require_once('config/database.php');
$pdo = connectDB();

// Načte všechny uložené barvy s uživatelskými informacemi
$stmt = $pdo->query(
    "SELECT barvy.*, users.username 
     FROM barvy 
     JOIN users ON barvy.user_id = users.user_id 
     ORDER BY barvy.created_at DESC"
);
$saved_colors = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Uložené barvy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 2em; }
        .colors-table { width: 100%; max-width: 700px; margin: 0 auto; border-collapse: collapse; background: #fff; border-radius: 8px; box-shadow: 0 1px 4px #ccc;}
        .colors-table th, .colors-table td { padding: 0.8em; text-align: center; border-bottom: 1px solid #e0e0e0; }
        .colors-table th { background: #2963a5; color: #fff; }
        .color-swatch { display: inline-block; width: 32px; height: 32px; border: 1px solid #aaa; border-radius: 6px; vertical-align: middle; margin-right: 0.5em; }
        .colors-table tr:last-child td { border-bottom: none; }
        .header { text-align: center; margin-bottom: 2em; }
        a.btn { display: inline-block; margin-top: 2em; background: #2963a5; color: #fff; text-decoration: none; padding: 0.6em 1.5em; border-radius: 5px; }
        a.btn:hover { background: #19436d; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Všechny uložené barevné kombinace</h2>
        <a href="colormixer.php" class="btn">Zpět na míchačku</a>
    </div>
    <table class="colors-table">
        <tr>
            <th>Výsledek</th>
            <th>Kombinace</th>
            <th>Uživatel</th>
            <th>Datum</th>
        </tr>
        <?php if($saved_colors): ?>
            <?php foreach ($saved_colors as $color): ?>
                <tr>
                    <td>
                        <span class="color-swatch" style="background:<?=htmlspecialchars($color['mixed_color'])?>"></span>
                        <?=htmlspecialchars($color['mixed_color'])?>
                    </td>
                    <td>
                        <?=htmlspecialchars($color['color1'])?> + <?=htmlspecialchars($color['color2'])?>
                    </td>
                    <td><?=htmlspecialchars($color['username'])?></td>
                    <td><?=htmlspecialchars($color['created_at'])?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Žádné uložené barvy zatím nejsou.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>