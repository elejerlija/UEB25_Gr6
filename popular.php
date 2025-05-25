<?php
session_start();
include  'includes/db_conn.php';
include 'includes/header.php';
include 'includes/footer.php';

showHeader();

?>
<?php


$query = "SELECT name, email, comment, case_name, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($query);

$commentsByCase = [];
$allComments = [];

while ($row = $result->fetch_assoc()) {
    $caseName = $row['case_name'];

    if (!isset($commentsByCase[$caseName])) {
        $commentsByCase[$caseName] = 0;
    }
    $commentsByCase[$caseName]++;

    if (!isset($allComments[$caseName])) {
        $allComments[$caseName] = [];
    }
    $allComments[$caseName][] = $row;
}
?>


<?php



class CaseItem
{
    private $id, $title, $description, $amount, $image;
    private $padding, $imageHeight, $imageWidth, $fullText;

    public function __construct($id, $title, $description, $amount, $image, $padding, $imageHeight, $imageWidth, $fullText)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->amount = $amount;
        $this->image = $image;
        $this->padding = $padding;
        $this->imageHeight = $imageHeight;
        $this->imageWidth = $imageWidth;
        $this->fullText = $fullText;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getAmount()
    {
        return $this->amount;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getPadding()
    {
        return $this->padding;
    }
    public function getImageHeight()
    {
        return $this->imageHeight;
    }
    public function getImageWidth()
    {
        return $this->imageWidth;
    }
    public function getFullText()
    {
        return $this->fullText;
    }
}

$cases = [
    new CaseItem(
        "modal4",
        "Help us to Send Food",
        "Raised: $5000 | Goal: $9000",
        30,
        "image/popular-5.jpg",
        "17px",
        "135",
        "200",
        "Every day, millions of people around the world go to bed hungry. We are on a mission to change that. 
        By supporting our cause, you are helping us deliver essential food supplies to communities in need.
         Your contribution ensures that families, especially children, receive nutritious meals and hope for a better tomorrow."
    ),
    new CaseItem(
        "modal5",
        "Clothes For Everyone",
        "Raised: $6000 | Goal: $12000",
        50,
        "image/popular-2.jpg",
        "15px",
        "135",
        "200",
        "Access to clean, warm, and suitable clothing is essential for health and dignity. Through this initiative,
         we aim to provide clothing to those who need it most—displaced families, refugees, and underprivileged communities.
          Join us in wrapping the world in warmth and kindness."
    ),
    new CaseItem(
        "modal6",
        "Water For All Children",
        "Raised: $7000 | Goal: $10000",
        70,
        "image/popular-3.jpg",
        "14px",
        "135",
        "200",
        "Clean and safe drinking water is a fundamental right. Millions of children around the world still suffer due to lack
         of access to clean water. Our project focuses on building sustainable water sources in remote villages to ensure every
          child can grow up healthy and strong."
    ),
    new CaseItem(
        "modal7",
        "Education For Everyone",
        "Raised: $4000 | Goal: $8000",
        40,
        "image/popular-4.jpg",
        "3px",
        "135",
        "200",
        "Education is the key to breaking the cycle of poverty. Unfortunately, many children lack access to even the most basic educational resources. We are building schools, providing books, and training teachers in underserved areas. Be part of shaping a brighter future for all."
    ),
    new CaseItem(
        "modal8",
        "Medical Support",
        "Raised: $8000 | Goal: $15000",
        50,
        "image/popular-1.jpg",
        "15px",
        "135",
        "200",
        "In many parts of the world, access to healthcare remains a privilege. Our campaign focuses on delivering medical supplies, funding treatments, and supporting healthcare workers in crisis zones. With your help, we can ensure that more lives are saved and suffering is reduced."
    ),
    new CaseItem(
        "modal9",
        "Homes for Everyone",
        "Raised: $2500 | Goal: $10000",
        25,
        "image/popular-6.jpg",
        "15px",
        "135",
        "200",
        "A safe and secure home is more than just a roof over one’s head—it’s a foundation for a better life. This project builds affordable housing for families living in extreme poverty, giving them hope and a place to call their own. Help us lay the bricks of compassion and care."
    )
];

$success = "";
$error = "";

if (isset($_POST['submit-general-comment'])) {
    $name = trim($_POST['name']); // e merr nga session ose inputi si "full name"
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    $selected_case = trim($_POST['selected_case']);

    if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,50}$/", name)) {
        $error = "The name must contain only letters and be between 2-50 characters.";
    } elseif (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "The email address is not valid.";
    } elseif (strlen($comment) < 5) {
        $error = "The comment is too short (minimum 5 characters).";
    } elseif (empty($selected_case)) {
        $error = "Please select a case.";
    } else {
        $stmt = $conn->prepare("INSERT INTO comments (name, email, comment, case_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $comment, $selected_case);
        $stmt->execute();
        $stmt->close();

        $_SESSION['success_message'] = "Thank you for your opinion on the case: $selected_case!";
        header("Location: comments.php");
        exit;
    }
}


