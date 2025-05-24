<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
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
    <a href="#">Manage Donations</a>
    <a href="#">Manage Volunteers</a>
    <a href="#">Event Planner</a>
    <a href="#">Contact Form Messages</a>
  <a href="/UEB24_Gr26/admin_dashboard/user_management.php">User Management</a>

    
  </div>

  <div class="main">
    <div class="topbar">
        <span>Welcome, <?php echo $_SESSION['name']; ?></span>
        <a href="/UEB24_Gr26/auth/logout.php" class="logout-btn"><i class="fa fa-sign-out-alt"></i> Logout</a>
    </div>
  
    <div class="cards">
      <div class="card">
        <h3>Total Donations</h3>
        <p>1,860</p>
      </div>
      <div class="card">
        <h3>Active Volunteers</h3>
        <p>328</p>
      </div>

      <div class="card">
        <h3>Messages</h3>
        <p>45</p>
      </div>
    </div>

    <div class="content">
      <div class="section">
        <h4>Recent Donation Activity</h4>
        <p>[Chart will go here]</p>
      </div>

      <div class="section">
        <h4>Latest Volunteer Applications</h4>
        <p>[Volunteer list with Approve/Deny buttons]</p>
      </div>
    </div>
  </div>
</body>
</html>
