<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'induwarabandara.h@gmail.com';      // Replace with your Gmail
    $mail->Password   = 'ztoi zbph vkwq pbta';        // Use App Password (not your Gmail password)
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('induwarabandara.h@gmail.com', 'Website Contact Form');
    $mail->addAddress('induwarabandara.h@gmail.com');  // Your receiving email

    // Content
    $mail->isHTML(false);
    $mail->Subject = "Website Contact Form: $name";
    $mail->Body    = "You have received a new message.\n\nName: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";

    $mail->send();
    echo "Message sent successfully!";
    return true;
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    return false;
}
?>
