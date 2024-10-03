// Ads
const ads = [
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fmedia.tenor.com%2FZp_zLqDBS78AAAAC%2F%25D9%2585%25D8%25AD%25D9%2585%25D8%25AF-%25D9%2585%25D9%2586%25D9%258A%25D8%25B1.gif&sp=1726157313T6198ee6770ff3c06314ec1a9d50f1c09bd4000a38009f3ca4c5982a5d3aa1527',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.UIpm9AVFG4vzdhGJon5TGQAAAA%26pid%3DApi&sp=1726157544T24e9fafc5fbdda457c113f67e0b145b40c45f0f3a63ec263f2835bc106e7acf5',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fyoucanad.com%2Fwp-content%2Fuploads%2F2023%2F10%2Fwet.gif&sp=1726157505Tb4cca0695fa27bcfcc154a6c6774e6122618f85835dd69a79bcf6ff828322e07',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.syq8gUQPXoqQ3PHaHI5wOwHaHa%26pid%3DApi&sp=1726157505T8927dfd1cbc606459232e67e54d6e351507f1bcea3ae2fd52326f2f50c3fb6ff',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F27%2F94%2F6a%2F27946a99657cddf0cbde79a7e4e6f51f.gif&sp=1726157690T03cd49f4d919d6e853402122e2e3b5d26a1c1ccc97b882c18804aa64299974c7',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Fmadrassatii.com%2Fwp-content%2Fuploads%2F2021%2F08%2Fnewnew.gif&sp=1726159247T38a7807ce01f8f6efad36e0533c3174892ec21447573bf6a88c65216047f6025',
    'https://www.startpage.com/av/proxy-image?piurl=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.2DEKPap6H31KwhBUk2CZYgAAAA%26pid%3DApi&sp=1726159247T97ef5f3aa76871ed4206d0c89c546698c98fbd5c7d1456807f89001d37199846'
];
let currentAdIndex = 0;

function setupAds() {
    const banners = {
        'banner-top-left': document.querySelector('.banner-top-left'),
        'banner-top-right': document.querySelector('.banner-top-right'),
        'banner-bottom-left': document.querySelector('.banner-bottom-left'),
        'banner-bottom-right': document.querySelector('.banner-bottom-right'),
        'banner-left': document.querySelector('.banner-left'),
        'banner-right': document.querySelector('.banner-right')
    };

    function updateAds() {
        const adImage = document.createElement('img');
        adImage.src = ads[currentAdIndex];
        adImage.alt = 'Advertisement';
        
        for (const key in banners) {
            if (banners[key]) {
                banners[key].innerHTML = '';
                banners[key].appendChild(adImage.cloneNode(true));
            }
        }

        currentAdIndex = (currentAdIndex + 1) % ads.length;
    }

    updateAds(); // Initial ad
    setInterval(updateAds, 10000); // Change ad every 10 seconds
}

// Board
let board;
let boardWidth = 500;
let boardHeight = 500;
let context; 

// Player
let playerWidth = 80; // 500 for testing, 80 normal
let playerHeight = 10;
let playerVelocityX = 10; // move 10 pixels each time

let player = {
    x: boardWidth / 2 - playerWidth / 2,
    y: boardHeight - playerHeight - 5,
    width: playerWidth,
    height: playerHeight,
    velocityX: playerVelocityX
};

// Ball
let ballWidth = 10;
let ballHeight = 10;
let ballVelocityX = 3; // 15 for testing, 3 normal
let ballVelocityY = 2; // 10 for testing, 2 normal

let ball = {
    x: boardWidth / 2,
    y: boardHeight / 2,
    width: ballWidth,
    height: ballHeight,
    velocityX: ballVelocityX,
    velocityY: ballVelocityY
};

// Blocks
let blockArray = [];
let blockWidth = 50;
let blockHeight = 10;
let blockColumns = 8; 
let blockRows = 3; // add more as game goes on
let blockMaxRows = 10; // limit how many rows
let blockCount = 0;

// Starting block corners top left 
let blockX = 15;
let blockY = 45;

let score = 0;
let gameOver = false;

window.onload = function() {
    board = document.getElementById("board");
    board.height = boardHeight;
    board.width = boardWidth;
    context = board.getContext("2d"); // used for drawing on the board

    // Draw initial player
    context.fillStyle = "skyblue";
    context.fillRect(player.x, player.y, player.width, player.height);

    requestAnimationFrame(update);
    document.addEventListener("keydown", movePlayer);

    // Create blocks
    createBlocks();

    // Setup ads
    setupAds();
};

