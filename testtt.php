<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

$config = include 'config.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['email'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom($config['email'], 'Testuesi');
    $mail->addAddress($config['email']);
    $mail->Subject = 'Test PHPMailer';
    $mail->Body    = 'Ky është një email testues i dërguar nga PHPMailer!';

    $mail->send();
    echo '✅ Email u dërgua me sukses!';
} catch (Exception $e) {
    echo "❌ Email nuk u dërgua. Gabimi: {$mail->ErrorInfo}";
}
