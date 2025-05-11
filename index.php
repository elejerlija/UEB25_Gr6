<!DOCTYPE html>
<html lang="en">
<?php
include 'includes/header.php';
include 'includes/footer.php';

showHeader();
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Charity Website</title>

  <link rel="stylesheet" href="style/style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js" defer></script>




  <link rel="stylesheet" href="style.css">

</head>

<body>



  <section class="hero">
    <div class="overlay"></div>
    <div class="slider">
      <div class="slides">
        <img class="slide" src="image/charity1.jpg" alt="image #1">
        <img class="slide" src="image/charity2.jpg" alt="image #2">
        <img class="slide" src="image/charity3.jpg" alt="image #3">
      </div>

      <button class="prev" onclick="prevSlide()">&#10094</button>
      <button class="next" onclick="nextSlide()">&#10095</button>
    </div>

    <div class="hero-text">
      <h3>Get Started Today.</h3>
      <h1>Help People<br>Save a life</h1>
      <p>No one has ever become poor by giving.</p>
    </div>

  </section>
  <section class="quotes-and-video">
    <div class="quotes">
      <div class="quote-box">
        <h2>Why should you help?</h2><br>
        <p>“The best way to find yourself is to lose yourself in the service of others.” – <i>Mahatma Gandhi</i></p>
        <p>“Charity brings to life again those who are spiritually dead.” – <i>Thomas Aquinas</i></p>
        <p>“No act of kindness, no matter how small, is ever wasted.” – <i>Aesop</i></p>
      </div>
    </div>
    <div class="video-box">
      <video controls >
        <source src="video/home.mp4" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </section>
  
  <section class="donation-progress">
    <h2>Donation Goal</h2>
    <div class="progress-bar">
      <div class="progress" style="width: 70%;"></div>
    </div>
    <p>Raised: $7,000 of $10,000 goal</p>
  </section>

  <section class="cta">
    <h2>Join Our Mission</h2>
    <p>Be part of the change. Together, we can make a difference!</p>
    <a href="donate.php" class="btn">Donate Now</a>
    <a href="volunteer.php" class="btn-secondary">Become a Volunteer</a>
  </section>
 
<?php
showFooter();
?>
  

  <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>



</body>

</html>