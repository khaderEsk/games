const player = document.getElementById('player')
const block = document.getElementById('block')
const scoreElement = document.getElementById('score')
let score = 0;

// Function to move the player left
function moveLeft() {
    const curLeft = parseInt(window.getComputedStyle(player).getPropertyValue('left'));
    if (curLeft <= 0) return;
    const newLeft = curLeft - 100;
    player.style.left = newLeft + "px";
}

// Function to move the player right
function moveRight() {
    const curLeft = parseInt(window.getComputedStyle(player).getPropertyValue('left'));
    if (curLeft >= 200) return;
    const newLeft = curLeft + 100;
    player.style.left = newLeft + "px";
}

// Event listener for keyboard input
document.addEventListener('keydown', (event) => {
    if (event.key == "ArrowLeft") moveLeft();
    else if (event.key == "ArrowRight") moveRight();
})

// Event listener for block animation end
block.addEventListener('animationiteration', () => {
    const randPos = Math.floor((Math.random() * 3)) * 100;
    block.style.left = randPos + "px";
    score++;
    scoreElement.innerHTML = `Score: ${score}`;
})

// Function to check for collision
setInterval(() => {
    let playerLeft = parseInt(window.getComputedStyle(player).getPropertyValue('left'));
    let blockLeft = parseInt(window.getComputedStyle(block).getPropertyValue('left'));
    let blockTop = parseInt(window.getComputedStyle(block).getPropertyValue('top'));

    if (playerLeft == blockLeft && blockTop < 450 && blockTop > 310) {
        alert(`Game Over !!!!!!\n Your Score: ${score}`);
        block.style.top = -100 + 'px';
        score = 0;
        location.reload()
    }
}, 10) // Decreased interval time for more accurate collision detection

// Ad functionality
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

// Call setupAds function to initialize ads
setupAds();
