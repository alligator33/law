<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../backend/config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    $mail = new PHPMailer(true);
    
    // Debug mode
    $mail->SMTPDebug = 3;
    $mail->Debugoutput = 'html';
    
    // Server settings
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Using SMTPS for port 465
    $mail->Port = SMTP_PORT;
    
    // Recipients
    $mail->setFrom(EMAIL_FROM);
    $mail->addAddress(EMAIL_TO);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'SMTP Test Email';
    $mail->Body    = 'This is a test email to verify SMTP settings are working correctly.';

    echo "Using configuration:\n";
    echo "Host: " . SMTP_HOST . "\n";
    echo "Port: " . SMTP_PORT . "\n";
    echo "Username: " . SMTP_USER . "\n";
    echo "Secure: SMTPS\n";
    
    echo "\nAttempting to send email...\n";
    $mail->send();
    echo "Test email sent successfully!\n";
} catch (Exception $e) {
    echo "Detailed error information:\n";
    echo "Error message: " . $e->getMessage() . "\n";
    if (isset($mail) && $mail->ErrorInfo) {
        echo "Mailer error: " . $mail->ErrorInfo . "\n";
    }
}