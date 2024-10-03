let currMoleTile;
let currPlantTile;
let score = 0;
let gameOver = false;
let currentBannerIndex = 0;

const banners = [
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fmedia.tenor.com%2FZp_zLqDBS78AAAAC%2F%25D9%2585%25D8%25AD%25D9%2585%25D8%25AF-%25D9%2585%25D9%2586%25D9%258A%25D8%25B1.gif&sp=1726157313T6198ee6770ff3c06314ec1a9d50f1c09bd4000a38009f3ca4c5982a5d3aa1527',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.UIpm9AVFG4vzdhGJon5TGQAAAA%26pid%3DApi&sp=1726157544T24e9fafc5fbdda457c113f67e0b145b40c45f0f3a63ec263f2835bc106e7acf5',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fyoucanad.com%2Fwp-content%2Fuploads%2F2023%2F10%2Fwet.gif&sp=1726157505Tb4cca0695fa27bcfcc154a6c6774e6122618f85835dd69a79bcf6ff828322e07',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.syq8gUQPXoqQ3PHaHI5wOwHaHa%26pid%3DApi&sp=1726157505T8927dfd1cbc606459232e67e54d6e351507f1bcea3ae2fd52326f2f50c3fb6ff',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F27%2F94%2F6a%2F27946a99657cddf0cbde79a7e4e6f51f.gif&sp=1726157690T03cd49f4d919d6e853402122e2e3b5d26a1c1ccc97b882c18804aa64299974c7',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fmadrassatii.com%2Fwp-content%2Fuploads%2F2021%2F08%2Fnewnew.gif&sp=1726159247T38a7807ce01f8f6efad36e0533c3174892ec21447573bf6a88c65216047f6025',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.2DEKPap6H31KwhBUk2CZYgAAAA%26pid%3DApi&sp=1726159247T97ef5f3aa76871ed4206d0c89c546698c98fbd5c7d1456807f89001d37199846'
];

// Setup Ads and Game when window loads
window.onload = function() {
    setGame(); // Setup the game board
    setupAds(); // Initialize ads
};

// Setup the game board (3x3 grid)
function setGame() {
    for (let i = 0; i < 9; i++) {
        let tile = document.createElement("div");
        tile.id = i.toString();
        tile.addEventListener("click", selectTile);
        document.getElementById("board").appendChild(tile);
    }
    setInterval(setMole, 1000);
    setInterval(setPlant, 2000);
}

// Random tile generator
function getRandomTile() {
    let num = Math.floor(Math.random() * 9);
    return num.toString();
}

// Set mole randomly on the board
function setMole() {
    if (gameOver) return;
    if (currMoleTile) currMoleTile.innerHTML = "";
    
    let mole = document.createElement("img");
    mole.src = "/img/monty-mole.png";
    
    let num = getRandomTile();
    if (currPlantTile && currPlantTile.id === num) return;
    
    currMoleTile = document.getElementById(num);
    currMoleTile.appendChild(mole);
}

// Set plant randomly on the board
function setPlant() {
    if (gameOver) return;
    if (currPlantTile) currPlantTile.innerHTML = "";
    
    let plant = document.createElement("img");
    plant.src = "/img/piranha-plant.png";
    
    let num = getRandomTile();
    if (currMoleTile && currMoleTile.id === num) return;
    
    currPlantTile = document.getElementById(num);
    currPlantTile.appendChild(plant);
}

// Handle tile click (score and game over logic)
function selectTile() {
    if (gameOver) return;
    if (this === currMoleTile) {
        score += 10;
        document.getElementById("score").innerText = score.toString();
    } else if (this === currPlantTile) {
        document.getElementById("score").innerText = "GAME OVER: " + score.toString();
        gameOver = true;
    }
}

// Setup Ads logic
function setupAds() {
    updateBanners(); // Initialize banners immediately
    setInterval(updateBanners, 60000); // Update banner ads every 1 minute
}

// Update banners with images or videos
function updateBanners() {
    const bannersArray = [
        document.querySelector('.banner-top-left'),
        document.querySelector('.banner-top-right'),
        document.querySelector('.banner-bottom-left'),
        document.querySelector('.banner-bottom-right'),
        document.querySelector('.banner-left'),
        document.querySelector('.banner-right'),
        document.querySelector('.banner-top'),
        document.querySelector('.banner-bottom')
    ];

    bannersArray.forEach(banner => banner.innerHTML = ''); // Clear existing content

    bannersArray.forEach((banner, index) => {
        const src = banners[(currentBannerIndex + index) % banners.length];
        if (src.endsWith('.mp4')) {
            let video = document.createElement('video');
            video.src = src;
            video.width = 200;
            video.height = 100;
            video.controls = true;
            banner.appendChild(video);
        } else {
            let img = document.createElement('img');
            img.src = src;
            img.alt = 'Banner';
            banner.appendChild(img);
        }
    });

    currentBannerIndex = (currentBannerIndex + 1) % banners.length;
}
