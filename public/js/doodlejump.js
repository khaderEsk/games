let board;
let boardWidth = 360;
let boardHeight = 576;
let context;

let doodlerWidth = 46;
let doodlerHeight = 46;
let doodlerX = boardWidth / 2 - doodlerWidth / 2;
let doodlerY = boardHeight * 7 / 8 - doodlerHeight;
let doodlerRightImg;
let doodlerLeftImg;

let doodler = {
    img: null,
    x: doodlerX,
    y: doodlerY,
    width: doodlerWidth,
    height: doodlerHeight
}

let velocityX = 0;
let velocityY = 0;
let initialVelocityY = -8;
let gravity = 0.4;

let platformArray = [];
let platformWidth = 60;
let platformHeight = 18;
let platformImg;

let score = 0;
let maxScore = 0;
let gameOver = false;
let currentBannerIndex = 0;

const banners = [
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fmedia.tenor.com%2FZp_zLqDBS78AAAAC%2F%25D9%2585%25D8%25AD%25D9%2585%25D8%25AF-%25D9%2585%25D9%2586%25D9%258A%25D8%25B1.gif&sp=1726157313T6198ee6770ff3c06314ec1a9d50f1c09bd4000a38009f3ca4c5982a5d3aa1527',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.UIpm9AVFG4vzdhGJon5TGQAAAA%26pid%3DApi&sp=1726157544T24e9fafc5fbdda457c113f67e0b145b40c45f0f3a63ec263f2835bc106e7acf5',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fyoucanad.com%2Fwp-content%2Fuploads%2F2023%2F10%2Fwet.gif&sp=1726157505Tb4cca0695fa27bcfcc154a6c6774e6122618f85835dd69a79bcf6ff828322e07',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.syq8gUQPXoqQ3PHaHI5wOwHaHa%26pid%3DApi&sp=1726157505T8927dfd1cbc606459232e67e54d6e351507f1bcea3ae2fd52326f2f50c3fb6ff',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F27%2F94%2F6a%2F27946a99657cddf0cbde79a7e4e6f51f.gif&sp=1726157690T03cd49f4d919d6e853402122e2e3b5d26a1c1ccc97b882c18804aa64299974c7',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fmadrassatii.com%2Fwp-content%2Fuploads%2F2021%2F08%2Fnewnew.gif&sp=1726159247T38a7807ce01f8f6efad36e0533c3174892ec21447573bf6a88c65216047f6025',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.2DEKPap6H31KwhBUk2CZYgAAAA%26pid%3DApi&sp=1726159247T97ef5f3aa76871ed4206d0c89c546698c98fbd5c7d1456807f89001d37199846',
];

window.onload = function () {
    board = document.getElementById("board");
    board.height = boardHeight;
    board.width = boardWidth;
    context = board.getContext("2d");

    doodlerRightImg = new Image();
    doodlerRightImg.src = "img2/doodler-right.png";
    doodler.img = doodlerRightImg;
    doodlerRightImg.onload = function () {
        context.drawImage(doodler.img, doodler.x, doodler.y, doodler.width, doodler.height);
    }

    doodlerLeftImg = new Image();
    doodlerLeftImg.src = "/img2/doodler-left.png";

    platformImg = new Image();
    platformImg.src = "/img2/platform.png";

    velocityY = initialVelocityY;
    placePlatforms();
    requestAnimationFrame(update);
    document.addEventListener("keydown", moveDoodler);

    setupAds(); // Initialize ads
}

function update() {
    requestAnimationFrame(update);
    if (gameOver) {
        return;
    }
    context.clearRect(0, 0, board.width, board.height);

    doodler.x += velocityX;
    if (doodler.x > boardWidth) {
        doodler.x = 0;
    } else if (doodler.x + doodler.width < 0) {
        doodler.x = boardWidth;
    }

    velocityY += gravity;
    doodler.y += velocityY;
    if (doodler.y > board.height) {
        gameOver = true;
    }
    context.drawImage(doodler.img, doodler.x, doodler.y, doodler.width, doodler.height);

    for (let i = 0; i < platformArray.length; i++) {
        let platform = platformArray[i];
        if (velocityY < 0 && doodler.y < boardHeight * 3 / 4) {
            platform.y -= initialVelocityY;
        }
        if (detectCollision(doodler, platform) && velocityY >= 0) {
            velocityY = initialVelocityY;
        }
        context.drawImage(platform.img, platform.x, platform.y, platform.width, platform.height);
    }

    while (platformArray.length > 0 && platformArray[0].y >= boardHeight) {
        platformArray.shift();
        newPlatform();
    }

    updateScore();
    context.fillStyle = "black";
    context.font = "16px sans-serif";
    context.fillText(score, 5, 20);

    if (gameOver) {
        context.fillText("Game Over: Press 'Space' to Restart", boardWidth / 7, boardHeight * 7 / 8);
    }
}

function moveDoodler(e) {
    if (e.code == "ArrowRight" || e.code == "KeyD") {
        velocityX = 4;
        doodler.img = doodlerRightImg;
    } else if (e.code == "ArrowLeft" || e.code == "KeyA") {
        velocityX = -4;
        doodler.img = doodlerLeftImg;
    } else if (e.code == "Space" && gameOver) {
        doodler = {
            img: doodlerRightImg,
            x: doodlerX,
            y: doodlerY,
            width: doodlerWidth,
            height: doodlerHeight
        }

        velocityX = 0;
        velocityY = initialVelocityY;
        score = 0;
        maxScore = 0;
        gameOver = false;
        placePlatforms();
    }
}

function placePlatforms() {
    platformArray = [];

    let platform = {
        img: platformImg,
        x: boardWidth / 2,
        y: boardHeight - 50,
        width: platformWidth,
        height: platformHeight
    }

    platformArray.push(platform);

    for (let i = 0; i < 6; i++) {
        let randomX = Math.floor(Math.random() * boardWidth * 3 / 4);
        let platform = {
            img: platformImg,
            x: randomX,
            y: boardHeight - 75 * i - 150,
            width: platformWidth,
            height: platformHeight
        }

        platformArray.push(platform);
    }
}

function newPlatform() {
    let randomX = Math.floor(Math.random() * boardWidth * 3 / 4);
    let platform = {
        img: platformImg,
        x: randomX,
        y: -platformHeight,
        width: platformWidth,
        height: platformHeight
    }

    platformArray.push(platform);
}

function detectCollision(a, b) {
    return a.x < b.x + b.width &&
        a.x + a.width > b.x &&
        a.y < b.y + b.height &&
        a.y + a.height > b.y;
}

function updateScore() {
    let points = Math.floor(50 * Math.random());
    if (velocityY < 0) {
        maxScore += points;
        if (score < maxScore) {
            score = maxScore;
        }
    } else if (velocityY >= 0) {
        maxScore -= points;
    }
}

function setupAds() {
    const banners = document.querySelectorAll('.banner');
    
    banners.forEach((banner) => {
        const img = document.createElement('img');
        img.src = banners[currentBannerIndex];
        img.style.width = '100%';
        img.style.height = '100%';
        banner.appendChild(img);
    });

    setInterval(() => {
        currentBannerIndex = (currentBannerIndex + 1) % banners.length;
        banners.forEach((banner) => {
            const img = banner.querySelector('img');
            img.src = banners[currentBannerIndex];
        });
    }, 10000); // Change banner every 10 seconds
}
