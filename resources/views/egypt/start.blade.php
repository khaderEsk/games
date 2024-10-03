<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharaonic Beginning Page</title>
    <link rel="stylesheet" href="{{ asset('css/start.css') }}">
    <style>
        /* Banner Styles */
        .banner {
            position: absolute;
            background-color: lightgray;
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
            top: 100px;
            bottom: 100px;
            left: 0;
            width: 100px;
            height: calc(100% - 200px);
        }

        .banner-right {
            top: 100px;
            bottom: 100px;
            right: 0;
            width: 100px;
            height: calc(100% - 200px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to the Pharaonic World</h1>
        <div class="image-container">
            <img src="{{ asset('images/1.avif') }}" alt="Pharaonic Art" class="pharaonic-image">
            <a href="{{ url('indexEgypt/' . $user->id) }}" class="pharaonic-button">ٍstart</a>
        </div>
    </div>





</body>

</html>
