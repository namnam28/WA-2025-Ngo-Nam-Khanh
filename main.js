// Color data - Czech color psychology
const colorMeanings = [
    { 
        name: "Červená", 
        hex: "#ff0000", 
        meaning: "Energie, vášeň, akce, nebezpečí",
        details: {
            psychology: "Červená zvyšuje srdeční tep a vytváří pocit naléhavosti.",
            marketing: "Často používána při výprodejích a v potravinářství, protože stimuluje chuť k jídlu.",
            culture: "V Číně symbolizuje štěstí a prosperitu. V Jižní Africe je barvou smutku.",
            combinations: "Dobře funguje s neutrálními barvami jako bílá, černá a šedá. Doplněk k zelené."
        }
    },
    { 
        name: "Modrá", 
        hex: "#0000ff", 
        meaning: "Důvěra, klid, stabilita, profesionalita",
        details: {
            psychology: "Modrá má uklidňující účinek a je často spojována se stabilitou a spolehlivostí.",
            marketing: "Preferována finančními institucemi a technologickými společnostmi pro vyjádření důvěry.",
            culture: "V západních kulturách představuje mužnost, zatímco ve východní Asii může symbolizovat nesmrtelnost.",
            combinations: "Dobře ladí s oranžovou (doplňkovou) a dalšími modrými pro monochromatické schéma."
        }
    },
    { 
        name: "Fialová", 
        hex: "#ae00ff", 
        meaning: "Kreativita, spiritualita, luxus, mystika",
        details: {
            psychology: "Fialová podporuje kreativitu a spojuje logiku s intuicí.",
            marketing: "Používána pro produkty spojené s kreativitou a luxusem.",
            culture: "Historicky spojována s královskou rodinou a spiritualitou.",
            combinations: "Dobře funguje se zlatou a světle zelenou."
        }
    },
    { 
        name: "Žlutá", 
        hex: "#ffff00", 
        meaning: "Optimismus, štěstí, energie, pozornost",
        details: {
            psychology: "Žlutá povzbuzuje mysl a zvyšuje koncentraci.",
            marketing: "Používána k upoutání pozornosti a vyvolání pocitu štěstí.",
            culture: "V mnoha kulturách symbolizuje štěstí a inteligenci.",
            combinations: "Dobře kontrastuje s fialovou a tmavě modrou."
        }
    },
    { 
        name: "Zelená", 
        hex: "#36ff00", 
        meaning: "Příroda, růst, harmonie, zdraví",
        details: {
            psychology: "Zelená uklidňuje a symbolizuje obnovu a bezpečí.",
            marketing: "Používána pro ekologické a zdravé produkty.",
            culture: "V islámu je to posvátná barva, na Západě spojována s přírodou.",
            combinations: "Dobře funguje s hnědou a krémovou."
        }
    },
    { 
        name: "Oranžová", 
        hex: "#ff8700", 
        meaning: "Nadšení, teplo, úspěch, odvaha",
        details: {
            psychology: "Oranžová kombinuje energii červené a štěstí žluté.",
            marketing: "Používána pro výzvy k akci a sportovní produkty.",
            culture: "V Asii spojována s spiritualitou a očistou.",
            combinations: "Dobře ladí s azurovou a bílou."
        }
    },
    { 
        name: "Růžová", 
        hex: "#fc66c7", 
        meaning: "Láska, něha, ženskost, romantika",
        details: {
            psychology: "Růžová má uklidňující účinek a snižuje agresi.",
            marketing: "Používána pro produkty cílené na ženy a romantiku.",
            culture: "Na Západě spojována s dívčím a romantickým.",
            combinations: "Dobře funguje s bílou a světle šedou."
        }
    }
];

// Utility to find the closest defined color
function findClosestColor(hex) {
    const r = parseInt(hex.substr(1, 2), 16);
    const g = parseInt(hex.substr(3, 2), 16);
    const b = parseInt(hex.substr(5, 2), 16);

    let closest = colorMeanings[0];
    let minDistance = Infinity;

    colorMeanings.forEach(color => {
        const cr = parseInt(color.hex.substr(1, 2), 16);
        const cg = parseInt(color.hex.substr(3, 2), 16);
        const cb = parseInt(color.hex.substr(5, 2), 16);
        const distance = Math.sqrt(
            Math.pow(r - cr, 2) +
            Math.pow(g - cg, 2) +
            Math.pow(b - cb, 2)
        );
        if (distance < minDistance) {
            minDistance = distance;
            closest = color;
        }
    });
    return closest;
}

// Helper: Check if user is logged in (relies on PHP session to output a JS variable)
function isUserLoggedIn() {
    return window.USER_LOGGED_IN === true;
}

