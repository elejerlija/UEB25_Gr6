<?php
session_start();
require_once '../includes/db_conn.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    echo json_encode(["success" => false, "message" => "Access denied. Admins only."]);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master\PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master\PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master\PHPMailer-master/src/Exception.php';

function sendApprovalEmail($toEmail, $volunteerName, $status) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'charitywebsite25@gmail.com';
        $mail->Password = 'cstb losn zqyj psci'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('charitywebsite25@gmail.com', 'HelpSomeone');
        $mail->addAddress($toEmail, $volunteerName);
        $mail->isHTML(true);
        $mail->Subject = 'Volunteer Application Status';

        $body = ($status === 'approved')
            ? "Dear $volunteerName,<br>Your volunteer request has been <b>approved</b>. Welcome!"
            : "Dear $volunteerName,<br>Unfortunately, your request has been <b>declined</b>.";

        $mail->Body = $body;
        $mail->send();
        return true;
    }catch (Exception $e) {
    error_log('PHPMailer Error: ' . $mail->ErrorInfo);
    throw new Exception("Email sending failed for volunteer $volunteerName. Reason: " . $mail->ErrorInfo);
}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['volunteer_id'], $_POST['action'])) {
    $id = (int)$_POST['volunteer_id'];
    $action = $_POST['action'] === 'approve' ? 'approved' : 'declined';
    $status = $action === 'approved' ? 1 : 0;

    $stmt = $conn->prepare("SELECT full_name, email FROM volunteers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $update = $conn->prepare("UPDATE volunteers SET approval = ?, status = ? WHERE id = ?");
        $update->bind_param("sii", $action, $status, $id);

        if ($update->execute()) {
            $emailSent = sendApprovalEmail($row['email'], $row['full_name'], $action);
            $msg = "Volunteer $action successfully.";
            if ($emailSent) {
                $msg .= " Email notification sent.";
            } else {
                $msg .= " Email failed to send.";
            }
            echo json_encode(["success" => true, "message" => $msg]);
        } else {
            echo json_encode(["success" => false, "message" => "Database update failed."]);
        }
        $update->close();
    } else {
        echo json_encode(["success" => false, "message" => "Volunteer not found."]);
    }
    $stmt->close();
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit;
}
