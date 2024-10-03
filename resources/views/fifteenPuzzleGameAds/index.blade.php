<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Fifteen Puzzle Game 🎈🏆</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet" />
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css" rel="stylesheet') }}" />
    <link rel="stylesheet" href="{{ asset('css/stylePuzzle.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body onload="startReadyOverLay()">
    <div id="overlay-1" onclick="endReadyOverLay()">
        <div id="text-1">Are you ready? <br />Click to go🚴‍♂️</div>
    </div>
    <div class="container">
        <header>
            <h1 class="name-letters">🎈<span class="fifteen">Fifteen</span>Puzzle🏆</h1>
        </header>
        <section>
            <div id="game"></div>
            <div id="controls">
                <div id="solve"></div>
                <button class="btn btn-outline-primary" id="shuffle">Reset</button>
                <button class="btn btn-outline-primary" id="logout">Logout</button>
            </div>
            <div id="timer" style="margin-top: 300px;">Time: 00:00:00</div>
        </section>
        <footer>CopyRight &copy; <span> العلي للجرافيك والديزين </span> 2024.</footer>
        <div id="overlay-2" onclick="endCongratsOverLay()">
            <div id="text-2">Congrats 🎈🎉, You did it! Click to replay</div>
        </div>
    </div>


    <div class="banner-top-left banner"></div>
    <div class="banner-bottom-left banner"></div>
    <div class="banner-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-right banner"></div>
    <div class="banner-right banner"></div>


    <script src="{{ asset('js/appPuzzle.js') }}"></script>
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
        // Call startTimer when the page loads or game starts
        function startReadyOverLay() {
            document.getElementById('overlay-1').style.display = 'block';
            startTimer();
        }

        function endReadyOverLay() {
            document.getElementById('overlay-1').style.display = 'none';
        }

        // Example functions for solving and resetting the game
        document.querySelector('#shuffle').addEventListener('click', () => {
            console.log('Game Reset!');
        });
    </script>
</body>

</html>
