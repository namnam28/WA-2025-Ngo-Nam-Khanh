const colorMeanings = [
    { 
        name: "Červená", 
        hex: "#ff0000", 
        meaning: "Energie, vášeň, akce, nebezpečí",
        details: {
            psychology: "Červená zvyšuje srdeční tep a vytváří pocit naléhavosti. Studie (např. Elliot & Niesta, 2008) prokázaly, že vystavení červené barvě před výkonem (např. u sportovců nebo při testech) zvyšuje agresivitu a soutěživost. Červená aktivuje amygdalu, část mozku spojenou s reakcí boj nebo útěk. Proto se používá na výstražných značkách, tlačítkách STOP nebo v limitovaných nabídkách. Lidé oblečení do červené jsou vnímáni jako atraktivnější a sebevědomější (výzkumy týkající se randění i pracovních pohovorů). Stimulace chuti k jídlu. Červená zvyšuje produkci ghrelinu, hormon hladu.",
            marketing: "Červená je v reklamě nejagresivnější barva, proto musí být použita strategicky. Akční a slevové kampaně. Červená vytváří dojem, že nabídka je časově omezená (Amazon, Alza). Balení potravin, které používá červené obaly vnímáme jako sladší nebo intenzivnější např. Coca-Cola vs. Diet Coke, stříbrná pro light verzi. Červené koberce symbolizují VIP status ve filmových festivalech.",
            culture: "Symbolika červené se napříč kulturami radikálně liší. V Číně a východní Asii to je barva štěstí, prosperity a oslav. Červené obálky s penězi se dávají na Nový rok, svatební šaty jsou často červené. V Jižní Africe to je barva smutku a truchlení. V některých afrických kmenech červená odpuzuje zlé duchy, zatímco v Egyptě byla spojována s chaosem, bůh chaosu Set měl červené vlasy.",
            combinations: "Červená + černá. Dramatičnost, luxus a síla. Černá dodává červené hloubku a mystičnost. Červená + zelená. Vysoký kontrast, který evokuje vánoční atmosféru, ale také přírodu, červené jahody na zeleném listí. Může působit křiklavě, pokud nejsou odstíny vyvážené. Červená + zlatá Bohatství, prestiž a tradice, často používáno v asijské kultuře pro svatby a svátky. Červená + modrá. Dynamika, energie červené vs. klid modré. V USA asociuje patriotismus."
        }
    },
    { 
        name: "Modrá", 
        hex: "#0000ff", 
        meaning: "Důvěra, klid, stabilita, profesionalita",
        details: {
            psychology: "Modrá je jednou z nejuniverzálněji pozitivně vnímaných barev. Její účinky na psychiku jsou vědecky podložené. Uklidňující efekt. Studie např. Journal of Environmental Psychology ukazují, že modrá snižuje krevní tlak a zpomaluje metabolismus. V místnostech s modrým osvětlením lidé vykazují vyšší produktivitu a méně stresu. Důvěra a profesionalita. Modrá aktivuje asociaci se stabilitou a řádem, obloha, moře. Na rozdíl od červené modrá snižuje apetit, fastfoodům se proto spíše vyhýbá. Přemíra modré může působit neosobně (např. v nemocnicích nebo kancelářích bez doplňkových barev).",
            marketing: "Modrá dominuje v oborech, kde je klíčová důvěra a bezpečnost. Banky (Chase, Barclays) a pojišťovny (Allianz) ji používají v logech, protože evokuje spolehlivost. Platební brány (Visa, Mastercard) kombinují modrou se žlutou/červenou pro rovnováhu mezi důvěrou a energií. Intel a HP ji využívají pro asociaci s inovací a precizností. Modrá v kombinaci s bílou (např. WHO) vyvolává dojem čistoty a odbornosti.",
            culture: "Západní kultura. Modrá je tradičně přiřazována mužům (oproti růžové). Policisté a armáda používají tmavě modrou pro respekt. Východní Asie. V Číně je modrá barvou nebe a harmonie (feng shui). V Japonsku symbolizuje čest a čistotu (indigo barvení kimona). Blízký východ. Ochrana před zlým okem (Turecko, Řecko). Latinská Amerika. V Mexiku je modrá spojena s náboženskou úctou (plášť Panny Marie).",
            combinations: "•	Modrá + oranžová (doplňková). Vysoký kontrast. Oranžová dodává energii, zatímco modrá vyvažuje důvěryhodností. Modrá + bílá. Čistota a profesionalita (Facebook, Samsung). Modrá + zlatá. Luxus (Tiffany & Co., Rolex). Monochromatická modrá. Různé odstíny modré vytvářejí harmonický dojem (Twitter, LinkedIn). Sytá modrá (např. #0057B8) působí autoritativně, zatímco pastelová (#89CFF0) je přátelská a kreativní."
        }
    },
    { 
        name: "Fialová", 
        hex: "#ae00ff", 
        meaning: "Kreativita, spiritualita, luxus, mystika",
        details: {
            psychology: "Fialová (nebo purpurová) je barvou kontrastů, která spojuje energii červené a klid modré. Její psychologické působení je výjimečné. Kreativita a inspirace. Studie ukazují, že fialové odstíny stimulují pravou mozkovou hemisféru, podporují představivost a originální myšlení. Často se používá v kreativních prostorech (designérská studia, umělecké školy). Spiritualita a meditace. Fialová je spojována s vyšším vědomím, mystikou a vnitřním klidem. V terapii barev se využívá k relaxaci a snížení stresu. Luxus a exkluzivita. Díky historické vzácnosti purpurového barviva fialová asociuje bohatství a jedinečnost. ",
            marketing: "Tmavě fialová (aubergine) působí sofistikovaně, zatímco světlé odstíny (lila) jsou více ženské a romantické. Kreativní průmysl. Umělecké platformy (Twitch, Vimeo) a technologické inovace (Yahoo! v minulosti) volí fialovou pro vyjádření originality. Zdraví a wellness. Fialová se objevuje v propagaci alternativní medicíny, aromaterapie a produktů pro duševní pohodu. Genderově neutrální marketing. Nahrazuje tradiční růžovou/modrou v kampaních pro děti (hračky, oblečení).",
            culture: "Evropa (historicky). Barva králů a císařů. purpur bylo nejdražší barvivo (extrahované z měkkýšů), dostupné pouze elitám. V křesťanství symbolizuje pokání a postní období. Asie. V Thajsku je fialová barvou smutku (vdovy ji nosí po smrti manžela). V Japonsku asociuje noblesu a čest (fialové květy jsou symbolem šlechty). V LGBTQ+ je fialová součástí duhové vlajky a symbolizuje ducha komunity.",
            combinations: "Fialová + zlatá. Maximální luxus (královská kombinace např. korunovační klenoty). Fialová + světle zelená. Přírodní harmonie (levandule a šalvěj). Oblíbená v bio produktech. Působí svěže a uklidňujíce. Fialová + šedá. Moderní elegance. technologické značky např. Asus ZenBook (wallpaper). Fialová + tyrkysová. Energie a kreativita (vhodné pro umělecké školy). Monochromatická fialová. Různé odstíny od lila po temně purpurovou vytvářejí hloubku (fotografie, webdesign). Další: Světle fialová (#E6E6FA): ženskost, jemnost. Tmavě fialová (#4B0082): autorita, mystično. Elektrická fialová (#8F00FF): modernost, futurismus."
        }
    },
    { 
        name: "Žlutá", 
        hex: "#ffff00", 
        meaning: "Optimismus, štěstí, energie, pozornost",
        details: {
            psychology: "Žlutá je nejviditelnější barva spektra a má výrazný vliv na psychiku. Zvyšuje produkci serotoninu (hormonu štěstí) a podporuje koncentraci. Studie NASA prokázaly, že žluté odstíny zlepšují paměť až o 25 %. Světle žlutá (citrónová) působí osvěžujíce, zatímco sytá žlutá může při delším působení vyvolat neklid (přezdívaná jako barva úzkosti). V přírodě je žlutá barvou jedovatých živočichů, proto podvědomě vyvolává ostražitost (využití na výstražných tabulích). Žluté předměty se jeví větší a bližší jako optický klam, efekt využívají fastfoody (McDonald’s) k urychlení rozhodování.",
            marketing: "Žlutá je nejúčinnější pro okamžité upoutání pozornosti. Žluté výprodejové štítky (IKEA, Best Buy) zvýší návštěvnost o 15–20 %. Kombinace žluté s červenou (McDonald’s, Burger King) stimuluje chuť k jídlu. Taxi služby a dopravní společnosti (DHL) využívají žlutou pro viditelnost. Žlutá asociuje hravost (LEGO, Snapchat). Neonová žlutá (#FFFF00) přitáhne pohled, ale v nadbytku dráždí oči – lepší je hořčicový odstín (#FFDB58). Žluté pozadí webů zvyšuje míru okamžitého opuštění stránky (bounce rate) až o 30 %.",
            culture: "Asie. V Číně je žlutá barva císařů (pouze panovník směl nosit žlutý šat) a štěstí. V Thajsku je žlutá barva pondělí a krále (lidé nosí žluté na oslavu). Západ. V USA to je symbol optimismu (smajlík) a zbabělosti (yellow-bellied). Ve Francii žlutá symbolizuje žárlivost. Náboženství. V Křesťanství symbolizuje zradu (Jidáš často zobrazován ve žlutém). V Hinduismu to je poznání a učení (oděvy guruů).",
            combinations: "Žlutá + fialová. Doplňkový kontrast pro kreativitu (Lakers). Žlutá + tmavě modrá. Profesionální rovnováha (IKEA). Žlutá + černá. Vizibilita (včely, taxíky) nebo luxus (Chanel). Žlutá + zelená. Přírodní svěžest (Subway, Lipton). Zlaté pravidlo: Žlutá by měla tvořit max. 10–15 % designu, v nadbytku působí křiklavě."
        }
    },
    { 
        name: "Zelená", 
        hex: "#36ff00", 
        meaning: "Příroda, růst, harmonie, zdraví",
        details: {
            psychology: "Zelená má nejharmoničtější vliv na lidskou psychiku ze všech barev. Studie University of Essex prokázala, že pobyt v zeleném prostředí snižuje stres až o 50 % (tzv. biophilia efekt). V nemocnicích se používá světle zelená (mintová) na stěnách, protože urychluje rekonvalescenci. Zelená světla a tlačítka Start využívají tento instinktivní vjem. Olivové odstíny v kancelářích zvyšují produktivitu o 15 % (studie Pantone). Neonově zelená (#00FF00) může působit agresivně – v přírodě signalizuje jedovatost.",
            marketing: "Eko-friendly branding. Bio produkty (Whole Foods), elektromobily (nabíjecí stanice) a udržitelné značky (The Body Shop). Zelený washing: firmy často zneužívají zelenou pro falešnou ekologičnost. Lékárny (CVS), vitamíny (Green Foods) a wellness centra. V bankovnictví symbolizuje růst (barva dolaru) např. Citizen’s Bank, Shopify. Zelená asociuje inovaci a dostupnost např. Android, Spotify. ",
            culture: "Islámský svět. Posvátná barva proroka Mohameda (dominuje na vlajkách Saudské Arábie, Pákistánu). V mešitách se často objevuje v mozaikách. Západní kultura. Příroda a ekologie (hnutí Greenpeace). V USA asociuje peníze (dolar) a závist (green-eyed monster). Asie. V čínských seriálech nosí zelený klobouk nevěrná manželka. V Japonsku asociuje životní energii (matcha čaj = rituál). Ve středověku byla zelená barvou náhod (hazardních her). Světle zelená ve viktoriánské Anglii symbolizovala homosexualitu.",
            combinations: "Zelená + hnědá. Organický vzhled (Whole Foods, kávové značky). Hnědá dodává zemitou stabilitu. Zelená + krémová. Elegantní přírodní estetika (L'Occitane, Aesop). Krémová změkčuje a zjemňuje. Zelená + modrá. Vodní svěžest (Nivea, Oral-B). Různé odstíny od olivové po limetkovou (lesní tematika)."
        }
    },
    { 
        name: "Oranžová", 
        hex: "#ff8700", 
        meaning: "Nadšení, teplo, úspěch, odvaha",
        details: {
            psychology: "Studie Color Matters Institute prokázala, že oranžová zvyšuje hladinu kyslíku v mozku, stimuluje aktivitu a sociální interakci. Optimismus a přístupnost, světlejší odstíny (broskvová) působí přátelsky a komunikativně (využití v HR odděleních). Varování s pozitivním nábojem. Kombinuje naléhavost červené s pozitivitou žluté (bezpečnostní vesty, dopravní kužely). Stimulace tvořivosti, v kreativních prostorech zvyšuje produktivitu o 18 % (studie Steelcase). Neonově oranžová (#FFA500) může působit agresivně a kýčovitě.",
            marketing: "Nike, Fila asociuje výkon a dynamiku. Posilovny a fitness aplikace asociují energii. EasyJet vyvolává dojem dostupnosti a dobrodružství. Turistické destinace (Holandsko – královská oranžová). Shazam, Mozilla Firefox představují symbol inovace a přístupnosti. Nickelodeon, Fanta představují hravost a energii. Tmavší odstíny (meruňková #FBCEB1) působí luxusněji než křiklavé tóny.",
            culture: "Asijské tradice. V Buddhismu to je barva osvícení (roucha mnichů v Thajsku). V Hinduismu to je posvátná barva (obřadní oděvy, svatba). V Číně symbolizuje štěstí a prosperitu. Západní svět. Nizozemsko: Národní barva (Královský dům Oranžských). V USA je nejvíce spojována s Halloweenem (dýně), vězeňskými uniformami. V Irsku to je protestantská tradice (Orangisté). Na Blízkém východě v Egypt představuje smutek a v Indii odvahu (barva kari koření).",
            combinations: "Oranžová + azurová. Dokonalý doplněk, vyvažuje teplo a chlad (FedEx logo). Také ideální pro letní kampaně a plážové resorty. Oranžová + bílá, čistota a energie (Fanta, Gulf Oil). Oranžová + tmavě modrá, profesionální dynamika (Firefox). Oranžová + zelená, tropický efekt (pomeranč + limetka). Zlaté pravidlo, oranžová by měla tvořit max. 20 % designu, jako akcentní barva."
        }
    },
    { 
        name: "Růžová", 
        hex: "#fc66c7", 
        meaning: "Láska, něha, ženskost, romantika",
        details: {
            psychology: "•	Fyziologické uklidnění. Vědecké studie (např. Schauss, 1979) prokázaly, že růžová (konkrétně odstín Baker-Miller Pink) snižuje srdeční frekvenci a agresivitu. Věznice a psychiatrické léčebny ji používají k uklidnění pacientů. Snižuje stereotypní mužskou agresi (tzv. Pink Effect), ale může podporovat pasivitu při nadužívání. Světle růžová (#FFD1DC) nevinnost, něha. Horká růžová (#FF69B4) sebevědomí, energie. Tmavá růžová (#E75480) sofistikovaná ženskost. Fenomén Drunk Tank Pink, tento specifický odstín snižuje fyzickou sílu o 15-20 % během 15 minut expozice.",
            marketing: "Dětské produkty (Barbie #DA1884). Kosmetika (Victoria's Secret #FFC0CB). Romantické kampaně (Valentýn, kombinace s červenou). Zdravotnictví růžové stuhy symbol boje proti rakovině prsu. Psychologické ordinace (jemné odstíny). Moderní rebranding, Millennials Pink (#F3CFC6) genderově neutrální použití (Glossier, Instagram). Tech společnosti (Bumble, #FF5A5F) pro vyjádření síly. Food marketing, sladkosti (Pepto-Bismol, bubblegum). Omezení, růžová nesimuluje chuť, neužívat pro masné výrobky. Statistika, produkty v růžovém balení mají o 23 % vyšší prodejnost u žen 18-35 let (Nielsen, 2022).",
            culture: "Symbolika, růžové prošla dramatickým vývojem. Historický paradox 19. století růžová = zmenšená červená (mužská, energická). 1940 převrat po marketingu dětského oblečení (Pink for girls). Regionální rozdíly, v Japonsku růžová Sakura představuje pomíjivost života. V Indii svatební sárí (symbol štěstí). V Thajsku to je barva úterý (asociovaná s bohyní Šivou). Moderní symbolika, LGBTQ+ komunita (transgender pride, světle růžová). Feministická hnutí (Pink Protest). K-pop kultura (aegyo jako roztomilost).",
            combinations: "Růžová + bílá představuje čistotu (kosmetika, svatby). Růžová + světle šedá představuje moderní eleganci. Růžová + černá je spojována s punkovou energií (Vivienne Westwood). Růžová + zlatá, luxus (Tiffany's Pink Diamond). Neonové kombinac jako růžová + modrá představuje 80s retro (Miami Vice) a růžová + zelená barbiecore (2023 trend). Růžová + zelená představuje botanický styl (Urban Outfitters). Profesionální tip: Pro mužské publikum použijte terakotovou růžovou (#E37383) místo pastelové."
        }
    }
];

