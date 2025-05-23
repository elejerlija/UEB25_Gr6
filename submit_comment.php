<?php
session_start();
include 'includes/db_conn.php';

header('Content-Type: application/json');

$name = trim($_POST['name'] ?? '');
$surname = trim($_POST['surname'] ?? '');
$email = trim($_POST['email'] ?? '');
$comment = trim($_POST['comment'] ?? '');
$selected_case = trim($_POST['selected_case'] ?? '');

if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,30}$/", $name)) {
    echo json_encode(['success' => false, 'message' => 'Invalid name']);
    exit;
}
if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]{2,30}$/", $surname)) {
    echo json_encode(['success' => false, 'message' => 'Invalid surname']);
    exit;
}
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email']);
    exit;
}
if (strlen($comment) < 5) {
    echo json_encode(['success' => false, 'message' => 'Comment too short']);
    exit;
}
if (empty($selected_case)) {
    echo json_encode(['success' => false, 'message' => 'Please select a case']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO comments (name, surname, email, comment, case_name) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $surname, $email, $comment, $selected_case);
$stmt->execute();
$stmt->close();

$response = [
    'success' => true,
    'message' => "Thank you for your opinion for the case: $selected_case",
    'data' => [
        'name' => htmlspecialchars($name),
        'surname' => htmlspecialchars($surname),
        'comment' => nl2br(htmlspecialchars($comment)),
        'case_name' => $selected_case,
        'created_at' => date("d M Y")
    ]
];
echo json_encode($response);
