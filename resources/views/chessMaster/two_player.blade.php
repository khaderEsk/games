<!DOCTYPE html>
<html>

<head>
    <title>CHESS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <style type="text/css">
        body {
            font-family: chess;
            margin: 0;
            background-color: #DEB887;
        }

        .timer {
            font-size: 25px;
            text-align: center;
            border: 3px solid #FFB6C1;
            width: 280px;
            height: 30px;
            position: absolute;
            color: blue;
            background-color: #F08080;
            top: 50%;
            left: 77%;
        }

        .square {
            background: #afa;
            display: inline-block;
            border: 3px solid red;
            text-align: center;
            position: absolute;
            cursor: pointer;
        }

        .square:hover {
            color: blue;
        }

        .stp {
            font-size: 25px;
            text-align: center;
            border: 3px solid #FFB6C1;
            width: 280px;
            height: 30px;
            position: absolute;
            color: blue;
            background-color: #F08080;
            top: 45%;
            left: 77%;
        }

        .turns {
            font-size: 50px;
            text-align: center;
            font-family: monospace;
            border: 3px solid #FFB6C1;
            width: 280px;
            height: 140px;
            position: absolute;
            color: blue;
            background-color: #F08080;
            left: 2%;
            top: 35%;
        }

        .stopwatch {
            font-size: 50px;
            text-align: center;
            font-family: monospace;
            border: 3px solid #FFB6C1;
            width: 280px;
            height: 60px;
            position: absolute;
            color: blue;
            background-color: #F08080;
            left: 77%;
            top: 35%;
        }

        .controls .kkv2 {
            position: absolute;
            top: 60%;
            left: 82%;
            width: 150px;
            height: 50px;
            border: 3px solid #FFB6C1;
            background-color: #FAFAD2;
            text-align: center;
        }

        .controls .kkv2:hover {
            background-color: #F08080;
            color: red;
        }

        .restart .restartb {
            position: absolute;
            top: 70%;
            left: 82%;
            width: 150px;
            height: 50px;
            border: 3px solid #FFB6C1;
            background: #FAFAD2;
            text-align: center;
        }

        .restart .restartb:hover {
            background-color: #F08080;
            color: red;
        }

        .home .homeg {
            position: absolute;
            top: 80%;
            left: 82%;
            width: 150px;
            height: 50px;
            border: 3px solid #FFB6C1;
            text-align: center;
            background-color: #FAFAD2;
        }

        .home .homeg:hover {
            background-color: #F08080;
            color: red;
        }

        /* Banner Styles */
        .banner {
            position: absolute;
            background-color: lightgray;
            border: 1px solid #ccc;
            /* Optional: for better visibility */
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
            top: 540px;
            left: 0;
            width: 200px;
            height: 150px;
        }

        .banner-bottom-right {
            top: 540px;
            right: 0;
            width: 200px;
            height: 150px;
        }
    </style>
</head>

<body>

    <div id="container"></div>
    <div id="contains"></div>
    <div id="containss"></div>
    <div id="clock"></div>
    <div id="turn" class="turns">White's Turn</div>
    <div class="clockpos"></div>
    <div class="restart"><a href="{{ url('two_player/' . $user->id) }}"><button class="restartb">RESTART
                GAME</button></a></div>
    <div class="home">
        <button class="homeg" id="logout">HOME</button>
    </div>

    <div class="stp">STOP WATCH</div>
    <div class="stopwatch">00:00:00</div>
    <div class="controls">
        <div class="timer" id="timer">Time: 00:00:00</div>
        <button class="kkv2" onclick="pausee()">PAUSE / RESUME</button>
    </div>

    <!-- Banner Elements -->
    <div class="banner-top-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-left banner"></div>

    <script src="{{ asset('js/chess.js') }}"></script>
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
