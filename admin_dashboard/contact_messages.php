<?php
session_start(); 
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin.php");
    exit();
}

$result = mysqli_query($conn, "SELECT id, name, email, comment, submitted_at FROM contact_messages ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/contact_messages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <style>
        
    </style>
</head>
<body>
    <div class="content-wrapper">
        <div class="header">
        <a href="/UEB24_Gr26/admin_dashboard/admin.php"><i class="fas fa-arrow-left style="  style="color: #fbfcfe;"></i> </a>
        <h2>Contact Messages</h2>
          </div>
        <div class="section">
        
            <?php if (mysqli_num_rows($result) === 0): ?>
                <p>No messages found.</p>
            <?php else: ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                      <div class="message">
                        <div class="message-details">
                            <h4>
  <?= htmlspecialchars($row['name']) ?>
  (<a href="mailto:<?= htmlspecialchars($row['email']) ?>">
    <?= htmlspecialchars($row['email']) ?>
  </a>)
</h4>
                            <p><?= nl2br(htmlspecialchars($row['comment'])) ?></p>
                            <small>Submitted on <?= htmlspecialchars($row['submitted_at']) ?></small>
                        </div>
                        <form class="delete-form" method="POST" action="delete_contact_message.php">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
