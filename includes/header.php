<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$phone = '+383 45 333 111';
$email = 'charity.kosova@gmail.com';
$facebook = 'https://facebook.com';
$twitter = 'https://twitter.com';
$instagram = 'https://instagram.com';
$site_name = 'HelpSomeone';

function showHeader() {
  global $phone, $email, $facebook, $twitter, $instagram, $site_name;
  ?>
  <header>
    <div class="top-bar">
      <div class="contact-info">
        <a href="tel:<?= $phone ?>" style="color: black; text-decoration: none;">
          <i class="fa-solid fa-phone" style="font-size: 12px;"></i> <?= $phone ?>
        </a>&nbsp;&nbsp;&nbsp;
        <a href="mailto:<?= $email ?>" style="color: black; text-decoration: none;">
          <i class="fa-solid fa-envelope" style="font-size: 14px;"></i> <?= $email ?>
        </a>
      </div>
      <div class="social-links">
        <a href="<?= $facebook ?>" target="_blank"><i class="fa-brands fa-facebook" style="color: #1877F2;"></i></a>&nbsp;&nbsp;&nbsp;
        <a href="<?= $twitter ?>" target="_blank"><i class="fa-brands fa-twitter" style="color: #1DA1F2;"></i></a>&nbsp;&nbsp;&nbsp;
        <a href="<?= $instagram ?>" target="_blank"><i class="fa-brands fa-instagram" style="color: #DD2A7B;"></i></a>
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

        
        <li>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="volunteer.php">Volunteer & Updates</a>
          <?php else: ?>
            <a href="auth/signin.php" title="Login to access" >Volunteer </a>
          <?php endif; ?>
        </li>

        <li>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="popular.php">Popular Cases</a>
          <?php else: ?>
            <a href="auth/signin.php" title="Login to access" >Popular </a>
          <?php endif; ?>
        </li>

        <li>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="contact.php">Contact</a>
          <?php else: ?>
            <a href="auth/signin.php" title="Login to access" >Contact </a>
          <?php endif; ?>
        </li>

        <li>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="donate.php">Donate</a>
          <?php else: ?>
            <a href="auth/signin.php" title="Login to access">Donate </a>
          <?php endif; ?>
        </li>

        
        <li>
          <?php if (isset($_SESSION['username'])): ?>
            <a href="auth/logout.php" class="nav-btn"><i class="fa fa-sign-out-alt"></i> Logout</a>

          <?php else: ?>
          <a href="auth/signin.php" class="nav-btn"><i class="fa fa-sign-in-alt"></i> Login</a>

          <?php endif; ?>
        </li>
      </ul>
    </nav>
  </header>
<?php
}
?>
