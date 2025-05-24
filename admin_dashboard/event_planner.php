<?php
session_start();
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $date = $_POST['date'];
    $description = trim($_POST['description']);
    $admin_id = $_SESSION['id'];

    if ($name && $date) {
        $stmt = mysqli_prepare($conn, "INSERT INTO events (name, date, description, created_by) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssi", $name, $date, $description, $admin_id);
        mysqli_stmt_execute($stmt);
        header("Location: /UEB24_Gr26/admin_dashboard/event_planner.php?success=Event added successfully");
        exit();
    } else {
        header("Location: /UEB24_Gr26/admin_dashboard/event_planner.php?error=Event name and date are required");
        exit();
    }
}

$events_result = mysqli_query($conn, "SELECT e.*, u.name AS admin_name FROM events e JOIN users u ON e.created_by = u.id ORDER BY date ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="../style/event_planner.css" />
</head>
<body>
<div class="content">
    <div class="header">
  <a href="/UEB24_Gr26/admin_dashboard/admin.php"><i class="fas fa-arrow-left style="  style="color: #fbfcfe;"></i> </a>
  <h2 >Event Planner</h2>
</div>

  <?php if (isset($_GET['success'])): ?>
    <p ><?= htmlspecialchars($_GET['success']) ?></p>
  <?php elseif (isset($_GET['error'])): ?>
    <p ><?= htmlspecialchars($_GET['error']) ?></p>
  <?php endif; ?>

  <form method="POST" >
    <label>Event Name:</label>
    <input type="text" name="name" required >

    <label>Date:</label>
    <input type="date" name="date"  min="<?= date('Y-m-d') ?>" required >

    <label>Description (optional):</label>
    <textarea name="description" rows="3"></textarea>

    <button type="submit" >Add Event</button>
  </form>
<br>
<br>
  <h3>Upcoming Events</h3>
  <table >
    <thead>
      <tr>
        <th>Event</th>
        <th >Date</th>
        <th >Created By</th>
        <th >Description</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($event = mysqli_fetch_assoc($events_result)): ?>
        <tr>
          <td ><?= htmlspecialchars($event['name']) ?></td>
          <td ><?= htmlspecialchars($event['date']) ?></td>
          <td ><?= htmlspecialchars($event['admin_name']) ?></td>
          <td ><?= htmlspecialchars($event['description']) ?></td>
          <td>
  <form action="delete_event.php" method="POST" style="display:inline;">
    <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
    <button type="submit" class="delete-btn">Delete</button>
  </form>
</td>
        </tr>
      <?php endwhile; ?>
    </tbody>
    
  </table>
</div>
      </body>
      </html>