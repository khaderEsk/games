<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Start Game</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/start.png');

            /* تأكد من وجود الصورة في المسار المحدد */
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            background-size: contain;
            text-align: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            height: 100vh;
            /* تأكد من أن الجسم يغطي الشاشة بالكامل */
            display: flex;
            /* استخدام flexbox لتوسيع الجسم */
            align-items: center;
            /* محاذاة العمود في المنتصف */
            justify-content: center;
            /* محاذاة الصف في المنتصف */
        }

        .button {
            width: 100px;
            height: 100px;
            background-color: lime;
            /* خلفية خضراء */
            border-radius: 15px;
            /* زوايا مستديرة */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: darkgreen;
            /* لون عند المرور */
        }

        .play-icon {
            width: 0;
            height: 0;
            border-left: 25px solid white;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
        }


        /* Banner Styles */
        .banner {
            position: absolute;
            background-color: lightgray;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Specific banner positions */
        .banner-top-left {
            top: 0;
            left: 0;
            width: 200px;
            height: 150px;
        }

        .banner-top-right {
            top: 0;
            right: 0;
            width: 200px;
            height: 150px;
        }

        .banner-bottom-left {
            bottom: 0;
            left: 0;
            width: 200px;
            height: 150px;
        }

        .banner-bottom-right {
            bottom: 0;
            right: 0;
            width: 200px;
            height: 150px;
        }

        .banner-left {
            top: 100px;
            bottom: 100px;
            left: 0;
            width: 100px;
            height: calc(100% - 200px);
        }

        .banner-right {
            top: 100px;
            bottom: 100px;
            right: 0;
            width: 100px;
            height: calc(100% - 200px);
        }

        .branding {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            font-weight: bold;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body style="background-color: azure;">





    <!-- Branding -->
    <div class="branding">العلي لتصميم والجرافيك</div>
    <!-- Ads -->
    <div class="banner-top-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-left banner"></div>
    <div class="banner-bottom-right banner"></div>
    <div class="banner-left banner" style="margin-top: 30px;"></div>
    <div class="banner-right banner"></div>

    <a href="game1/level">
        <div class="button">
            <div class="play-icon"></div>
        </div>
    </a>
    <script>
        let currPlayer = 'O'; // يمكنك تغيير القيمة إلى 'X' إذا كنت تريد أن يبدأ اللاعب X
        const playerO = 'O';
        const playerX = 'X';
        let gameOver = false;

        const ads = [
            'https://i.pinimg.com/originals/95/ef/b8/95efb8425d270933e5e890b33ab5ef70.gif',
            'https://i.pinimg.com/originals/f4/17/75/f41775cff5073589e8c537968cd16cb8.gif',
            'https://i.pinimg.com/originals/61/4b/b4/614bb4d7982f87558039fc55fb223ef5.gif',
            'https://i.pinimg.com/originals/32/40/b0/3240b08b8c1d722625dfb9e5d73b7b11.gif',
            'https://i.pinimg.com/originals/51/5a/4e/515a4e80549b610821e378cf08462c59.gif',
            'https://i.pinimg.com/originals/36/4e/a6/364ea6cd7bfd00a0260aaf6e2602cd4d.gif',
            'https://i.pinimg.com/originals/95/ef/b8/95efb8425d270933e5e890b33ab5ef70.gif'
        ];
        let currentAdIndex = 0;

        window.onload = function() {
            setupAds();
        }

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
                        banners[key].innerHTML = ''; // Clear existing content
                        banners[key].appendChild(adImage.cloneNode(true)); // Add new ad
                    }
                }

                currentAdIndex = (currentAdIndex + 1) % ads.length;
            }

            updateAds(); // Initial ad
            setInterval(updateAds, 10000); // Change ad every 10 seconds
        }
    </script>

</body>

</html>
