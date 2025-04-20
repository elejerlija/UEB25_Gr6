<!DOCTYPE html>
<html lang="en">
<?php  include 'footer.php'; 
include 'header.php';  ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <title>Contact</title>

  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url(image/contact.jpg);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: black;
}

h2 {
    color: #333; 
    text-align: center;
    margin-bottom: 20px;
}

main {
    padding: 5px;
    max-width: 900px;
    margin: 40px auto;
    background-color: rgba(1, 43, 8, 0.85);
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
}

.contact-form {
    background-color: whitesmoke;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
}

.contact-form label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold; 
    color: #333;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd; 
    border-radius: 6px;
    font-size: 14px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05); 
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: lightgreen; 
    outline: none;
    box-shadow: 0 0 4px lightgreen;
}

.contact-form button {
    background-color: lightgreen;
    color: #0e0000;
    padding: 12px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease, transform 0.2s ease; 
}

.contact-form button:hover {
    background-color: #28a745;
    transform: translateY(-2px);
}

.contact-form button:active {
    transform: translateY(0); 
}

.contact-form textarea {
    resize: vertical;
    min-height: 120px;
}

  </style>
</head>

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

  <main>
    <section class="contact-form">
      <h2>Get in Touch</h2>
      <p>If you have any questions or would like to reach out to us, please use the form below.</p>
   <br>
      <form id="contactForm">
          <input type="text" id="name" placeholder="Your Name" required>
          <input type="email" id="email" placeholder="Your Email" required>
          <textarea id="message" placeholder="Your Message" required></textarea>
          <button type="submit">Contact</button>
          <p id="feedback" class="message"></p>
      </form>
    </section>
  </main>

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

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const feedbackElement = document.getElementById("feedback");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); 

        
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();
        const message = document.getElementById("message").value.trim();

        try {
           
            if (!name) {
                throw new Error("Name is required!");
            }
            if (!email) {
                throw new Error("Email is required!");
            }
            if (!email.includes("@") || !email.includes(".")) {
                throw new Error("Invalid email format!");
            }
            if (!message) {
                throw new Error("Message cannot be empty!");
            }

          
            feedbackElement.textContent = "Thank you for contacting us!";
            feedbackElement.className = "message success";
            feedbackElement.style.display = "block";

     
            form.reset();

        } catch (error) {
          
            feedbackElement.textContent = error.message;
            feedbackElement.className = "message error";
            feedbackElement.style.display = "block";
        }
    });
});

</script>


</html>