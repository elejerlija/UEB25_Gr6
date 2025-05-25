<?php
session_start(); 
include 'includes/db_conn.php';


if (!isset($_SESSION['username'])) {
    header("Location: signin.php?reason=protected");
    exit();
}

include 'includes/header.php';
include 'includes/footer.php';

showHeader();

$comment = '';
$errors = ['comment' => ''];
$success = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success = "Thank you for your comment!";
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit-general-comment'])) {
    $comment = trim($_POST['comment']);

    if (strlen($comment) < 5) {
        $errors['comment'] = "Comment must be at least 5 characters long.";
    }

    if (!array_filter($errors)) {
    $userId = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];

    $stmt = mysqli_prepare($conn, "INSERT INTO contact_messages (user_id, name, email, comment) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isss", $userId, $name, $email, $comment);
    mysqli_stmt_execute($stmt);

   header("Location: contact.php?success=1");
exit();

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <title>Contact</title>
  <style>
    input[readonly] {
      background-color: #f3f4f6;
      color: #111827;
      border: 1px solid #d1d5db;
    }
  </style>
</head>

<body>
  <main>
    <section class="contact-form">
      <h2>Get in Touch</h2>
      <p>If you have any questions or would like to reach out to us, please use the form below.</p>
      <br />
      <form method="POST" action="" id="contactForm">
        <label for="name">Name:</label><br />
        <input type="text" name="name" value="<?= $_SESSION['name'] ?? '' ?>" readonly>

        <label for="email">Email:</label><br />
        <input type="email" name="email" value="<?= $_SESSION['email'] ?? '' ?>" readonly>

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

</body>
</html>
