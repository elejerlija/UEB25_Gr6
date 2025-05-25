<?php

session_start();
require_once 'includes/db_conn.php';

$response = ["success" => false, "errors" => []];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_SESSION['id'] ?? null;
    $fullName = trim($_SESSION['name'] ?? '');
    $email = trim($_SESSION['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $reason = trim($_POST['reason'] ?? '');

    if (!$userId || empty($fullName) || empty($email)) {
        $response['errors'][] = "User session is invalid. Please log in again.";
    }

    if (empty($gender)) {
        $response['errors'][] = "Gender is required!";
    }

    if (empty($dob)) {
        $response['errors'][] = "Date of Birth is required!";
    } elseif (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $dob)) {
        $response['errors'][] = "Date of Birth must be in dd/mm/yyyy format!";
    } else {
        $dobParts = explode('/', $dob);
        if (count($dobParts) === 3) {
            list($day, $month, $year) = $dobParts;
            if (!checkdate((int)$month, (int)$day, (int)$year)) {
                $response['errors'][] = "Invalid date.";
            } else {
                $birthDate = new DateTime("$year-$month-$day");
                $currentDate = new DateTime();
                $age = $currentDate->diff($birthDate)->y;

                if ($age < 18 || $age > 99) {
                    $response['errors'][] = "Age must be between 18 and 99!";
                }
            }
        } else {
            $response['errors'][] = "Invalid date format.";
        }
    }

    if (empty($reason) || strlen($reason) < 10) {
        $response['errors'][] = "Please tell us why you'd like to join (minimum 10 characters).";
    }

    if (empty($response['errors'])) {
        $formattedDOB = "$year-$month-$day";

        $stmt = $conn->prepare("INSERT INTO volunteers (user_id, full_name, email, gender, date_of_birth, reason, status, approval)
                                VALUES (?, ?, ?, ?, ?, ?, 0, 'pending')");
        $stmt->bind_param("isssss", $userId, $fullName, $email, $gender, $formattedDOB, $reason);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Registration submitted! Waiting for admin approval.";
        } else {
            $response['errors'][] = "Database error: " . $stmt->error;
        }
        $stmt->close();
    }
}

echo json_encode($response);
exit;
