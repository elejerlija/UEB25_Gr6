<?php
session_start();
include '../includes/db_conn.php';
include '../includes/header.php';
include '../includes/footer.php';




if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo "<p style='color:red;'>Access denied. Admins only.</p>";
    exit;
}


$sql = "SELECT * FROM donations ORDER BY created_at DESC";
$result = $conn->query($sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>All Donations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../style/admin.css" />
  <link rel="stylesheet" href="../style/manage_donations.css" />
  <style>
 

  </style>
</head>
<body>
  <div class="donation-container">
     <a href="/UEB24_Gr26/admin_dashboard/admin.php"><i class="fas fa-arrow-left style="  style="color: #fbfcfe;"></i> </a>

    
    <?php if ($result && $result->num_rows > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Donor</th>
            <th>Email</th>
            <th>Amount ($)</th>
            <th>Payment Method</th>
            <th>Bank</th>
            <th>Last 4 Card</th>
            <th>Date</th>
            <th>Anonymous</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
              <td class="<?= $row['anonymous'] ? 'anonymous' : '' ?>">
                <?= htmlspecialchars($row['fullname']) ?>
              </td>
              <td class="<?= $row['anonymous'] ? 'anonymous' : '' ?>">
                <?= htmlspecialchars($row['email']) ?>
              </td>
              <td><?= htmlspecialchars($row['amount']) ?></td>
              <td><?= htmlspecialchars($row['payment_method']) ?></td>
              <td><?= htmlspecialchars($row['bank_name']) ?></td>
              <td><?= htmlspecialchars($row['card_last4']) ?></td>
              <td><?= htmlspecialchars($row['created_at']) ?></td>
              <td><?= $row['anonymous'] ? 'Yes' : 'No' ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>No donations found.</p>
    <?php endif; ?>
  </div>


</body>
</html>
