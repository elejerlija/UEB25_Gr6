<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$phone = '+383 45 333 111';
$email = 'charity.kosova@gmail.com';
$facebook = 'https://facebook.com';
$twitter = 'https://twitter.com';
$instagram = 'https://instagram.com';
$site_name = 'HelpSomeone';

// Lexojmë ngjyrën nga cookie (ose default bardhë)
$background = 'white';
if (isset($_COOKIE['bgcolor'])) {
    $background = $_COOKIE['bgcolor'];
}

// Vendos ngjyrën e tekstit bazuar në sfond
$textColor = ($background === 'black') ? 'white' : '#111';

function showHeader() {
    global $phone, $email, $facebook, $twitter, $instagram, $site_name, $background, $textColor;
    ?>
    <style>
        /* Top bar i fiksuar me ngjyrë sfondi dinamike */
        .top-bar {
            position: fixed;
            top: 0; left: 0; right: 0;
            width: 100%;
            background-color: <?= htmlspecialchars($background) ?>;
            color: <?= htmlspecialchars($textColor) ?>;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 20px;
            box-sizing: border-box;
            font-size: 14px;
            border-bottom: 1px solid <?= ($background === 'white') ? '#ddd' : '#444' ?>;
            z-index: 9999;
        }

        .contact-info a {
            color: <?= htmlspecialchars($textColor) ?>;
            text-decoration: none;
            margin-right: 15px;
            display: inline-flex;
            align-items: center;
        }
        .contact-info a:hover {
            color: <?= ($background === 'white') ? '#007BFF' : '#55acee' ?>;
        }

        .social-links a {
            color: inherit;
            font-size: 18px;
            margin-left: 10px;
            transition: transform 0.2s ease;
            display: inline-flex;
            align-items: center;
        }
        .social-links a:hover {
            transform: scale(1.2);
        }

        /* Lë hapësirë nën top-bar që të mos mbulojë përmbajtjen tjetër */
        body {
            padding-top: 42px; /* ose sa është lartësia e top-bar */
            background-color: white; /* ose ngjyra tjetër default */
            color: #111;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Stilet për header dhe menu */
        header {
            margin-top: 42px; /* që të mos jetë poshtë top-bar */
        }

        .nav-links {
            background-color: #f9f9f9;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
            color: #333;
        }

        ul.nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        ul.nav-links li {
            position: relative;
        }

        ul.nav-links li a {
            color: #333;
            text-decoration: none;
            padding: 6px 8px;
            display: inline-block;
        }

        ul.nav-links li a:hover {
            color: #007BFF;
        }

        /* Dropdown */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 10000;
            top: 100%;
            left: 0;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content li {
            padding: 8px 12px;
        }

        .dropdown-content li a {
            color: #333;
        }

        .dropdown-content li a:hover {
            color: #007BFF;
        }

        .nav-btn {
            background-color: #007BFF;
            color: white !important;
            padding: 6px 12px;
            border-radius: 4px;
        }
        .nav-btn:hover {
            background-color: #0056b3;
        }
    </style>

    <header>
      <div class="top-bar">
        <div class="contact-info">
          <a href="tel:<?= htmlspecialchars($phone) ?>" title="Telefon">
            <i class="fa-solid fa-phone" style="font-size: 12px; margin-right: 4px;"></i> <?= htmlspecialchars($phone) ?>
          </a>
          <a href="mailto:<?= htmlspecialchars($email) ?>" title="Email">
            <i class="fa-solid fa-envelope" style="font-size: 14px; margin-right: 4px;"></i> <?= htmlspecialchars($email) ?>
          </a>
        </div>

        <div class="social-links">
          <a href="<?= htmlspecialchars($facebook) ?>" target="_blank" title="Facebook" style="color: #1877F2;">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <a href="<?= htmlspecialchars($twitter) ?>" target="_blank" title="Twitter" style="color: #1DA1F2;">
            <i class="fa-brands fa-twitter"></i>
          </a>
          <a href="<?= htmlspecialchars($instagram) ?>" target="_blank" title="Instagram" style="color: #DD2A7B;">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </div>
      </div>

      <nav class="nav-links">
        <div class="logo"><?= htmlspecialchars($site_name) ?></div>
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
              <a href="auth/signin.php" title="Login to access">Volunteer</a>
            <?php endif; ?>
          </li>

          <li>
            <?php if (isset($_SESSION['username'])): ?>
              <a href="popular.php">Popular Cases</a>
            <?php else: ?>
              <a href="auth/signin.php" title="Login to access">Popular</a>
            <?php endif; ?>
          </li>

          <li>
            <?php if (isset($_SESSION['username'])): ?>
              <a href="contact.php">Contact</a>
            <?php else: ?>
              <a href="auth/signin.php" title="Login to access">Contact</a>
            <?php endif; ?>
          </li>

          <li>
            <?php if (isset($_SESSION['username'])): ?>
              <a href="donate.php">Donate</a>
            <?php else: ?>
              <a href="auth/signin.php" title="Login to access">Donate</a>
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