function update() {
    requestAnimationFrame(update);
    // Stop drawing
    if (gameOver) {
        return;
    }
    context.clearRect(0, 0, board.width, board.height);

    // Player
    context.fillStyle = "lightgreen";
    context.fillRect(player.x, player.y, player.width, player.height);

    // Ball
    context.fillStyle = "white";
    ball.x += ball.velocityX;
    ball.y += ball.velocityY;
    context.fillRect(ball.x, ball.y, ball.width, ball.height);

    // Bounce the ball off player paddle
    if (topCollision(ball, player) || bottomCollision(ball, player)) {
        ball.velocityY *= -1; // flip y direction up or down
    } else if (leftCollision(ball, player) || rightCollision(ball, player)) {
        ball.velocityX *= -1; // flip x direction left or right
    }

    if (ball.y <= 0) { 
        // if ball touches top of canvas
        ball.velocityY *= -1; // reverse direction
    } else if (ball.x <= 0 || (ball.x + ball.width >= boardWidth)) {
        // if ball touches left or right of canvas
        ball.velocityX *= -1; // reverse direction
    } else if (ball.y + ball.height >= boardHeight) {
        // if ball touches bottom of canvas
        context.font = "20px sans-serif";
        context.fillText("Game Over: Press 'Space' to Restart", 80, 400);
        gameOver = true;
    }

    // Blocks
    context.fillStyle = "skyblue";
    for (let i = 0; i < blockArray.length; i++) {
        let block = blockArray[i];
        if (!block.break) {
            if (topCollision(ball, block) || bottomCollision(ball, block)) {
                block.break = true; // block is broken
                ball.velocityY *= -1; // flip y direction up or down
                score += 100;
                blockCount -= 1;
            } else if (leftCollision(ball, block) || rightCollision(ball, block)) {
                block.break = true; // block is broken
                ball.velocityX *= -1; // flip x direction left or right
                score += 100;
                blockCount -= 1;
            }
            context.fillRect(block.x, block.y, block.width, block.height);
        }
    }

    // Next level
    if (blockCount == 0) {
        score += 100 * blockRows * blockColumns; // bonus points :)
        blockRows = Math.min(blockRows + 1, blockMaxRows);
        createBlocks();
    }

    // Score
    context.font = "20px sans-serif";
    context.fillText(score, 10, 25);
}

function outOfBounds(xPosition) {
    return (xPosition < 0 || xPosition + playerWidth > boardWidth);
}

function movePlayer(e) {
    if (gameOver) {
        if (e.code == "Space") {
            resetGame();
            console.log("RESET");
        }
        return;
    }
    if (e.code == "ArrowLeft") {
        let nextPlayerX = player.x - player.velocityX;
        if (!outOfBounds(nextPlayerX)) {
            player.x = nextPlayerX;
        }
    } else if (e.code == "ArrowRight") {
        let nextPlayerX = player.x + player.velocityX;
        if (!outOfBounds(nextPlayerX)) {
            player.x = nextPlayerX;
        }
    }
}

function detectCollision(a, b) {
    return a.x < b.x + b.width &&   // a's top left corner doesn't reach b's top right corner
           a.x + a.width > b.x &&   // a's top right corner passes b's top left corner
           a.y < b.y + b.height &&  // a's top left corner doesn't reach b's bottom left corner
           a.y + a.height > b.y;    // a's bottom left corner passes b's top left corner
}

function topCollision(ball, block) { // a is above b (ball is above block)
    return detectCollision(ball, block) && (ball.y + ball.height) >= block.y;
}

function bottomCollision(ball, block) { // a is below b (ball is below block)
    return detectCollision(ball, block) && (block.y + block.height) >= ball.y;
}

function leftCollision(ball, block) { // a is left of b (ball is left of block)
    return detectCollision(ball, block) && (ball.x + ball.width) >= block.x;
}

function rightCollision(ball, block) { // a is right of b (ball is right of block)
    return detectCollision(ball, block) && (block.x + block.width) >= ball.x;
}

function createBlocks() {
    blockArray = []; // clear blockArray
    for (let c = 0; c < blockColumns; c++) {
        for (let r = 0; r < blockRows; r++) {
            let block = {
                x: blockX + c * blockWidth + c * 10, // c * 10 space 10 pixels apart columns
                y: blockY + r * blockHeight + r * 10, // r * 10 space 10 pixels apart rows
                width: blockWidth,
                height: blockHeight,
                break: false
            }
            blockArray.push(block);
        }
    }
    blockCount = blockArray.length;
}

function resetGame() {
    gameOver = false;
    player = {
        x: boardWidth / 2 - playerWidth / 2,
        y: boardHeight - playerHeight - 5,
        width: playerWidth,
        height: playerHeight,
        velocityX: playerVelocityX
    }
    ball = {
        x: boardWidth / 2,
        y: boardHeight / 2,
        width: ballWidth,
        height: ballHeight,
        velocityX: ballVelocityX,
        velocityY: ballVelocityY
    }
    blockArray = [];
    blockRows = 3;
    score = 0;
    createBlocks();
}
