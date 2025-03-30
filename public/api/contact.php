<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../backend/db/connection.php';
require_once __DIR__ . '/../../backend/utils/functions.php';
require_once __DIR__ . '/../../backend/config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true) ?? $_POST;

// Validate required fields
$name = sanitizeInput($data['name'] ?? '');
$email = sanitizeInput($data['email'] ?? '');
$message = sanitizeInput($data['message'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
    exit;
}

if (!validateEmail($email)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

try {
    // First save to database
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    $contactId = $pdo->lastInsertId();
    
    // Then attempt to send email
    $emailSent = false;
    try {
        $mail = new PHPMailer(true);
        
        // Enable debug output for error logging
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $debugOutput = '';
        $mail->Debugoutput = function($str, $level) use (&$debugOutput) {
            $debugOutput .= "$str\n";
            error_log("SMTP Debug: $str");
        };

        // Server settings
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = SMTP_PORT;
        
        // Set timeout
        $mail->Timeout = 30;
        
        // SSL settings
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false
            )
        );

        // Recipients
        $mail->setFrom(EMAIL_FROM, $name);
        $mail->addReplyTo($email, $name);
        $mail->addAddress(EMAIL_TO);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong></p>
            <p>{$message}</p>
        ";
        $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

        $mail->send();
        $emailSent = true;
        
        // Update database to mark email as sent
        $stmt = $pdo->prepare("UPDATE contacts SET email_sent = true WHERE id = ?");
        $stmt->execute([$contactId]);

        echo json_encode([
            'success' => true,
            'message' => 'Thank you! Your message has been received and we will contact you soon.'
        ]);
        
    } catch (Exception $e) {
        error_log("Email Error for contact ID $contactId: " . $e->getMessage());
        error_log("SMTP Debug Log:\n" . $debugOutput);
        
        // Store SMTP error in database for debugging
        $stmt = $pdo->prepare("UPDATE contacts SET smtp_error = ? WHERE id = ?");
        $stmt->execute([$e->getMessage() . "\n\n" . $debugOutput, $contactId]);
        
        // Even if email fails, we still saved the contact
        echo json_encode([
            'success' => true,
            'message' => 'Thank you! Your message has been received. We will review it and get back to you soon.'
        ]);
    }

} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Sorry, there was an error saving your message. Please try again later.'
    ]);
}