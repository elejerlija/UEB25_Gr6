<?php
if (session_status() === PHP_SESSION_NONE) session_start();

include 'includes/db_conn.php';
include 'includes/count.php';


if (!isset($_COOKIE['theme'])) {
  setcookie('theme', 'light', time() + (86400 * 30), "/");
  $_COOKIE['theme'] = 'light';
}

$phone = '+383 45 333 111';
$email = 'charitywebsite25@gmail.com';
$facebook = 'https://facebook.com';
$twitter = 'https://twitter.com';
$instagram = 'https://instagram.com';
$site_name = 'HelpSomeone';

function showHeader()
{
  global $phone, $email, $facebook, $twitter, $instagram, $site_name;
?>
  <style>
    body.light {
      background-color: rgb(26, 163, 62);

    }

    body.dark {
      background-color: rgb(6, 50, 15);

    }

    .top-bar a,
    .social-links a,
    .nav-links a,
    .theme-toggle-btn {
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      text-decoration: underline;
    }
  </style>

  <script>
    function toggleTheme() {
      let current = document.body.className;
      let newTheme = current === "light" ? "dark" : "light";
      document.cookie = "theme=" + newTheme + "; path=/";
      location.reload();
    }
  </script>

  <body class="<?= $_COOKIE['theme'] ?>">
    <header>
      <div class="top-bar" style="display: flex; justify-content: space-between; align-items: center; padding: 5px 10px;">
        <div class="contact-info">
          <a href="tel:<?= $phone ?>" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-phone" style="font-size: 12px;"></i> <?= $phone ?>
          </a>&nbsp;&nbsp;&nbsp;
          <a href="mailto:<?= $email ?>" style="color: inherit; text-decoration: none;">
            <i class="fa-solid fa-envelope" style="font-size: 14px;"></i> <?= $email ?>
          </a>
          <?php if (isset($_SESSION['username'])): ?>
            &nbsp;&nbsp;&nbsp;
            <span id="welcome-msg">👋Welcome, <b><?= htmlspecialchars($_SESSION['username']) ?></b>!</span>

          <?php endif; ?>
        </div>
        <div class="social-links">
          <a href="<?= $facebook ?>" target="_blank"><i class="fa-brands fa-facebook" style="color: #1877F2;"></i></a>&nbsp;
          <a href="<?= $twitter ?>" target="_blank"><i class="fa-brands fa-twitter" style="color: #1DA1F2;"></i></a>&nbsp;
          <a href="<?= $instagram ?>" target="_blank"><i class="fa-brands fa-instagram" style="color: #DD2A7B;"></i></a>&nbsp;
          <button class="theme-toggle-btn" onclick="toggleTheme()">🌓 Light/Dark</button>
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

          <li><?php if (isset($_SESSION['username'])): ?><a href="volunteer.php">Volunteer & Updates</a>
            <?php else: ?><a href="auth/signin.php" title="Login to access">Volunteer</a><?php endif; ?></li>

          <li><?php if (isset($_SESSION['username'])): ?><a href="popular.php">Popular Cases</a>
            <?php else: ?><a href="auth/signin.php" title="Login to access">Popular</a><?php endif; ?></li>

          <li><?php if (isset($_SESSION['username'])): ?><a href="contact.php">Contact</a>
            <?php else: ?><a href="auth/signin.php" title="Login to access">Contact</a><?php endif; ?></li>

          <li><?php if (isset($_SESSION['username'])): ?><a href="donate.php">Donate</a>
            <?php else: ?><a href="auth/signin.php" title="Login to access">Donate</a><?php endif; ?></li>

          <li><?php if (isset($_SESSION['username'])): ?>
              <a href="auth/logout.php" class="nav-btn"><i class="fa fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
              <a href="auth/signin.php" class="nav-btn"><i class="fa fa-sign-in-alt"></i> Login</a>
            <?php endif; ?>
          </li>
        </ul>
      </nav>
    </header>
  </body>
<?php
}
?>
<script>
  setTimeout(function() {
    const welcomeMsg = document.getElementById('welcome-msg');
    if (welcomeMsg) {
      welcomeMsg.style.display = 'none';
    }
  }, 10000);
</script>