class Modal
{
    private $id;
    private $title;
    private $content;

    public function __construct($id, $title, $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
    }

    public function render()
    {
        echo '<div id="' . $this->id . '" class="modal">';
        echo '<h2>' . $this->title . '</h2>';
        echo '<p>"' . $this->content . '"</p>';
        echo '<a href="#" class="close-btn">Close</a>';
        echo '</div>';
    }
}

$modals = [
    new Modal(
        'modal1',
        'Global Health',
        'Health and wellbeing are the cornerstones of thriving communities.
        Around the world, millions of people face preventable illnesses, lack access to essential healthcare,
         and endure living conditions that hinder their physical and mental health. Our global health initiatives 
         focus on combating diseases, improving sanitation, and expanding access to vital medical services and education 
         in underserved areas. By addressing these critical issues, we strive to build a healthier, more equitable world 
         where everyone has the opportunity to lead a fulfilling life. Explore how our partner charities are transforming
          lives through innovative and impactful health programs.'
    ),
    new Modal(
        'modal2',
        'Animal Welfare',
        'The well-being of animals is a vital part of creating a compassionate and sustainable world. Millions of animals
         suffer daily due to neglect, abuse, or exploitation in various industries and environments. Our animal welfare initiatives
          focus on protecting and improving the lives of animals, whether through rescuing those in need, advocating for stronger 
          animal protection laws, or promoting ethical and sustainable practices. By supporting our efforts, you can help ensure that
           all animals, from pets to wildlife, are treated with the care, respect, and dignity they deserve.'
    ),
    new Modal(
        'modal3',
        'Reducing Global Catastrophic Risks',
        'Global catastrophic risks pose a significant threat to humanity and our planet\'s future. These risks include pandemics,
         climate change, nuclear conflict, and emerging technologies that could have unintended, far-reaching consequences. Our initiatives 
         aim to identify, mitigate, and prepare for these potential crises through research, advocacy, and international collaboration.
          By addressing these challenges proactively, we can protect our global community and ensure a safer, more resilient future for
           generations to come. Your support is crucial in helping us tackle the most pressing risks to humanity\'s survival and progress.'
    ),
    new Modal(
        'modal-evaluators',
        'Trusted Evaluators',
        'Donating to a cause is an act of trust and generosity, and ensuring your contributions make the greatest impact is our shared goal.
         Trusted evaluators are independent organizations and experts dedicated to assessing charities and initiatives based on their 
         effectiveness, transparency, and overall impact. By relying on these evaluations, donors can make informed decisions and support 
         the causes that deliver the highest value. Partner with us to amplify your impact, and let’s work together to ensure every donation
          creates meaningful, lasting change.'
    )
];

foreach ($modals as $modal) {
    $modal->render();
}

$commentsByCase = [];
if ($result = $conn->query("SELECT case_name, COUNT(*) as total FROM comments GROUP BY case_name")) {
    while ($row = $result->fetch_assoc()) {
        $commentsByCase[$row['case_name']] = (int)$row['total'];
    }
    $result->free();
}

$allComments = [];
if ($commentsQuery = $conn->query("SELECT * FROM comments ORDER BY created_at DESC")) {
    while ($row = $commentsQuery->fetch_assoc()) {
        $allComments[$row['case_name']][] = $row;
    }
    $commentsQuery->free();
}

?>


