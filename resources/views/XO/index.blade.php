<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <style>
        * {
            color: white;
            font-family: sans-serif;
            transition: 0.2s ease-in-out;
            user-select: none;
        }

        .align {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            background-color: #252A34;
            margin: 0;
            padding: 0;
            width: 100vw;
            text-align: center;
            padding-top: 5vh;
            position: relative;
            /* Added for banner positioning */
        }

        #logout {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FF2E63;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .turn-container {
            width: 170px;
            height: 80px;
            margin: auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            position: relative;
        }

        .turn-container h3 {
            margin: 0;
            grid-column-start: 1;
            grid-column-end: 3;
        }

        .turn-container .turn-box {
            border: 3px solid #000;
            font-size: 1.6rem;
            font-weight: 700;
        }

        .turn-container .turn-box:nth-child(even) {
            border-right: none;
        }

        .bg {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 85px;
            height: 40px;
            background-color: #FF2E63;
            z-index: -1;
        }

        .main-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            height: 250px;
            width: 250px;
            margin: 30px auto;
            border: 2px solid #000;
        }

        .box {
            cursor: pointer;
            font-size: 2rem;
            font-weight: 700;
            border: 2px solid #000;
        }

        .box:hover {
            background-color: #FF2E63;
        }

        #play-again {
            background-color: #FF2E63;
            padding: 10px 25px;
            border: none;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            display: none;
        }

        #play-again:hover {
            padding: 10px 40px;
            background-color: #08D9D6;
            color: #000;
        }

        #timer {
            font-size: 2rem;
            color: #FF2E63;
            position: absolute;
            top: 10px;
            right: 100px;
            border: 2px solid;
            border-color: #FF2E63;
            padding: 10px;
        }

        /* Banner Styles */
        .banner {
            position: absolute;
            background-color: lightgray;
        }

        .banner-top-left {
            top: 0;
            left: 0;
            width: 200px;
            height: 150px;
        }

        .banner-bottom-left {
            top: 450px;
            left: 0;
            width: 200px;
            height: 150px;
        }

        .banner-left {
            top: 120px;
            bottom: 100px;
            left: 0;
            width: 100px;
            height: 330px;
        }

        .banner-top-right {
            top: 85px;
            right: 50px;
            width: 200px;
            height: 150px;
        }

        .banner-bottom-right {
            top: 360px;
            right: 50px;
            width: 200px;
            height: 170px;
        }

        .banner-right {
            top: 160px;
            bottom: 100px;
            right: 0;
            width: 100px;
            height: calc(100% - 200px);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <button id="logout">Logout</button>

    <div class="turn-container">
        <h3 style="font-size: 22px;">العلي للجرافيك والديزين</h3>
        <div class="turn-box align">X</div>
        <div class="turn-box align">O</div>
        <div class="bg"></div>
    </div>

    <div id="timer" style="margin-top: 240px;">Time: 00:00:00</div>

    <div class="banner-top-left banner"></div>
    <div class="banner-bottom-left banner"></div>
    <div class="banner-left banner"></div>
    <div class="banner-bottom-left banner" style="margin-left: 500px;height: 70px;margin-top: 80px; width: 400px;">
    </div>

    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-right banner"></div>

    <div class="main-grid">
        <div class="box align">0</div>
        <div class="box align">1</div>
        <div class="box align">2</div>
        <div class="box align">3</div>
        <div class="box align">4</div>
        <div class="box align">5</div>
        <div class="box align">6</div>
        <div class="box align">7</div>
        <div class="box align">8</div>
    </div>

    <h2 id="results"></h2>
    <button id="play-again">Play Again</button>

    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        let secondsElapsed = 0;
        let timerInterval;

        // Start the timer and update the display
        function startTimer() {
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

        // Call startTimer when the page loads or game starts
        startTimer();

        function getHoursElapsed() {
            return Math.floor(secondsElapsed / 3600);
        }
        document.getElementById('logout').addEventListener('click', function() {
            console.log('تم الضغط على زر Logout');
            fetch("{{ url('/update-stacking') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}" // تضمين رمز CSRF
                    },
                    body: JSON.stringify({
                        seconds: secondsElapsed // إرسال قيمة الثواني
                    })
                })
                .then(response => {
                    if (response.ok) {
                        console.log('تم إرسال الطلب بنجاح');
                        // بعد نجاح الطلب، إعادة التوجيه إلى الصفحة المطلوبة
                        window.location.href = "{{ url('/index') }}";
                    } else {
                        console.error("حدث خطأ في الاستجابة من السيرفر");
                        // حتى إذا حدث خطأ، يمكنك إعادة التوجيه أو عرض رسالة تنبيه للمستخدم
                        window.location.href = "{{ url('/index') }}";
                    }
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
