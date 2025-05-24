<?php 
session_start(); 
include '../includes/db_conn.php';

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email'])) {

	function validate($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);

	$user_data = 'uname=' . urlencode($uname) . '&name=' . urlencode($name) . '&email=' . urlencode($email);

	// Input validations
	if (empty($email)) {
	    header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	} elseif (empty($uname)) {
		header("Location: signup.php?error=Username is required&$user_data");
	    exit();
	} elseif (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	} elseif (empty($re_pass)) {
        header("Location: signup.php?error=Re-enter Password is required&$user_data");
	    exit();
	} elseif (empty($name)) {
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	} elseif ($pass !== $re_pass) {
    header("Location: signup.php?error=Passwords do not match&$user_data");
    exit();
} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $pass)) {
    header("Location: signup.php?error=Password must be at least 8 characters long and include uppercase, lowercase, number, and symbol&$user_data");
    exit();
} else {
	$pass = password_hash($pass, PASSWORD_DEFAULT);


		// Check if username exists
		$sql_uname = "SELECT * FROM users WHERE username='$uname'";
		$result_uname = mysqli_query($conn, $sql_uname);
		if (mysqli_num_rows($result_uname) > 0) {
			header("Location: signup.php?error=Username already taken&$user_data");
	        exit();
		}

		// Check if email exists
		$sql_email = "SELECT * FROM users WHERE email='$email'";
		$result_email = mysqli_query($conn, $sql_email);
		if (mysqli_num_rows($result_email) > 0) {
			header("Location: signup.php?error=Email already in use&$user_data");
	        exit();
		}

		// If all clear, insert user
		$sql2 = "INSERT INTO users(username, password, name, email) 
		         VALUES('$uname', '$pass', '$name', '$email')";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2) {
			header("Location: signup.php?success=Your account has been created successfully");
	        exit();
		} else {
			header("Location: signup.php?error=Unknown error occurred&$user_data");
	        exit();
		}
	}

} else {
	header("Location: signup.php");
	exit();
}
