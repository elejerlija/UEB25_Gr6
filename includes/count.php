<?php

if (session_status() === PHP_SESSION_NONE) session_start();




if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $sql = "UPDATE users SET visits = visits + 1 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    
    $sql = "SELECT visits FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

}

?>