document.addEventListener('DOMContentLoaded', function () {
    // Sections and navigation
    const navLinks = document.querySelectorAll('.nav-link');
    const contentSections = document.querySelectorAll('.content-section');

    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const targetId = href.substring(1);

                contentSections.forEach(section => {
                    section.classList.remove('active-section');
                });
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.classList.add('active-section');
                }

                // Reset color detail view if switching to meanings
                if (targetId === 'meanings') {
                    hideColorDetail();
                }
            }
            // For non-anchor links (e.g., comments.php), allow normal navigation.
        });
    });

    // Color grid rendering (only if present)
    const colorGrid = document.querySelector('.color-grid');
    const colorDetailContainer = document.getElementById('color-detail-container');
    const colorDetailContent = document.getElementById('color-detail-content');
    const backButton = document.getElementById('back-to-colors');

    function renderColorGrid() {
        colorGrid.innerHTML = '';
        colorMeanings.forEach(color => {
            const card = document.createElement('div');
            card.className = 'color-card';
            card.style.backgroundColor = color.hex;
            card.innerHTML = `
                <h3>${color.name}</h3>
                <p>${color.meaning}</p>
                <small>${color.hex}</small>
            `;
            card.addEventListener('click', () => {
                showColorDetail(color);
            });
            colorGrid.appendChild(card);
        });
    }

    // Show color detail
    function showColorDetail(color) {
        colorDetailContent.innerHTML = `
            <div style="background: ${color.hex}; width: 100%; height: 100px; border-radius: 8px 8px 0 0;"></div>
            <div style="padding: 1.5rem;">
                <h2>${color.name}</h2>
                <h3>Psychologické účinky</h3>
                <p>${color.details.psychology}</p>
                <h3>V marketingu</h3>
                <p>${color.details.marketing}</p>
                <h3>Kulturní význam</h3>
                <p>${color.details.culture}</p>
                <h3>Kombinace barev</h3>
                <p>${color.details.combinations}</p>
            </div>
        `;
        colorGrid.style.display = 'none';
        colorDetailContainer.classList.remove('color-detail-hidden');
        colorDetailContainer.classList.add('color-detail-visible');
    }

    function hideColorDetail() {
        colorDetailContainer.classList.remove('color-detail-visible');
        colorDetailContainer.classList.add('color-detail-hidden');
        colorGrid.style.display = 'grid';
    }

    if (backButton) {
        backButton.addEventListener('click', hideColorDetail);
    }

    // Render color grid only if present (main page)
    if (colorGrid && colorDetailContainer && colorDetailContent) {
        renderColorGrid();
        hideColorDetail();
    }

    // Color picker panel (single color, main page)
    const colorInput = document.getElementById('colorInput');
    const colorDisplay = document.getElementById('colorDisplay');
    const applyBtn = document.getElementById('applyColor');
    const colorDescription = document.getElementById('colorDescription');

    if (applyBtn && colorInput && colorDisplay && colorDescription) {
        applyBtn.addEventListener('click', () => {
            const selectedColor = colorInput.value;
            colorDisplay.style.backgroundColor = selectedColor;
            const closestColor = findClosestColor(selectedColor);
            colorDescription.textContent = `Tento odstín je podobný ${closestColor.name}, která typicky symbolizuje: ${closestColor.meaning}`;
        });
    }

    // Color mixer (colormixer.php)
    const colorInput1 = document.getElementById('colorInput1');
    const colorInput2 = document.getElementById('colorInput2');
    const mixBtn = document.getElementById('mixColors');
    const mixedColorDisplay = document.getElementById('mixedColorDisplay');
    const mixedColorHex = document.getElementById('mixedColorHex');

    function mixHexColors(hex1, hex2) {
        function hexToRgb(hex) {
            hex = hex.replace('#', '');
            if (hex.length === 3) {
                hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
            }
            return [
                parseInt(hex.substr(0,2), 16),
                parseInt(hex.substr(2,2), 16),
                parseInt(hex.substr(4,2), 16)
            ];
        }
        function rgbToHex(rgb) {
            return '#' + rgb.map(x => {
                const hex = x.toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            }).join('');
        }
        const rgb1 = hexToRgb(hex1);
        const rgb2 = hexToRgb(hex2);
        const mixed = [
            Math.round((rgb1[0] + rgb2[0]) / 2),
            Math.round((rgb1[1] + rgb2[1]) / 2),
            Math.round((rgb1[2] + rgb2[2]) / 2)
        ];
        return rgbToHex(mixed);
    }

    if (colorInput1 && colorInput2 && mixBtn && mixedColorDisplay && mixedColorHex) {
        mixBtn.addEventListener('click', () => {
            const mixed = mixHexColors(colorInput1.value, colorInput2.value);
            mixedColorDisplay.style.backgroundColor = mixed;
            mixedColorHex.textContent = `Výsledná barva: ${mixed}`;
        });
    }
});