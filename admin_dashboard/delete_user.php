<?php
session_start();
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $sql = "DELETE FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    header("Location: /UEB24_Gr26/admin_dashboard/user_management.php?success=User '" . urlencode($username) . "' successfully deleted.");
    exit();
}
exit();