<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>



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

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>


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
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .comment-intro {
            font-size: 1.1em;
            color: #333;
            margin: 20px 0;
        }

        .toggle-comment-form {
            background-color: rgb(5, 91, 38);
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
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            border-color: rgb(0, 184, 89);
            outline: none;
        }

        .public-comment-form button[type="submit"] {
            background-color: rgb(22, 90, 32);
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

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    <?php


    global $phone, $email, $facebook, $twitter, $instagram, $site_name;
    ?>


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>


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

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

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

                        <?php
                        $caseName = $case->getTitle();
                        $commentCount = $commentsByCase[$caseName] ?? 0;
                        ?>

                        <details data-case="<?= htmlspecialchars($caseName) ?>">
                            <summary>💬 Comments (<?= $commentCount ?>)</summary>
                            <?php if (!empty($allComments[$caseName])): ?>
                                <ul>
                                    <?php foreach ($allComments[$caseName] as $c): ?>
                                        <li>
                                            <strong><?= htmlspecialchars($c['name']) ?> :</strong>
                                            <?= htmlspecialchars($c['comment']) ?>
                                            <br><em><?= date("d M Y", strtotime($c['created_at'])) ?></em>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No comments yet.</p>
                            <?php endif; ?>
                        </details>

                        <a href="#<?= $case->getId(); ?>" class="open-modal">Read</a>
                    </div>
                <?php endforeach; ?>
            </div>
    </fieldset>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>



    <div id="modal-overlay"></div>

    <?php foreach ($cases as $case): ?>
        <div id="<?= $case->getId(); ?>" class="modal">
            <div class="modal-content">
                <h3><?= $case->getTitle(); ?></h3><br>
                <p><?= $case->getFullText(); ?></p>
                <a href="#" class="close-btn">Close</a>
            </div>
        </div>
    <?php endforeach; ?>


    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    <fieldset class="comment-fieldset" id="comment-section">
        <legend>💬 Share Your Opinion
        </legend>

        <p class="comment-intro">
            Share your thoughts on one of our cases. We really care about what you think! 😊 </p>

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

            <!-- MUNDEMI ME PERDRO KETE PER TESTIM ->  <form method="post" action="popular.php">  -->
            <form id="comment-form">


                <div class="form-group">
                    <input type="text" name="name" value="<?= $_SESSION['name'] ?? '' ?>" readonly>                </div>

                <input type="email" name="email" value="<?= $_SESSION['email']  ?? '' ?>" readonly>

                <select name="selected_case">
                    <option value="">Choose a Case...
                    </option>
                    <option value="Help us to Send Food" <?= ($_POST['selected_case'] ?? '') === 'Help us to Send Food' ? 'selected' : '' ?>>Help us to Send Food</option>
                    <option value="Clothes For Everyone" <?= ($_POST['selected_case'] ?? '') === 'Clothes For Everyone' ? 'selected' : '' ?>>Clothes For Everyone</option>
                    <option value="Water For All Children" <?= ($_POST['selected_case'] ?? '') === 'Water For All Children' ? 'selected' : '' ?>> Water For All Children</option>
                    <option value="Education For Everyone" <?= ($_POST['selected_case'] ?? '') === 'Education For Everyone' ? 'selected' : '' ?>>Education For Everyone</option>
                    <option value="Medical Support" <?= ($_POST['selected_case'] ?? '') === 'Medical Support' ? 'selected' : '' ?>>Medical Support</option>
                    <option value="Homes for Everyone" <?= ($_POST['selected_case'] ?? '') === 'Homes for Everyone' ? 'selected' : '' ?>>Homes for Everyone</option>
                </select>

                <textarea name="comment" rows="5" placeholder="Write your opinion here..."><?= htmlspecialchars($_POST['comment'] ?? '') ?></textarea>

                <button type="submit" name="submit-general-comment">Submit</button>

            </form>
        </div>
    </fieldset>

    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>


    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>


    </fieldset>
    <?php showFooter(); ?>
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            $('a[href^="#modal"]').on('click', function(e) {
                e.preventDefault();
                $($(this).attr('href')).show();
                $('#modal-overlay').show();
            });

            $('.close-btn').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.modal').hide();
                $('#modal-overlay').hide();
            });


            ["donations", "volunteers", "projects"].forEach(id =>
                animateNumber(id, {
                    donations: 1250,
                    volunteers: 250,
                    projects: 45
                } [id])
            );

            function animateNumber(id, target) {
                let current = 0;
                const step = Math.ceil(target / 100);
                const el = document.getElementById(id);
                const interval = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(interval);
                    }
                    el.textContent = current;
                }, 20);
            }


            window.togglePublicCommentForm = function() {
                const form = document.getElementById("public-comment-form");
                form.classList.toggle("visible");
                document.querySelector(".custom-success")?.remove();
                if (form.classList.contains("visible")) {
                    setTimeout(() => form.scrollIntoView({
                        behavior: "smooth"
                    }), 50);
                }
            }


            document.getElementById("comment-form").addEventListener("submit", async function(e) {
                e.preventDefault();
                const res = await fetch("submit_comment.php", {
                    method: "POST",
                    body: new FormData(this)
                });
                const data = await res.json();
                if (!data.success) return alert("Error: " + data.message);


                document.getElementById("public-comment-form").classList.remove("visible");
                document.getElementById("comment-section").insertAdjacentHTML(
                    "beforeend",
                    `<p class="custom-success">${data.message}</p>`
                );


                const d = data.data;
                const comment = `
            <li><strong>${d.name}:</strong> ${d.comment}<br><em>${d.created_at}</em></li> `;
                document.querySelectorAll("details").forEach(detail => {
                    if (detail.dataset.case === d.case_name) {
                        let ul = detail.querySelector("ul");
                        if (!ul) {
                            ul = document.createElement("ul");
                            detail.querySelector("p")?.remove();
                            detail.appendChild(ul);
                        }
                        ul.insertAdjacentHTML("afterbegin", comment);
                        const summary = detail.querySelector("summary");
                        const m = summary.innerText.match(/Comments \((\d+)\)/);
                        if (m) summary.innerText = `💬 Comments (${+m[1] + 1})`;
                    }
                });

                this.reset();
            });
        });
    </script>



    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

</body>

</html>