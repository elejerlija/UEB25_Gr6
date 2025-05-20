<?php 
session_start(); 
include '../includes/db_conn.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: signin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: signin.php?error=Password is required");
	    exit();
	}else{
        $pass = md5($pass); // ose password_hash/verify më vonë

		$sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);

            // Verifikim shtesë nuk duhet, rreshti u gjet sipas query
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role']; // ruajmë rolin

            // Redirekto sipas rolit
            if ($row['role'] === 'admin') {
                header("Location: /UEB24_Gr26/admin_dashboard.php");
            } else {
                header("Location: /UEB24_Gr26/index.php");
            }
            exit();
		}else{
			header("Location: signin.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: signin.php");
	exit();
}
