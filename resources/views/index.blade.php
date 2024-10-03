<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="Alali&Nibras" />

    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="">
    <title>Game Store</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />

    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('images/hero-bg.png') }}" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index">
                        <span>
                            <img src="{{ asset('images/icon_2.png') }}" class="mr-3"><span
                                class="text-white">Game</span> <span class="text-danger">Store</span>
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="menu">Games</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="book">Book Table</a>
                            </li>
                        </ul>
                        <div class="user_option ">
                            <a href="profile" class="user_link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                {{ $user->name }}
                            </a>
                            <a href="/" class="order_online">
                                Log Out
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Title 1
                                        </h1>
                                        <p>
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem minus quo
                                            officia laboriosam corporis quaerat.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Play now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Title 2
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, sit
                                            aliquid distinctio officia labore laudantium.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Play Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Title 3
                                        </h1>
                                        <p>
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam sunt unde
                                            commodi rerum quaerat vel.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Play Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>

        </section>
    </div>

    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">

            <div class="container ">
                <div class="row">
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="imgHours/hourseRracing.jpeg" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Horse Race Ads
                                </h5>
                                <h6>
                                    <span>20$</span><br>
                                    <h6>game description</h6>
                                </h6>
                                <a href="{{ url('HorseRaceAds/' . $user->id) }}">
                                    Play Now
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="{{ asset('img/image.jpg') }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    chess
                                </h5>
                                <h6>
                                    <span>20$</span><br>
                                    <h6>game description</h6>
                                </h6>
                                <a href="{{ url('chess/' . $user->id) }}">
                                    Play Now
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- end offer section -->

    <!-- food section -->

    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".Game Type 1">Game Type 1</li>
                <li data-filter=".Game Type 2">Game Type 2</li>
                <li data-filter=".Game Type 3">Game Type 3</li>
                <li data-filter=".fries">Game Type 4</li>
            </ul>

            <div class="filters-content">
                <div class="row grid">
                    <div class="col-sm-6 col-lg-4 all">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="{{ asset('assets/images/icon.png') }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        box Stacking Ads
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('boxStackingAds/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 all">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="images/download(2).png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        XO
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('XOStart/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 all">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="images/breakout.jfif" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        breakout Ads
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('breakoutAds/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 all">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="img/favicon.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        puzzle
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('puzzle/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 all">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="docs/intro.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        Tron Master Ads
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('TronMasterAds/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 all ">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="img/Screenshot(435).png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        avoid Debris
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('avoidDebris/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 all ">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="img/download(4).jfif" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        hit the hedgehog
                                    </h5>
                                    <p>
                                        lorem Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit,
                                        magnam voluptatem repellendus sed eaque
                                    </p>
                                    <div class="options">
                                        <h6>
                                            $20
                                        </h6>
                                        <a href="{{ url('hit-hedgehog/' . $user->id) }}">
                                            <button class="btn btn-danger">
                                                Play Now
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box view-more">
                <a href="#" id="view-more">
                    View More
                </a>
            </div>
        </div>
    </section>

    <!-- end food section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="images/about-img.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                About Us
                            </h2>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia facere assumenda magni
                            dolor nihil pariatur, sunt aliquid alias laborum tempore quae libero debitis a? Eos corrupti
                            et aperiam esse vel reprehenderit eum sequi. Est adipisci ullam esse. Dolorem nesciunt nobis
                            debitis molestiae sequi pariatur odit, quae laudantium sunt. Nemo illo incidunt rerum
                            asperiores ullam laborum, illum iure officiis reiciendis fugit totam maxime. Sapiente dicta
                            est quisquam ex repellat aspernatur id eveniet doloribus obcaecati vel, nihil sunt suscipit
                            beatae vero harum quos molestias! Atque consectetur aut rerum, fuga necessitatibus
                            voluptates adipisci eligendi, doloremque nihil fugiat cum, itaque eum explicabo laudantium
                            sapiente!
                        </p>
                        <a href="/about">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Book A Table
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="{{ url('/governorStore') }}" method="POST">
                            @csrf
                            <div>
                                <input type="text" class="form-control" placeholder="Amount" name="amount" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="address" name="address" />
                            </div>
                            <div>
                                <select name="transferCompany" id="gender" class="form-control">
                                    <option value="UAE Exchange">UAE Exchange</option>
                                </select>
                            </div>
                            <div class="btn_box">
                                <button>
                                    Book Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    What Says Our Players
                </h2>
            </div>
            <div class="carousel-wrap row ">
                <div class="owl-carousel client_owl-carousel">
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                </p>
                                <h6>
                                    Moana Michell
                                </h6>
                                <p>
                                    Player Name
                                </p>
                            </div>
                            <div class="img-box">
                                <img src="images/client1.png" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="box">
                            <div class="detail-box">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                </p>
                                <h6>
                                    Player Name
                                </h6>
                                <p>
                                    magna aliqua
                                </p>
                            </div>
                            <div class="img-box">
                                <img src="images/client1.png" alt="" class="box-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end client section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Contact Us
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Dubai
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    {{ $admin->phone }}
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    {{ $admin->email }}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            Game <span class="text-danger">Store</span>
                        </a>
                        <p>
                            Necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin words, combined with
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Opening Hours
                    </h4>
                    <p>
                        Everyday
                    </p>
                    <p>
                        24 Hours
                    </p>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    &copy; <span id="displayYear"></span> Created By
                    <a href="">AlAli & Nibras</a><br><br>
                </p>
            </div>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>
