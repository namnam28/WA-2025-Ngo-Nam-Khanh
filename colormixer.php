<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Mixer</title>
</head>
<body>
    <section id="interactive" class="content-section">
        <h2>Vyzkoušejte míchání barev</h2>
        <div class="color-picker">
            <label>Barva 1: <input type="color" id="colorInput1" value="#ff0000"></label>
            <label>Barva 2: <input type="color" id="colorInput2" value="#0000ff"></label>
            <button id="mixColors">Smíchat</button>
            <div id="mixResult" style="margin-top:1em;">
                <div id="mixedColorDisplay" style="width: 80px; height: 80px; border-radius: 8px; border: 1px solid #888;"></div>
                <p id="mixedColorHex"></p>
            </div>
        </div>
    </section>
    <script src="main.js"></script>
</body>
</html>