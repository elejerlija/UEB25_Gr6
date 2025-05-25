<?php
session_start();
require_once '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

$result = $conn->query("SELECT * FROM volunteers ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Volunteers - Admin</title>
  <link rel="stylesheet" href="../style/admin.css">
  <link rel="stylesheet" href="../style/admin_volunteers.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="main">
        <a href="/UEB24_Gr26/admin_dashboard/admin.php"><i class="fas fa-arrow-left style="  style="color: #fbfcfe;"></i> </a>
    </a>

    <h2>Manage Volunteers</h2>

    <table class="admin-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Date of Birth</th>
          <th>Reason</th>
          <th>Status</th>
          <th>Approval</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['full_name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['gender']) ?></td>
            <td><?= htmlspecialchars($row['date_of_birth']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['reason'])) ?></td>
            <td><?= $row['status'] ? 'Active' : 'Inactive' ?></td>
            <td><?= ucfirst($row['approval']) ?></td>
            <td>
              <?php if ($row['approval'] === 'pending'): ?>
                <button class="approve-btn" onclick="handleVolunteerAction(<?= $row['id'] ?>, 'approve')">Approve</button>
                <button class="decline-btn" onclick="handleVolunteerAction(<?= $row['id'] ?>, 'decline')">Decline</button>
              <?php else: ?>
                <em>No actions</em>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <script>
    function handleVolunteerAction(id, action) {
      if (!confirm(`Are you sure you want to ${action} this volunteer?`)) return;

      fetch('approve_volunteer.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `volunteer_id=${id}&action=${action}`
      })
      .then(res => res.json())
      .then(data => {
        alert(data.message);
        location.reload();
      })
      .catch(err => {
        console.error(err);
        alert("An error occurred. Please try again.");
      });
    }
  </script>
</body>
</html>
