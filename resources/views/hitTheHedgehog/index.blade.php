<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whac a Mole</title>
    <link rel="stylesheet" href="{{ asset('css/mole.css') }}">
    <script src="{{ asset('js/mole.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
            /* لتمكين تموضع العناصر بشكل نسبي */
        }

        h1 {
            margin-top: 20px;
        }

        #score {
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
            margin-right: 20px;
            /* تباعد بين المؤقت وزر الخروج */
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
        }

        .logout-btn:hover {
            background-color: #ff5e7e;
        }

        /* Flex Container for Timer and Logout Button */
        .timer-logout-container {
            display: flex;
            /* استخدام فليكس لتمكين الوضع بجانب بعض */
            align-items: center;
            /* محاذاة عمودية في المنتصف */
            margin-top: 10px;
            /* تباعد بين العنوان والعداد وزر الخروج */
        }

        /* Banner Container */
        .banner-container {
            position: absolute;
            top: 10px;
            /* موضع البانرات العمودية */
            display: flex;
            flex-direction: column;
            /* وضع البانرات فوق بعضها */
            gap: 10px;
            /* تباعد بين البانرات */
        }

        /* Right Banners */
        .banner-right {
            right: 10px;
            /* محاذاة من الجهة اليمنى */
        }

        /* Left Banners */
        .banner-left {
            left: 10px;
            /* محاذاة من الجهة اليسرى */
        }

        /* Banner Styles */
        .banner {
            width: 150px;
            height: 100px;
            /* يمكنك تعديل الارتفاع حسب الحاجة */
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h1>العلي للتصميم والجرافيك</h1>
    <h2 id="score">0</h2>

    <!-- Flex Container for Timer and Logout Button -->
    <div class="timer-logout-container">
        <div id="timer">Time: 00:00:00</div>
        <button class="logout-btn" id="logout">Logout</button>
    </div>

    <!-- Left Banners Container -->
    <div class="banner-container banner-left">
        <div class="banner"><img src="assets/imgs/banner1.jpg" alt="Banner 1"></div>
        <div class="banner"><img src="assets/imgs/banner2.jpg" alt="Banner 2"></div>
        <div class="banner"><img src="assets/imgs/banner3.jpg" alt="Banner 3"></div>
        <div class="banner"><img src="assets/imgs/banner4.jpg" alt="Banner 4"></div>
        <div class="banner"><img src="assets/imgs/banner5.jpg" alt="Banner 5"></div>
        <div class="banner"><img src="assets/imgs/banner6.jpg" alt="Banner 6"></div>
    </div>

    <!-- Right Banners Container -->
    <div class="banner-container banner-right">
        <div class="banner"><img src="assets/imgs/banner7.jpg" alt="Banner 7"></div>
        <div class="banner"><img src="assets/imgs/banner8.jpg" alt="Banner 8"></div>
        <div class="banner"><img src="assets/imgs/banner9.jpg" alt="Banner 9"></div>
        <div class="banner"><img src="assets/imgs/banner10.jpg" alt="Banner 10"></div>
        <div class="banner"><img src="assets/imgs/banner11.jpg" alt="Banner 11"></div>
        <div class="banner"><img src="assets/imgs/banner12.jpg" alt="Banner 12"></div>
    </div>

    <!-- Game Board (3x3 Grid) -->
    <div id="board"></div>

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
