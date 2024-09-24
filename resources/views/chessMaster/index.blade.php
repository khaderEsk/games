<!DOCTYPE html>
<html>

<head>
    <title>Chess</title>
    <style type="text/css">
        body {
            background-image: url("img2/image.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            /* استخدام cover لتغطية الخلفية بالكامل */
            margin: 0;
            position: relative;
            /* يسمح بتحديد مواقع العناصر بشكل مطلق */
        }

        h1 {
            color: red;
            font-size: 80px;
            text-align: center;
        }

        /* Banner Styles */
        .banner {
            position: absolute;
            background-color: lightgray;
            border-radius: 10px;
            /* زوايا دائرية */
            overflow: hidden;
            /* إخفاء أي محتوى زائد */
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* تغطية الصورة بالكامل */
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
            top: 0;
            bottom: 0;
            left: 0;
            width: 100px;
            height: calc(100% - 200px);
        }

        .banner-right {
            top: 0;
            bottom: 0;
            right: 0;
            width: 100px;
            height: calc(100% - 200px);
        }

        #controls {
            text-align: center;
            position: relative;
            z-index: 2;
            /* اجعل الأزرار فوق البانرات */
        }

        .button {
            color: black;
            padding: 15px 31.5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 19px;
            margin: 10px;
        }

        .button:hover {
            background-color: cyan;
            color: red;
        }
    </style>
</head>

<body>
    <h1>CHESS</h1>

    <div class="banner-top-left banner">
        <img src="banner1.jpg" alt="Banner 1"> <!-- صورة البانر 1 -->
    </div>
    <div class="banner-top-right banner">
        <img src="banner2.jpg" alt="Banner 2"> <!-- صورة البانر 2 -->
    </div>
    <div class="banner-bottom-left banner">
        <img src="banner3.jpg" alt="Banner 3"> <!-- صورة البانر 3 -->
    </div>
    <div class="banner-bottom-right banner">
        <img src="banner4.jpg" alt="Banner 4"> <!-- صورة البانر 4 -->
    </div>

    <div id="controls">
        <a href="chess/player_computer"><button class="button">PLAYER VS COMPUTER</button></a><br /><br>
        <a href="chess/two_player"><button class="button">TWO PLAYER GAME</button></a><br /><br>
    </div>

    <script type="text/javascript">
        function instr() {
            var con = document.getElementById("controls");
            if (con.style.display === "none") {
                con.style.display = "block";
            } else {
                con.style.display = "none";
            }
            var ins = document.getElementById("inst");
            if (ins.style.display === "none") {
                ins.style.display = "block";
            } else {
                ins.style.display = "none";
            }
        }
    </script>
</body>

</html>
