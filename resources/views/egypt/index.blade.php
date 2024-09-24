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
      position: relative; /* لضمان وضع البانرات بشكل نسبي للصفحة */
      overflow-x: hidden; /* لمنع التمرير الأفقي إذا تجاوزت البانرات حدود الشاشة */
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
      height: 90vh;
      border: none;
    }

    /* Banner Styles */
    .banner {
      position: absolute;
      background-color: lightgray; /* لون خلفية اختياري للبانر */
    }

    .banner img {
      width: 100%;
      height: 100%;
      object-fit: cover; /* الحفاظ على نسبة العرض إلى الارتفاع مع تغطية المنطقة بالكامل */
    }

    /* Left and Right Banners */
    .banner-left {
      top: 62px;
      bottom: 23px;
      left: 0;
      width: 120px;
      margin-left: 5px;
    }

    .banner-right {
      top: 62px;
      bottom: 23px;
      right: 0;
      width: 120px;
      margin-right: 5px;
    }
  </style>
</head>
<body class="full-screen-preview">

  <h1>العلي للتصميم والجرافيك</h1> <!-- النص المحدث -->

  <iframe class="full-screen-preview__frame" 
          src="https://showcase.tegagame.com/games/egypt-slot/" 
          name="preview-frame" 
          frameborder="0" 
          noresize="noresize" 
          data-view="fullScreenPreview" 
          allow="geolocation 'self'; autoplay 'self'">
  </iframe>

  <!-- Left and Right Banners -->
  <div class="banner-left banner">
    <img src="left-banner.jpg" alt="Left Banner">
  </div>
  <div class="banner-right banner">
    <img src="right-banner.jpg" alt="Right Banner">
  </div>

  <script nonce="ZTdIYZ6GR6K7mumNhRfyjw==">
    $(function(){viewloader.execute(Views);});
  </script>

</body>
</html>
