<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../backend/config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

try {
    $mail = new PHPMailer(true);
    
    echo "<h2>Testing Email Configuration</h2>\n";
    echo "<pre>\n";
    
    echo "Configuration:\n";
    echo "Host: " . SMTP_HOST . "\n";
    echo "Port: " . SMTP_PORT . "\n";
    echo "Username: " . SMTP_USER . "\n";
    echo "Security: SMTPS\n\n";
    
    // Enable detailed debug output
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = function($str, $level) {
        echo htmlspecialchars($str) . "\n";
    };
    
    // Server settings
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    // Use stripslashes to handle any escaped special characters
    $mail->Password = stripslashes(SMTP_PASS);
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = SMTP_PORT;
    
    // Set timeout
    $mail->Timeout = 30;
    
    // Simple SSL settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false
        )
    );
    
    // Recipients
    $mail->setFrom(EMAIL_FROM, 'Email Test');
    $mail->addAddress(EMAIL_TO);
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email ' . date('Y-m-d H:i:s');
    $mail->Body = '
        <h3>Test Email</h3>
        <p>This is a test email sent at ' . date('Y-m-d H:i:s') . '</p>
        <p>If you receive this, the email configuration is working correctly.</p>
    ';
    $mail->AltBody = 'This is a test email sent at ' . date('Y-m-d H:i:s');
    
    echo "\nAttempting to send email...\n";
    $mail->send();
    echo "\n✅ Test email sent successfully!\n";
    
} catch (Exception $e) {
    echo "\n❌ Email sending failed!\n";
    echo "Error message: " . $e->getMessage() . "\n";
    if (isset($mail) && $mail->ErrorInfo) {
        echo "Mailer error: " . $mail->ErrorInfo . "\n";
    }
}

echo "</pre>";
?>