// Utilita pro nalezení nejbližší definované barvy
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


function isUserLoggedIn() {
    return window.USER_LOGGED_IN === true;
}

document.addEventListener('DOMContentLoaded', function () {

    const colorInput1 = document.getElementById('colorInput1');
    const colorInput2 = document.getElementById('colorInput2');
    const mixBtn = document.getElementById('mixColors');
    const mixedColorDisplay = document.getElementById('mixedColorDisplay');
    const mixedColorHex = document.getElementById('mixedColorHex');
    const mixedColorInput = document.getElementById('mixed_color');
    const saveBtn = document.getElementById('saveColor');

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
        // Pokud uživatel není přihlášen, zakázat vstupy (zpracováno v PHP, ale s dvojitým zabezpečením)
        if (!isUserLoggedIn()) {
            colorInput1.disabled = true;
            colorInput2.disabled = true;
            mixBtn.disabled = true;
            if (saveBtn) saveBtn.disabled = true;
        }

        mixBtn.addEventListener('click', () => {
            const mixed = mixHexColors(colorInput1.value, colorInput2.value);
            mixedColorDisplay.style.backgroundColor = mixed;
            mixedColorHex.textContent = `Výsledná barva: ${mixed}`;
            if (mixedColorInput) mixedColorInput.value = mixed;
            if (saveBtn) saveBtn.disabled = false;
        });

        // Obnoví tlačítko uložení, pokud uživatel změní barvy
        colorInput1.addEventListener('change', () => { if (saveBtn) saveBtn.disabled = true; });
        colorInput2.addEventListener('change', () => { if (saveBtn) saveBtn.disabled = true; });
    }

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

                
                if (targetId === 'meanings') {
                    hideColorDetail();
                }
            }
            
        });
    });

    
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

    
    if (colorGrid && colorDetailContainer && colorDetailContent) {
        renderColorGrid();
        hideColorDetail();
    }

    
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
});