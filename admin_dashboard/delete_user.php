<?php
session_start();
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $stmt = mysqli_prepare($conn, "DELETE FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: /UEB24_Gr26/admin_dashboard/user_management.php?success=User '" . urlencode($username) . "' successfully deleted.");
        exit();
    } else {
        header("Location: /UEB24_Gr26/admin_dashboard/user_management.php?error=Could not delete user. Please try again.");
        exit();
    }

} else {
    header("Location: /UEB24_Gr26/admin_dashboard/user_management.php?error=Invalid request.");
    exit();
}
