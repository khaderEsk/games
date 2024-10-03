<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Game | Korsat X Parmaga</title>

    <!-- styles -->
    <link rel="shortcut icon" href="{{ asset('assets/imgs/kxp_fav.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            /* لتمكين تموضع العناصر بشكل نسبي */
            overflow-x: hidden;
            /* منع التمرير الأفقي */
        }

        #game {
            flex-grow: 1;
            display: block;
            margin: auto;
            position: relative;
            /* لتمكين تموضع العناصر داخل اللعبة */
        }

        #player {
            /* تصميم اللاعب هنا */
        }

        #block {
            /* تصميم الكتلة هنا */
        }

        #score {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 24px;
            color: black;
        }

        /* Timer Styles */
        #timer {
            font-size: 1.2rem;
            color: saddlebrown;
            border: 2px solid brown;
            padding: 5px 10px;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* Logout Button Styles */
        .logout-btn {
            font-size: 1.2rem;
            padding: 10px 20px;
            background-color: saddlebrown;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            margin-left: 10px;
        }

        .logout-btn:hover {
            background-color: #ff5e7e;
        }

        /* Banner Styles */
        .banner {
            position: absolute;
            width: 150px;
            height: 110px;
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
            top: 70px;
            left: 10px;
        }

        .banner-left-2 {
            top: 200px;
            left: 10px;
        }

        .banner-left-3 {
            top: 330px;
            left: 10px;
        }

        .banner-bottom-left {
            bottom: 20px;
            left: 10px;
        }

        /* Right Banners */
        .banner-top-right {
            top: 70px;
            right: 10px;
        }

        .banner-right-2 {
            top: 200px;
            right: 10px;
        }

        .banner-right-3 {
            top: 330px;
            right: 10px;
        }

        .banner-bottom-right {
            bottom: 20px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div id="game">
        <div id="player"></div>
        <div id="block"></div>
        <div id="score">Score: 0</div>


    </div>

    <!-- Timer -->
    <div id="timer">Time: 00:00:00</div>
    <!-- Logout Button -->
    <button class="logout-btn" id="logout">Logout</button>

    <!-- Left Banners -->
    <div class="banner-top-left banner">
        <img src="assets/imgs/left-banner-top.jpg" alt="Top Left Banner">
    </div>
    <div class="banner-left-2 banner">
        <img src="assets/imgs/left-banner-2.jpg" alt="Left Banner 2">
    </div>
    <div class="banner-left-3 banner">
        <img src="assets/imgs/left-banner-3.jpg" alt="Left Banner 3">
    </div>
    <div class="banner-bottom-left banner">
        <img src="assets/imgs/left-banner-bottom.jpg" alt="Bottom Left Banner">
    </div>

    <!-- Right Banners -->
    <div class="banner-top-right banner">
        <img src="assets/imgs/right-banner-top.jpg" alt="Top Right Banner">
    </div>
    <div class="banner-right-2 banner">
        <img src="assets/imgs/right-banner-2.jpg" alt="Right Banner 2">
    </div>
    <div class="banner-right-3 banner">
        <img src="assets/imgs/right-banner-3.jpg" alt="Right Banner 3">
    </div>
    <div class="banner-bottom-right banner">
        <img src="assets/imgs/right-banner-bottom.jpg" alt="Bottom Right Banner">
    </div>

    <!-- link JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        let secondsElapsed = 0;
        let timerInterval;

        function startTimer() {
            timerInterval = setInterval(() => {
                secondsElapsed++;
                displayTime();
            }, 1000);
        }

        function displayTime() {
            let hours = Math.floor(secondsElapsed / 3600);
            let minutes = Math.floor((secondsElapsed % 3600) / 60);
            let seconds = secondsElapsed % 60;

            document.querySelector("#timer").innerHTML =
                `Time: ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }
        startTimer();

        function getHoursElapsed() {
            return Math.floor(secondsElapsed / 3600);
        }
        document.getElementById('logout').addEventListener('click', function() {
            fetch("{{ url('/update-stacking') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        seconds: secondsElapsed // إرسال قيمة الثواني
                    })
                })
                .then(response => {
                    // بعد نجاح الطلب، إعادة التوجيه إلى الصفحة المطلوبة
                    window.location.href = "{{ url('/index') }}";
                })
                .catch(error => {
                    console.error("حدث خطأ أثناء إرسال الطلب: ", error);
                    // في حالة حدوث خطأ، إعادة التوجيه إلى الصفحة المطلوبة
                    window.location.href = "{{ url('/index') }}";
                });
        });

        // Logout functionality
        
    </script>
</body>

</html>
