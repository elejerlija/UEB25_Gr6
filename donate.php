<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <title>Donate</title>
    <style>
    
body {
    background-color: #e2fcdb;
}
     
        h2 {
            color: #333;
            text-align: center;
        }

        #amount,
        #message,
        #name,
        #email {
            color: black;
        }

        .donate-class {
            display: flex;
            flex-direction: column;
            gap: 15px;
            background: #f9f9f9;
            padding: 20px;
            border: 2px solid #c9c9c9;
            border-radius: 5px;
            max-width: 800px;
            margin-bottom: 50px;
            margin-left: 22%;
        }

        .donate-class label {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .donate-class input,
        .donate-class textarea,
        .donate-class button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
        }

        .donate-class button {
            background: linear-gradient(45deg, #013f06, #90e9a5);
            transition: transform 0.3s, background-color 0.3s;
            color:white
        }

        form button:hover {
            transform: scale(1.1);
            background: linear-gradient(45deg, #90e9a5, #013f06);
        }

        #non-anonymous-fields {
            visibility: visible;
            opacity: 1;
            transition: visibility 0.3s, opacity 0.3s;
        }

        #non-anonymous-fields.hidden {
            visibility: hidden;
            opacity: 0;
        }
 
ol {
  padding-left: 0; 
  list-style-type: none;
  counter-reset: list-counter; 
  font-size: 18px;
  line-height: 1.6;
}


ol li {
  position: relative;
  margin-bottom: 15px;
  padding-left: 30px; 
  background-color: #f9f9f9;
  border-radius: 5px;
  padding: 10px;
  border-left: 4px solid #2d6a4f;
}


ol li::before {
  content: counter(list-counter) ".  "; 
  counter-increment: list-counter; 
  position: absolute;
  left: 10px; 
  top: 10px; 
  color: #2d6a4f;
  font-weight: bold;
}

ol li:hover {
  background-color: #eaf5e7;
  cursor: pointer;
}
.HowToDonate-section{
    margin-top: 20px;

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



    <section class="HowToDonate-section">
        <h2>How to Make a Donation:</h2>
        <br>
        <ol style="word-wrap: break-word;" >
          <li style="white-space: pre-wrap;">    Select the amount you wish to donate.</li>
          <li style="white-space: pre-wrap;">    Complete the donation and receive a confirmation of your contribution.</li>
        </ol>
      </section>
      
    <main>
        <section class="donate-class">
            <h2>Donate for a good cause</h2>
            <form>
                <label for="amount">Value you want to donate (€):</label>
                <input list="donation-suggestions" id="amount" name="amount" required
                    placeholder="Write a sum of money.">
                <datalist id="donation-suggestions">
                    <option value="10">
                    <option value="20">
                    <option value="50">
                    <option value="100">
                    <option value="200">
                </datalist>
<br>
<br>

                <label for="anonymous-checkbox" class="anonymous-checkbox-label" style=" margin-right: 650px; ">
                    <input type="checkbox" id="anonymous-checkbox" name="anonymous" class="anonymous-checkbox">
                    <span class="checkbox-text" >Anonymous</span>
                </label>
                
<br>
                <div id="non-anonymous-fields">
                    <label for="name">Full name:</label>
                    <input type="text" id="name" name="name">

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>

                <label for="message">Your message (optional):</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <section>
                    <h3>Total Raised:</h3>
                    <output id="total-raised">5000€</output>
                </section>

                <button type="submit">Submit</button>
            </form>
    </main>


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

    <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>
</body>

<script>
 $(document).ready(function() {
    const anonymousCheckbox = $('#anonymous-checkbox');
    const nonAnonymousFields = $('#non-anonymous-fields');

    anonymousCheckbox.change(function() {
        if (anonymousCheckbox.is(':checked')) {
            nonAnonymousFields.hide(); 
        } else {
            nonAnonymousFields.show(); 
        }
    });
});


    let totalRaised = 5000; 

document.querySelector('form').addEventListener('submit', function (e) {
e.preventDefault();


const amount = parseFloat(document.getElementById('amount').value) || 0;
if(amount<0){
    alert("You cannot submit this amount.");
    return;
}
totalRaised += amount;

const totalOutput = document.getElementById('total-raised');
totalOutput.textContent = `${totalRaised.toLocaleString()}€`;


let donorName = document.getElementById('name').value || "Anonymous"; 
let donationAmount = amount.toFixed(2) + "€"; 


let donationMessage = "Thank you, [DonorName]! You have donated [Amount] for our cause.";


donationMessage = donationMessage.replace("[DonorName]", donorName).replace("[Amount]", donationAmount);


alert(donationMessage);


e.target.reset();
});




</script>
</html>