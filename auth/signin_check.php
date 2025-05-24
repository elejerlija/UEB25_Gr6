<?php 
session_start(); 
include '../includes/db_conn.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       return htmlspecialchars(stripslashes(trim($data)));
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: signin.php?error=User Name is required");
	    exit();
	} else if (empty($pass)) {
        header("Location: signin.php?error=Password is required");
	    exit();
	} else {
		$sql = "SELECT * FROM users WHERE username=?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "s", $uname);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

			if (password_verify($pass, $row['password'])) {
				
				$_SESSION['username'] = $row['username'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['id'];
				$_SESSION['role'] = $row['role'];

				
				if ($row['role'] === 'admin') {
					header("Location: /UEB24_Gr26/admin_dashboard/admin.php");
				} else {
					header("Location: /UEB24_Gr26/index.php");
				}
				exit();
			} else {
				
				header("Location: signin.php?error=Incorrect username or password");
				exit();
			}
		} else {
			header("Location: signin.php?error=Incorrect username or password");
	        exit();
		}
	}

} else {
	header("Location: signin.php");
	exit();
}
