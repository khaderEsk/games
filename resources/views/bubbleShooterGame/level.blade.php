<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Level Game</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('https://i.pinimg.com/564x/9e/e2/92/9ee2927464259039e4e849ff00b9a657.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            background-size: contain;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }


        .container {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .info-bar {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(255, 228, 196, 0.9);
            border-radius: 10px;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            width: 410px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .info-bar img {
            width: 40px;
            /* حجم الرموز */
            height: 40px;
            margin: 0 10px;
        }

        .full-status {
            border: 2px solid brown;
            /* لون الإطار بني */
            border-radius: 15px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
            position: relative;
            /* لتسهيل وضع الزر */
            margin-right: 10px;
            /* مسافة بين الزر والنص */
        }

        .full-status button {
            top: 18px;
            margin-left: 27px;
            position: absolute;
            background-color: green;
            color: white;
            border: none;
            border-radius: 15px;
            width: 25px;
            height: 25px;
            cursor: pointer;
        }

        .level-button {
            position: absolute;
            width: 40px;
            height: 40px;
            background-color: red;
            border-radius: 50%;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .level-button:hover {
            background-color: darkred;
        }

        /* Positioning the level buttons */
        .level-1 {
            top: 90%;
            left: 48%;
        }

        .level-2 {
            top: 82%;
            left: 51%;
        }

        .level-3 {
            top: 76%;
            left: 55%;
        }

        .level-4 {
            top: 70%;
            left: 60%;
        }

        .level-5 {
            top: 63%;
            left: 55%;
        }

        .level-6 {
            top: 54%;
            left: 53%;
        }

        .level-7 {
            top: 47%;
            left: 57%;
        }

        .level-8 {
            top: 40%;
            left: 59%;
        }

        .level-9 {
            top: 34%;
            left: 56%;
        }

        .level-10 {
            top: 25%;
            left: 55%;
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
            width: 300px;
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

        /* Modal (Card) Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: black;
        }

        .modal button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal button:hover {
            background-color: darkgreen;
        }

        .lives {
            font-size: 18px;
            margin-left: 10px;
        }
    </style>
</head>

<body style="background-color: azure;">

    <!-- Ads -->
    <div class="banner-top-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-left banner"></div>
    <div class="banner-bottom-right banner"></div>
    <div class="banner-left banner" style="margin-top: 30px;"></div>
    <div class="banner-right banner"></div>

    <div class="container">


        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <p>شاهد إعلان لتحصل على مكافأة!</p>
                <button onclick="closeModal()">حسنًا</button>
            </div>
        </div>

        <!-- Info Bar -->
        <div class="info-bar">
            <img src="{{ asset('img/heart.png') }}" alt="Heart Icon">
            <div class="full-status">
                <span>Lives: </span>
                <span class="lives">5</span>
                <button onclick="showModal()" style="margin-left: 50px;">+</button>
            </div>

            <img src="{{ asset('img/cans.png') }}" alt="Chest Icon"
                style="margin-left: 50px;border: 2px solid brown;border-radius: 15px;">
            <img src="{{ asset('img/coin.png') }}" alt="Money Icon" style="margin-left: 50px;">
            <div class="full-status">
                <span>00$</span>
                <button onclick="showModal()">+</button>
            </div>
        </div>

        <a href="bubble-shooter"><button class="level-button level-1">1</button></a>
        <a href="bubble2"><button class="level-button level-2">2</button></a>
        <a href="bubble3"><button class="level-button level-3">3</button></a>
        <a href="bubble4"><button class="level-button level-4">4</button></a>
        <a href="bubble5"><button class="level-button level-5">5</button></a>
        <a href="bubble6"><button class="level-button level-6">6</button></a>
        <a href="bubble7"><button class="level-button level-7">7</button></a>
        <a href="bubble8"><button class="level-button level-8">8</button></a>
        <a href="bubble-shooter"><button class="level-button level-9">9</button></a>
        <a href="end"><button class="level-button level-10">10</button></a>
    </div>

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

    <script>
        function showModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script>

    <script src="tictactoe.js" defer></script>
</body>

</html>
