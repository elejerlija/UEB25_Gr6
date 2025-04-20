<!DOCTYPE html>
<html lang="en">
<?php require 'footer.php'; ?>
<?php require 'header.php'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Charity Website</title>

  <link rel="stylesheet" href="style.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js" defer></script>




  <link rel="stylesheet" href="style.css">

</head>

<body>

<?php
function showHeader() {

  global $phone, $email, $facebook, $twitter, $instagram, $site_name;
  ?>

  <header>
    <div class="top-bar">
      <div class="contact-info">
        <a href="tel:<?= $phone ?>" style="color: black; text-decoration: none;">
          <i class="fa-solid fa-phone" style="color: #000; font-size: 12px;"></i> <?= $phone ?>
        </a>&nbsp;&nbsp;&nbsp;
        <a href="mailto:<?= $email ?>" style="color: black; text-decoration: none;">
          <i class="fa-solid fa-envelope" style="color: #000; font-size: 14px;"></i> <?= $email ?>
        </a>
      </div>
      <div class="social-links">
        <a href="<?= $facebook ?>" target="_blank"><i class="fa-brands fa-facebook" style="color: #1877F2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
        <a href="<?= $twitter ?>" target="_blank"><i class="fa-brands fa-twitter" style="color: #1DA1F2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
        <a href="<?= $instagram ?>" target="_blank"><i class="fa-brands fa-instagram" style="color: #DD2A7B; font-size: 16px;"></i></a>
      </div>
    </div>

    <nav class="nav-links">
      <div class="logo"><?= $site_name ?></div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="about.php">About Us</a>
          <ul class="dropdown-content">
            <li><a href="about.php#aboutID">Who are we</a></li>
            <li><a href="about.php#impactID">Our Impact</a></li>
            <li><a href="about.php#priorityID">Arrange by Priority</a></li>
            <li><a href="about.php#teamID">Our Team</a></li>
          </ul>
        </li>
        <li><a href="volunteer.php">Volunteer & Updates</a></li>
        <li><a href="popular.php">Popular Cases</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="donate.php">Donate</a></li>
      </ul>
    </nav>
  </header>

  <?php
}


showHeader();
?>
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
  <footer>
    <div class="row">
      <div class="col">
        <img src="image/logo-helpsomeone.png" class="logo" alt="">
        <br>
        <br>
        <p
          style="font-family: 'Courier New', Courier, monospace ; font-size: 16px;    text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);">
          Together, we create a world of hope.</p>
      </div>
      <div class="col">
        <h3>Office</h3>
        <address>
          <p>Mother Teresa Street</p>
          <br>
          <p>Gjilan, 60000, Kosov&euml;</p>
          <br>
          <p>Phone: +383 45 333 111</p>
          <br>
          <a class="class-id" href="mailto:charity.kosova@gmail.com" style="color: white;">charity.kosova@gmail.com</a>
        </address>
      </div>
      <div class="col">
        <h3>Links</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="volunteer.php">Volunteer & Updates</a></li>
          <li><a href="popular.php"> Popular Cases</a></li>
          <li><a href="donate.php">Donate</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col">
      <h3>We'd Love to Hear From You</h3>
      <form class="footer-form" method="POST" action="">
  <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>
  <input type="text" name="message" placeholder="  Leave a message" required>
  <button type="submit"><i class="fa-solid fa-arrow-right " style="color: #ffffff;"></i></button>
</form>

        <div class="social-icons">
          <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook" style="color: #2d6a4f;"></i></a>
          <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram" style="color: #2d6a4f;"></i></i></a>
          <a href="https://www.twitter.com/"> <i class="fa-brands fa-twitter" style="color: #2d6a4f;"></i></i></a>
          <a href="https://www.whatsapp.com/"> <i class="fa-brands fa-whatsapp" style="color: #2d6a4f;"></i></i></a>
        </div>
      </div>
    </div>
  </footer>
  

  <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>



</body>

</html>