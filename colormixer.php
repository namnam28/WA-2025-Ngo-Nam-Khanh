<?php
session_set_cookie_params([
    'path' => '/Projekt/WA-2025-Ngo-Nam-Khanh/',
]);
session_start();

$is_logged_in = isset($_SESSION['user_id']) && isset($_SESSION['username']);

if ($is_logged_in && $_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('config/database.php');
    $pdo = connectDB();
    $color1 = $_POST['color1'] ?? '';
    $color2 = $_POST['color2'] ?? '';
    $mixed_color = $_POST['mixed_color'] ?? '';
    if (
        preg_match('/^#[0-9a-fA-F]{6}$/', $color1) &&
        preg_match('/^#[0-9a-fA-F]{6}$/', $color2) &&
        preg_match('/^#[0-9a-fA-F]{6}$/', $mixed_color)
    ) {
        $stmt = $pdo->prepare("INSERT INTO barvy (user_id, color1, color2, mixed_color) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_SESSION['user_id'], $color1, $color2, $mixed_color]);
        $message = "Barva byla uložena!";
    } else {
        $message = "Neplatné barvy!";
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Míchačka barev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 2em; }
        .mixer { background: #fff; border-radius: 8px; max-width: 400px; margin: 0 auto; padding: 2em; box-shadow: 0 1px 4px #ccc; }
        .row { margin-bottom: 1.2em; }
        .color-preview { display: inline-block; width: 48px; height: 48px; border: 1px solid #aaa; border-radius: 6px; vertical-align: middle; margin-left: 1em; }
        .mix-btn, button[type="submit"] { padding: 0.5em 1.5em; border: none; border-radius: 5px; background: #2963a5; color: #fff; font-size: 1em; cursor: pointer; }
        .mix-btn:hover, button[type="submit"]:hover { background: #19436d; }
        .save-msg { color: #1b791b; margin-top: 1em; }
        .error-msg { color: #c00; margin-top: 1em; }
    </style>
</head>
<body>
    <header>
    <img src="..\assets\Návrh bez názvu.png" alt="Logo" class="site-logo">
    <div class="mixer">
        <h2>Míchačka barev</h2>
        <?php if (!empty($message)): ?>
            <div class="<?= strpos($message, 'uložena') !== false ? 'save-msg' : 'error-msg' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>
        <form method="post" id="color-mix-form" autocomplete="off">
            <div class="row">
                <label>Barva 1:
                    <input type="color" name="color1" id="color1" value="#ff0000">
                </label>
                <span id="preview1" class="color-preview" style="background:#ff0000"></span>
            </div>
            <div class="row">
                <label>Barva 2:
                    <input type="color" name="color2" id="color2" value="#0000ff">
                </label>
                <span id="preview2" class="color-preview" style="background:#0000ff"></span>
            </div>
            <div class="row">
                <button type="button" class="mix-btn" id="mix-btn">Smíchat</button>
            </div>
            <div class="row">
                <label>Výsledek:</label>
                <span id="result-preview" class="color-preview" style="background:#7f007f"></span>
                <span id="result-hex">#7f007f</span>
                <input type="hidden" name="mixed_color" id="mixed_color" value="#7f007f">
            </div>
            <?php if ($is_logged_in): ?>
                <button type="submit">Uložit kombinaci</button>
            <?php else: ?>
                <p><small>Přihlaste se pro ukládání kombinací.</small></p>
            <?php endif; ?>
        </form>
    </div>
    <script>
        function hexToRgb(hex) {
            hex = hex.replace('#','');
            return {
                r: parseInt(hex.substring(0,2),16),
                g: parseInt(hex.substring(2,4),16),
                b: parseInt(hex.substring(4,6),16)
            };
        }
        function rgbToHex(r,g,b) {
            return "#" + [r,g,b].map(x => {
                const h = x.toString(16);
                return h.length === 1 ? "0" + h : h;
            }).join('');
        }
        function mixColors(hex1, hex2) {
            const c1 = hexToRgb(hex1);
            const c2 = hexToRgb(hex2);
            return rgbToHex(
                Math.round((c1.r + c2.r)/2),
                Math.round((c1.g + c2.g)/2),
                Math.round((c1.b + c2.b)/2)
            );
        }
        const color1 = document.getElementById('color1');
        const color2 = document.getElementById('color2');
        const preview1 = document.getElementById('preview1');
        const preview2 = document.getElementById('preview2');
        const resultPreview = document.getElementById('result-preview');
        const resultHex = document.getElementById('result-hex');
        const mixedColorInput = document.getElementById('mixed_color');
        const mixBtn = document.getElementById('mix-btn');

        function updatePreviews() {
            preview1.style.background = color1.value;
            preview2.style.background = color2.value;
        }
        function doMix() {
            const hex = mixColors(color1.value, color2.value);
            resultPreview.style.background = hex;
            resultHex.textContent = hex;
            mixedColorInput.value = hex;
        }

        color1.addEventListener('input', () => {
            updatePreviews();
            doMix();
        });
        color2.addEventListener('input', () => {
            updatePreviews();
            doMix();
        });
        mixBtn.addEventListener('click', doMix);

        // počáteční spuštění
        updatePreviews();
        doMix();
    </script>
    </header>
    <footer>
    &copy; 2025 Míchačka barev. Všechna práva vyhrazena.
    </footer>
</body>
</html>