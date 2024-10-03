<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breakout</title>
    <link rel="stylesheet" href="{{ asset('css/breakout.css') }}">
    <script src="{{ asset('js/breakout.js') }}" defer></script>


    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: relative;
            /* للسماح بوضع اللافتات بشكل مطلق */
            overflow-x: hidden;
            /* لمنع التمرير الأفقي */
        }

        #board {
            flex-grow: 1;
            display: block;
            margin: auto;
        }

        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            font-size: 1.3rem;
            position: relative;
        }

        /* Timer Styles */
        #timer {
            font-size: 1.2rem;
            color: #FF2E63;
            border: 2px solid #FF2E63;
            padding: 5px 10px;
            border-radius: 5px;
        }

        /* Logout Button Styles */
        .logout-btn {
            font-size: 1.2rem;
            padding: 10px 20px;
            background-color: #FF2E63;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
            top: 65px;
            left: 10px;
        }

        .banner-left-2 {
            top: 190px;
            left: 10px;
        }

        .banner-left-3 {
            top: 320px;
            left: 10px;
        }

        .banner-bottom-left {
            bottom: 34px;
            left: 10px;
        }

        /* Right Banners */
        .banner-top-right {
            top: 65px;
            right: 10px;
        }

        .banner-right-2 {
            top: 190px;
            right: 10px;
        }

        .banner-right-3 {
            top: 320px;
            right: 10px;
        }

        .banner-bottom-right {
            bottom: 34px;
            right: 10px;
        }

        footer {
            margin-top: 8px;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 18px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Header with Timer and Logout Button -->
    <header>
        <div id="timer">Time: 00:00:00</div>
        <div>العلي للتصميم والجرافيك</div>
        <button class="logout-btn" id= 'logout'>Logout</button>
    </header>

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

    <canvas id="board"></canvas>

    <footer>
        &copy; 2024 العلي للتصميم والجرافيك
    </footer>

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
    </script>
</body>

</html>
