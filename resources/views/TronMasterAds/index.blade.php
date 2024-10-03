<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tron</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bike.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Orbitron|Audiowide' rel='stylesheet' type='text/css'>
    <link href="tron-favicon.ico" rel="icon" type="image/x-icon" />
    <style>
        #timer {
            font-size: 1.3rem;
            color: #5EC4F2;
            position: absolute;
            top: 10px;
            /* Adjust position as needed */
            right: 10px;
            border: 3px solid;
            border-color: #5EC4F2;
            padding: 10px;
        }

        #logout {
            background-color: black;
            /* Main color */
            color: white;
            /* Text color */
            font-size: 1.5rem;
            /* Font size */
            font-weight: bold;
            /* Bold text */
            padding: 10px 20px;
            /* Padding */
            border: 2px solid #FF4500;
            /* Red border */
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer on hover */
            transition: background-color 0.3s, transform 0.2s;
            /* Smooth transitions */
        }

        #logout:hover {
            background-color: #FF4500;
            /* Change to red on hover */
            transform: scale(1.05);
            /* Slightly enlarge on hover */
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
            top: 520px;
            left: 0;
            width: 200px;
            height: 150px;
        }

        .banner-left {
            top: 160px;
            bottom: 100px;
            left: 0;
            width: 120px;
            height: 330px;
        }

        .banner-top-right {
            top: 0;
            right: 0px;
            width: 200px;
            height: 150px;
        }

        .banner-bottom-right {
            top: 500px;
            right: 0;
            width: 200px;
            height: 170px;
        }

        .banner-right {
            top: 160px;
            bottom: 100px;
            right: 0;
            width: 120px;
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="tron-logo" style="position: relative;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/b/bb/TRON.png" />
        <div id="timer" style="margin-right: 400px;">Time: 00:00:00</div>
    </div>

    <div class="intro-outro">
        <h1 class="start-display" id="instructions">Instructions</h1>
        <div class="start-display" id="instructions">
            Don't crash! You are the <span style="color: blue;">blue</span> light cycle.
            Avoid the walls and trails of light left by you and your opponent.
            Navigate your light cycle by the arrow keys.
        </div>
        <h1 class="start-display" id="start">START</h1>
        <div class="start-display" id="instructions" style="padding-top: 60px">
            Have a <span style="color: #FF4500;">Frenemy</span>?
        </div>
        <h1 class="start-display" id="two-player">2 PLAYERS</h1>
        <div class="start-display" id="instructions" style="font-size: 18px;">
            (<span style="color: #FF4500">Player 2</span> uses WASD)
        </div>

        <h1 class="end-display" id="you-win">You win!</h1>
        <h1 class="end-display" id="computer-win">Computer wins!</h1>
        <h1 class="end-display" id="player1-win">Player 1 wins!</h1>
        <h1 class="end-display" id="player2-win">Player 2 wins!</h1>
        <h1 class="end-display" id="replay">PLAY AGAIN</h1>
    </div>

    <div class="display">
        <div class="leftspace">
            <div class="score" style="display: none;" id="score">
                <h1 class="left-header"> Wins </h1>
                <span class="blue-wins">0</span> -
                <span class="red-wins">0</span>
            </div>

            <div class="difficulty" style="display: none;">
                <h1 class="left-header" id="level"> Difficulty </h1>
                <h1 class="easy" id="level1">Easy</h1>
                <h1 class="medium" id="level2">Medium</h1>
                <h1 class="hard" id="level3">Hard</h1>
                <button class="lo" id="logout">Logout</button>
            </div>
        </div>

        <figure class="tron-game"></figure>

        <div class="rightspace"></div>
    </div>

    <div class="banner-top-left banner"></div>
    <div class="banner-bottom-left banner"></div>
    <div class="banner-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-right banner"></div>
    <div class="banner-right banner"></div>

    <footer
        style="width: 100%; background-color: #000; color: #5EC4F2; text-align: center; padding: 20px; position: fixed; bottom: 0; left: 0; font-size: 20px; font-weight: bold;">
        <p>&copy; 2024 العلي للجرافيك والديزين</p>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="{{ asset('js/coord.js') }}"></script>
    <script src="{{ asset('js/bike.js') }}"></script>
    <script src="{{ asset('js/board.js') }}"></script>
    <script src="{{ asset('js/view.js') }}"></script>

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


        function getHoursElapsed() {
            return Math.floor(secondsElapsed / 3600);
        }
        document.getElementById('start').addEventListener('click', function() {
            startTimer();
        });
        document.getElementById('two-player').addEventListener('click', function() {
            startTimer();
        });

        document.getElementById('logout')
            .addEventListener('click', function() {
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

        $(".end-display").hide();
        var rootEl = $('.tron-game');
        var view;
        window.wins = {
            blue: 0,
            red: 0
        };

        $("#start").on("click", function() {
            $(".start-display").hide();
            $(".score, .difficulty").show();
            var view = new View(rootEl);
            view.startGame();
        });

        $("#two-player").on("click", function() {
            $(".start-display").hide();
            $(".score, .difficulty").show();
            $("#level, #level1,#level2,#level3").hide();
            window.players = 2;
            var view = new View(rootEl, window.players);
            view.startGame();
        });

        $("#replay").on("click", function() {
            $(".end-display").hide();
            var view = new View(rootEl, window.players);
            view.startGame();
        });
    </script>
</body>

</html>
