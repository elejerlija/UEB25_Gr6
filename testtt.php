<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer-master\PHPMailer-master\src\Exception.php';
include 'PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
include 'PHPMailer-master\PHPMailer-master\src\SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'charitywebsite25@gmail.com';
    $mail->Password   = 'cstb losn zqyj psci';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('charitywebsite25@gmail.com', 'Testuesi');
    $mail->addAddress('charitywebsite25@gmail.com');
    $mail->Subject = 'Test PHPMailer';
    $mail->Body    = 'Ky është një email testues i dërguar nga PHPMailer!';

    $mail->send();
    echo '✅ Email u dërgua me sukses!';
} catch (Exception $e) {
    echo "❌ Email nuk u dërgua. Gabimi: {$mail->ErrorInfo}";
}
