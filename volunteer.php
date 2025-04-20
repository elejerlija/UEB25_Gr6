<!DOCTYPE html>
<?php include 'footer.php'; 
include 'header.php'; ?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteer & Updates</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
   .error-box {
  background-color: #fef2f2;
  border: 1px solid #fca5a5;
  color: #b91c1c;
  padding: 15px 20px 15px 20px;
  border-radius: 10px;
  margin: 30px auto;
  width: 90%;
  max-width: 600px;
  font-family: 'Segoe UI', sans-serif;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  position: relative;
  animation: fadeIn 0.3s ease-in-out;
}

.error-box h4 {
  margin: 0 0 10px;
  font-size: 18px;
  color: #991b1b;
}

.error-box ul {
  padding-left: 20px;
  margin: 0;
}

.error-box li {
  margin-bottom: 5px;
  line-height: 1.5;
}


.error-box .close-btn {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 20px;
  color: #b91c1c;
  cursor: pointer;
  border: none;
  background: none;
}


@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

    .volunteer-grid{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin: 30px auto;
        max-width: 1200px;
        padding: 20px;
    }
    .volunteer-card{
      background: radial-gradient(circle, rgba(123, 212, 123, 0.957), #f7f7f7);
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .volunteer-card:hover{
        transform: translateY(-5px);
        box-shadow: 0 6px 10px rgba(0, 0, 0,0.15);
    }
    .volunteer-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 15px;
            border-radius: 50%;
            border: 3px solid #26a96c;
        }

    .volunteer-card h3 {
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }

    .volunteer-card p {
            font-size: 0.9em;
            color: #555;
            line-height: 1.5;
        }
    .volunteers{
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .container {
    background: linear-gradient(135deg, rgba(123, 212, 123, 0.957), #f7f7f7);
    padding: 50px 50px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: auto;
    text-align: center;
}

.container h2 {
    font-size: 2rem;
    font-weight: bold;
    color: black;
    margin-bottom: 15px;
    line-height: 1.4;
}

.container p {
    font-size: 1.2em;
    color: #555;
    margin-bottom: 30px;
    line-height: 1.8;
    max-width: 800px;
    margin: 0 auto;
}

.container ul {
    list-style: none;
    padding: 0;
    margin: 0 auto;
    max-width: 600px;
    text-align: left;
}
.container ul li::before {
    content: "✅";
    position: absolute;
    left: 0;
    color: #28a745;
    font-size: 1.2em;
    line-height: 1;
}


.container ul ul {
    padding-left: 20px; 
    margin-top: 5px;
}

.container ul ul li::before {
    content: none; 
}
.container ul li {
    font-size: 1.1em;
    color: black;
    padding: 10px 0;
    position: relative;
    padding-left: 30px;
    line-height: 1.6;
}
.container ul ul li {
  margin-bottom: 3px;
    font-size: 16px;
    color:black;
}

    @media (max-width :768px){
        .container{
            padding: 30px 15px;
        }
        .container h2{
            font-size: 2em;
        }
        .container ul li{
            font-size: 1em;
        }
    }
    .update-item h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }
    .update-item {
            padding: 20px;
            border-left: 6px solid #26a96c;
            margin-bottom: 25px;
            background-color: #fff;
            border-radius: 8px;
            transition: transform 0.3s, box-shadow 0.3s;
        } 
    .update-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }      
    .update-item p {
            margin: 8px 0;
            font-size: 1rem;
        }   
    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 500;
    }
    h2{
      font-size: 2rem;
    }
    .form-group input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #26a96c;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    input[type="submit"]:disabled {
      background-color: white;
    }
    .join-section {
      align-items: center;
      display: flex;
      justify-content: center;
      padding: 40px;
      background-color: white;
      margin-top: 60px;
      margin-bottom: 60px;
      border-radius: 10px;
    }

    .join-form {
      width: 70%;
      background-color: #228929;
      padding: 20px;
      border-radius: 10px;
      color: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .join-form h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .join-form p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .join-form .form-group {
      margin-bottom: 15px;
    }

    .join-form label {
      font-size: 14px;
    }

    .join-form input[type="text"],
    .join-form input[type="email"],
    .join-form input[type="password"]
    .join-form input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ddd;
    }

    .join-form input[type="submit"],input[type="reset"] {
      width: 49%;
      padding: 12px;
      background-color: #fff;
      color: #26a96c;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .join-form input[type="submit"]:hover,input[type="reset"]:hover {
      background-color: #3dae51;
      color: white;
    }
    .gender-options {
      display: flex;
      justify-content: space-around; 
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      background-color: white;
      width: 100%;
    }

    .gender-options label {
      font-size: 16px;
      color: #666;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    input[type="radio"] {
      cursor: pointer;
      margin-right: 10px;
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
    .partnership {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background:linear-gradient(135deg,rgba(123, 212, 123, 0.957),#f7f7f7);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    .title {
      font-size: 24px;
      color: black;
      text-align: center;
      margin-bottom: 20px;
    }
    .partner-list {
      list-style-type: none;
      padding: 0;
    }
    .partner-item:hover{
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
    transition: background-color 0.3s ease, transform 0.3s ease;
    }
    
    .partner-item {
      background-color: #eef2f3;
      color: white;
      margin: 10px 0;
      padding: 15px;
      border-radius: 4px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      transition: all 0.3 ease;
    }
    .partner-item h2 {
      font-size: 18px;
      color: #0a7011;
      margin: 0;
    }
    .partner-item p {
      font-size: 14px;
      color: #555;
      margin: 0;
    }
    .partner-item a {
      font-size: 14px;
      color: #007bff;
      text-decoration: none;
    }
    .partner-item a:hover {
      text-decoration: underline;
    }   
    .calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    max-width: 400px;
    margin: auto;
    font-family: Arial, sans-serif;
  }

  .calendar div {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #333;
    font-size: 14px;
  }

  .calendar div.today {
    background-color: #007bff;
    color: white;
    font-weight: bold;
  }

  .calendar div.event {
    background-color: #28a745;
    color: white;
    font-weight: bold;
    cursor: pointer;
  }

  .calendar div.event:hover {
    background-color: #218838;
  }

  .calendar-header {
    grid-column: span 7;
    text-align: center;
    font-size: 1.2em;
    font-weight: bold;
    margin-bottom: 10px;
  }
</style>
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

        
        <br><br>
<div class="container">
    <section>
        <h2>Join us in making a difference!</h2>
        <p>Volunteering with <mark style="background-color: rgb(26, 145, 26);border-radius: 5px;">HelpSomeone</mark> is a rewarding way to give back to the community. 
            Whether you have a few hours to spare or want to dedicate long-term support, your contributions can create lasting change.</p><br>
            <h2>Why volunteer with us ?</h2>
            <ul>
              <li>Make a Positive Impact
                  <ul>
                      <li style="margin-bottom: 0.02px;">Help improve the lives of those in need</li>
                      <li >Contribute to meaningful projects in your community</li>
                  </ul>
                </li>
              <li>Develop New Skills
                  <ul>
                      <li>Enhance your leadership and communication skills</li>
                      <li >Learn to work in a team and manage projects</li>
                  </ul>
              </li>
              <li>Gain Work Experience and References
                  <ul>
                      <li>Build your resume with valuable volunteer experience</li>
                      <li >Receive letters of recommendation from our organization</li>
                  </ul>
              </li>
          </ul>
    </section>
</div>
<?php

define('ERROR_COLOR', 'red');
define('VOLUNTEER_IMAGE_DIR', 'image/');

$volunteers = [
    ['Rinë Ademi', 'vl4.jpg', 'Rinë is a dedicated charity volunteer who has spent the last five years working tirelessly to support underprivileged families.'],
    ['Emily Carter', 'vl1.jpg', 'Emily has been a key contributor to our health programs, helping organize numerous health camps.'],
    ['James Park', 'vl2.jpg', 'James supports our education initiatives by mentoring students and providing guidance.'],
    ['Harry Williams', 'vl3.jpg', 'Harry has been active in our environmental projects, organizing clean-up drives and tree plantations.'],
];
rsort($volunteers);
echo '<section class="volunteers">';
echo '<h1 style="text-align: center; font-size: 2rem;">Meet Our Volunteers</h1>';
echo '<div class="volunteer-grid">';
foreach ($volunteers as $i => $v) {
    switch (count($v)) {
        case 3:
            $name =$v[0];
            $image = VOLUNTEER_IMAGE_DIR . $v[1];
            $bio = $v[2];
            $firstName = explode(' ', $v[0])[0];

            echo '<div class="volunteer-card">';
            echo '<img src="' . $image . '" alt="' . $name . '">';
            echo '<div>';
            echo '<h3>' . $name . '</h3>';
            echo '<p><i>' . $firstName . '</i> ' . $bio . '</p>';
            echo '</div>';
            echo '</div>';
            break;
        default:
            echo '<p style="color: ' . ERROR_COLOR . ';">Error: Missing data for volunteer at index ' . $i . '.</p>';
            break;
    }
}
echo '</div>';
echo '</section>';
?>
    </div>
</section>
<section>
    <h2 style="color: black; font-size: 2rem; text-align: center; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">Latest Updates From HelpSomeone</h2><br>
    <div class="update-item">
        <h3>Recent Activities</h3>
        <p>Stay informed about our latest events, programs, and success stories.</p>
            <p>December 2024: Successfully distributed 1,000 care packages to families in need.</p>
    </div>
    <div class="update-item">
        <h3>Upcoming Events</h3>
        <p>Don't miss our upcoming events! Mark your calendar and join us.</p>
            <p>Annual Fundraiser Gala – January 15, 2025</p>
    </div>
    <div class="update-item">
        <h3>Community Clean-Up Drive</h3>
        <p>Thanks to our volunteers, we successfully conducted a community clean-up drive in Prishtin&euml;.</p>
        <p>Over 100 volunteers collected 500 pounds of waste to make the community cleaner and greener.</p>
    </div>
    <div class="update-item">
        <h3>Winter Clothing Drive</h3>
        <p>We recently completed our Winter Clothing Drive, distributing warm clothing to over 300 families.</p>
        <p>Thank you to all who donated and participated!</p>
    </div>
</section>
<h2 style="text-align: center; margin: 0 auto;font-size: 2rem;">Event Calendar</h2><br>
<section>
  <div id="event-calendar" class="calendar"></div>
</section>
<section>
  <div class="partnership">
    <h1 class="title" style="font-size: 2rem;">Our Charity Partners</h1>
    <ul class="partner-list" id="partner-list">
      <?php
        $partners = [
            'unicef' => [
                'name' => 'United Nations Children\'s Fund',
                'description' => 'Focuses on providing humanitarian aid, education, and protection to children worldwide',
                'website' => 'https://www.unicef.org/'
            ],
            'redcross' => [
                'name' => 'The Red Cross',
                'description' => 'Provides emergency assistance, disaster relief, and education in communities affected by crises and conflicts.',
                'website' => 'https://www.redcross.org/'
            ],
            'savethechildren' => [
                'name' => 'Save the Children',
                'description' => 'Works to improve the lives of children around the world by providing education, healthcare, and emergency relief.',
                'website' => 'https://www.savethechildren.net/'
            ],
            'oxfam' => [
                'name' => 'Oxfam',
                'description' => 'Works on global poverty alleviation, social justice, and humanitarian issues.',
                'website' => 'https://www.oxfam.org/'
            ]
        ];
        ksort($partners);        
        foreach ($partners as $partner) {
            echo '<li class="partner-item">';
            echo '<h2><a href="' . $partner['website'] . '" target="_blank">' . $partner['name'] . '</a></h2>';
            echo '<p>' . $partner['description'] . '</p>';
            echo '</li>';
        }
      ?>
    </ul>
  </div>
</section>
<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullName = trim($_POST['name']);
    if (empty($fullName)) {
        $errors[] = "Full Name is required!";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullName)) {
        $errors[] = "Full Name must contain only letters and spaces!";
    }
   
    $email = trim($_POST['email']);
    if (empty($email)) {
        $errors[] = "Email is required!";
    } elseif (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email)) {
        $errors[] = "Invalid email format!"; 
    }

  
    $gender = $_POST['gender'] ?? '';
    if (empty($gender)) {
        $errors[] = "Gender is required!";
    }

  
    $ageInput = trim($_POST['age']);
    if ($ageInput === '') {
        $errors[] = "Age is required!";
    } elseif (!ctype_digit($ageInput)) {
        $errors[] = "Age must be a valid number!";
    } else {
        $age = (int)$ageInput;
        if ($age < 18 || $age > 99) {
            $errors[] = "Age must be between 18 and 99!";
        }
    }

    $password = $_POST['password'];
    if (empty($password)) {
        $errors[] = "Password is required!";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include uppercase, lowercase, number, and a symbol!";
    }

  
    $confirmPassword = $_POST['confirmPassword'];
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match!";
    }

  
   
}
?>

