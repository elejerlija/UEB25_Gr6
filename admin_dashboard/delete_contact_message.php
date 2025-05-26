<?php
session_start();
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = mysqli_prepare($conn, "DELETE FROM contact_messages WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
}

header("Location: contact_messages.php");
exit();
