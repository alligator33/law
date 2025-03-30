<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../backend/db/connection.php';
require_once __DIR__ . '/../../backend/utils/functions.php';
require_once __DIR__ . '/../../backend/config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

try {
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
    
    // Update database to mark email as sent
    $stmt = $pdo->prepare("UPDATE contacts SET email_sent = true WHERE id = ?");
    $stmt->execute([$contactId]);

    echo json_encode([
        'success' => true,
        'message' => 'Thank you! Your message has been received and we will contact you soon.'
    ]);

} catch (Exception $e) {
    error_log("Error in contact form: " . $e->getMessage());
    
    // Save SMTP error if it exists
    if (isset($contactId) && isset($mail) && $mail->ErrorInfo) {
        try {
            $stmt = $pdo->prepare("UPDATE contacts SET smtp_error = ? WHERE id = ?");
            $stmt->execute([$mail->ErrorInfo, $contactId]);
        } catch (PDOException $pe) {
            error_log("Could not save SMTP error: " . $pe->getMessage());
        }
    }
    
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}