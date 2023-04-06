<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/src/Exception.php';
require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';

if (isset($_POST['message'])) {
    $title = "Contact us";
    $message = $_POST['message'];
    try {
        // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username = 'testinacc7799@gmail.com'; // YOUR gmail email
        $mail->Password = 'pomezia11'; // YOUR gmail password

        // Sender and recipient settings
        $mail->setFrom('testinacc7799@gmail.com', 'Question from GreFlow!');
        $mail->addAddress('zobaiyah@gmail.com', 'GF Receiver');
        $mail->addReplyTo('testinacc7799@gmail.com', 'GreFlow'); // to set the reply to

        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = $title;
        $mail->Body = $message;
        $mail->AltBody = $message;

        $mail->send();
        $output = "Email message has been sent. Please wait for a reply.";
    } catch (Exception $e) {
        $output = "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    $title = "Contact us";
    ob_start();
    include 'templates/mailform.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>