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


<?php


class CaseItem {
    private $id;
    private $title;
    private $description;
    private $amount;
    private $image;
    private $padding;
    private $imageHeight;
    private $imageWidth;

    public function __construct($id, $title, $description, $amount, $image, $padding, $imageHeight, $imageWidth) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->amount = $amount;
        $this->image = $image;
        $this->padding = $padding;
        $this->imageHeight = $imageHeight;
        $this->imageWidth = $imageWidth;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getAmount() {
        return $this->amount;
    }
    public function getImage() {
        return $this->image;
    }
    public function getPadding() {
        return $this->padding;
    }
    public function getImageHeight() {
        return $this->imageHeight;
    }
    public function getImageWidth() {
        return $this->imageWidth;
    }
}

$cases = [
    new CaseItem("modal4", "Help us to Send Food", "Raised: $5000 | Goal: $9000", 30, "image/popular-5.jpg", "17px", "135", "200"),
    new CaseItem("modal5", "Clothes For Everyone", "Raised: $6000 | Goal: $12000", 50, "image/popular-2.jpg", "15px", "135", "200"),
    new CaseItem("modal6", "Water For All Children", "Raised: $7000 | Goal: $10000", 70, "image/popular-3.jpg", "14px", "135", "200"),
    new CaseItem("modal7", "Education For Everyone", "Raised: $4000 | Goal: $8000", 40, "image/popular-4.jpg", "3px", "135", "200"),
    new CaseItem("modal8", "Medical Support", "Raised: $8000 | Goal: $15000", 50, "image/popular-1.jpg", "15px", "135", "200"),
    new CaseItem("modal9", "Homes for Everyone", "Raised: $2500 | Goal: $10000", 25, "image/popular-6.jpg", "15px", "135", "200")
];
?>
<?php

$success = "";
$error = "";

if (isset($_POST['submit-general-comment'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    $selected_case = trim($_POST['selected_case']);

    if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,30}$/", $name)) {
        $error = "The name must contain only letters and be between 2-30 characters.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,30}$/", $surname)) {
        $error = "The surname must contain only letters and be between 2-30 characters.";
    } elseif (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "The email address is not valid.";
    } elseif (strlen($comment) < 5) {
        $error = "The comment is too short (minimum 5 characters).";
    } elseif (empty($selected_case)) {
        $error = "Please select a case.";
    } else {
        $success = "Thank you for your opinion on the case: $selected_case!";
    }

    if ($success) {
        $_SESSION['success_message'] = $success;
        header("Location: " . strtok($_SERVER["REQUEST_URI"], '?') . "#comment-section");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impactful Giving</title>

    <link rel="stylesheet" href="style/popular.css">
    <link rel="stylesheet" href="style/style.css">
    <script src="script.js" defer></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


    <style>
        a.visited {
            color: rgb(9, 161, 148);
        }

        #form-success {
    opacity: 1;
    transition: opacity 0.5s ease;
}

        
.comment-fieldset {
  border: 4px solidrgb(17, 105, 61);
  border-radius: 15px;
  padding: 40px;
  margin: 80px auto;
  max-width: 1000px;
  background: linear-gradient(to right, #f0fdfa, #ffffff);
  box-shadow: 0 12px 30px rgba(0,0,0,0.1);
  position: relative;
  text-align: center;
}

.comment-fieldset legend {
  font-size: 1.8em;
  font-weight: bold;
  color: #00796b;
  padding: 0 20px;
  background-color: #f0fdfa;
  border: 2px dashedrgb(16, 92, 37);
  border-radius: 20px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
}

.comment-intro {
  font-size: 1.1em;
  color: #333;
  margin: 20px 0;
}

.toggle-comment-form {
  background-color:rgb(5, 91, 38);
  color: white;
  padding: 14px 28px;
  font-size: 1.1em;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.toggle-comment-form:hover {
  background-color: #00897b;
}

.public-comment-form {
  margin-top: 30px;
  display: none;
  animation: fadeIn 0.4s ease forwards;
}

.public-comment-form.visible {
  display: block;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(15px); }
  to { opacity: 1; transform: translateY(0); }
}

.public-comment-form form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 16px;
  margin-top: 20px;
}

