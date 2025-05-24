<?php
session_start();
include 'includes/db_conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

header('Content-Type: application/json');

$name          = trim($_POST['name'] ?? '');
$surname       = trim($_POST['surname'] ?? '');
$email         = trim($_POST['email'] ?? '');
$comment       = trim($_POST['comment'] ?? '');
$selected_case = trim($_POST['selected_case'] ?? '');

if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,30}$/", $name)) {
    echo json_encode(['success' => false, 'message' => 'Emri nuk është i vlefshëm.']);
    exit;
}

if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,30}$/", $surname)) {
    echo json_encode(['success' => false, 'message' => 'Mbiemri nuk është i vlefshëm.']);
    exit;
}

if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Email-i nuk është i vlefshëm.']);
    exit;
}

if (strlen($comment) < 5) {
    echo json_encode(['success' => false, 'message' => 'Komenti është shumë i shkurtër.']);
    exit;
}

if (empty($selected_case)) {
    echo json_encode(['success' => false, 'message' => 'Ju lutem zgjidhni një rast.']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO comments (name, surname, email, comment, case_name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $surname, $email, $comment, $selected_case);
$stmt->execute();
$stmt->close();

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'charitywebsite25@gmail.com';
    $mail->Password   = 'cstb losn zqyj psci';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('charitywebsite25@gmail.com', 'Comment Notifier');
    $mail->addAddress('charitywebsite25@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = "Komenti i ri per rastin: $selected_case";
    $mail->Body    = "
    <h2>Komenti i ri per rastin: <em>$selected_case</em></h2>
    <p><strong>Emri:</strong> " . htmlspecialchars($name) . " " . htmlspecialchars($surname) . "</p>
    <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
    <p><strong>Data:</strong> " . date("d M Y") . "</p>
    <hr>
    <p><strong>Komenti:</strong><br>" . nl2br(htmlspecialchars($comment)) . "</p>";

    $mail->send();
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Komenti u ruajt, por emaili nuk u dergua. Gabimi: ' . $mail->ErrorInfo
    ]);
    exit;
}

$response = [
    'success' => true,
    'message' => "Faleminderit pr mendimin tuaj per rastin: $selected_case",
    'data' => [
        'name'       => htmlspecialchars($name),
        'surname'    => htmlspecialchars($surname),
        'comment'    => nl2br(htmlspecialchars($comment)),
        'case_name'  => htmlspecialchars($selected_case),
        'created_at' => date("d M Y")
    ]
];

echo json_encode($response);
