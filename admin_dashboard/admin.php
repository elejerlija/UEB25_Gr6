<?php
session_start();

include '../includes/db_conn.php';
include '../includes/count.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

$msg_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contact_messages");
$msg_row = mysqli_fetch_assoc($msg_result);
$totalMessages = $msg_row['total'];

$donate_result = mysqli_query($conn, "SELECT COUNT(*) AS donateTotali FROM donations");
$donate_row = mysqli_fetch_assoc($donate_result);
$totalDonations = $donate_row['donateTotali'];

$active_volunteers = mysqli_query($conn, "SELECT COUNT(*) AS active FROM volunteers WHERE status = 1");
$volunteers_row = mysqli_fetch_assoc($active_volunteers);
$totalactive = $volunteers_row['active'];


$totalQuery = "SELECT SUM(amount) AS total_donations FROM donations";
$totalResult = $conn->query($totalQuery);
$totalAmount = 0;

if ($totalResult && $row = $totalResult->fetch_assoc()) {
    $totalAmount = $row['total_donations'];
}



?>


<!DOCTYPE html>
<html lang="en">
  <head>
     <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HelpSomeone Admin Dashboard</title>
  <link rel="stylesheet" href="../style/admin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
</head>
<body>
  <div class="sidebar">
    <h2>HelpSomeone</h2>
    <a href="#">Overview</a>
    <a href="/UEB24_Gr26/admin_dashboard/manage_donations.php">View Donations</a>
    <a href="/UEB24_Gr26/admin_dashboard/admin_volunteers.php">Manage Volunteers</a>
    <a href="/UEB24_Gr26/admin_dashboard/event_planner.php">Event Planner</a>
    <a href="/UEB24_Gr26/admin_dashboard/contact_messages.php">Contact Form Messages</a>
  <a href="/UEB24_Gr26/admin_dashboard/user_management.php">User Management</a>

    
  </div>

  <div class="main">
    <div class="topbar">
        <span>Welcome, <?php echo $_SESSION['name']; ?></span>
        <a href="/UEB24_Gr26/auth/logout.php" class="logout-btn"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>
  
    <div class="cards">
      <div class="card">
        <h3>Total Amount Raised</h3>
        <p><?php echo $totalAmount ?> </p>
      </div>
       <div class="card">
        <h3>Total Number of Donations</h3>
        <p><?php echo $totalDonations ?> </p>
      </div>
      <div class="card">
        <h3>Active Volunteers</h3>
        <p><?php echo $totalactive ?></p>
      </div>

      <div class="card">
        <h3>Messages</h3>
        <p><?php echo $totalMessages ?></p>
      </div>
    </div>

    
  </div>
</body>
</html>
