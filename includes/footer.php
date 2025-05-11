<?php
function showFooter() {
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
      echo '<div style="background-color: #d4edda; color: #155724; padding: 12px; margin-top: 20px; 
                  border: 1px solid #c3e6cb; border-radius: 5px; font-family: Arial;">
      <strong>Thank you for your message. It has been safely submitted.</strong>          
      </div>';
      $debug_mode = false;
      if ($debug_mode) {
          var_dump($_POST);
      }
  }
?>
<footer> 
  <div class="row">
    <div class="col">
      <img src="image/logo-helpsomeone.png" class="logo" alt="">
      <br><br>
      <p style="font-family: 'Courier New', Courier, monospace; font-size: 16px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);">
        Together, we create a world of hope.
      </p>
    </div>
    <div class="col">
      <h3>Office</h3>
      <address>
        <p>Mother Teresa Street</p><br>
        <p>Gjilan, 60000, Kosov&euml;</p><br>
        <p>Phone: +383 45 333 111</p><br>
        <a class="class-id" href="mailto:charity.kosova@gmail.com" style="color: white;">charity.kosova@gmail.com</a>
      </address>
    </div>
    <div class="col">
      <h3>Links</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="volunteer.php">Volunteer & Updates</a></li>
        <li><a href="popular.php">Popular Cases</a></li>
        <li><a href="donate.php">Donate</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>
    <div class="col">
      <h3>We'd Love to Hear From You</h3>
      <form class="footer-form" method="POST" action="">
        <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>
        <input type="text" name="message" placeholder="  Leave a message" required>
        <button type="submit"><i class="fa-solid fa-arrow-right" style="color: #ffffff;"></i></button>
      </form>
      <div class="social-icons">
        <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook" style="color: #2d6a4f;"></i></a>
        <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram" style="color: #2d6a4f;"></i></a>
        <a href="https://www.twitter.com/"> <i class="fa-brands fa-twitter" style="color: #2d6a4f;"></i></a>
        <a href="https://www.whatsapp.com/"> <i class="fa-brands fa-whatsapp" style="color: #2d6a4f;"></i></a>
      </div>
    </div>
  </div>
</footer>
<?php
}
?>
