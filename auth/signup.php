<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="../style/login.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>Name</label>
        <input type="text" name="name" placeholder="Name"
               value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>"><br>

        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"
               value="<?php echo isset($_GET['uname']) ? htmlspecialchars($_GET['uname']) : ''; ?>"><br>

        <label>Email</label>
        <input type="email" name="email" placeholder="Email"
               value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required><br>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <label>Repeat Password</label>
        <input type="password" name="re_password" placeholder="Repeat Password"><br>

        <button type="submit">Sign Up</button>
        <a href="signin.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>
