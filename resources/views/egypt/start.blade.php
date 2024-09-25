<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharaonic Beginning Page</title>
    <link rel="stylesheet" href="css/start.css">
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
            <img src="img2/1.avif" alt="Pharaonic Art" class="pharaonic-image">
            <a href="egypt/game" class="pharaonic-button">ٍstart</a>
        </div>
    </div>
    
     <div class="banner-top-left banner"></div>
  <div class="banner-top-right banner"></div>
  <div class="banner-bottom-left banner"></div>
  <div class="banner-bottom-right banner"></div>
    
    
<script>
    const ads = [
      'https://i.pinimg.com/564x/3f/28/c6/3f28c65eb61be55ac216f08603671dcc.jpg',
      'https://i.pinimg.com/originals/4c/fe/fd/4cfefd5f4c6608b470f873e57e7c8a56.gif',
      'https://i.pinimg.com/originals/c7/e1/d2/c7e1d290b6424c7f3877719207d7187d.gif',
      'https://i.pinimg.com/originals/32/40/b0/3240b08b8c1d722625dfb9e5d73b7b11.gif',
      'https://i.pinimg.com/originals/c7/fe/e1/c7fee12d5c84ad3242ab446e337e3c3e.gif',
      'https://i.pinimg.com/originals/36/4e/a6/364ea6cd7bfd00a0260aaf6e2602cd4d.gif',
      'https://i.pinimg.com/originals/95/ef/b8/95efb8425d270933e5e890b33ab5ef70.gif'
    ];
    let currentAdIndex = 0;

    window.onload = function() {
      setupAds();
    }

    function setupAds() {
      const banners = {
        'banner-top-left': document.querySelector('.banner-top-left'),
        'banner-top-right': document.querySelector('.banner-top-right'),
        'banner-bottom-left': document.querySelector('.banner-bottom-left'),
        'banner-bottom-right': document.querySelector('.banner-bottom-right'),
        'banner-left': document.querySelector('.banner-left'),
        'banner-right': document.querySelector('.banner-right')
      };

      function updateAds() {
        const adImage = document.createElement('img');
        adImage.src = ads[currentAdIndex];
        adImage.alt = 'Advertisement';

        for (const key in banners) {
          if (banners[key]) {
            banners[key].innerHTML = ''; // Clear existing content
            banners[key].appendChild(adImage.cloneNode(true)); // Add new ad
          }
        }

        currentAdIndex = (currentAdIndex + 1) % ads.length;
      }

      updateAds(); // Initial ad
      setInterval(updateAds, 10000); // Change ad every 10 seconds
    }
  </script>    
    
</body>
</html>