.public-comment-form .form-group {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  width: 100%;
  justify-content: center;
}

.public-comment-form input,
.public-comment-form textarea,
.public-comment-form select {
  width: 80%;
  max-width: 550px;
  padding: 12px;
  font-size: 1em;
  border: 1px solid #ccc;
  border-radius: 8px;
  transition: border 0.2s ease;
}

.public-comment-form input:focus,
.public-comment-form textarea:focus,
.public-comment-form select:focus {
  border-color:rgb(0, 184, 89);
  outline: none;
}

.public-comment-form button[type="submit"] {
  background-color:rgb(22, 90, 32);
  color: white;
  padding: 12px 35px;
  font-size: 1em;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.public-comment-form button[type="submit"]:hover {
  background-color: #004d40;
}

.message {
  font-weight: bold;
  margin-bottom: 10px;
  font-size: 1em;
}
.message.error {
  color: #d63031;
}
.message.success {
  color: #2ecc71;
}
.custom-success {
    text-align: center;
    margin-top: 20px;
    font-size: 1.1em;
    background-color: #d4edda;
    color: #155724;
    padding: 12px 20px;
    border: 1px solid #c3e6cb;
    border-radius: 10px;
    animation: fadeIn 0.5s ease-in-out;
}

</style>



</head>

<body>




    <div class="header-2">
        <h1>Impactful Giving</h1>
        <p>"Making a difference, one donation at a time."</p>
    </div>

    <div class="stats-board">
        <div class="stat-item">
            <i class="fa fa-heart"></i>
            <div class="stat-number" id="donations">0</div>
            <div class="stat-label">Donations</div>
        </div>
        <div class="stat-item">
            <i class="fa fa-users"></i>
            <div class="stat-number" id="volunteers">0</div>
            <div class="stat-label">Volunteers</div>
        </div>
        <div class="stat-item">
            <i class="fa fa-handshake"></i>
            <div class="stat-number" id="projects">0</div>
            <div class="stat-label">Projects</div>
        </div>
    </div>

    <div class="horizontal-container">
        <div class="section">
            <h2>What we look for</h2>
            <div class="criteria">
                <div class="focus-item" style="padding: 9px;">
                    <div class="icon">⚡</div>
                    <div>
                        <h3>Extreme effectiveness</h3>
                        <p>Charities that demonstrably maximise the good they do with each dollar donated.</p>
                    </div>
                </div>
                <div class="focus-item">
                    <div class="icon">🧪</div>
                    <div>
                        <h3>Research based</h3>
                        <p>Charities that operate evidence-backed programs or that experts estimate have very high
                            expected impact.</p>
                    </div>
                </div>
                <div class="focus-item">
                    <div class="icon">✔️</div>
                    <div>
                        <h3>Third-party evaluated</h3>
                        <p>Charities that have been vetted by the research of industry-leading charity evaluators.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <h2>Where we focus</h2><br><br>
            <p class="focus-question"> → To have the biggest impact</p>

            <div class="focus-item" style="padding: 15px;">
                <span class="icon" style="margin-right: 30px; margin-top: 15px;">&#10010;</span>
                <div>
                    <h3>Global health and wellbeing</h3><BR>
                    <a href="#modal1">See charities →</a>
                </div>
            </div>

            <div class="focus-item" style="padding: 15px;">
                <span class="icon" style="margin-right: 20px; margin-left: -7px; margin-top: 10px;">&#128062;</span>
                <div>
                    <h3>Animal welfare</h3><BR>
                    <a href="#modal2">See charities →</a>
                </div>
            </div>

            <div class="focus-item" style="padding: 15px;">
                <span class="icon" style="margin-right: 20px; margin-left: -7px; margin-top: 10px;">&#127748;</span>
                <div>
                    <h3>Reducing global catastrophic risks</h3><BR>
                    <a href="#modal3">See charities →</a>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Who we look to</h2><br>
            <p> → For the best Charities</p><br>
            <p>
                Trusted, transparent, third-party evaluators play a critical role in our recommendations.<BR> And we
                don’t
                just rely on any evaluator — we research
                <a href="#modal-evaluators" class="modal-link">which evaluators can best help donors maximise their
                    impact</a>.
            </p>
            <br>
            <div class="focus-item">
                <span class="icon">&#9733;</span>
                <p>Innovative ideas and tools.</p>
            </div>
            <div class="focus-item">
                <span class="icon">&#128161;</span>
                <p>Illuminating research.</p>
            </div>
            <div class="focus-item">
                <span class="icon">&#128176;</span>
                <p>High-value opportunities.</p>
            </div>
        </div>
    </div>

    <div id="modal1" class="modal">
        <h2>Global Health</h2>
        <p>"Health and wellbeing are the cornerstones of thriving communities.
            Around the world, millions of people face preventable illnesses,
            lack access to essential healthcare, and endure living conditions that
            hinder their physical and mental health. Our global health initiatives
            focus on combating diseases, improving sanitation, and expanding access
            to vital medical services and education in underserved areas. By addressing
            these critical issues, we strive to build a healthier, more equitable world
            where everyone has the opportunity to lead a fulfilling life. Explore how
            our partner charities are transforming lives through innovative and impactful health programs."</p>
        <a href="#" class="close-btn">Close</a>
    </div>
    <div id="modal2" class="modal">
        <h2>Animal Welfare</h2>
        <p>"The well-being of animals is a vital part of creating a compassionate
            and sustainable world. Millions of animals suffer daily due to neglect,
            abuse, or exploitation in various industries and environments.
            Our animal welfare initiatives focus on protecting and improving the lives
            of animals, whether through rescuing those in need, advocating for stronger
            animal protection laws, or promoting ethical and sustainable practices.
            By supporting our efforts, you can help ensure that all animals,
            from pets to wildlife, are treated with the care, respect, and dignity they deserve."</p>
        <a href="#" class="close-btn">Close</a>
    </div>
    <div id="modal3" class="modal">
        <h2>Reducing Global Catastrophic Risks</h2>
        <p>"Global catastrophic risks pose a significant threat to humanity and our planet's future.
            These risks include pandemics, climate change, nuclear conflict, and emerging technologies
            that could have unintended, far-reaching consequences. Our initiatives aim to identify,
            mitigate, and prepare for these potential crises through research, advocacy,
            and international collaboration. By addressing these challenges proactively,
            we can protect our global community and ensure a safer, more resilient future
            for generations to come. Your support is crucial in helping us tackle the most
            pressing risks to humanity's survival and progress."</p>
        <a href="#" class="close-btn">Close</a>
    </div>
    <div id="modal-evaluators" class="modal">
        <h2>Trusted Evaluators</h2>
        <p>"Donating to a cause is an act of trust and generosity, and ensuring your contributions
            make the greatest impact is our shared goal. Trusted evaluators are independent organizations
            and experts dedicated to assessing charities and initiatives based on their effectiveness,
            transparency, and overall impact. By relying on these evaluations, donors can make informed
            decisions and support the causes that deliver the highest value. Partner with us to amplify
            your impact, and let’s work together to ensure every donation creates meaningful, lasting change."</p>
        <a href="#" class="close-btn">Close</a>
    </div>

    <fieldset>
        <legend>Popular Cases</legend>
        <div class="div">
        <div class="cases-container">
    <?php foreach ($cases as $case): ?>
        <div class="case">
            <img 
                src="<?= $case->getImage(); ?>" 
                alt="Case image" 
                style="height: <?= $case->getImageHeight(); ?>px; width: <?= $case->getImageWidth(); ?>px; object-fit: cover;">
            
            <div class="progress-bar">
                <span style="width: <?= $case->getAmount(); ?>%;"></span>
            </div><br>

            <h3 style="padding: <?= $case->getPadding(); ?>;"><?= $case->getTitle(); ?></h3>
            <p><?= $case->getDescription(); ?></p>
            <a href="#<?= $case->getId(); ?>" class="open-modal">Read</a>
        </div>
    <?php endforeach; ?>
</div>


        </div>

<div id="modal-overlay"></div>


        <div id="modal4" class="modal">
            <div class="modal-content">
                <h3>Help us to Send Food</h3><br>
                <p>"Every day, millions of people around the world go to bed hungry, with many
                    struggling to find their next meal. Hunger affects not just physical health
                    but also emotional well-being and the ability to thrive. Our mission is to
                    provide life-saving food aid to families and communities facing acute hunger
                    crises. With your support, we can distribute nutritious meals, partner with
                    local organizations for sustainable food solutions, and ensure that no one has
                    to endure the pain of an empty stomach. Together, we can fight hunger and give
                    hope to those who need it most."


                </p>
                <a href="#" class="close-btn">Close</a>
            </div>
        </div>

        <div id="modal5" class="modal">
            <div class="modal-content">
                <h3>Clothes For Everyone</h3><br>
                <p>"Access to clean, warm, and suitable clothing is essential for maintaining
                    dignity and resilience, yet many individuals face daily hardships without
                    this basic necessity. Our initiative focuses on collecting, creating, and
                    distributing clothing to people in need, from families affected by natural
                    disasters to homeless individuals seeking warmth during harsh winters.
                    Every piece of clothing you help provide means protection, comfort, and
                    a renewed sense of hope for those who receive it. Join us in bringing warmth
                    and dignity to lives across the globe, one garment at a time."</p>
                <a href="#" class="close-btn">Close</a>
            </div>
        </div>

        <div id="modal6" class="modal">
            <div class="modal-content">
                <h3>Water For All Children</h3><br>
                <p>"Clean and safe drinking water is a fundamental right, yet millions of
                    children worldwide lack access to this life-sustaining resource.
                    Contaminated water leads to diseases, malnutrition, and high mortality rates,
                    especially in impoverished regions. Our initiative works to install
                    sustainable water systems, train communities in water conservation,
                    and provide immediate access to clean water for children and families.
                    Together, we can reduce waterborne illnesses, improve health, and ensure
                    every child has a chance to grow and thrive with this basic necessity met."</p>
                <a href="#" class="close-btn">Close</a>
            </div>
        </div>
        <div id="modal7" class="modal">
            <h2>Education For Everyone</h2><br>
            <p>"Education is the key to breaking the cycle of poverty and unlocking potential,
                yet millions of children and adults around the world remain without access
                to quality learning opportunities. Our initiative aims to provide essential
                resources, such as school supplies, trained teachers, and safe learning environments,
                to underserved communities. By investing in education, we empower individuals to
                build better futures, improve their communities, and inspire generations to come.
                Your support helps transform lives, one classroom at a time, and ensures that everyone,
                regardless of background, has a chance to learn and succeed."</p>
            <a href="#" class="close-btn">Close</a>
        </div>
        <div id="modal8" class="modal">
            <h2>Medical Support</h2><br>
            <p>"In many parts of the world, access to healthcare remains a privilege rather than a basic right
                . Illness and injury can devastate families without the means to pay for medical treatment.
                Our medical support programs focus on delivering essential healthcare services, medicines,
                and equipment to underserved communities. We also work to train local healthcare providers
                and establish long-term medical infrastructure to ensure lasting impact. With your help,
                we can save lives, alleviate suffering, and bring hope to those who face health challenges
                without the resources they need."</p>
            <a href="#" class="close-btn">Close</a>
        </div>
        <div id="modal9" class="modal">
            <h2>Homes for Everyone</h2><br>
            <p>"A safe and secure home is more than just a roof over one’s head—it is a foundation for stability,
                safety, and a better future. Millions of people around the world live without adequate shelter,
                exposing them to harsh weather, illness, and insecurity. Our mission is to provide housing solutions,
                from emergency shelters for those displaced by disasters to permanent homes for families in need.
                We also focus on empowering communities through skills training and sustainable building practices.
                With your support, we can help turn the dream of a safe home into a reality for countless
                individuals and families."</p>
            <a href="#" class="close-btn">Close</a>
        </div>
    </fieldset>

    
 <fieldset class="comment-fieldset" id="comment-section">
  <legend>💬 Share Your Opinion
  </legend>

  <p class="comment-intro">
  Share your thoughts on one of our cases. We really care about what you think! 😊  </p>

  <button onclick="togglePublicCommentForm()" class="toggle-comment-form">📣 Write Your Opinion
  </button>
  <?php
    if (isset($_SESSION['success_message'])) {
        echo "<p id='form-success' class='message success custom-success'>{$_SESSION['success_message']}</p>";
        unset($_SESSION['success_message']); 
    }
?>



  <div id="public-comment-form" class="public-comment-form">
  

    <?php if (!empty($error)) echo "<p class='message error'>$error</p>"; ?>

    <form method="post" action="#comment-section">
    <div class="form-group">
    <input type="text" name="name" placeholder="Name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
    <input type="text" name="surname" placeholder="Surname" value="<?= htmlspecialchars($_POST['surname'] ?? '') ?>">
    </div>

    <input type="email" name="email" placeholder="Email (optional)" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

      <select name="selected_case">
        <option value="">Choose a Case...
        </option>
        <option value="Help us to Send Food"><?= ($_POST['selected_case'] ?? '') === 'Help us to Send Food' ? 'selected' : '' ?> Help us to Send Food</option>
        <option value="Clothes For Everyone"><?= ($_POST['selected_case'] ?? '') === 'Clothes For Everyone' ? 'selected' : '' ?> Clothes For Everyone</option>
        <option value="Water For All Children"><?= ($_POST['selected_case'] ?? '') === 'Water For All Children' ? 'selected' : '' ?> Water For All Children</option>
        <option value="Education For Everyone"><?= ($_POST['selected_case'] ?? '') === 'Education For Everyone' ? 'selected' : '' ?> Education For Everyone</option>
        <option value="Medical Support"><?= ($_POST['selected_case'] ?? '') === 'Medical Support' ? 'selected' : '' ?> Medical Support</option>
        <option value="Homes for Everyone"><?= ($_POST['selected_case'] ?? '') === 'Homes for Everyone' ? 'selected' : '' ?> Homes for Everyone</option>
      </select>

      <textarea name="comment" rows="5" placeholder="Write your opinion here..."><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>

      <button type="submit" name="submit-general-comment">💾 Submit Your Opinion
      </button>
    </form>
  </div>


</fieldset>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>


    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>


    </fieldset>
      <?php showFooter(); ?>

    <script>

        $('a[href^="#modal"]').on('click', function (event) {
            event.preventDefault();
            const modalId = $(this).attr('href');
            const $modal = $(modalId);
            const $overlay = $('#modal-overlay');

            if ($modal.length) {
                $modal.css('display', 'block');
                $overlay.css('display', 'block');
            }
        });


        $(document).ready(function () {
            $('a').on('click', function () {
                $(this).addClass('visited');
            });
        });


        document.querySelectorAll('.close-btn').forEach(button => {
            button.addEventListener('click', event => {
                event.preventDefault();
                const modal = event.target.closest('.modal');
                const overlay = document.getElementById('modal-overlay');

                modal.style.display = 'none';
                overlay.style.display = 'none';
            });
        });

        function animateNumber(id, target) {
            let current = 0;
            const increment = Math.ceil(target / 100);
            const element = document.getElementById(id);

            const interval = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(interval);
                }
                element.textContent = current;
            }, 20);
        }


        animateNumber('donations', 1250);
        animateNumber('volunteers', 250);
        animateNumber('projects', 45);


    </script>
  
        
            <script>
            function togglePublicCommentForm() {
                const form = document.getElementById("public-comment-form");
                form.classList.toggle("visible");

                if (form.classList.contains("visible")) {
                    setTimeout(() => {
                        form.scrollIntoView({ behavior: "smooth", block: "start" });
                    }, 50);
                }
            }

            </script>



<script>
document.addEventListener("DOMContentLoaded", function () {
    const error = <?= json_encode($error) ?>;
    const success = <?= json_encode($success) ?>;
    const form = document.getElementById("public-comment-form");
    const successMsg = document.getElementById("form-success");

    if (error) {
        form.classList.add("visible");
        setTimeout(() => {
            form.scrollIntoView({ behavior: "smooth", block: "start" });
        }, 100);
    }

    if (successMsg) {
        setTimeout(() => {
            successMsg.style.opacity = "0";
            successMsg.style.transition = "opacity 0.5s ease";
        }, 3000);

        setTimeout(() => {
            successMsg.style.display = "none";
        }, 3500);
    }
});
</script>
</body>
</html>