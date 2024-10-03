<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Egypt Slot</title>
  <style>
    @font-face {
      font-family: 'AncientEgyptian';
      src: url('path-to-your-pharaonic-font.ttf') format('truetype'); /* يجب استبدال هذا بمسار الخط */
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'AncientEgyptian', Arial, sans-serif;
      background-color: sandybrown;
      position: relative;
      overflow-x: hidden; /* لمنع التمرير الأفقي */
    }

    h1 {
      text-align: center;
      margin: 20px 0;
      color: #333;
      font-size: 15px;
      font-family: 'AncientEgyptian', sans-serif;
    }

    iframe {
      display: block;
      width: 100%;
      height: 75vh; /* تم تقليل الارتفاع لإتاحة مساحة لعرض اللافتات */
      border: none;
    }

    /* Timer Styles */
    #timer {
      font-size: 1.2rem;
      color: saddlebrown;
      border: 2px solid brown;
      padding: 5px 10px;
      border-radius: 5px;
      position: absolute;
      top: 2px;
      left: 10px;
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
      position: absolute;
      top: -5px;
      right: 10px;
    }

    .logout-btn:hover {
      background-color: #ff5e7e;
    }

    /* Banner Styles */
    .banner {
      position: absolute;
      width: 150px;
      height: 95px;
      background-color: lightgray;
      margin-bottom: 10px;
    }

    .banner img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Left Banners */
    .banner-top-left {
      top: 50px;
      left: 10px;
    }

    .banner-left-2 {
      top: 160px;
      left: 10px;
    }

    .banner-left-3 {
      top: 270px;
      left: 10px;
    }

    .banner-bottom-left {
      bottom: 10px;
      left: 10px;
    }

    /* Right Banners */
    .banner-top-right {
      top: 50px;
      right: 10px;
    }

    .banner-right-2 {
      top: 160px;
      right: 10px;
    }

    .banner-right-3 {
      top: 270px;
      right: 10px;
    }

    .banner-bottom-right {
      bottom: 10px;
      right: 10px;
    }
  </style>
</head>
<body class="full-screen-preview">

  <!-- Timer and Logout Button -->
  <div id="timer">Time: 00:00:00</div>
  <button class="logout-btn" onclick="logout()">Logout</button>

  <h1>العلي للتصميم والجرافيك</h1>

  <iframe class="full-screen-preview__frame" 
          src="https://showcase.tegagame.com/games/egypt-slot/" 
          name="preview-frame" 
          frameborder="0" 
          noresize="noresize" 
          data-view="fullScreenPreview" 
          allow="geolocation 'self'; autoplay 'self'">
  </iframe>

  <!-- Left Banners -->
  <div class="banner-top-left banner">
    <img src="left-banner-top.jpg" alt="Top Left Banner">
  </div>
  <div class="banner-left-2 banner">
    <img src="left-banner-2.jpg" alt="Left Banner 2">
  </div>
  <div class="banner-left-3 banner">
    <img src="left-banner-3.jpg" alt="Left Banner 3">
  </div>
  <div class="banner-bottom-left banner">
    <img src="left-banner-bottom.jpg" alt="Bottom Left Banner">
  </div>

  <!-- Right Banners -->
  <div class="banner-top-right banner">
    <img src="right-banner-top.jpg" alt="Top Right Banner">
  </div>
  <div class="banner-right-2 banner">
    <img src="right-banner-2.jpg" alt="Right Banner 2">
  </div>
  <div class="banner-right-3 banner">
    <img src="right-banner-3.jpg" alt="Right Banner 3">
  </div>
  <div class="banner-bottom-right banner">
    <img src="right-banner-bottom.jpg" alt="Bottom Right Banner">
  </div>

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

        document.querySelector("#timer").innerHTML = `Time: ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }

    // Call startTimer when the page loads or game starts
    startTimer();

    // Logout functionality
    function logout() {
        alert("Logging out...");
        // Add your logout logic here, e.g., redirect to login page or clear session
    }
  </script>

  <script nonce="ZTdIYZ6GR6K7mumNhRfyjw==">
    $(function(){viewloader.execute(Views);});
  </script>

</body>
</html>
