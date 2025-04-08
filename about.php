<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #e7ecfe;
    }

    .audio-player {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      flex-direction: column;
      position: relative;
      width: 75px;
    }

    .tooltip {
      position: relative;
      bottom: -10px;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      visibility: hidden;
      opacity: 0;
      transition: visibility 0.2s, opacity 0.2s;
      width: 120px;
      height: 24px;
      border-radius: 12px;
      text-align: center;
    }

    .audio-player:hover .tooltip {
      visibility: visible;
      opacity: 1;
    }

    audio {
      display: none;
    }

    .about-section {
      position: relative;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      background: url(image/Untitled\ design.png) no-repeat center center/cover;
      height: 400px;
      color: white;
      padding-right: 50px;
    }

    .about-section::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to right,
          rgba(0, 0, 0, 0.9) 40%,
          rgba(0, 0, 0, 0.2) 100%);
      z-index: 1;
    }

    #about-2 .row {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 20px;

    }

    .about-item {
      flex: 1;
      margin: 10px;
      background-color: #f9f9f9;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
      transition: transform 0.3s ease, background-color 0.3s ease;
      text-align: center;
    }

    #about-2 h1 {
      font-size: 32px;
      color: #2d6a4f;
      margin-bottom: 10px;
    }

    .about-item i {
      font-size: 50px;
      color: #2d6a4f;
      margin-bottom: 20px;
    }

    .about-item h3 {
      font-size: 24px;
      color: #333;
      margin-bottom: 10px;
    }

    .about-item hr {
      width: 60px;
      height: 4px;
      background-color: #2d6a4f;
      margin: 10px auto;
      border: none;
      border-radius: 2px;
    }

    .about-item p {
      color: #555;
      font-size: 16px;
      line-height: 1.6;
    }

    .about-item:hover {
      background-color: #2d6a4f;
      transform: translateY(-10px);
    }

    .about-item:hover i,
    .about-item:hover h3,
    .about-item:hover p {
      color: #fff;
    }

    .about-item:hover hr {
      background-color: #fff;
    }

    #about-2 {
      margin-top: 40px;

    }

    abbr {
      text-decoration: underline dotted;
      cursor: help;
    }

    abbr:hover {
      color: rgb(88, 212, 88);
      text-decoration: underline;
      transition: color 0.3s ease;
    }


    .content {
      margin-left: 20px;
      position: relative;
      z-index: 2;
      max-width: 700px;
      text-align: left;
    }

    .our-story {
      max-width: 100%;
      margin: 40px auto;
      text-align: center;
      padding: 20px;
      background-color: #e7ecfe;
      border-radius: 8px;
      
    }

    .story-heading {
      margin-bottom: 20px;
    }

    .story-heading h1 {
      font-size: 32px;
      color: #2d6a4f;
      margin-bottom: 10px;
    }

    .story-heading p {
      font-size: 16px;
      color: #555;
      margin-bottom: 20px;
    }

    .story-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
      align-items: start;
    }


    .story-left-content {
      display: flex;
      justify-content: center;
    }

    .story-table {
      width: 100%;
      max-width: 500px;
      border-collapse: collapse;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    .story-table th,
    .story-table td {
      text-align: left;
      padding: 12px 15px;
    }

    .story-table th {
      background-color: #2d6a4f;
      color: white;
      font-size: 16px;
    }

    .story-table td {
      background-color: #fdfdfd;
      color: #333;
      font-size: 14px;
    }

    .story-table tr:nth-child(even) td {
      background-color: #f3f3f3;
    }

    .story-table tr:hover td {
      background-color: #eaf5ff;
    }

    .story-right-content {
      display: flex;
      justify-content: center;
    }

    .story-right-content video {
      width: 100%;
      max-width: 500px;
      border-radius: 8px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .our-story {
      margin-top: 80px;
    }

    .impact-section {
      max-width: 1200px;
      margin: 40px auto;
      padding: 20px;
      background-color: #f2fff4;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .impact-table {
      width: 100%;
      border-collapse: separate;
      margin-top: 20px;
    }

    .impact-table th,
    .impact-table td {
      padding: 15px;
      text-align: left;
      background-color: #ffffff;
      border-radius: 5px;
      border: 1px solid #2d6a4f;
    }

    .impact-table th {
      background-color: #2d6a4f;
      color: white;
      font-size: 16px;
    }

    .impact-table td {
      font-size: 14px;
      color: #333;
    }

    .impact-table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .impact-table tr:nth-child(odd) {
      background-color: #ffffff;
    }

    .impact-table tr:hover {
      background-color: #f2f2f2;
      cursor: pointer;
    }

    .impact-table td:hover {
      background-color: #e7f5e7;
    }

    .impact-section {
      margin-top: 120px;
      margin-bottom: 120px;
    }

    svg {
      position: relative;
      top: 0;
      left: 0;
      z-index: -1;
      opacity: 0.2;
    }

    .card_wrapper {
      position: relative;
      width: 300px;
      height: 390px;
      border-radius: 300px;
      background-color: #2d6a4f;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 40px;
      box-shadow: 8px 8px -16px rgba(0, 0, 0, 0.75);
      transition: height 0.6s ease, box-shadow 0.3s ease;
    }

    .card_wrapper:hover {
      height: 500px;
    }

    .cards {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 50px;
      margin-bottom: 40px;
      padding: 20px 0;

    }

    .team-section {
      max-width: 100%;
      padding: 25px;
      background-color: #dafcde;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .team_image {
      position: relative;
      min-height: 390px;
      width: 100%;
      background-color: #fff;
      border-radius: 300px;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .team_image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .social {
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      gap: 10px;
      z-index: 2;

    }

    .social a {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, transform 0.3s;
    }

    .social a:hover {
      background-color: #2d6a4f;
      transform: scale(1.1);
    }

    .social i {
      font-size: 18px;
      color: #2d6a4f;
      transition: color 0.3s;
    }

    .social a:hover i {
      color: #fff;
    }

    .social a {
      text-decoration: none;
    }

    .card_wrapper:hover {
      height: 500px;
      box-shadow: 12px 12px -20px rgba(0, 0, 0, 0.75);
    }

    .card_wrapper:hover .social {
      opacity: 1;
    }

    .fa-instagram {

      animation-delay: .1s !important;
    }

    .fa-facebook {
      animation-delay: .3s !important;
    }

    .fa-likedin {
      animation-delay: .5s !important;
    }

    .team_detail {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    @keyframes visible_social {
      100% {
        opacity: 1;
        transform: translateY(0px);
      }

      0% {
        opacity: 0;
        transform: translateY(20px);
      }
    }

    #teamID {
      margin-top: 100px;
      margin-bottom: 120px;
    }

    @font-face {
      font-family: "playwrite-cc-au-qld";
      src: url("https://use.typekit.net/af/906336/0000000000000000775845d1/30/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("woff2"),
        url("https://use.typekit.net/af/906336/0000000000000000775845d1/30/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("woff"),
        url("https://use.typekit.net/af/906336/0000000000000000775845d1/30/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("opentype");
      font-display: auto;
      font-style: normal;
      font-stretch: normal;
    }

    .drag-container {
      max-width: 500px;
      margin: 20px auto;
      padding: 15px;
      border-radius: 8px;
      background-color: #cbffc9;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .drag-container h2 {
font-size: 1.5em;
      margin-bottom: 10px;
    }

    .drag-container p {
      font-size: 1em;
      margin-bottom: 15px;
      color: #555;
    }

    .draggable {
      padding: 10px;
      margin-bottom: 10px;
      background-color: #f7fffa;
      border: 2px solid #2d6a4f;
      border-radius: 5px;
      cursor: grab;
      transition: transform 0.2s, background-color 0.2s;
      color: #2d6a4f;
    }

    .draggable:active {
      background-color: #d0e7ff;
      transform: scale(1.05);
      cursor: grabbing;
    }

    .draggable:hover {
      background-color: #e8efff;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <header>

    <div class="top-bar">
      <div class="contact-info">
        <a href="tel:+123456789" style="color: black; text-decoration: none;"><i class="fa-solid fa-phone"
            style="color: #000; font-size: 12px;"> </i> +383 45 333 111</a>&nbsp;&nbsp;&nbsp;
        <a href="mailto:charity.kosova@email.com" target="_blank" style="color: black; text-decoration: none;"> <i
            class="fa-solid fa-envelope" style="color: #000; font-size: 14px;"></i> charity.kosova@gmail.com</a>
      </div>
      <div class="social-links">
        <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook"
            style="color: #1877F2; font-size: 16px;"></i></a>&nbsp;&nbsp;&nbsp;
        <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter"
            style="color: #1DA1F2; font-size: 16px;"></i></a> &nbsp;&nbsp;&nbsp;
        <a href="https://instagram.com" target="_blank"> <i class="fa-brands fa-instagram"
            style=" color:  #DD2A7B; font-size: 16px;"></i></a>
      </div>
    </div>


    <nav class="nav-links">
      <div class="logo">HelpSomeone</div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a>
        <li class="dropdown">
          <a href="#">About Us</a>
          <ul class="dropdown-content">
            <li><a href="#aboutID">Who are we</a></li>
            <li><a href="#impactID">Our Impact</a></li>
            <li><a href="#priorityID">Arrange by Priority</a></li>
            <li><a href="#teamID">Our Team</a></li>
          </ul>
        </li>
        <li> <a href="volunteer.php">Volunteer & Updates</a></li>
        <li> <a href="popular.php">Popular Cases</a></li>
        <li> <a href="contact.php">Contact</a></li>
        <li> <a href="donate.php">Donate</a></li>
      </ul>
     
    </nav>
  </header>

  <section>
    <div class="about-section">
      <div class="content">
        <h1 style="font-size: 2.5em;
      margin-bottom: 20px;">About Us</h1>
        <p style=" font-size: 1.2em;
    margin-bottom: 20px;
    line-height: 1.6;">
          HelpSomeone is a non-profit organization committed to making the world a better place by empowering those in
          need. Our team works relentlessly to drive positive change through outreach programs, fundraising, and
          charitable events. We believe in the transformative power of <abbr title="Kindness, Unity, Love">KUL</abbr>
          and we invite you to be part
          of our mission to spread love and help others.
        </p>
        <div class="audio-player">
          <button id="playAudio" style="background: transparent; color: white; border: none; cursor: pointer;">
            <i class="fa-solid fa-play-circle" style="font-size: 2em;"></i>
          </button>
          <span class="tooltip">Click to play</span>
          <audio id="audio" style="display: none;">
            <source src="audio/about_us.mp3" type="audio/mp4" preload="auto">
            Your browser does not support the audio element.
          </audio>
        </div>
      </div>

  </section>



  <section class="our-story" id="aboutID">
    <div class="story-heading">
      <h1>Our Story</h1>
      <p>
        A timeline of events that define who we are and where we come from. From humble beginnings to impactful
        milestones, here's our journey.
      </p>
    </div>
    <div class="story-content">
      <div class="story-left-content">
        <table class="story-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Event</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2008</td>
              <td>Founded</td>
              <td>Our organization was established by a group of passionate individuals aiming to bring change.</td>
            </tr>
            <tr>
              <td>2010</td>
              <td>First Office</td>
              <td>Opened our first office in a small community to provide direct support and assistance.</td>
            </tr>
            <tr>
              <td>2014</td>
              <td>Community Engagement</td>
              <td>Hosted our first volunteer-driven event with over 500 participants.</td>
            </tr>
            <tr>
              <td>2017</td>
              <td>National Recognition</td>
              <td>Received recognition as a leading non-profit organization in the country.</td>
            </tr>
            <tr>
              <td>2021</td>
              <td>Digital Expansion</td>
              <td>Launched a new website and mobile app to reach more people and streamline support.</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="story-right-content">
        <video controls>
          <source src="video/ourstory.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
    <br>
    <br>

    <div id="about-2">
      <h1>Mission & Vision</h1>
      <div class="content-box-lg">
        <div class="container">
          <div class="row">
            <div class="about-item">
              <i class="fa fa-book"></i>
              <h3> OUR MISSION</h3>
              <hr />
              <p>At HelpSomeone, we strive to make a meaningful difference by empowering communities and transforming
                lives. Our mission is to provide support and opportunities to those in need, fostering a
                world
                where compassion and generosity create lasting change.</p>
            </div>
            <div class="about-item">
              <i class="fa fa-globe"></i>
              <h3>OUR VISION</h3>
              <hr />
              <p>To create a world where every individual has the opportunity to thrive, free from poverty, injustice,
                and
                inequality. We envision a future where kindness and collaboration unite us to overcome challenges and
                build stronger, more compassionate communities.</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="impact-section" id="impactID">
    <h1 style="  text-align: center;font-size: 32px;margin-bottom: 20px; color: #2d6a4f;">Our Impact</h1>
    <table class="impact-table" cellpadding="20" cellspacing="10" >
      <thead>
        <tr>
          <th>Area of Impact</th>
          <th>Main Results</th>
          <th>Numbers & Statistics</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Education</td>
          <td>Schools built and equipped for children in need.</td>
          <td>50+ schools, 10,000+ children helped.</td>
        </tr>
        <tr>
          <td>Healthcare</td>
          <td>Medical equipment and support for healthcare centers.</td>
          <td>20 clinics, 5,000+ patients treated.</td>
        </tr>
        <tr>
          <td>Housing</td>
          <td>Building and renovating homes for homeless families.</td>
          <td>1,000+ homes built or repaired.</td>
        </tr>
        <tr>
          <td>Food Aid</td>
          <td>Food distribution for emergency communities.</td>
          <td>1 million meals distributed.</td>
        </tr>
        <tr>
          <td>Environmental Care</td>
          <td>Tree planting and waste management projects.</td>
          <td>100,000 trees planted.</td>
        </tr>
      </tbody>
    </table>
  </section>
  <section id="priorityID">
    <div id="priority-game" class="drag-container">
      <h2 style="color: #2d6a4f;">Arrange by Priority</h2>
      <p>Drag and drop the values below to rank them from most to least important.</p>

      <div class="draggable" draggable="true" style="font-family: 'playwrite-cc-au-qld', sans-serif;">Compassion</div>
      <div class="draggable" draggable="true" style="font-family: 'playwrite-cc-au-qld', sans-serif;">Generosity</div>
      <div class="draggable" draggable="true" style="font-family: 'playwrite-cc-au-qld', sans-serif;">Kindness</div>
      <div class="draggable" draggable="true" style="font-family: 'playwrite-cc-au-qld', sans-serif;">Community Support
      </div>
      <div class="draggable" draggable="true" style="font-family: 'playwrite-cc-au-qld', sans-serif;">Empathy</div>

      <button onclick="showOrder()"
        style="padding: 10px 20px; background-color: #2d6a4f; color: white; border: none; border-radius: 5px; cursor: pointer;">Show
        Order</button>
      <br>
      <p id="finalOrder"></p>

    </div>
  </section>


  <section id="teamID" class="team-section">
    <div class="team-container" id="team-container">
      <h1 style="color: #2d6a4f; font-size: 2.5em; text-align: center;">Meet Our Team</h1>
    </div>
    <div class="cards">
      <div class="card_wrapper">
        <div class="team_image">
          <img src="image/team_1 (2).png " alt="">
          <div class="social">
            <a href="https://www.instagram.com" target="_blank">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank">
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <div class="team_detail">
          <h2>Niko Johnson </h2>
          <p>Founder & CEO</p>
        </div>
      </div>

      <div class="card_wrapper">
        <div class="team_image">
          <img src="image/team_2.png" alt="">
          <div class="social">
            <a href="https://www.instagram.com" target="_blank">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank">
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <div class="team_detail">
          <h2>Emma Carter</h2>
          <p>Content Writer</p>
        </div>
      </div>

      <div class="card_wrapper">
        <div class="team_image">
          <img src="image/team_3.png" alt="">
          <div class="social">
            <a href="https://www.instagram.com" target="_blank">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com" target="_blank">
              <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.linkedin.com" target="_blank">
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <div class="team_detail">
          <h2>Melissa Mitchell</h2>
          <p>Web Developer</p>
        </div>
      </div>
    </div>
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
        <form class="footer-form">
          <i class="fa-regular fa-envelope" style="color: #ffffff;"></i> <input type="text"
            placeholder="  Leave a message">
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
  const playButton = document.getElementById('playAudio');
  const audioElement = document.getElementById('audio');
  const tooltip = document.querySelector('.tooltip');

  playButton.addEventListener('click', function () {
    if (audioElement.paused) {
      audioElement.play();
      playButton.innerHTML = '<i class="fas fa-pause-circle" style="font-size: 3em;"></i>';
      tooltip.textContent = "Click to pause";
    } else {
      audioElement.pause();
      playButton.innerHTML = '<i class="fa-solid fa-play-circle" style="font-size: 3em;"></i>';
      tooltip.textContent = "Click to play";
    }
  });
  audioElement.addEventListener('ended', function () {
    playButton.innerHTML = '<i class="fa-solid fa-play-circle" style="font-size: 3em;"></i>';
    tooltip.textContent = "Click to play";
  });
  const draggables = document.querySelectorAll('.draggable');
  const container = document.getElementById('priority-game');

  draggables.forEach(draggable => {
    draggable.addEventListener('dragstart', () => {
      draggable.classList.add('dragging');
    });

    draggable.addEventListener('dragend', () => {
      draggable.classList.remove('dragging');
    });
  });
  container.addEventListener('dragover', e => {
    e.preventDefault();
    const afterElement = getDragAfterElement(container, e.clientY);
    const dragging = document.querySelector('.dragging');
    if (afterElement == null) {
      container.appendChild(dragging);
    } else {
      container.insertBefore(dragging, afterElement);
    }
  });
  function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('.draggable:not(.dragging)')];
    return draggableElements.reduce((closest, child) => {
      const box = child.getBoundingClientRect();
      const offset = y - box.top - box.height / 2;
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child };
      } else {
        return closest;
      }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
  }
  function showOrder() {
    const items = document.querySelectorAll('.draggable');
    let order = [];
    items.forEach(item => {
      order.push(item.textContent);
    });
    document.getElementById('finalOrder').textContent = "The order is: " + order.join(", ");
  }
</script>

</html>