<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: signin.php?reason=protected");
    exit();
}

include 'includes/header.php';
include 'includes/footer.php';

showHeader();
?>



<!DOCTYPE html>
 
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteer & Updates</title>
<link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/volunteer.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
    <body>
   
 

        
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

    $fullName = trim($_POST['name'] ?? '');
    if (empty($fullName)) {
        $errors[] = "Full Name is required!";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullName)) {
        $errors[] = "Full Name must contain only letters and spaces!";
    }

    $email = trim($_POST['email'] ?? '');
    if (empty($email)) {
        $errors[] = "Email is required!";
    } elseif (!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email)) {
        $errors[] = "Invalid email format!"; 
    }

    $gender = $_POST['gender'] ?? '';
    if (empty($gender)) {
        $errors[] = "Gender is required!";
    }
    $dob = $_POST['dob'] ?? '';
    if (empty($dob)) {
        $errors[] = "Date of Birth is required!";
    } elseif (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $dob)) {
        $errors[] = "Date of Birth must be in dd/mm/yyyy format!";
    } else {
       
        list($day, $month, $year) = explode('/', $dob);
        $birthDate = new DateTime("$year-$month-$day");
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDate)->y;

        if ($age < 18 || $age > 99) {
            $errors[] = "Age must be between 18 and 99!";
        }
    }
  

    $password = $_POST['password'] ?? '';
    if (empty($password)) {
        $errors[] = "Password is required!";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include uppercase, lowercase, number, and a symbol!";
    }

    $confirmPassword = $_POST['confirmPassword'] ?? '';
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
        <label for="dob">Date of Birth:</label>
        <input type="text" name="dob" id="dob" placeholder="dd/mm/yyyy" required></div>
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
    const dob = document.getElementById("dob").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (!/^[a-zA-Z ]+$/.test(name)) {
        errors.push("Full Name must contain only letters and spaces.");
    }

    if (!/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/.test(email)) {
        errors.push("Invalid email format.");
    }

    if (!/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/.test(dob)) {
    errors.push("Date of Birth must be in dd/mm/yyyy format.");
} else {
    const [day, month, year] = dob.split('/');
    const birthDate = new Date(year, month - 1, day);
    const currentDate = new Date();
    const age = currentDate.getFullYear() - birthDate.getFullYear();
    const monthDifference = currentDate.getMonth() - birthDate.getMonth();

    if (monthDifference < 0 || (monthDifference === 0 && currentDate.getDate() < birthDate.getDate())) {
        age--; 
    }

    if (age < 18 || age > 99) {
        errors.push("Age must be between 18 and 99.");
    }
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

<?php showFooter(); ?>
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
