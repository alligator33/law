<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);
ob_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../backend/config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

try {
    $mail = new PHPMailer(true);
    
    // Debug mode
    $debugOutput = '';
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = function($str, $level) use (&$debugOutput) {
        echo $str . "\n";
        $debugOutput .= $str . "\n";
        ob_flush();
    };
    
    // Server settings
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->AuthType = 'PLAIN';  // Force PLAIN authentication
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = SMTP_PORT;
    
    // Set timeouts and connection settings
    $mail->Timeout = 20;
    $mail->SMTPKeepAlive = true;
    $mail->SMTPAutoTLS = false;
    
    // SSL/TLS settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    // Recipients
    $mail->setFrom(SMTP_USER, 'SMTP Test');
    $mail->addAddress(EMAIL_TO);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'SMTP Test Email';
    $mail->Body    = 'This is a test email to verify SMTP settings are working correctly.';
    $mail->AltBody = 'This is a test email to verify SMTP settings are working correctly.';

    echo "Using configuration:\n";
    echo "Host: " . SMTP_HOST . "\n";
    echo "Port: " . SMTP_PORT . "\n";
    echo "Username: " . SMTP_USER . "\n";
    echo "Secure: SMTPS\n\n";
    
    echo "Attempting to send email...\n";
    flush();
    
    $mail->send();
    echo "\nTest email sent successfully!\n";
    
} catch (Exception $e) {
    echo "\nDetailed error information:\n";
    echo "Error message: " . $e->getMessage() . "\n";
    if (isset($mail) && $mail->ErrorInfo) {
        echo "Mailer error: " . $mail->ErrorInfo . "\n";
    }
    echo "\nDebug log:\n" . $debugOutput;
    error_log("SMTP Test Error: " . $e->getMessage());
    exit(1);
}

ob_end_flush();