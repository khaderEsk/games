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
    <div class="restart"><a href="two_player"><button class="restartb">RESTART GAME</button></a></div>
    <div class="home"><a href="/index"><button class="homeg">HOME</button></a></div>

    <div class="stp">STOP WATCH</div>
    <div class="stopwatch">00:00:00</div>
    <div class="controls">
        <button class="kkv2" onclick="pausee()">PAUSE / RESUME</button>
    </div>

    <!-- Banner Elements -->
    <div class="banner-top-left banner"></div>
    <div class="banner-top-right banner"></div>
    <div class="banner-bottom-left banner"></div>
    <div class="banner-bottom-right banner"></div>

    <script src="{{ asset('js/chess.js') }}"></script>

</body>

</html>
