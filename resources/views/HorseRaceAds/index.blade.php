<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}" />
    <title>Horse Racing</title>
    <style>
        /* Logout button styling */
        #btnLogout {
            position: absolute;
            top: 10px;
            right: 200px;
            padding: 10px 20px;
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            background-color: greenyellow;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        #btnLogout:hover {
            background-color: green;
        }

        /* Timer styling */
        #timer {
            font-size: 1rem;
            color: black;
            position: absolute;
            top: 10px;
            left: 20px;
            border: 2px solid black;
            padding: 10px;
        }

        /* Banner Styles */
        .banner {
            position: absolute;
            background-color: lightgray;
            border: 1px solid black;
            /* Optional: For visual clarity */
        }

        /* Top-right banner */
        .banner-top-right {
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
        }

        /* Bottom-right banner */
        .banner-bottom-right {
            top: 420px;
            right: 0;
            width: 150px;
            height: 170px;
        }

        /* Full right-side vertical banner */
        .banner-right {
            top: 155px;
            bottom: 10px;
            right: 0;
            width: 120px;
            height: 250px;
            /* Adjusts height dynamically */
        }
    </style>
</head>

<body>


    <!-- Right-side banners -->
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-right banner"></div>
    <div class="banner-right banner"></div>

    <!-- Horses -->
    <div id="horse1" class="horse standRight horseRight">
        <div class="rider">
            <div class="head"></div>
            <div class="body"></div>
        </div>
    </div>

    <div id="horse2" class="horse standRight">
        <div class="rider">
            <div class="head"></div>
            <div class="body"></div>
        </div>
    </div>

    <div id="horse3" class="horse standRight">
        <div class="rider">
            <div class="head"></div>
            <div class="body"></div>
        </div>
    </div>

    <div id="horse4" class="horse standRight">
        <div class="rider">
            <div class="head"></div>
            <div class="body"></div>
        </div>
    </div>

    <!-- Track and Controls -->
    <div class="track">
        <div id="startline"></div>
        <div class="inner">
            <button id="start">Start Race</button>

            <div id="bet">
                <p>You currently have <span id="funds">{{ $user->wallet->value }}</span></p>
                <label>Bet Amount (£)</label>
                <input type="number" value="1" id="amount" />
                <label>Laps</label>
                <input type="number" value="1" id="laps" />
                <label>Bet on horse:</label>
                <select id="bethorse">
                    <option value="horse1">White</option>
                    <option value="horse2">Blue</option>
                    <option value="horse3">Green</option>
                    <option value="horse4">Brown</option>
                </select>
            </div>

            <table id="results">
                <thead>
                    <tr>
                        <th>Results</th>
                        <th></th>
                    </tr>
                </thead>
                <tr>
                    <td>1st</td>
                    <td class="horse1"></td>
                </tr>
                <tr>
                    <td>2nd</td>
                    <td class="horse2"></td>
                </tr>
                <tr>
                    <td>3rd</td>
                    <td class="horse3"></td>
                </tr>
                <tr>
                    <td>4th</td>
                    <td class="horse4"></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Logout Button and Timer -->
    <div id="top-bar">
        <h2 style="text-align: center">العلي للجرافيك والديزين</h2>
        <button id="btnLogout">Logout</button>
        <div id="timer">Time: 00:00:00</div>
    </div>

    <script>
        let secondsElapsed = 0;
        let timerInterval;
        // let funds = 100;


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

            document.querySelector("#timer").innerHTML = `Time: ${String(hours).padStart(2, '0')}:${String(
          minutes
        ).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }

        // Start the timer when the page loads
        window.onload = () => {
            startTimer();
        };
        document.getElementById('btnLogout').addEventListener('click', function() {
            // يمكنك تنفيذ عملية تسجيل الخروج هنا إذا لزم الأمر
            // على سبيل المثال، يمكنك استدعاء دالة لتسجيل الخروج عبر AJAX

            // بعد ذلك، إعادة توجيه المستخدم إلى صفحة index
            window.location.href = "{{ url('/index') }}"; // تأكد من تغيير URL حسب الحاجة
        });
        // Add event listener for logout button
        // document.querySelector("#btnLogout").addEventListener("click", function() {
        //     alert("Logged out!");
        // });
    </script>
    <script src="{{ asset('js/game.js') }}"></script>
</body>

</html>
