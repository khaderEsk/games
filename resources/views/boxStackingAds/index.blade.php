<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#111A2B">
    <meta name="msapplication-navbutton-color" content="#111121">
    <link rel="icon" href="/assets/images/icon.png">
    <link rel="stylesheet" href="/css/styleBoxStackingAds.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Box Stacking Game</title>
    <style>
        #timer {
            display: none;
            /* Hide the timer initially */
            font-size: 2rem;
            color: #FF2E63;
            position: absolute;
            top: 0;
            left: 50%;
            /* Center it horizontally */
            transform: translateX(-50%);
            /* Adjust for the width of the timer text */
            border: 2px solid;
            border-color: #FF2E63;
            padding: 10px;
            z-index: 10;
            /* Ensure it's above other elements */
        }

        #logout {
            position: absolute;
            top: 10px;
            right: 50px;
            /* Position it at the top right */
            padding: 10px 15px;
            font-size: 1rem;
            width: 100px;
            background-color: #FF2E63;
            /* Button color */
            color: white;
            /* Text color */
            border: none;
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
        }

        #logout:hover {
            background-color: #FF4F83;
            /* Lighter shade on hover */
        }

        /* Banner Styles */
        .banner {
            position: absolute;
            width: 150px;
            height: 105px;
            background-color: lightgray;
            margin-bottom: 10px;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Left Banners */
        .banner-top-left {
            top: 85px;
            left: 10px;
        }

        .banner-left-2 {
            top: 205px;
            left: 10px;
        }

        .banner-left-3 {
            top: 330px;
            left: 10px;
        }

        .banner-bottom-left {
            bottom: 10px;
            left: 10px;
        }

        /* Right Banners */
        .banner-top-right {
            top: 85px;
            right: 10px;
        }

        .banner-right-2 {
            top: 205px;
            right: 10px;
        }

        .banner-right-3 {
            top: 330px;
            right: 10px;
        }

        .banner-bottom-right {
            bottom: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>

    <div class="scene"></div>
    <h2>0</h2>

    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
        <h1 class="loading-text">Loading ...</h1>
    </div>

    <div class="score-page">
        <div class="score-card">
            <p class="score-text">Final Score</p>
            <h1 class="score-value">0</h1>
            <button class="play-again" id='out'>Play Again</button>
        </div>
    </div>

    <div class="welcome">
        <div id="particles-js1"></div>
        <div class="game-name">
            <h1 class="original-name">Box Stacking Game</h1>
            <p class="tag">Don't lose your box</p>
        </div>
        <p class="description">Click/Tap on the screen to capture boxes</p>
        <button class="try-now">Play Now</button>
        <p class="developed">العلي للجرافيك والديزين</p>
    </div>

    <!-- Timer and Logout Button -->
    {{-- <div id="timer" style="margin-top: 20px;">Time: 00:00:00</div> --}}
    <button id="logout">Logout</button>
    <div id="timer" style="display:none;"></div>

    <!-- Left Banners -->
    <div class="banner-top-left banner">
        <img src="left-banner-top.jpg" alt="Top Left Banner">
    </div>
    <div class="banner-left-2 banner">
        <img src="left-banner-2.jpg" alt="Left Banner 2">
    </div>
    <div class="banner-left-3 banner">
        <img src="left-banner-3.jpg" alt="Left Banner 3">
    </div>
    <div class="banner-bottom-left banner">
        <img src="left-banner-bottom.jpg" alt="Bottom Left Banner">
    </div>

    <!-- Right Banners -->
    <div class="banner-top-right banner">
        <img src="right-banner-top.jpg" alt="Top Right Banner">
    </div>
    <div class="banner-right-2 banner">
        <img src="right-banner-2.jpg" alt="Right Banner 2">
    </div>
    <div class="banner-right-3 banner">
        <img src="right-banner-3.jpg" alt="Right Banner 3">
    </div>
    <div class="banner-bottom-right banner">
        <img src="right-banner-bottom.jpg" alt="Bottom Right Banner">
    </div>

    <audio src="/assets/music/sound.mp3" autoplay="false" loop></audio>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r126/three.min.js"></script>
    <script src="/js/particle.js"></script>
    <script src="/js/app.js"></script>

    <script>
        let secondsElapsed = 0;
        let timerInterval;

        // Start the timer and update the display
        function startTimer() {
            document.getElementById('timer').style.display = 'block'; // Show the timer
            timerInterval = setInterval(() => {
                secondsElapsed++;
                displayTime();
            }, 1000);
        }

        // Display the timer in HH:MM:SS format
        function displayTime() {
            let hours = Math.floor(secondsElapsed / 3600);
            let minutes = Math.floor((secondsElapsed % 3600) / 60);
            let seconds = secondsElapsed % 60;
            document.querySelector("#timer").innerHTML =
                `Time: ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        // Call startTimer when the "Play Now" button is clicked
        document.querySelector('.try-now').addEventListener('click', function() {
            startTimer();
        })
        document.getElementById('logout').addEventListener('click', function() {
            window.location.href = "{{ url('/index') }}";
        });

        function getHoursElapsed() {
            return Math.floor(secondsElapsed / 3600);
        }

        document.getElementById('out').addEventListener('click', function() {
            console.log('تم الضغط على زر Logout');

            fetch("{{ url('/update-stacking') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        seconds: secondsElapsed
                    })
                })
                .catch(error => {
                    console.error("حدث خطأ أثناء إرسال الطلب: ", error);
                });
        });
    </script>
</body>

</html>
