<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../backend/db/connection.php';
require_once __DIR__ . '/../../backend/utils/functions.php';
require_once __DIR__ . '/../../backend/config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USER;
        $mail->Password = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = SMTP_PORT;
        
        // Additional security options
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => true,
                'verify_peer_name' => true,
                'allow_self_signed' => false
            )
        );

        $mail->setFrom(EMAIL_FROM, $name);
        $mail->addAddress(EMAIL_TO);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";

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