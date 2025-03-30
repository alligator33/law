<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';

// Custom error handler to catch all types of errors
function errorHandler($errno, $errstr, $errfile, $errline) {
    error_log("PHP Error [$errno]: $errstr in $errfile on line $errline");
    return false;
}
set_error_handler("errorHandler");

try {
    // Load configuration first to catch any config errors
    require_once __DIR__ . '/../../backend/config/config.php';
    require_once __DIR__ . '/../../backend/db/connection.php';
    require_once __DIR__ . '/../../backend/utils/functions.php';
    
    error_log("Configuration loaded successfully");
    error_log("Database settings: Host=" . DB_HOST . ", Database=" . DB_NAME . ", User=" . DB_USER);

    // Get POST data
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        throw new Exception('Please fill in all fields.');
    }

    if (!validateEmail($email)) {
        throw new Exception('Please enter a valid email address.');
    }

    // Save to database first
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    $contactId = $pdo->lastInsertId();

    error_log("Contact saved to database with ID: " . $contactId);

    // Send email
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = SMTP_PORT;
    
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
    error_log("Email sent successfully for contact ID: " . $contactId);
    
    // Update database to mark email as sent
    $stmt = $pdo->prepare("UPDATE contacts SET email_sent = true WHERE id = ?");
    $stmt->execute([$contactId]);

    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your message has been received and we will contact you soon.'
    ]);

} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    error_log("Error Code: " . $e->getCode());
    error_log("SQL State: " . $e->errorInfo[0] ?? 'Unknown');
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed. Please try again later.',
        'debug' => [
            'error' => $e->getMessage(),
            'code' => $e->getCode(),
            'sql_state' => $e->errorInfo[0] ?? 'Unknown'
        ]
    ]);
} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    
    $statusCode = ($e instanceof PDOException) ? 500 : 400;
    http_response_code($statusCode);
    
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}