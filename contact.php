<?php
session_start(); 

if (!isset($_SESSION['username'])) {
    header("Location: signin.php?reason=protected");
    exit();
}

include 'includes/header.php';
include 'includes/footer.php';

showHeader();

$name = $email = $comment = '';
$errors = ['name' => '', 'email' => '', 'comment' => ''];
$success = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit-general-comment'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);

    if (!preg_match("/^[a-zA-Z ]{2,30}$/", $name)) {
        $errors['name'] = "Name must contain only letters and be 2–30 characters long.";
    }

    if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i", $email)) {
        $errors['email'] = "Email is not valid.";
    }

    if (strlen($comment) < 5) {
        $errors['comment'] = "Comment must be at least 5 characters long.";
    }

    if (!array_filter($errors)) {
        $success = "Thank you for your comment!";
        // You can add code here to save comment to database or send email
        $name = $email = $comment = ''; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/contact.css" />
  <script src="script.js" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"
  />

  <title>Contact</title>
</head>

<body>
  <main>
    <section class="contact-form">
      <h2>Get in Touch</h2>
      <p>If you have any questions or would like to reach out to us, please use the form below.</p>
      <br />
      <form method="POST" action="" id="contactForm">
        <label for="name">Name:</label><br />
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($name) ?>" /><br />
        <?php if ($errors['name']) echo "<p class='error'>{$errors['name']}</p>"; ?>

        <label for="email">Email:</label><br />
        <input type="text" name="email" id="email" value="<?= htmlspecialchars($email) ?>" /><br />
        <?php if ($errors['email']) echo "<p class='error'>{$errors['email']}</p>"; ?>

        <label for="comment">Comment:</label><br />
        <textarea name="comment" id="comment"><?= htmlspecialchars($comment) ?></textarea><br />
        <?php if ($errors['comment']) echo "<p class='error'>{$errors['comment']}</p>"; ?>

        <button type="submit" name="submit-general-comment">Submit</button><br /><br />
        <?php if ($success) echo "<p class='success'>{$success}</p>"; ?>
      </form>
    </section>
  </main>

  <?php showFooter(); ?>

  <audio id="click-sound" src="audio/click_sound.mp3" preload="auto"></audio>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#contactForm").submit(function (e) {
        e.preventDefault();

        $(".error").remove(); // Clear previous errors

        let name = $("#name").val().trim();
        let email = $("#email").val().trim();
        let comment = $("#comment").val().trim();
        let valid = true;

        if (!/^[a-zA-Z ]{2,30}$/.test(name)) {
          $("#name").after("<p class='error'>Name must be 2–30 letters.</p>");
          valid = false;
        }

        if (!/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i.test(email)) {
          $("#email").after("<p class='error'>Invalid email format.</p>");
          valid = false;
        }

        if (comment.length < 5) {
          $("#comment").after("<p class='error'>Comment too short.</p>");
          valid = false;
        }

        if (valid) {
          // Optionally, you can submit form via AJAX here or just submit normally
          this.submit();
        }
      });
    });
  </script>
</body>
</html>
