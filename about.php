<?php
include 'includes/header.php';
include 'includes/footer.php';

showHeader();

include 'includes/TeamClasses.php';



$teamMember1 =new Manager("Niko Johnson", "image/team_1 (2).png", 10);
$teamMember2 =new Writer("Emma Carter", "image/team_2.png", "storytelling");
$teamMember3 =new Developer("Melissa Mitchell", "image/team_3.png", "JavaScript");



$teamMembers = [$teamMember1, $teamMember2, $teamMember3];

$nameMap = [];
foreach ($teamMembers as $index => $member) {
    $nameMap[$index] = $member->getName();
}
asort($nameMap); 
$sortedTeamMembers = [];
foreach ($nameMap as $index => $name) {
    $sortedTeamMembers[] = $teamMembers[$index];
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/about.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
</head>

<body>



  
  


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
              <p>At HelpSomeone, we strive to make a meaningful difference by empowering communities and transforming
lives. Our mission is to provide support and opportunities to those in need, fostering a
world
where compassion and generosity create lasting change.</p>
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
  <div class="cards" >
    <?php foreach ($sortedTeamMembers as $member) { ?>
      <div class="card_wrapper" >
        <div class="team_image">
          <img src="<?php echo $member->getImage(); ?>" alt="<?php echo "Image of " . $member->getName(); ?>" style="width: 100%; border-radius: 10px;">
        </div>
        <div class="team_detail">
          
         
          <p >
            <?php echo $member->introduce(); ?><br>
            <?php echo $member->getRoleInfo(); ?>
          </p>
        </div>
      </div>
    <?php } ?>
  </div>
</section>



 



<?php
showFooter();
?>

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