<?php
session_start();
include '../includes/db_conn.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admins only.");
}

if (isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    $stmt = mysqli_prepare($conn, "DELETE FROM events WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $event_id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: /UEB24_Gr26/admin_dashboard/event_planner.php?success=Event successfully deleted.");
        exit();
    } else {
        header("Location: /UEB24_Gr26/admin_dashboard/event_planner.php?error=Could not delete event. Please try again.");
        exit();
    }

} else {
    header("Location: /UEB24_Gr26/admin_dashboard/event_planner.php?error=Invalid request.");
    exit();
}
