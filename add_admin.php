<?php 
session_start(); 
include 'includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email'])) {

	function validate($data) {
		return htmlspecialchars(stripslashes(trim($data)));
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);
	$email = validate($_POST['email']);

	$user_data = 'uname=' . urlencode($uname) . '&name=' . urlencode($name) . '&email=' . urlencode($email);

	if (empty($email)) {
	    header("Location: admin_dashboard.php?error=Email is required&$user_data");
	    exit();
	} elseif (empty($uname)) {
		header("Location: admin_dashboard.php?error=Username is required&$user_data");
	    exit();
	} elseif (empty($pass)) {
        header("Location: admin_dashboard.php?error=Password is required&$user_data");
	    exit();
	} elseif (empty($re_pass)) {
        header("Location: admin_dashboard.php?error=Repeat password is required&$user_data");
	    exit();
	} elseif (empty($name)) {
        header("Location: admin_dashboard.php?error=Name is required&$user_data");
	    exit();
	} elseif ($pass !== $re_pass) {
        header("Location: admin_dashboard.php?error=Passwords do not match&$user_data");
        exit();
	} elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $pass)) {
        header("Location: admin_dashboard.php?error=Password must be at least 8 characters with uppercase, lowercase, number, and symbol&$user_data");
        exit();
    } else {
		$pass = md5($pass); // or password_hash() in a real app

		$check_username = "SELECT * FROM users WHERE username='$uname'";
		$res_username = mysqli_query($conn, $check_username);
		if (mysqli_num_rows($res_username) > 0) {
			header("Location: admin_dashboard.php?error=Username already exists&$user_data");
	        exit();
		}

		$check_email = "SELECT * FROM users WHERE email='$email'";
		$res_email = mysqli_query($conn, $check_email);
		if (mysqli_num_rows($res_email) > 0) {
			header("Location: admin_dashboard.php?error=Email already in use&$user_data");
	        exit();
		}

		$sql = "INSERT INTO users(username, password, name, email, role) 
		        VALUES('$uname', '$pass', '$name', '$email', 'admin')";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			header("Location: admin_dashboard.php?success=Admin successfully added");
	        exit();
		} else {
			header("Location: admin_dashboard.php?error=Unknown error occurred&$user_data");
	        exit();
		}
	}

} else {
	header("Location: admin_dashboard.php");
	exit();
}
