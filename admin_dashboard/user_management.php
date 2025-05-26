<?php
session_start();
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}
$sql = "SELECT name, username, email, role FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="../style/user_management.css" />
</head>
<body>
<div class="container">

    <div class="header">
        <a href="/UEB24_Gr26/admin_dashboard/admin.php"><i class="fas fa-arrow-left style="  style="color: #fbfcfe;"></i> </a>
      <h2>User Management</h2>
    </div>
<br>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['username']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= htmlspecialchars(ucfirst($row['role'])) ?></td>
      <td class="actions">
        <form action="/UEB24_GR26/admin_dashboard/delete_user.php" method="POST" style="display:inline;">
          <input type="hidden" name="username" value="<?= htmlspecialchars($row['username']) ?>">
          <button type="submit">Delete</button>
        </form>
      </td>
    </tr>
  <?php } ?>
</tbody>

    </table>

    <form action="/UEB24_GR26/admin_dashboard/add_admin.php" method="POST" onsubmit="return validateForm()">
      <h2>Add Admin</h2>

      <label for="uname">Username</label>
      <input type="text" name="uname" id="uname" placeholder="Username" required>

      <label for="name">Full Name</label>
      <input type="text" name="name" id="name" placeholder="Full Name" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Email" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Password" required>

      <label for="re_password">Repeat Password</label>
      <input type="password" name="re_password" id="re_password" placeholder="Repeat Password" required>

      <div id="error" class="error" style="display:none;"></div>

      <button type="submit">Add Admin</button>
    </form>
  </div>

  <script>
    function validateForm() {
      const password = document.getElementById('password').value;
      const repeatPassword = document.getElementById('re_password').value;
      const errorDiv = document.getElementById('error');

      if (password !== repeatPassword) {
        errorDiv.innerText = "Passwords do not match.";
        errorDiv.style.display = "block";
        return false;
      }

      const strongPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/;
      if (!strongPassword.test(password)) {
        errorDiv.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and symbol.";
        errorDiv.style.display = "block";
        return false;
      }

      errorDiv.style.display = "none";
      return true;
    }
  </script>
</html>
