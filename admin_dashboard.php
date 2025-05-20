<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: /UEB24_Gr26/signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
     <link rel="stylesheet" href="style/admin.css">

</head>
<body>

    <div class="navbar">
        <span>Welcome, <?php echo $_SESSION['name']; ?></span>
        <a href="auth/logout.php" class="logout-btn">
    <span class="logout-icon">⮕</span> Logout
</a>

    </div>

    <div class="sidebar">
        <button onclick="toggleAddAdminForm()">➕ Add Admin</button>
      </div>
<div class="main-content">
    <div id="addAdminForm" style="display:none; margin-top:20px;">
        <form action="add_admin.php" method="POST" onsubmit="return validateForm()">
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
</div>


<script>
    function toggleAddAdminForm() {
        const form = document.getElementById("addAdminForm");
        form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>

    <script>
        function toggleForm() {
            const form = document.getElementById("addAdminForm");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }

        function validateForm() {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            const errorDiv = document.getElementById("error");

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const strongPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;

            if (!emailRegex.test(email)) {
                errorDiv.textContent = "Please enter a valid email address.";
                return false;
            }

            if (!strongPass.test(password)) {
                errorDiv.textContent = "Password must be at least 8 characters, include letters and numbers.";
                return false;
            }

            errorDiv.textContent = "";
            return true;
        }
    </script>

</body>
</html>
