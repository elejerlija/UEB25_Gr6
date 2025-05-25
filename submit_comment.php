<?php
session_start();
include 'includes/db_conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

header('Content-Type: application/json');

// Kontrollo nëse përdoruesi është i loguar
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'You have to be logged in to leave a message.']);
    exit;
}

$user_id     = $_SESSION['id'];
$name   = $_SESSION['name'] ?? '';
$email       = $_SESSION['email'] ?? '';
$comment     = trim($_POST['comment'] ?? '');
$selected_case = trim($_POST['selected_case'] ?? '');

if (strlen($comment) < 5) {
    echo json_encode(['success' => false, 'message' => 'Comment is too short.']);
    exit;
}

if (empty($selected_case)) {
    echo json_encode(['success' => false, 'message' => 'Please choose a case.']);
    exit;
}

// Ruaj komentin në DB
$stmt = $conn->prepare("INSERT INTO comments (user_id, name, email, comment, case_name, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("issss", $user_id, $name, $email, $comment, $selected_case);
$stmt->execute();
$stmt->close();

// Dërgo email për adminin
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'charitywebsite25@gmail.com';
    $mail->Password   = 'cstb losn zqyj psci'; // APP PASSWORD
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('charitywebsite25@gmail.com', 'Comment Notifier');
    $mail->addAddress('charitywebsite25@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = "Komenti i ri për rastin: $selected_case";
    $mail->Body    = "
        <h2>Komenti i ri për rastin: <em>$selected_case</em></h2>
        <p><strong>Emri:</strong> " . htmlspecialchars($name) . "</p>
        <p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>
        <p><strong>Data:</strong> " . date("d M Y") . "</p>
        <hr>
        <p><strong>Komenti:</strong><br>" . nl2br(htmlspecialchars($comment)) . "</p>";

    $mail->send();
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Komenti u ruajt, por emaili nuk u dërgua. Gabimi: ' . $mail->ErrorInfo
    ]);
    exit;
}

// Përgjigjja JSON për sukses
$response = [
    'success' => true,
    'message' => "Faleminderit për mendimin tuaj për rastin: $selected_case",
    'data' => [
        'name'  => htmlspecialchars($name),
        'email'      => htmlspecialchars($email),
        'comment'    => nl2br(htmlspecialchars($comment)),
        'case_name'  => htmlspecialchars($selected_case),
        'created_at' => date("d M Y")
    ]
];

echo json_encode($response);
