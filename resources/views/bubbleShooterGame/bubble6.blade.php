<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bubble Shooter Game</title>
    <script type='text/javascript' src="{{ asset('js/bubbleShooterExample.js') }}"></script>
    <style>
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

        /* Footer Styles */
        footer {
            position: absolute;
            bottom: -65px; 
            left: 0;
            width: 66.8%;
            height: 24px;
            margin-left: 200px;
            
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        /* Timer Styles */
        .timer {
            position: absolute;
            top: 20px;
            left: 250px; /* Adjusted to be next to the canvas */
            color: black;
            font-size: 30px;
            font-weight: bold;
            border: 2px solid green; /* Green border */
            padding: 10px; /* Padding inside the box */
            background-color: white; /* Background color for visibility */
            border-radius: 5px; /* Rounded corners */
        }

        canvas {
            margin-left: 25%;
        }
    </style>
</head>
<body style="background-image: url('https://i.pinimg.com/564x/a4/e4/86/a4e4862741b358e15eb2129b8155c741.jpg'); 
             background-size: cover; 
             background-repeat: no-repeat; 
             background-position: center; 
             height: 100vh; 
             margin: 0;">
    <!-- Ads -->
    <div class="banner-top-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-left banner" style="margin-bottom:-75px;"></div>
    <div class="banner-bottom-right banner" style="margin-bottom:-75px;"></div>
    <div class="banner-left banner" style="margin-top: 30px;"></div>
    <div class="banner-right banner" style="margin-top: 30px;"></div>

    <canvas id="viewport" width="628" height="628"></canvas>

    <!-- Timer Display -->
    <div class="timer" id="timer">60</div>

    <footer>
        <p>&copy; 2024 العلي لتصميم والجرافيك.</p>
    </footer>

    <script>
        let currPlayer = 'O'; 
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
        let timeLeft = 60; // Declare timeLeft as a global variable

        window.onload = function() {
            setupAds();
            startTimer(); // Start the timer when the window loads
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
          // Timer function
      function startTimer() {
    const timerDisplay = document.getElementById('timer');
    const countdown = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(countdown);
            timerDisplay.innerHTML = "Time's Up!";
            // You can add logic to end the game here
        } else {
            timeLeft--; // Decrement timeLeft before updating display
            timerDisplay.innerHTML = timeLeft; // Update the display with the current timeLeft
        }
    }, 1000);
}

    </script>
</body>
</html>
