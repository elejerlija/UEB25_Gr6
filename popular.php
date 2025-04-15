





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impactful Giving</title>

    <link rel="stylesheet" href="popular.css">
    <link rel="stylesheet" href="style.css">
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
    </style>


</head>

<body>


    <header>

        <div class="top-bar">
            <div class="contact-info">
                <a href="tel:+123456789" style="color: black; text-decoration: none;"><i class="fa-solid fa-phone"
                        style="color: #000; font-size: 12px;"> </i> +383 45 333 111</a>&nbsp;&nbsp;&nbsp;
                <a href="mailto:charity.kosova@email.com" target="_blank" style="color: black; text-decoration: none;">
                    <i class="fa-solid fa-envelope" style="color: #000; font-size: 14px;"></i>
                    charity.kosova@gmail.com</a>
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
                    <a href="about.php">About Us</a>
                    <ul class="dropdown-content">
                        <li><a href="about.php#aboutID">Who are we</a></li>
                        <li><a href="about.php#impactID">Our Impact</a></li>
                        <li><a href="about.php#priorityID">Arrange by Priority</a></li>
                        <li><a href="about.php#teamID">Our Team</a></li>
                    </ul>
                </li>
                <li> <a href="volunteer.php">Volunteer & Updates</a></li>
                <li> <a href="popular.php">Popular Cases</a></li>
                <li> <a href="contact.php">Contact</a></li>
                <li> <a href="donate.php">Donate</a></li>
            </ul>
           
           
        </nav>
    </header>
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
                    <a class="class-id" href="mailto:charity.kosova@gmail.com"
                        style="color: white;">charity.kosova@gmail.com</a>
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
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"
                            style="color: #2d6a4f;"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"
                            style="color: #2d6a4f;"></i></i></a>
                    <a href="https://www.twitter.com/"> <i class="fa-brands fa-twitter"
                            style="color: #2d6a4f;"></i></i></a>
                    <a href="https://www.whatsapp.com/"> <i class="fa-brands fa-whatsapp"
                            style="color: #2d6a4f;"></i></i></a>
                </div>
            </div>
        </div>
    </footer>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>


    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>


    </fieldset>

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


   

    </script>


</body>

</html>