<section style="background-color: white;">
  <div class="join-section" id="join-section">
    <div class="join-form">
      <h3>Join Us Today</h3>
      <p>Join Our Team of Volunteers and Help Us Create a Better Tomorrow!</p>
      <form id="joinForm" method="post">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Your Full Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
        </div>
        <div class="form-group">
          <label for="gender">Choose Gender</label>
          <div class="gender-options">
            <label><input type="radio" name="gender" value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'checked' : ''; ?> required> Female</label>
            <label><input type="radio" name="gender" value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'checked' : ''; ?> required> Male</label>
            <label><input type="radio" name="gender" value="Other" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'checked' : ''; ?> required> Other</label>
          </div>
        </div>
        
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" id="age" name="age" placeholder="Your Age" min="18" max="99" value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?>" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Choose a Password" required>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Your Password" required>
        </div>
        <input type="submit" value="Join Now">
        <input type="reset" value="Reset">
      </form>

    
      <?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($errors)) { ?>
        <div class="error-box">
          <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
          <h4>Please fix the following errors:</h4>
          <ul>
            <?php foreach ($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
    <?php } else {
        echo "<div class='success-box'>Registration successful!</div>";
    }
}
?>

    </div>
  </div>
</section>






<script>
document.getElementById("joinForm").addEventListener("submit", function(event) {
    let errors = [];

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const age = document.getElementById("age").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (!/^[a-zA-Z ]+$/.test(name)) {
        errors.push("Full Name must contain only letters and spaces.");
    }

    if (!/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/.test(email)) {
        errors.push("Invalid email format.");
    }

    if (age === '' || isNaN(age) || age < 18 || age > 99) {
        errors.push("Age must be between 18 and 99.");
    }

    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/.test(password)) {
        errors.push("Password must be at least 8 characters and include uppercase, lowercase, number, and a symbol.");
    }

    if (password !== confirmPassword) {
        errors.push("Passwords do not match.");
    }

    if (errors.length > 0) {
        event.preventDefault(); 
        alert("Please fix the following:\n\n" + errors.join("\n"));
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const events = [
        { date: "2025-01-10", name: "Community Cleanup Drive" },
        { date: "2025-01-15", name: "Annual Fundraiser Gala" }
    ];
    const calendarDiv = document.getElementById("event-calendar");

    const today = new Date();
    const year = today.getFullYear();
    const month = today.getMonth();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    const monthNames = [
        "January", "February", "March", "April", "May", "June", 
        "July", "August", "September", "October", "November", "December"
    ];

    
    const headerDiv = document.createElement("div");
    headerDiv.className = "calendar-header";
    headerDiv.textContent = `${monthNames[month]} ${year}`;
    calendarDiv.appendChild(headerDiv);

    
    for (let day = 1; day <= daysInMonth; day++) {
        
        const currentDayString = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
       
        const event = events.find(e => e.date === currentDayString);

        const dayDiv = document.createElement("div");
        dayDiv.textContent = day;

        
        if (
            today.getFullYear() === year &&
            today.getMonth() === month &&
            today.getDate() === day
        ) {
            dayDiv.classList.add("today");
        }

  
        if (event) {
            dayDiv.classList.add("event");
            dayDiv.title = event.name;
            dayDiv.addEventListener("click", () => {
                alert(`Event: ${event.name} on ${event.date}`);
            });
        }

        calendarDiv.appendChild(dayDiv);
    }
});



</script>

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
<script>
window.addEventListener('DOMContentLoaded', function () {
    const errorBox = document.querySelector('.error-box');
    const successBox = document.querySelector('.success-box');

    if (errorBox || successBox) {
        (errorBox || successBox).scrollIntoView({ behavior: 'smooth' });
    }
});
</script>
